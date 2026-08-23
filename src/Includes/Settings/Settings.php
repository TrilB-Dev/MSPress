<?php
/**
 * Settings class for the MSPress plugin.
 *
 * @package MSPress
 */
namespace MSPress\Includes\Settings;

use MSPress\Includes\Functions\Helpers\SanitizationHelper;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class Settings {
    /**
     * The settings group for the MSPress plugin.
     *
     * @var string
     */
    public const PLUGINS = 'plugins';
    /**
     * The settings group for the MSPress plugin.
     *
     * @var string
     */
    public const TOOLS = 'tools';
    /**
     * The settings group for the MSPress plugin.
     *
     * @var string
     */
    public static function register(): void {
        SettingsManager::register();
        SettingsManager::install();
    }
    /**
     * Get a setting value by key.
     *
     * @param string $key The setting key.
     * @param mixed $default The default value if the setting is not found.
     * @return mixed The setting value or the default value.
     */
    public static function get( string $key, $default = null ) {
        return SettingsManager::get( $key, $default );
    }
    /**
     * Get a setting value as a string.
     *
     * @param string $key The setting key.
     * @param string $default The default value if the setting is not found.
     * @return string The setting value as a string or the default value.
     */
    public static function get_string( string $key, string $default = '' ): string {
        return SanitizationHelper::text( self::get( $key, $default ), $default );
    }
    /**
     * Get a setting value as a sanitized URL.
     *
     * @param string $key The setting key.
     * @param string $default The default value if the setting is not found.
     * @return string The setting value as a sanitized URL or the default value.
     */
    public static function get_key( string $key, string $default = '' ): string {
        return SanitizationHelper::key( self::get( $key, $default ), $default );
    }
    /**
     * Get a setting value as a sanitized slug.
     *
     * @param string $key The setting key.
     * @param string $default The default value if the setting is not found.
     * @return string The setting value as a sanitized slug or the default value.
     */
    public static function get_slug( string $key, string $default = '' ): string {
        return SanitizationHelper::slug( self::get( $key, $default ), $default );
    }
    /**
     * Get a setting value as a sanitized email address.
     *
     * @param string $key The setting key.
     * @param string $default The default value if the setting is not found.
     * @return string The setting value as a sanitized email address or the default value.
     */
    public static function get_int( string $key, int $default = 0 ): int {
        return SanitizationHelper::integer( self::get( $key, $default ), $default );
    }
    /**
     * Get a setting value as a boolean.
     *
     * @param string $key The setting key.
     * @param bool $default The default value if the setting is not found.
     * @return bool The setting value as a boolean or the default value.
     */
    public static function get_bool( string $key, bool $default = false ): bool {
        $value = self::get( $key, $default );
        if ( is_bool( $value ) ) {
            return $value;
        }

        if ( ! is_scalar( $value ) ) {
            return $default;
        }

        $parsed = filter_var( $value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE );
        return null === $parsed ? $default : $parsed;
    }
    /**
     * Set a setting value by key.
     *
     * @param string $key The setting key.
     * @param mixed $value The value to set.
     * @return bool True on success, false on failure.
     */
    public static function set( string $key, $value ): bool {
        return SettingsManager::set( $key, $value );
    }
    /**
     * Delete a setting by key.
     *
     * @param string $key The setting key.
     * @return bool True on success, false on failure.
     */
    public static function delete( string $key ): bool {
        return SettingsManager::delete( $key );
    }
    /**
     * Check if a setting exists by key.
     *
     * @param string $key The setting key.
     * @return bool True if the setting exists, false otherwise.
     */
    public static function has( string $key ): bool {
        return SettingsManager::has( $key );
    }
    /**
     * Get a group of settings by group name.
     *
     * @param string $group The settings group name.
     * @param array|null $default The default value if the group is not found.
     * @return array|null The settings group or the default value.
     */
    public static function get_group( string $group, ?array $default = null ): ?array {
        return SettingsManager::get_group( $group ) ?? $default;
    }
    /**
     * Set a group of settings by group name.
     *
     * @param string $group The settings group name.
     * @param array $settings The settings to set.
     * @return bool True on success, false on failure.
     */
    public static function set_group( string $group, array $settings ): bool {
        return SettingsManager::set_group( $group, $settings );
    }
    /**
     * Delete a group of settings by group name.
     *
     * @param string $group The settings group name.
     * @return bool True on success, false on failure.
     */
    public static function register_group( string $group, array $defaults = [] ): bool {
        return SettingsManager::register_group( $group, $defaults );
    }
    /**
     * Delete a group of settings by group name.
     *
     * @param string $group The settings group name.
     * @return bool True on success, false on failure.
     */
    public static function register_key( string $key, string $group, $default = null ): bool {
        return SettingsManager::register_key( $key, $group, $default );
    }
    /**
     * Delete a group of settings by group name.
     *
     * @param string $group The settings group name.
     * @return bool True on success, false on failure.
     */
    public static function get_all(): array {
        return SettingsManager::get_all();
    }
}
