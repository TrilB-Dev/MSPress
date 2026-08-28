<?php
/**
 * SettingsManager class for the MSPress plugin.
 *
 * @package MSPress
 */
namespace MSPress\Includes\Settings;

use MSPress\Includes\Core\WP\Database;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class SettingsManager {
    /**
     * Register the settings table with the database.
     * @var array<int, array<string, mixed>>
     */
    private static array $registered_groups = [];
    /**
     * Registered keys and their corresponding groups.
     * @var array<string, string>
     */
    private static array $registered_keys = [];
    /**
     * Flag to indicate if the settings table has been registered.
     * @var bool
     */
    private static bool $table_registered = false;
    /**
     * Register the settings table with the database.
     */
    public static function register(): void {
        if ( self::$table_registered ) {
            return;
        }

        Database::register_table( 'settings', static function ( string $table, string $charset ): string {
            return "CREATE TABLE {$table} (\n"
                . "setting_group varchar(191) NOT NULL,\n"
                . "setting_value longtext NOT NULL,\n"
                . "autoload varchar(20) NOT NULL DEFAULT 'yes',\n"
                . "updated_at datetime NOT NULL,\n"
                . "PRIMARY KEY  (setting_group)\n"
                . ") {$charset};";
        } );

        self::$table_registered = true;
    }
    /**
     * Install the settings table and populate it with default values.
     */
    public static function table_name(): string {
        return Database::table_name( 'settings' );
    }
    /**
     * Install the settings table and populate it with default values.
     */
    public static function install(): void {
        self::register();
        Database::install();

        foreach ( self::registered_defaults() as $group => $settings ) {
            $stored_settings = self::get_group( $group );
            self::set_group( $group, array_merge( $settings, $stored_settings ?? [] ) );
        }
    }
    /**
     * Get a setting value by key.
     *
     * @param string $key The setting key.
     * @param mixed  $default The default value if the setting is not found.
     * @return mixed The setting value or the default.
     */
    public static function get( string $key, $default = null ) {
        foreach ( self::get_all() as $settings ) {
            if ( is_array( $settings ) && array_key_exists( $key, $settings ) ) {
                return $settings[ $key ];
            }
        }
        return self::registered_default( $key, $default );
    }
    /**
     * Set a setting value by key.
     *
     * @param string $key The setting key.
     * @param mixed  $value The value to set.
     * @return bool True on success, false on failure.
     */
    public static function set( string $key, $value ): bool {
        $group = self::group_for_key( $key );
        $settings = self::get_group( $group ) ?? [];
        $settings[ $key ] = $value;
        return self::set_group( $group, $settings );
    }
    /**
     * Delete a setting by key.
     *
     * @param string $key The setting key.
     * @return bool True on success, false on failure.
     */
    public static function delete( string $key ): bool {
        $group = self::group_for_key( $key );
        $settings = self::get_group( $group );
        if ( ! is_array( $settings ) || ! array_key_exists( $key, $settings ) ) {
            return false;
        }
        unset( $settings[ $key ] );
        return self::set_group( $group, $settings );
    }
    /**
     * Check if a setting exists by key.
     *
     * @param string $key The setting key.
     * @return bool True if the setting exists, false otherwise.
     */
    public static function has( string $key ): bool {
        foreach ( self::get_all() as $settings ) {
            if ( is_array( $settings ) && array_key_exists( $key, $settings ) ) {
                return true;
            }
        }

        return false;
    }
    /**
     * Get all settings as an associative array.
     *
     * @return array An associative array of all settings grouped by their respective groups.
     */
    public static function get_all(): array {
        global $wpdb;
        $rows = $wpdb->get_results( 'SELECT setting_group, setting_value FROM ' . self::table_name(), ARRAY_A );
        $settings = [];
        foreach ( $rows ?: [] as $row ) {
            $group = self::logical_group( $row['setting_group'] );
            $settings[ $group ] = maybe_unserialize( $row['setting_value'] );
        }
        return $settings;
    }
    /**
     * Get all settings for a specific group.
     *
     * @param string $group The group name.
     * @return array|null An associative array of settings for the group, or null if the group does not exist.
     */
    public static function defaults(): array {
        return [
            'ms365' => [
                'client_id' => '',
                'tenant_id' => '',
                'client_secret' => '',
                'enable_graph_mailer' => 'off',
                'mail_from' => '',
                'mail_from_name' => '',
                'mail_reply_to' => '',
                'group_mappings' => [],
                'last_sync' => 0,
            ],
            'plugins' => [
                'mspress_plugin_auto_activate' => 'on',
                'mspress_plugin_directory' => \MSPRESS_PLUGINS,
            ],
            'tools' => [ 'debug_logging' => false, 'console_logging' => false ],
        ];
    }

    /**
     * Return the names of core settings groups.
     *
     * @return array<int, string> Core settings group names.
     */
    public static function core_groups(): array {
        return array_keys( self::defaults() );
    }
    /**
     * Get all settings for a specific group.
     *
     * @param string $group The group name.
     * @return array|null An associative array of settings for the group, or null if the group does not exist.
     */
    public static function get_group( string $group ): ?array {
        global $wpdb;
        $value = $wpdb->get_var( $wpdb->prepare( 'SELECT setting_value FROM ' . self::table_name() . ' WHERE setting_group = %s', self::storage_group( $group ) ) );
        $settings = $value === null ? null : maybe_unserialize( $value );
        return is_array( $settings ) ? $settings : null;
    }
    /**
     * Set all settings for a specific group.
     *
     * @param string $group The group name.
     * @param array  $settings An associative array of settings to store for the group.
     * @return bool True on success, false on failure.
     */
    public static function set_group( string $group, array $settings ): bool {
        global $wpdb;
        return false !== $wpdb->replace( self::table_name(), [
            'setting_group' => self::storage_group( $group ),
            'setting_value' => maybe_serialize( $settings ),
            'autoload' => 'yes',
            'updated_at' => current_time( 'mysql' ),
        ], [ '%s', '%s', '%s', '%s' ] );
    }

    /**
     * Restore a registered settings group to its factory defaults.
     *
     * @param string $group The settings group name.
     * @return bool True on success, false on failure.
     */
    public static function reset_group( string $group ): bool {
        $group = self::normalize_group( $group );
        $defaults = self::registered_defaults()[ $group ] ?? [];

        return self::set_group( $group, is_array( $defaults ) ? $defaults : [] );
    }

    /**
     * Restore multiple registered settings groups to their factory defaults.
     *
     * @param array<int, string> $groups Settings group names.
     * @return bool True when every group was restored.
     */
    public static function reset_groups( array $groups ): bool {
        $success = true;
        foreach ( $groups as $group ) {
            if ( ! is_string( $group ) || ! self::reset_group( $group ) ) {
                $success = false;
            }
        }

        return $success;
    }

    /**
     * Remove all MSPress settings and restore every registered default.
     *
     * @return bool True on success, false on failure.
     */
    public static function reset_all(): bool {
        global $wpdb;

        if ( false === $wpdb->query( 'DELETE FROM ' . self::table_name() ) ) {
            return false;
        }

        return self::reset_groups( array_keys( self::registered_defaults() ) );
    }
    /**
     * Register a group of settings with default values.
     *
     * @param string $group The group name.
     * @param array  $defaults An associative array of default settings for the group.
     * @return bool True on success, false on failure.
     */
    public static function register_group( string $group, array $defaults = [] ): bool {
        $group = self::normalize_group( $group );
        if ( '' === $group ) {
            return false;
        }

        self::$registered_groups[ $group ] = array_merge( self::$registered_groups[ $group ] ?? [], $defaults );
        foreach ( $defaults as $key => $default ) {
            $key = sanitize_key( (string) $key );
            if ( '' !== $key ) {
                self::$registered_keys[ $key ] = $group;
            }
        }
        return true;
    }
    /**
     * Register a setting key with a specific group and default value.
     *
     * @param string $key The setting key.
     * @param string $group The group name.
     * @param mixed  $default The default value for the setting.
     * @return bool True on success, false on failure.
     */
    public static function register_key( string $key, string $group, $default = null ): bool {
        $key = sanitize_key( $key );
        if ( '' === $key || ! self::register_group( $group ) ) {
            return false;
        }

        $group = self::normalize_group( $group );
        self::$registered_keys[ $key ] = $group;
        self::$registered_groups[ $group ][ $key ] = $default;
        return true;
    }
    /**
     * Normalize the group name for storage in the database.
     *
     * @param string $group The group name.
     * @return string The normalized group name.
     */
    private static function storage_group( string $group ): string {
        $group = self::normalize_group( $group );
        return str_starts_with( $group, 'mspress_' ) ? $group : 'mspress_' . $group;
    }
    /**
     * Normalize the group name for internal use.
     *
     * @param string $group The group name.
     * @return string The normalized group name.
     */
    private static function logical_group( string $group ): string {
        return str_starts_with( $group, 'mspress_' ) ? substr( $group, 10 ) : $group;
    }
    /**
     * Determine the group for a given setting key.
     *
     * @param string $key The setting key.
     * @return string The group name associated with the key.
     */
    private static function group_for_key( string $key ): string {
        $key = sanitize_key( $key );
        if ( isset( self::$registered_keys[ $key ] ) ) {
            return self::$registered_keys[ $key ];
        }
        if ( str_contains( $key, 'tool' ) ) {
            return 'tools';
        }
        return 'general';
    }

    /**
     * Return core and extension defaults for activation and fallback reads.
     *
     * @return array<string, array<string, mixed>>
     */
    private static function registered_defaults(): array {
        $defaults = self::defaults();
        foreach ( self::$registered_groups as $group => $settings ) {
            $defaults[ $group ] = array_merge( $defaults[ $group ] ?? [], $settings );
        }

        return $defaults;
    }
    /**
     * Return the default value for a registered key.
     *
     * @param string $key The setting key.
     * @param mixed  $fallback The fallback value if the key is not registered.
     * @return mixed The default value for the key, or the fallback if not registered.
     */
    private static function registered_default( string $key, $fallback ) {
        $key = sanitize_key( $key );
        foreach ( self::registered_defaults() as $settings ) {
            if ( array_key_exists( $key, $settings ) ) {
                return $settings[ $key ];
            }
        }

        return $fallback;
    }
    /**
     * Normalize the group name for internal use.
     *
     * @param string $group The group name.
     * @return string The normalized group name.
     */
    private static function normalize_group( string $group ): string {
        $group = sanitize_key( $group );
        return str_starts_with( $group, 'mspress_' ) ? substr( $group, 10 ) : $group;
    }
}
