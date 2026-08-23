<?php
/**
 * MSPress functions helper
 *
 * Shared utilities used by MS services, pages, and REST routes.
 *
 * @package TrilBDev
 * @subpackage Includes\Wiki\Functions
 * @since 1.0.0
 */

namespace MSPress\Includes\Functions;

use MSPress\Includes\Functions\Helpers\PostHelper;
use MSPress\Includes\Functions\Helpers\SanitizationHelper;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Backwards-compatible facade for common MSPress utility operations.
 *
 * New code may use the focused helper classes directly. This facade remains
 * useful to extensions that need one stable entry point for MS payloads.
 */
final class Functions {
    public static function mspress_normalize_tenant_id( $tenant_id ): string {
        if ( ! is_string( $tenant_id ) ) {
            return '';
        }

        $tenant_id = trim( $tenant_id, " \t\n\r\0\x0B\"'{}" );
        if ( preg_match( '#^https?://[^/]+/([^/?#]+)#i', $tenant_id, $matches ) ) {
            return trim( $matches[1] );
        }

        return trim( preg_split( '/[?#\\/]/', $tenant_id )[0] ?? '' );
    }

    public static function mspress_is_guid( $value ): bool {
        return is_string( $value ) && (bool) preg_match( '/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i', trim( $value ) );
    }

    public static function mspress_is_valid_tenant_identifier( $tenant_id ): bool {
        if ( ! is_string( $tenant_id ) || '' === trim( $tenant_id ) ) {
            return false;
        }

        $tenant_id = trim( $tenant_id );
        return self::mspress_is_guid( $tenant_id )
            || in_array( strtolower( $tenant_id ), [ 'common', 'organizations', 'consumers' ], true )
            || (bool) preg_match( '/^[a-z0-9](?:[a-z0-9-]*[a-z0-9])?(?:\.[a-z0-9](?:[a-z0-9-]*[a-z0-9])?)+$/i', $tenant_id );
    }

    /**
     * Default status for Wiki posts.
     */
    public const DEFAULT_STATUS = 'publish';
    /**
     * Allowed statuses for Wiki posts.
     */
    public const ALLOWED_STATUSES = [ 'publish', 'draft', 'private' ];
    /**
     * Sanitizes a Wiki payload array for safe use.
     *
     * @param array $payload The payload to sanitize.
     * @return array The sanitized payload.
     */
    public static function sanitize_wiki_payload( array $payload ): array {
        $status = SanitizationHelper::key( $payload['status'] ?? self::DEFAULT_STATUS );

        return [
            'title' => SanitizationHelper::text( $payload['title'] ?? '' ),
            'content' => self::sanitize_content( $payload['content'] ?? '' ),
            'excerpt' => SanitizationHelper::text( $payload['excerpt'] ?? '' ),
            'status' => SanitizationHelper::one_of( $status, self::ALLOWED_STATUSES, self::DEFAULT_STATUS ),
            'wiki_id' => SanitizationHelper::integer( $payload['wiki_id'] ?? 0 ),
            'categories' => self::normalize_terms( $payload['categories'] ?? [] ),
            'tags' => self::normalize_terms( $payload['tags'] ?? [] ),
        ];
    }
    /**
     * Normalizes an array of terms (categories or tags) for safe use.
     *
     * @param mixed $terms The terms to normalize.
     * @return array The normalized terms.
     */
    public static function normalize_terms( $terms ): array {
        return SanitizationHelper::terms( $terms );
    }
    /**
     * Checks if a given post is a Wiki post.
     *
     * @param mixed $post The post to check.
     * @return bool True if the post is a Wiki post, false otherwise.
     */
    public static function is_wiki_post( $post ): bool {
        return self::is_wiki_page( $post );
    }
    /**
     * Checks if a given post is a Wiki page.
     *
     * @param mixed $post The post to check.
     * @return bool True if the post is a Wiki page, false otherwise.
     */
    public static function is_wiki( $post ): bool {
        return PostHelper::is_wiki( $post );
    }
    /**
     * Checks if a given post is a Wiki content (either a Wiki post or a Wiki page).
     *
     * @param mixed $post The post to check.
     * @return bool True if the post is a Wiki content, false otherwise.
     */
    public static function is_wiki_page( $post ): bool {
        return PostHelper::is_wiki_page( $post );
    }
    /**
     * Checks if a given post is either a Wiki post or a Wiki page.
     *
     * @param mixed $post The post to check.
     * @return bool True if the post is a Wiki content, false otherwise.
     */
    public static function is_wiki_content( $post ): bool {
        return self::is_wiki( $post ) || self::is_wiki_page( $post );
    }
    /**
     * Returns a standardized REST response array.
     *
     * @param bool   $success Indicates if the operation was successful.
     * @param string $message A message describing the result.
     * @param array  $data    Additional data to include in the response.
     * @return array The standardized REST response.
     */
    public static function rest_response( bool $success, string $message = '', array $data = [] ): array {
        return [
            'success' => $success,
            'message' => $message,
            'data' => $data,
        ];
    }
    /**
     * Sanitizes a string for safe use in HTML output.
     *
     * @param string $string The string to sanitize.
     * @return string The sanitized string.
     */
    private static function sanitize_content( $content ): string {
        return is_scalar( $content ) ? wp_kses_post( (string) $content ) : '';
    }
}
