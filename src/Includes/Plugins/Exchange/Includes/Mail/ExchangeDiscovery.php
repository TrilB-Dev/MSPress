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
            $mailbox = $graph->users()->byUserId( $email )->get()->wait();
            if ( ! $mailbox ) {
                LoggerHelper::write_log( 'Exchange mailbox validation returned no mailbox object for: ' . $email );
                return [ 'valid' => false, 'reason' => 'not_found' ];
            }

            $candidates = array_values( array_filter( [
                sanitize_email( (string) ( $mailbox->getMail() ?? '' ) ),
                sanitize_email( (string) ( $mailbox->getUserPrincipalName() ?? '' ) ),
            ], 'is_email' ) );
            $mailbox_email = $candidates[0] ?? '';

            if ( '' === $mailbox_email || ! in_array( strtolower( $mailbox_email ), array_map( 'strtolower', $candidates ), true ) ) {
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
            if ( self::is_access_denied_error( $message ) ) {
                $reason = 'access_denied';
            } else {
                $reason = 'not_found';
            }
            LoggerHelper::write_log( 'Exchange mailbox validation failed for: ' . $email . ' :: ' . $exception->getMessage() . ' => ' . $reason );
            return [ 'valid' => false, 'reason' => $reason ];
        }
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