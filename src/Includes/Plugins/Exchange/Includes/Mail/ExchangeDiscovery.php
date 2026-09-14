<?php
/**
 * ExchangeDiscovery class for the Exchange internal MSPress plugin.
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Includes\Mail
 * @since 1.0.0
 */
namespace MSPress\Includes\Plugins\Exchange\Includes\Mail;

use MSPress\Includes\Functions\Helpers\EncryptionHelper;
use MSPress\Includes\Functions\Helpers\LoggerHelper;
use MSPress\Includes\Plugins\Exchange\Includes\Kiota\Exchange;
use MSPress\Includes\Settings\Settings as BaseSettings;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class ExchangeDiscovery {
    /**
     * Discover the Exchange server URL.
     *
     * @param string $email The email address to discover.
     * @return string|null The discovered Exchange server URL or null if not found.
     */
    public static function validate( Exchange $graph, string $email, ?string $access_token = null ): array {
        $email = sanitize_email( $email );
        if ( ! is_email( $email ) ) {
            LoggerHelper::write_log( 'Exchange mailbox validation skipped: invalid email address ' . (string) $email );
            return [ 'valid' => false, 'reason' => 'invalid_email' ];
        }

        $connected_account = BaseSettings::get_group( 'exchange', [] )['account'] ?? [];
        $connected_email = sanitize_email( (string) EncryptionHelper::decrypt( (string) ( $connected_account['email'] ?? '' ) ) );
        LoggerHelper::write_log(
            'Exchange mailbox validation started: target_email=' . $email .
            ', connected_email=' . ( is_email( $connected_email ) ? $connected_email : 'unknown' ) .
            ', token_source=' . ( is_string( $access_token ) && '' !== trim( $access_token ) ? 'explicit' : 'stored' ) .
            ', scopes=openid profile email offline_access User.Read Mail.Read.Shared Mail.Send.Shared MailboxSettings.Read'
        );

        try {
            $token = is_string( $access_token ) && '' !== trim( $access_token ) ? $access_token : self::get_delegated_token();
            if ( ! is_string( $token ) || '' === $token ) {
                LoggerHelper::write_log( 'Exchange mailbox validation failed: no delegated access token available for ' . $email );
                return [ 'valid' => false, 'reason' => 'token_expired' ];
            }

            $mailbox = self::find_mailbox_by_address( $token, $email );
            if ( ! $mailbox ) {
                LoggerHelper::write_log( 'Exchange mailbox validation returned no mailbox object for: ' . $email . ', connected_email=' . ( is_email( $connected_email ) ? $connected_email : 'unknown' ) );
                return [ 'valid' => false, 'reason' => 'not_found' ];
            }

            $candidates = self::collect_mailbox_candidates( $mailbox );
            $mailbox_email = self::choose_mailbox_email( $email, $candidates );

            if ( '' === $mailbox_email ) {
                LoggerHelper::write_log( 'Exchange mailbox validation mismatch for: ' . $email . ' -> returned: ' . wp_json_encode( $candidates ) );
                return [ 'valid' => false, 'reason' => 'not_found' ];
            }

            if ( ! in_array( strtolower( $email ), array_map( 'strtolower', $candidates ), true ) ) {
                LoggerHelper::write_log( 'Exchange mailbox validation rejected because the returned mailbox does not match the requested address: ' . $email . ' -> ' . implode( ', ', $candidates ) );
                return [ 'valid' => false, 'reason' => 'not_found' ];
            }

            $mailbox_settings = self::fetch_mailbox_settings( $token, $mailbox );
            if ( is_array( $mailbox_settings ) && ! empty( $mailbox_settings['error'] ) ) {
                $error_message = strtolower( (string) $mailbox_settings['error'] );
                if ( self::is_access_denied_error( $error_message ) ) {
                    LoggerHelper::write_log( 'Exchange mailbox validation reports Graph access denied while checking mailboxSettings for: ' . $email . ' :: ' . $mailbox_settings['error'] );
                    return [ 'valid' => false, 'reason' => 'access_denied' ];
                }

                LoggerHelper::write_log( 'Exchange mailbox validation saw a non-access issue while checking mailboxSettings for: ' . $email . ' :: ' . $mailbox_settings['error'] );
                return [ 'valid' => false, 'reason' => 'not_found' ];
            }

            LoggerHelper::write_log( 'Exchange mailbox validation succeeded for: ' . $email );
            return [
                'valid' => true,
                'email' => $mailbox_email,
                'name' => sanitize_text_field( (string) ( $mailbox['displayName'] ?? '' ) ),
            ];
        } catch ( \Throwable $exception ) {
            $message = strtolower( $exception->getMessage() );
            if ( str_contains( $message, 'token' ) || str_contains( $message, 'invalid_grant' ) || str_contains( $message, 'expired' ) || str_contains( $message, '401' ) || str_contains( $message, 'unauthorized' ) ) {
                $reason = 'token_expired';
            } elseif ( self::is_access_denied_error( $message ) ) {
                $reason = 'access_denied';
            } else {
                $reason = 'not_found';
            }
            LoggerHelper::write_log( 'Exchange mailbox validation failed for: ' . $email . ' :: ' . $exception->getMessage() . ' => ' . $reason );
            return [ 'valid' => false, 'reason' => $reason ];
        }
    }

    private static function find_mailbox_by_address( string $token, string $email ): ?array {
        foreach ( self::build_mailbox_lookup_urls( $email ) as $lookup_url ) {
            LoggerHelper::write_log( 'Exchange mailbox lookup attempt: ' . $lookup_url );
            $response = wp_remote_get(
                $lookup_url,
                [
                    'timeout' => 30,
                    'headers' => [
                        'Authorization' => 'Bearer ' . $token,
                        'Accept' => 'application/json',
                    ],
                ]
            );

            if ( is_wp_error( $response ) ) {
                LoggerHelper::write_log( 'Exchange mailbox lookup attempt failed for ' . $email . ' :: ' . $response->get_error_message() . ' :: ' . $lookup_url );
                continue;
            }

            $status = wp_remote_retrieve_response_code( $response );
            $body = json_decode( wp_remote_retrieve_body( $response ), true );
            LoggerHelper::write_log( 'Exchange mailbox lookup response for ' . $email . ' :: status=' . (string) $status . ' :: body=' . wp_json_encode( $body ) );

            if ( 200 !== $status || ! is_array( $body ) || empty( $body['value'] ) ) {
                continue;
            }

            $value = array_values( array_filter( (array) $body['value'], fn( $entry ) => is_array( $entry ) ) );
            if ( ! empty( $value ) ) {
                return $value[0];
            }
        }

        return null;
    }

    private static function fetch_mailbox_settings( string $token, array $mailbox ): array {
        $user_id = (string) ( $mailbox['id'] ?? '' );
        if ( '' === $user_id ) {
            return [ 'error' => 'not_found' ];
        }

        $url = 'https://graph.microsoft.com/v1.0/users/' . rawurlencode( $user_id ) . '/mailboxSettings';
        $connected_email = sanitize_email( (string) EncryptionHelper::decrypt( (string) ( BaseSettings::get_group( 'exchange', [] )['account']['email'] ?? '' ) ) );
        LoggerHelper::write_log(
            'Exchange mailboxSettings lookup: url=' . $url .
            ', connected_email=' . ( is_email( $connected_email ) ? $connected_email : 'unknown' ) .
            ', mailbox_id=' . $user_id .
            ', token_prefix=' . substr( $token, 0, 20 ) . '...'
        );
        $response = wp_remote_get(
            $url,
            [
                'timeout' => 30,
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ],
            ]
        );

        if ( is_wp_error( $response ) ) {
            return [ 'error' => $response->get_error_message() ];
        }

        $status = wp_remote_retrieve_response_code( $response );
        $body = json_decode( wp_remote_retrieve_body( $response ), true );
        if ( 200 === $status ) {
            return is_array( $body ) ? $body : [ 'ok' => true ];
        }

        $message = is_array( $body ) ? wp_json_encode( $body ) : wp_remote_retrieve_body( $response );
        return [ 'error' => $message ?: 'mailboxSettings failed with status ' . (string) $status ];
    }

    private static function get_delegated_token(): ?string {
        $settings = BaseSettings::get_group( 'exchange', [] ) ?? [];
        $account = is_array( $settings['account'] ?? null ) ? $settings['account'] : [];
        $expires = (int) ( $account['expires'] ?? 0 );
        $token = EncryptionHelper::decrypt( (string) ( $account['access_token'] ?? '' ) );

        if ( is_string( $token ) && '' !== $token && $expires > time() + 300 ) {
            return $token;
        }

        $refresh_token = EncryptionHelper::decrypt( (string) ( $account['refresh_token'] ?? '' ) );
        if ( ! is_string( $refresh_token ) || '' === $refresh_token ) {
            LoggerHelper::write_log( 'Exchange delegated token refresh skipped: no refresh token available for connected account.' );
            return null;
        }

        $tenant_id = \MSPress\Includes\MSGraph\GraphService::get_instance()->get_tenant_id();
        $client_id = \MSPress\Includes\MSGraph\GraphService::get_instance()->get_client_id();
        $client_secret = \MSPress\Includes\MSGraph\GraphService::get_instance()->get_client_secret();

        if ( empty( $tenant_id ) || empty( $client_id ) || empty( $client_secret ) ) {
            LoggerHelper::write_log( 'Exchange delegated token refresh skipped: Graph app credentials are not available.' );
            return null;
        }

        $response = wp_remote_post(
            'https://login.microsoftonline.com/' . rawurlencode( $tenant_id ) . '/oauth2/v2.0/token',
            [
                'timeout' => 30,
                'body' => [
                    'grant_type' => 'refresh_token',
                    'client_id' => $client_id,
                    'client_secret' => $client_secret,
                    'refresh_token' => $refresh_token,
                    'scope' => 'openid profile email offline_access User.Read Mail.Read.Shared Mail.Send.Shared MailboxSettings.Read',
                ],
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
            ]
        );

        if ( is_wp_error( $response ) ) {
            LoggerHelper::write_log( 'Exchange delegated token refresh failed: ' . $response->get_error_message() );
            return null;
        }

        $payload = json_decode( wp_remote_retrieve_body( $response ), true );
        if ( ! is_array( $payload ) || empty( $payload['access_token'] ) ) {
            LoggerHelper::write_log( 'Exchange delegated token refresh returned no access token: ' . wp_remote_retrieve_body( $response ) );
            return null;
        }

        $new_access = (string) $payload['access_token'];
        $updated = $account;
        $updated['access_token'] = EncryptionHelper::encrypt( $new_access );
        $updated['refresh_token'] = EncryptionHelper::encrypt( (string) ( $payload['refresh_token'] ?? $refresh_token ) );
        $updated['expires'] = (int) ( time() + (int) ( $payload['expires_in'] ?? 3600 ) );

        if ( null !== $updated['access_token'] && null !== $updated['refresh_token'] ) {
            $settings['account'] = $updated;
            BaseSettings::set_group( 'exchange', $settings );
        }

        LoggerHelper::write_log( 'Exchange delegated token refreshed automatically for connected account.' );
        return $new_access;
    }

    private static function build_mailbox_lookup_urls( string $email ): array {
        $escaped_email = str_replace( "'", "''", $email );
        $filters = [];
        $filters[] = "mail eq '{$escaped_email}'";
        $filters[] = "userPrincipalName eq '{$escaped_email}'";
        $filters[] = "proxyAddresses/any(a:a eq 'SMTP:{$escaped_email}')";

        $urls = [];
        foreach ( $filters as $filter ) {
            $urls[] = 'https://graph.microsoft.com/v1.0/users?$filter=' . rawurlencode( $filter ) . '&$select=mail,userPrincipalName,displayName,proxyAddresses,id';
        }

        return $urls;
    }

    private static function collect_mailbox_candidates( $mailbox ): array {
        $values = [];

        foreach ( [
            self::get_mailbox_value( $mailbox, 'mail' ),
            self::get_mailbox_value( $mailbox, 'userPrincipalName' ),
        ] as $value ) {
            $email = sanitize_email( (string) $value );
            if ( is_email( $email ) ) {
                $values[] = strtolower( $email );
            }
        }

        $proxy_addresses = self::get_mailbox_value( $mailbox, 'proxyAddresses' );
        if ( is_array( $proxy_addresses ) ) {
            foreach ( $proxy_addresses as $proxy_address ) {
                if ( ! is_string( $proxy_address ) ) {
                    continue;
                }
                $proxy_email = strtolower( trim( str_ireplace( 'SMTP:', '', $proxy_address ) ) );
                if ( is_email( $proxy_email ) ) {
                    $values[] = $proxy_email;
                }
            }
        }

        return array_values( array_unique( array_filter( $values ) ) );
    }

    private static function get_mailbox_value( $mailbox, string $key ) {
        if ( is_array( $mailbox ) ) {
            return $mailbox[ $key ] ?? '';
        }

        if ( is_object( $mailbox ) ) {
            $method = 'get' . ucfirst( $key );
            if ( method_exists( $mailbox, $method ) ) {
                return $mailbox->{$method}();
            }

            if ( property_exists( $mailbox, $key ) ) {
                return $mailbox->{$key};
            }
        }

        return '';
    }

    private static function choose_mailbox_email( string $requested_email, array $candidates ): string {
        $requested = strtolower( trim( sanitize_email( $requested_email ) ) );
        if ( '' === $requested ) {
            return '';
        }
        foreach ( $candidates as $candidate ) {
            if ( strtolower( trim( (string) $candidate ) ) === $requested ) {
                return (string) $candidate;
            }
        }

        foreach ( $candidates as $candidate ) {
            if ( false !== stripos( (string) $candidate, '@' ) ) {
                return (string) $candidate;
            }
        }

        return '';
    }

    private static function is_access_denied_error( string $message ): bool {
        $patterns = [
            'forbidden',
            'unauthorized',
            'access is denied',
            'access denied',
            'not allowed',
            'cannot access it',
            'cannot access the mailbox',
            'mailbox exists, but the connected account cannot access it',
            'insufficient privileges',
            'permission to access mailbox',
            'send as',
            'full access',
            'access to mailbox',
            'authorization_request_denied',
            'not authorized to access',
            'restricted by policy',
        ];

        foreach ( $patterns as $pattern ) {
            if ( str_contains( $message, $pattern ) ) {
                return true;
            }
        }

        return false;
    }

    private static function is_not_found_error( string $message ): bool {
        $patterns = [
            'not found',
            '404',
            'resource not found',
            'mailbox not found',
            'no mailbox',
            'mailbox does not exist',
            'user not found',
            'does not exist',
        ];

        foreach ( $patterns as $pattern ) {
            if ( str_contains( $message, $pattern ) ) {
                return true;
            }
        }

        return false;
    }
}