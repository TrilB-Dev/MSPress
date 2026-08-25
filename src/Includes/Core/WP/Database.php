<?php
/**
 * MSPress - Core Database Management
 *
 * @package MSPress
 * @since 1.0.0
 */
namespace MSPress\Includes\Core\WP;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class Database {
    /**
     * Array of registered plugin tables and their schema callbacks.
     *
     * @var array<string, callable>
     */
    private static array $registered_tables = [];

    /**
     * Register a plugin table schema for the next installation/update.
     *
     * The callback receives the fully prefixed table name and charset/collation
     * string, and must return a dbDelta-compatible CREATE TABLE statement.
     *
     * @param string   $table    Unprefixed plugin table suffix.
     * @param callable $schema   Schema callback.
     * @return bool Whether the table was registered.
     */
    public static function register_table( string $table, callable $schema ): bool {
        $table = sanitize_key( $table );
        if ( '' === $table ) {
            return false;
        }

        self::$registered_tables[ $table ] = $schema;
        return true;
    }

    /**
     * Install or update all plugin-owned tables.
     *
     * @return void
     */
    public static function install(): void {
        global $wpdb;

        require_once constant( 'ABSPATH' ) . 'wp-admin/includes/upgrade.php';

        $charset = $wpdb->get_charset_collate();
        foreach ( self::$registered_tables as $table => $schema ) {
            $statement = call_user_func( $schema, self::table_name( $table ), $charset );
            if ( is_string( $statement ) && '' !== trim( $statement ) ) {
                dbDelta( $statement );
            }
        }

        update_option( 'mspress_db_version', '1.0.0' );
    }

    /**
     * Return a prefixed plugin table name.
     *
     * @param string $table Unprefixed table suffix.
     * @return string Full table name.
     */
    public static function table_name( string $table ): string {
        global $wpdb;
        return $wpdb->prefix . 'mspress_' . sanitize_key( $table );
    }
}