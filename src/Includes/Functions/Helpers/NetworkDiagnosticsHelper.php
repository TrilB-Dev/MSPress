<?php
/**
 * Helpers for safe network environment diagnostics.
 *
 * @package MSPress
 */

namespace MSPress\Includes\Functions\Helpers;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class NetworkDiagnosticsHelper {
    public static function proxy_context(): string {
        $details = [];

        foreach ( [ 'WP_PROXY_HOST', 'WP_PROXY_PORT', 'WP_PROXY_BYPASS_HOSTS', 'WP_ACCESSIBLE_HOSTS' ] as $constant ) {
            if ( defined( $constant ) ) {
                $details[] = $constant . '=' . (string) constant( $constant );
            }
        }

        foreach ( [ 'WP_PROXY_USERNAME', 'WP_PROXY_PASSWORD' ] as $constant ) {
            if ( defined( $constant ) ) {
                $details[] = $constant . '=' . ( (string) constant( $constant ) !== '' ? 'set' : 'empty' );
            }
        }

        if ( defined( 'WP_HTTP_BLOCK_EXTERNAL' ) ) {
            $details[] = 'WP_HTTP_BLOCK_EXTERNAL=' . ( constant( 'WP_HTTP_BLOCK_EXTERNAL' ) ? 'true' : 'false' );
        }

        foreach ( [ 'HTTP_PROXY', 'HTTPS_PROXY', 'ALL_PROXY', 'NO_PROXY' ] as $environmentVariable ) {
            $value = getenv( $environmentVariable );
            if ( false !== $value && '' !== trim( (string) $value ) ) {
                $details[] = $environmentVariable . '=' . self::sanitize_proxy_value( (string) $value );
            }
        }

        return empty( $details )
            ? 'Proxy context: no WP proxy constants or proxy env vars detected.'
            : 'Proxy context: ' . implode( ', ', $details );
    }

    public static function sanitize_proxy_value( string $value ): string {
        $value = trim( $value );
        if ( '' === $value ) {
            return '[empty]';
        }

        $parts = function_exists( 'wp_parse_url' ) ? wp_parse_url( $value ) : parse_url( $value );
        if ( is_array( $parts ) && isset( $parts['host'] ) ) {
            $scheme = $parts['scheme'] ?? 'http';
            $port   = isset( $parts['port'] ) ? ':' . $parts['port'] : '';
            return $scheme . '://' . $parts['host'] . $port;
        }

        $masked = preg_replace( '/([^\s:@]+):([^\s:@]+)@/', '***:***@', $value );
        return strlen( (string) $masked ) > 120 ? substr( (string) $masked, 0, 117 ) . '...' : (string) $masked;
    }

    public static function dns_context( array $hosts ): string {
        $details = [];
        foreach ( $hosts as $host ) {
            $host = trim( (string) $host );
            if ( '' === $host ) {
                continue;
            }

            $addresses = function_exists( 'gethostbynamel' ) ? gethostbynamel( $host ) : false;
            $details[] = $host . '=' . ( is_array( $addresses ) && ! empty( $addresses ) ? implode( '|', $addresses ) : 'unresolved' );
        }

        return empty( $details ) ? 'DNS context: no hosts checked.' : 'DNS context: ' . implode( ', ', $details );
    }

    public static function http_hook_context(): string {
        if ( ! function_exists( 'has_filter' ) ) {
            return 'HTTP hook context: unavailable.';
        }

        $hooks = [ 'http_api_debug', 'http_request_args', 'pre_http_request', 'http_request_host_is_external' ];
        $details = [];
        foreach ( $hooks as $hook ) {
            $count = has_filter( $hook );
            $details[] = $hook . '=' . ( false === $count ? 'none' : 'registered' );
        }

        return 'HTTP hook context: ' . implode( ', ', $details );
    }
}
