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
        ?>
        <div class="card mspress-exchange-page-card">
            <div class="card-header">
                <h2 class="h5 mb-0"><?php esc_html_e( 'Sent email log', 'mspress' ); ?></h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="widefat striped">
                        <thead>
                            <tr>
                                <th><?php esc_html_e( 'Date', 'mspress' ); ?></th>
                                <th><?php esc_html_e( 'Sender', 'mspress' ); ?></th>
                                <th><?php esc_html_e( 'Recipients', 'mspress' ); ?></th>
                                <th><?php esc_html_e( 'Subject', 'mspress' ); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                <?php
        foreach ( $logs as $log ) {
            ?>
                            <tr>
                                <td><?php echo esc_html( $log['date'] ?? '' ); ?></td>
                                <td><?php echo esc_html( $log['sender'] ?? '' ); ?></td>
                                <td><?php echo esc_html( $log['to'] ?? '' ); ?></td>
                                <td><?php echo esc_html( $log['subject'] ?? '' ); ?></td>
                            </tr>
            <?php
        }
        if ( ! $logs ) {
            ?>
                            <tr>
                                <td colspan="4"><?php esc_html_e( 'No WordPress emails have been sent yet.', 'mspress' ); ?></td>
                            </tr>
            <?php
        }
        ?>
                        </tbody>
                    </table>
                </div>
                <h2 class="h5 mt-4"><?php esc_html_e( 'WordPress email sources found', 'mspress' ); ?></h2>
                <div class="table-responsive">
                    <table class="widefat striped">
                        <thead>
                            <tr>
                                <th><?php esc_html_e( 'Source', 'mspress' ); ?></th>
                                <th><?php esc_html_e( 'Path', 'mspress' ); ?></th>
                                <th><?php esc_html_e( 'wp_mail() calls', 'mspress' ); ?></th>
                                <th><?php esc_html_e( 'Template directory', 'mspress' ); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                <?php
        foreach ( $discovered as $item ) {
            ?>
                            <tr>
                                <td><?php echo esc_html( $item['source'] ); ?></td>
                                <td><code><?php echo esc_html( $item['path'] ); ?></code></td>
                                <td><?php echo esc_html( (string) $item['mail_calls'] ); ?></td>
                                <td><?php echo esc_html( ! empty( $item['template_directory'] ) ? __( 'Yes', 'mspress' ) : __( 'No', 'mspress' ) ); ?></td>
                            </tr>
            <?php
        }
        if ( ! $discovered ) {
            ?>
                            <tr>
                                <td colspan="4"><?php esc_html_e( 'No WordPress email sources were found.', 'mspress' ); ?></td>
                            </tr>
            <?php
        }
        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
    }
}