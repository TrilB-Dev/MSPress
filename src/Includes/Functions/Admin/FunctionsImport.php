<?php
/**
 * Import-related admin functions for MSPress.
 *
 * @package MSPress
 * @subpackage Includes\Functions\Admin
 * @since 1.0.0
 */
namespace MSPress\Includes\Functions\Admin;

use MSPress\Includes\Tools\DataTransfer;
use MSPress\Includes\Tools\ImportValidator;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class FunctionsImport {

    /**
    * Import Microsoft Graph Core settings from an uploaded JSON file.
     *
     * @return void
     */
    public function import_data(): void {
        if ( ! current_user_can( 'mspress_tools_import' ) ) {
            wp_die( esc_html__( 'You are not allowed to import Microsoft Graph Core settings.', 'mspress' ), 403 );
        }
        check_admin_referer( 'mspress_import' );
        $file = $_FILES['mspress_import_file'] ?? [];
        if ( ! is_array( $file ) ) {
            wp_die( esc_html__( 'The import file upload is invalid.', 'mspress' ), 400 );
        }
        $data = ImportValidator::file( $file );
        if ( is_wp_error( $data ) ) {
            wp_die( esc_html( $data->get_error_message() ), 400 );
        }
        $result = DataTransfer::import( $data );
        if ( is_wp_error( $result ) ) {
            wp_die( esc_html( $result->get_error_message() ), 400 );
        }
        wp_safe_redirect( admin_url( 'admin.php?page=mspress-settings&tab=tools&imported=1' ) );
        exit;
    }
}