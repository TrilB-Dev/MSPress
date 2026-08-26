<?php
/**
 * SentLogs class for the Exchange plugin.
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Admin
 * @since 1.0.0
 */
namespace MSPress\Includes\Plugins\Exchange\Admin;

use MSPress\Includes\Settings\Settings;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class SentLogs {

    /**
     * Renders the sent logs page.
     *
     * @since 1.0.0
     * @return void
     */
    public static function render(): void {
        $settings = Settings::get_group( 'exchange', [] ) ?? [];
        $logs = is_array( $settings['sent_logs'] ?? null ) ? $settings['sent_logs'] : [];
        echo '<div class="card mspress-exchange-page-card"><div class="card-header"><h2 class="h5 mb-0">' . esc_html__( 'Sent email log', 'mspress' ) . '</h2></div><div class="card-body"><div class="table-responsive"><table class="widefat striped"><thead><tr><th>' . esc_html__( 'Date', 'mspress' ) . '</th><th>' . esc_html__( 'Sender', 'mspress' ) . '</th><th>' . esc_html__( 'Recipients', 'mspress' ) . '</th><th>' . esc_html__( 'Subject', 'mspress' ) . '</th></tr></thead><tbody>';
        foreach ( $logs as $log ) {
            echo '<tr><td>' . esc_html( $log['date'] ?? '' ) . '</td><td>' . esc_html( $log['sender'] ?? '' ) . '</td><td>' . esc_html( $log['to'] ?? '' ) . '</td><td>' . esc_html( $log['subject'] ?? '' ) . '</td></tr>';
        }
        if ( ! $logs ) {
            echo '<tr><td colspan="4">' . esc_html__( 'No Graph emails have been sent yet.', 'mspress' ) . '</td></tr>';
        }
        echo '</tbody></table></div></div></div>';
    }
}