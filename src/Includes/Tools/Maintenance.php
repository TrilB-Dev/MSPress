<?php
/**
 * Safe maintenance operations for MSPress.
 *
 * @package MSPress
 * @subpackage Includes\Tools
 * @since 1.0.0
 */

namespace MSPress\Includes\Tools;

use MSPress\Includes\Functions\Helpers\SanitizationHelper;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class Maintenance {
    /**
     * Flush WordPress rewrite rules.
     *
     * @return bool True on success, false on failure.
     */
    public static function flush_rewrites(): bool {
        flush_rewrite_rules();
        return true;
    }
    /**
     * Clear the WordPress object cache.
     *
     * @param string $group Optional cache group to clear. If empty, clears all groups.
     * @return bool True on success, false on failure.
     */
    public static function clear_cache( string $group = '' ): bool {
        if ( '' !== $group && function_exists( 'wp_cache_flush_group' ) ) {
            return (bool) wp_cache_flush_group( SanitizationHelper::key( $group ) );
        }

        return (bool) wp_cache_flush();
    }
    /**
     * Perform a full maintenance operation, including flushing rewrites and clearing cache.
     *
     * @return array<string, bool> An associative array with the results of each operation.
     */
    public static function rebuild(): array {
        return [
            'rewrites_flushed' => self::flush_rewrites(),
            'cache_cleared' => self::clear_cache(),
        ];
    }
}