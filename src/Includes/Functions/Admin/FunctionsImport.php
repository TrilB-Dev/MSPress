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

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class FunctionsImport {

    /**
     * Import MSPress data from an uploaded JSON file.
     *
     * @return void
     */
    public function import_data(): void {
        if ( ! current_user_can( 'mspress_tools_import' ) ) {
            wp_die( esc_html__( 'You are not allowed to import MSPress data.', 'mspress' ), 403 );
        }
        check_admin_referer( 'mspress_import' );
        $file = $_FILES['mspress_import_file'] ?? [];
        if ( empty( $file['tmp_name'] ) || ( $file['error'] ?? UPLOAD_ERR_NO_FILE ) !== UPLOAD_ERR_OK ) {
            wp_die( esc_html__( 'Please upload a valid MSPress JSON export.', 'mspress' ), 400 );
        }
        $data = json_decode( file_get_contents( $file['tmp_name'] ), true );
        if ( ! is_array( $data ) ) {
            wp_die( esc_html__( 'The uploaded file is not valid JSON.', 'mspress' ), 400 );
        }
        $result = DataTransfer::import( $data );
        if ( is_wp_error( $result ) ) {
            wp_die( esc_html( $result->get_error_message() ), 400 );
        }
        wp_safe_redirect( admin_url( 'admin.php?page=mspress-settings&tab=tools&imported=1' ) );
        exit;
    }
}