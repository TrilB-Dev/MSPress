<?php
/**
 * Export-related admin functions for MSPress.
 *
 * @package MSPress
 * @subpackage Includes\Functions\Admin
 * @since 1.0.0
 */
namespace MSPress\Includes\Functions\Admin;

use MSPress\Includes\Tools\DataTransfer;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class FunctionsExport {

    /**
    * Export Microsoft Graph Core settings as a JSON file.
     *
     * @return void
     */
    public function export_data(): void {
        if ( ! current_user_can( 'mspress_tools_export' ) ) {
            wp_die( esc_html__( 'You are not allowed to export Microsoft Graph Core settings.', 'mspress' ), 403 );
        }
        check_admin_referer( 'mspress_export' );
        nocache_headers();
        header( 'Content-Type: application/json; charset=utf-8' );
        header( 'Content-Disposition: attachment; filename=mspress-graph-core-' . gmdate( 'Y-m-d' ) . '.json' );
        echo wp_json_encode( DataTransfer::export(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES );
        exit;
    }
}