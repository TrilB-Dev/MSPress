<?php
/**
 * ExchangeDiscovery class for the Exchange internal MSPress plugin.
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Includes\Mail
 * @since 1.0.0
 */
namespace MSPress\Includes\Plugins\Exchange\Includes\Mail;

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
            return [ 'valid' => false, 'reason' => 'invalid_email' ];
        }

        try {
            $mailbox = $graph->users()->byUserId( $email )->get()->wait();
            if ( ! $mailbox ) {
                return [ 'valid' => false, 'reason' => 'not_found' ];
            }
            $mailbox_email = sanitize_email( (string) ( $mailbox->getMail() ?: $mailbox->getUserPrincipalName() ) );
            if ( strtolower( $mailbox_email ) !== strtolower( $email ) ) {
                return [ 'valid' => false, 'reason' => 'not_found' ];
            }
            $graph->users()->byUserId( $email )->mailFolders()->byMailFolderId( 'inbox' )->get()->wait();
            return [ 'valid' => true, 'email' => $mailbox_email, 'name' => sanitize_text_field( (string) $mailbox->getDisplayName() ) ];
        } catch ( \Throwable $exception ) {
            return [ 'valid' => false, 'reason' => 'access_denied' ];
        }
    }
}