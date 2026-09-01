<?php

namespace MSPress\Includes\Tools;

use MSPress\Includes\Settings\Settings;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class DataTransfer {
    public const SCHEMA = 'mspress-msgraph-core';
    public const VERSION = 1;
    private const GROUP = 'ms365';
    private const FIELDS = [ 'client_id', 'tenant_id', 'enable_graph_mailer' ];

    public static function export(): array {
        $settings = Settings::get_group( self::GROUP ) ?? [];

        return [
            'schema' => self::SCHEMA,
            'version' => self::VERSION,
            'graph_core' => [
                'client_id' => self::string_value( $settings['client_id'] ?? '' ),
                'tenant_id' => self::string_value( $settings['tenant_id'] ?? '' ),
                'enable_graph_mailer' => self::mailer_value( $settings['enable_graph_mailer'] ?? 'off' ),
            ],
        ];
    }

    public static function export_json( int $flags = 0 ): string {
        $json = wp_json_encode( self::export(), $flags );
        return is_string( $json ) ? $json : '';
    }

    public static function validate( $data ): array {
        $errors = [];
        if ( ! is_array( $data ) || array_is_list( $data ) ) {
            return [ 'valid' => false, 'errors' => [ __( 'The import data must be an object.', 'mspress' ) ] ];
        }

        $expected_top_level = [ 'schema', 'version', 'graph_core' ];
        if ( ! empty( array_diff( array_keys( $data ), $expected_top_level ) ) ) {
            $errors[] = __( 'The import contains unsupported data sections.', 'mspress' );
        }
        if ( ! array_key_exists( 'schema', $data ) || ! is_string( $data['schema'] ) || self::SCHEMA !== $data['schema'] ) {
            $errors[] = __( 'This is not an MSPress Microsoft Graph Core export.', 'mspress' );
        }
        if ( ! array_key_exists( 'version', $data ) || ! is_int( $data['version'] ) || self::VERSION !== $data['version'] ) {
            $errors[] = __( 'This MSPress export version is not supported.', 'mspress' );
        }
        if ( ! array_key_exists( 'graph_core', $data ) || ! is_array( $data['graph_core'] ) || array_is_list( $data['graph_core'] ) ) {
            $errors[] = __( 'The Microsoft Graph Core settings must be an object.', 'mspress' );
            return [ 'valid' => empty( $errors ), 'errors' => $errors ];
        }

        if ( ! empty( array_diff( array_keys( $data['graph_core'] ), self::FIELDS ) ) ) {
            $errors[] = __( 'The import contains unsupported Microsoft Graph Core settings.', 'mspress' );
        }
        foreach ( self::FIELDS as $field ) {
            if ( ! array_key_exists( $field, $data['graph_core'] ) || ! is_string( $data['graph_core'][ $field ] ) ) {
                $errors[] = sprintf(
                    /* translators: %s is a Microsoft Graph Core setting name. */
                    __( 'The Microsoft Graph Core setting "%s" must be a string.', 'mspress' ),
                    $field
                );
            }
        }
        if ( isset( $data['graph_core']['enable_graph_mailer'] ) && ! in_array( $data['graph_core']['enable_graph_mailer'], [ 'on', 'off' ], true ) ) {
            $errors[] = __( 'The Microsoft Graph mailer setting must be either "on" or "off".', 'mspress' );
        }

        return [ 'valid' => empty( $errors ), 'errors' => $errors ];
    }

    public static function import( array $data ): array|\WP_Error {
        $validation = self::validate( $data );
        if ( ! $validation['valid'] ) {
            return new \WP_Error( 'invalid_import', implode( ' ', $validation['errors'] ) );
        }
        $settings = Settings::get_group( self::GROUP ) ?? [];
        foreach ( self::FIELDS as $field ) {
            $settings[ $field ] = $data['graph_core'][ $field ];
        }

        if ( ! Settings::set_group( self::GROUP, $settings ) ) {
            return new \WP_Error( 'import_failed', __( 'The Microsoft Graph Core settings could not be saved.', 'mspress' ) );
        }

        return [ 'graph_core' => 3, 'errors' => [] ];
    }

    private static function string_value( $value ): string {
        return is_string( $value ) ? $value : '';
    }

    private static function mailer_value( $value ): string {
        return 'on' === $value ? 'on' : 'off';
    }
}
