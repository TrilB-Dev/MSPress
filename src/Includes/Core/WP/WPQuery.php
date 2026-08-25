<?php
/**
 * Backward-compatible query helper name.
 *
 * @package MSPress\Includes\Core\WP
 * @since 1.0.0
 */
namespace MSPress\Includes\Core\WP;

use MSPress\Includes\Functions\Helpers\RequestHelper;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Provide the shared query and request helpers used by MSPress.
 */
final class WPQuery {
    public static function get_current_query(): ?\WP_Query {
        global $wp_query;
        return $wp_query instanceof \WP_Query ? $wp_query : null;
    }

    public static function get_current_post(): ?\WP_Post {
        $query = self::get_current_query();
        return $query instanceof \WP_Query && $query->post instanceof \WP_Post ? $query->post : null;
    }

    public static function get_current_post_id(): ?int {
        $post = self::get_current_post();
        return $post instanceof \WP_Post ? (int) $post->ID : null;
    }

    public static function get_current_post_type(): ?string {
        $post = self::get_current_post();
        return $post instanceof \WP_Post ? (string) $post->post_type : null;
    }

    public static function is_post_type( $post_type ): bool {
        $current_type = self::get_current_post_type();
        return null !== $current_type && in_array( $current_type, (array) $post_type, true );
    }

    public static function request( string $key, $default = null, string $type = 'text' ) {
        $source = array_key_exists( $key, $_POST ) ? $_POST : $_GET;
        if ( 'raw' === $type ) {
            return RequestHelper::value( $source, $key, $default );
        }
        if ( 'array' === $type ) {
            return RequestHelper::array( $source, $key, is_array( $default ) ? $default : [] );
        }
        if ( 'int' === $type ) {
            return RequestHelper::integer( $source, $key, is_numeric( $default ) ? (int) $default : 0 );
        }
        if ( 'key' === $type ) {
            return RequestHelper::key( $source, $key, is_scalar( $default ) ? (string) $default : '' );
        }
        if ( 'text' === $type ) {
            return RequestHelper::text( $source, $key, is_scalar( $default ) ? (string) $default : '' );
        }
        throw new \InvalidArgumentException( 'Request type must be key, text, int, raw, or array.' );
    }

    public static function posts( array $args = [] ): \WP_Query {
        return new \WP_Query( $args );
    }
}
