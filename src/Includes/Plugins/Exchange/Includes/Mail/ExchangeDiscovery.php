<?php
/**
 * ExchangeDiscovery class for the Exchange internal MSPress plugin.
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Includes\Mail
 * @since 1.0.0
 */
namespace MSPress\Includes\Plugins\Exchange\Includes\Mail;

use MSPress\Includes\Functions\Helpers\LoggerHelper;
use MSPress\Includes\Plugins\Exchange\Includes\Kiota\Exchange;

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
    public static function validate( Exchange $graph, string $email ): array {
        $email = sanitize_email( $email );
        if ( ! is_email( $email ) ) {
            LoggerHelper::write_log( 'Exchange mailbox validation skipped: invalid email address ' . (string) $email );
            return [ 'valid' => false, 'reason' => 'invalid_email' ];
        }

        LoggerHelper::write_log( 'Exchange mailbox validation started for: ' . $email );

        try {
            $mailbox = self::find_mailbox_by_address( $graph, $email );
            if ( ! $mailbox ) {
                LoggerHelper::write_log( 'Exchange mailbox validation returned no mailbox object for: ' . $email );
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

            try {
                $graph->users()->byUserId( $mailbox_email )->mailboxSettings()->get()->wait();
            } catch ( \Throwable $settings_exception ) {
                $settings_message = strtolower( $settings_exception->getMessage() );
                if ( self::is_access_denied_error( $settings_message ) ) {
                    LoggerHelper::write_log( 'Exchange mailbox validation rejected mailbox because connected account cannot access it for: ' . $email . ' :: ' . $settings_exception->getMessage() );
                    return [ 'valid' => false, 'reason' => 'access_denied' ];
                }

                LoggerHelper::write_log( 'Exchange mailbox validation saw a non-access issue while checking mailboxSettings for: ' . $email . ' :: ' . $settings_exception->getMessage() );
                return [ 'valid' => false, 'reason' => 'not_found' ];
            }

            LoggerHelper::write_log( 'Exchange mailbox validation succeeded for: ' . $email );
            return [
                'valid' => true,
                'email' => $mailbox_email,
                'name' => sanitize_text_field( (string) $mailbox->getDisplayName() ),
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

    private static function find_mailbox_by_address( Exchange $graph, string $email ) {
        $lookup_urls = self::build_mailbox_lookup_urls( $email );

        foreach ( $lookup_urls as $lookup_url ) {
            try {
                LoggerHelper::write_log( 'Exchange mailbox lookup attempt: ' . $lookup_url );
                $collection = $graph->users()->withUrl( $lookup_url )->get()->wait();
                if ( ! $collection ) {
                    LoggerHelper::write_log( 'Exchange mailbox lookup returned empty collection for: ' . $email . ' :: ' . $lookup_url );
                    continue;
                }

                if ( method_exists( $collection, 'getValue' ) ) {
                    $value = $collection->getValue();
                    LoggerHelper::write_log( 'Exchange mailbox lookup response for ' . $email . ' had ' . ( is_array( $value ) ? count( $value ) : 0 ) . ' candidate(s): ' . $lookup_url );
                    if ( is_array( $value ) && ! empty( $value ) ) {
                        return $value[0];
                    }
                }

                LoggerHelper::write_log( 'Exchange mailbox lookup response for ' . $email . ' did not expose user values: ' . wp_json_encode( $collection ) );
            } catch ( \Throwable $lookup_exception ) {
                LoggerHelper::write_log( 'Exchange mailbox lookup attempt failed for ' . $email . ' :: ' . $lookup_exception->getMessage() . ' :: ' . $lookup_url );
            }
        }

        try {
            LoggerHelper::write_log( 'Exchange mailbox fallback lookup attempt by user id for: ' . $email );
            $fallback_user = $graph->users()->byUserId( $email )->get()->wait();
            if ( $fallback_user ) {
                LoggerHelper::write_log( 'Exchange mailbox fallback lookup by user id succeeded for: ' . $email );
                return $fallback_user;
            }
        } catch ( \Throwable $fallback_exception ) {
            LoggerHelper::write_log( 'Exchange mailbox fallback lookup by user id failed for ' . $email . ' :: ' . $fallback_exception->getMessage() );
        }

        return null;
    }

    private static function build_mailbox_lookup_urls( string $email ): array {
        $escaped_email = str_replace( "'", "''", $email );
        $filters = [];
        $filters[] = "mail eq '{$escaped_email}'";
        $filters[] = "userPrincipalName eq '{$escaped_email}'";
        $filters[] = "proxyAddresses/any(a:a eq 'SMTP:{$escaped_email}')";

        $urls = [];
        foreach ( $filters as $filter ) {
            $urls[] = 'https://graph.microsoft.com/v1.0/users?$filter=' . rawurlencode( $filter ) . '&$select=mail,userPrincipalName,displayName,proxyAddresses';
        }

        return $urls;
    }

    private static function collect_mailbox_candidates( $mailbox ): array {
        $values = [];
        foreach ( [
            $mailbox->getMail() ?? '',
            $mailbox->getUserPrincipalName() ?? '',
        ] as $value ) {
            $email = sanitize_email( (string) $value );
            if ( is_email( $email ) ) {
                $values[] = strtolower( $email );
            }
        }

        if ( method_exists( $mailbox, 'getProxyAddresses' ) ) {
            $proxy_addresses = $mailbox->getProxyAddresses();
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
        }

        return array_values( array_unique( array_filter( $values ) ) );
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