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

            $mailbox_email = sanitize_email( (string) ( $mailbox->getMail() ?: $mailbox->getUserPrincipalName() ) );
            if ( strtolower( $mailbox_email ) !== strtolower( $email ) ) {
                LoggerHelper::write_log( 'Exchange mailbox validation mismatch for: ' . $email . ' -> returned: ' . (string) $mailbox_email );
                return [ 'valid' => false, 'reason' => 'not_found' ];
            }

            try {
                $graph->users()->byUserId( $email )->mailboxSettings()->get()->wait();
            } catch ( \Throwable $settings_exception ) {
                $settings_message = strtolower( $settings_exception->getMessage() );
                if ( str_contains( $settings_message, 'forbidden' ) || str_contains( $settings_message, 'unauthorized' ) || str_contains( $settings_message, 'access is denied' ) ) {
                    LoggerHelper::write_log( 'Exchange mailbox validation accepted mailbox despite mailboxSettings access denial for: ' . $email . ' :: ' . $settings_exception->getMessage() );
                } else {
                    LoggerHelper::write_log( 'Exchange mailbox validation saw a non-access issue while checking mailboxSettings for: ' . $email . ' :: ' . $settings_exception->getMessage() );
                }
            }

            LoggerHelper::write_log( 'Exchange mailbox validation succeeded for: ' . $email );
            return [
                'valid' => true,
                'email' => $mailbox_email,
                'name' => sanitize_text_field( (string) $mailbox->getDisplayName() ),
            ];
        } catch ( \Throwable $exception ) {
            $message = strtolower( $exception->getMessage() );
            $reason = str_contains( $message, 'not found' ) || str_contains( $message, '404' ) ? 'not_found' : ( str_contains( $message, 'forbidden' ) || str_contains( $message, 'unauthorized' ) ? 'access_denied' : 'not_found' );
            LoggerHelper::write_log( 'Exchange mailbox validation failed for: ' . $email . ' :: ' . $exception->getMessage() . ' => ' . $reason );
            return [ 'valid' => false, 'reason' => $reason ];
        }
    }
}