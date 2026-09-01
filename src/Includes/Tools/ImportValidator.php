<?php
/**
 * Validation helpers for MSPress import and tool payloads.
 *
 * @package MSPress
 * @subpackage Includes\Tools
 * @since 1.0.0
 */

namespace MSPress\Includes\Tools;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class ImportValidator {
    public static function from_json( string $json ): array|\WP_Error {
        if ( '' === trim( $json ) ) {
            return new \WP_Error( 'empty_import', __( 'The import file is empty.', 'mspress' ) );
        }

        $data = json_decode( $json, true );
        if ( JSON_ERROR_NONE !== json_last_error() || ! is_array( $data ) ) {
            return new \WP_Error( 'invalid_json', __( 'The import file contains invalid JSON.', 'mspress' ) );
        }

        $validation = DataTransfer::validate( $data );
        return $validation['valid'] ? $data : new \WP_Error( 'invalid_import', implode( ' ', $validation['errors'] ) );
    }

    public static function file( $file ): array|\WP_Error {
        if ( ! is_array( $file ) ) {
            return new \WP_Error( 'invalid_upload', __( 'The import file upload is invalid.', 'mspress' ) );
        }
        if ( ( $file['error'] ?? UPLOAD_ERR_NO_FILE ) !== UPLOAD_ERR_OK ) {
            return new \WP_Error( 'upload_error', __( 'The import file could not be uploaded.', 'mspress' ) );
        }
        if ( empty( $file['tmp_name'] ) || ! is_string( $file['tmp_name'] ) || ! is_file( $file['tmp_name'] ) || ! is_readable( $file['tmp_name'] ) ) {
            return new \WP_Error( 'missing_file', __( 'The import file could not be read.', 'mspress' ) );
        }

        $json = file_get_contents( $file['tmp_name'] );
        return false === $json ? new \WP_Error( 'read_error', __( 'The import file could not be read.', 'mspress' ) ) : self::from_json( $json );
    }
}