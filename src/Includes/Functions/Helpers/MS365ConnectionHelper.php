<?php
/**
 * Microsoft 365 connection identifier helpers.
 *
 * @package MSPress
 */
namespace MSPress\Includes\Functions\Helpers;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class MS365ConnectionHelper {
    public static function normalize_tenant_id( $tenant_id ): string {
        if ( ! is_string( $tenant_id ) ) {
            return '';
        }

        $tenant_id = trim( $tenant_id, " \t\n\r\0\x0B\"'{}" );
        if ( preg_match( '#^https?://[^/]+/([^/?\#]+)#i', $tenant_id, $matches ) ) {
            return trim( $matches[1] );
        }

        return trim( preg_split( '/[?#\\/]/', $tenant_id )[0] ?? '' );
    }

    public static function is_guid( $value ): bool {
        return is_string( $value ) && (bool) preg_match( '/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i', trim( $value ) );
    }

    public static function is_valid_tenant_identifier( $tenant_id ): bool {
        if ( ! is_string( $tenant_id ) || '' === trim( $tenant_id ) ) {
            return false;
        }

        $tenant_id = trim( $tenant_id );
        return self::is_guid( $tenant_id )
            || in_array( strtolower( $tenant_id ), [ 'common', 'organizations', 'consumers' ], true )
            || (bool) preg_match( '/^[a-z0-9](?:[a-z0-9-]*[a-z0-9])?(?:\.[a-z0-9](?:[a-z0-9-]*[a-z0-9])?)+$/i', $tenant_id );
    }
}
