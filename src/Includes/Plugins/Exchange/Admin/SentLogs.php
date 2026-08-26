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
use MSPress\Includes\Plugins\Exchange\Includes\Mail\WPEmailDiscovery;

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
        $logs = array_merge(
            is_array( $settings['wordpress_mail_logs'] ?? null ) ? $settings['wordpress_mail_logs'] : [],
            is_array( $settings['sent_logs'] ?? null ) ? $settings['sent_logs'] : []
        );
        $unique_logs = [];
        foreach ( $logs as $log ) {
            if ( ! is_array( $log ) ) {
                continue;
            }
            $key = implode( '|', [ $log['date'] ?? '', $log['to'] ?? '', $log['subject'] ?? '' ] );
            $unique_logs[ $key ] = $log;
        }
        $logs = array_values( $unique_logs );
        usort( $logs, static fn( array $first, array $second ): int => strcmp( (string) ( $second['date'] ?? '' ), (string) ( $first['date'] ?? '' ) ) );
        $discovered = WPEmailDiscovery::discover();
        echo '<div class="card mspress-exchange-page-card"><div class="card-header"><h2 class="h5 mb-0">' . esc_html__( 'Sent email log', 'mspress' ) . '</h2></div><div class="card-body"><div class="table-responsive"><table class="widefat striped"><thead><tr><th>' . esc_html__( 'Date', 'mspress' ) . '</th><th>' . esc_html__( 'Sender', 'mspress' ) . '</th><th>' . esc_html__( 'Recipients', 'mspress' ) . '</th><th>' . esc_html__( 'Subject', 'mspress' ) . '</th></tr></thead><tbody>';
        foreach ( $logs as $log ) {
            echo '<tr><td>' . esc_html( $log['date'] ?? '' ) . '</td><td>' . esc_html( $log['sender'] ?? '' ) . '</td><td>' . esc_html( $log['to'] ?? '' ) . '</td><td>' . esc_html( $log['subject'] ?? '' ) . '</td></tr>';
        }
        if ( ! $logs ) {
            echo '<tr><td colspan="4">' . esc_html__( 'No WordPress emails have been sent yet.', 'mspress' ) . '</td></tr>';
        }
        echo '</tbody></table></div><h2 class="h5 mt-4">' . esc_html__( 'WordPress email sources found', 'mspress' ) . '</h2><div class="table-responsive"><table class="widefat striped"><thead><tr><th>' . esc_html__( 'Source', 'mspress' ) . '</th><th>' . esc_html__( 'Path', 'mspress' ) . '</th><th>' . esc_html__( 'wp_mail() calls', 'mspress' ) . '</th><th>' . esc_html__( 'Template directory', 'mspress' ) . '</th></tr></thead><tbody>';
        foreach ( $discovered as $item ) {
            echo '<tr><td>' . esc_html( $item['source'] ) . '</td><td><code>' . esc_html( $item['path'] ) . '</code></td><td>' . esc_html( (string) $item['mail_calls'] ) . '</td><td>' . esc_html( ! empty( $item['template_directory'] ) ? __( 'Yes', 'mspress' ) : __( 'No', 'mspress' ) ) . '</td></tr>';
        }
        if ( ! $discovered ) {
            echo '<tr><td colspan="4">' . esc_html__( 'No WordPress email sources were found.', 'mspress' ) . '</td></tr>';
        }
        echo '</tbody></table></div></div></div>';
    }
}