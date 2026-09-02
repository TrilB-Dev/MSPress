<?php
/**
 * MSPress Sidebar Admin Menu helper.
 *
 * @package MSPress
 * @subpackage Includes\Functions\Helpers
 * @since 1.0.0
 */
namespace MSPress\Includes\Functions\Helpers;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class MSASMHelper {
    public const FILTER = 'mspress_admin_sidebar_menus';

    /**
    * Create an MSPress sidebar menu definition.
     *
     * @param string $name Menu label.
     * @param string $slug Menu page slug.
     * @param string $icon Font Awesome icon classes.
     * @param string $parent Existing group slug, or empty for a new group.
     * @return array<string, mixed>
     */
    public static function define( string $name, string $slug, string $icon, string $parent = '', string $capability = '' ): array {
        return [
            'parent' => sanitize_key( $parent ),
            'name'   => $name,
            'slug'   => self::sanitize_slug( $slug ),
            'icon'   => self::normalize_icon( $icon ),
            'capability' => sanitize_key( $capability ),
        ];
    }

    /**
     * Pass sidebar menu definitions through the extension filter.
     *
     * @param array<int, array<string, mixed>> $menus Menu definitions.
     * @return array<int, array<string, mixed>>
     */
    public static function filter( array $menus ): array {
        $filtered = apply_filters( self::FILTER, $menus );
        return is_array( $filtered ) ? array_values( array_filter( $filtered, 'is_array' ) ) : $menus;
    }

    public static function get_url( string $slug ): string {
        return admin_url( 'admin.php?page=' . self::sanitize_slug( $slug ) );
    }

    private static function sanitize_slug( string $slug ): string {
        $parts = explode( '&', $slug, 2 );
        $page = sanitize_key( $parts[0] );
        return $page . ( isset( $parts[1] ) && '' !== $parts[1] ? '&' . sanitize_text_field( $parts[1] ) : '' );
    }

    private static function normalize_icon( string $icon ): string {
        $icon = trim( $icon );
        if ( '' === $icon ) {
            return '';
        }

        if ( preg_match( '/^(svg|png)\s+(.+)$/i', $icon, $matches ) ) {
            $resolved = MSIconHelper::get_icon( trim( $matches[2] ), strtolower( $matches[1] ) );
            if ( '' !== $resolved ) {
                return $resolved;
            }
        }

        return sanitize_text_field( $icon );
    }
}
