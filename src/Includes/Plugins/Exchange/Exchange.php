<?php
/**
 * MSPress - Exchange MSPress Plugin
 *
 * @package MSPress
 * @since 1.0.0
 */

namespace MSPress\Includes\Plugins\Exchange;

use MSPress\Includes\Plugins\AssetsProviderInterface;
use MSPress\Includes\Plugins\AdminSidebarProviderInterface;
use MSPress\Includes\Plugins\I18nProviderInterface;
use MSPress\Includes\Plugins\PluginInterface;
use MSPress\Includes\Plugins\SettingsProviderInterface;
use MSPress\Includes\Plugins\SettingsPageProviderInterface;
use MSPress\Includes\Plugins\ShortcodeProviderInterface;
use MSPress\Includes\Plugins\Exchange\Assets\Assets;
use MSPress\Includes\Plugins\Exchange\Includes\Includes;
use MSPress\Includes\Plugins\Exchange\Includes\Core\I18n;

class Exchange implements PluginInterface, SettingsProviderInterface, SettingsPageProviderInterface, AssetsProviderInterface, I18nProviderInterface, ShortcodeProviderInterface, AdminSidebarProviderInterface {
    /**
     * Get the plugin slug.
     *
     * @return string The plugin slug.
     */
    public function get_slug(): string {
        return 'exchange-plugin';
    }
    /**
     * Get the plugin name.
     *
     * @return string The plugin name.
     */
    public function get_name(): string {
        return 'Exchange';
    }
    /**
     * Get the plugin version.
     *
     * @return string The plugin version.
     */
    public function get_version(): string {
        return '1.0.0';
    }
    /**
     * Get the plugin author.
     *
     * @return string The plugin author.
     */
    public function get_author(): string {
        return 'MrTrilB';
    }
    /**
     * Get the plugin author URI.
     *
     * @return string The plugin author URI.
     */
    public function get_author_uri(): string {
            return 'https://github.com/TrilB-Dev/MSPress';
    }
    /**
     * Get the plugin description.
     *
     * @return string The plugin description.
     */
    public function get_description(): string {
        return __( 'Allows MSPress to use MS365 Exchange to send Emails from your Wordpress website.', 'mspress' );
    }
    /**
     * Get the plugin URI.
     *
     * @return string The plugin URI.
     */
    public function get_uri(): string {
            return 'https://github.com/TrilB-Dev/MSPress';
    }
    /**
     * Get the plugin license.
     *
     * @return string The plugin license.
     */
    public function get_license(): string {
        return 'GPL-2.0-or-later';
    }
    /**
     * Check if the plugin is active.
     *
     * @return bool True if the plugin is active, false otherwise.
     */
    public function is_active(): bool {
        return true;
    }
    /**
     * Initializes the plugin.
     * @since 1.0.0
     * @return void
     */
    public function init(): void {
        Includes::get_instance()->init();
    }
    /**
     * Registers the settings for the plugin.
     * @since 1.0.0
     * @return void
     */
    public function register_settings(): void {
        Includes::get_instance()->settings()->register();
    }
    /**
     * Get the settings page for the plugin.
     *
     * @return array The settings page configuration.
     */
    public function get_settings_page(): array {
        return Includes::get_instance()->settings()->get_settings_page();
    }

    /**
     * Return the Exchange navigation group for the MSPress admin sidebar.
     *
     * @return array<int, array<string, mixed>>
     */
    public function get_admin_sidebar(): array {
        return [
            [
                'type' => 'group',
                'label' => __( 'Exchange', 'mspress' ),
                'slug' => 'exchange',
                'icon' => 'fa-solid fa-envelope',
                'capability' => 'mspress_settings_plugins_view',
                'items' => [
                    [
                        'label' => __( 'Overview', 'mspress' ),
                        'page' => 'mspress-settings',
                        'query' => [ 'tab' => 'third-party', 'plugin' => 'exchange' ],
                        'icon' => 'fa-solid fa-gauge-high',
                        'capability' => 'mspress_settings_plugins_view',
                    ],
                    [
                        'label' => __( 'Email Templates', 'mspress' ),
                        'page' => 'edit.php',
                        'query' => [ 'post_type' => 'mspress_email_template' ],
                        'icon' => 'fa-solid fa-file-lines',
                        'capability' => 'edit_posts',
                    ],
                    [
                        'label' => __( 'Route Trace', 'mspress' ),
                        'page' => 'mspress-tools',
                        'query' => [ 'tool' => 'exchange-route-trace' ],
                        'icon' => 'fa-solid fa-route',
                        'capability' => 'mspress_tools_debug',
                    ],
                    [
                        'label' => __( 'Sent Log', 'mspress' ),
                        'page' => 'mspress-tools',
                        'query' => [ 'tool' => 'exchange-sent-log' ],
                        'icon' => 'fa-solid fa-paper-plane',
                        'capability' => 'mspress_tools_debug',
                    ],
                    [
                        'label' => __( 'Settings', 'mspress' ),
                        'page' => 'mspress-settings',
                        'query' => [ 'tab' => 'third-party', 'plugin' => 'exchange' ],
                        'icon' => 'fa-solid fa-sliders',
                        'capability' => 'mspress_settings_plugins_view',
                    ],
                ],
            ],
        ];
    }
    /**
     * Sanitize the settings input for the plugin.
     *
     * @param mixed $input The input to sanitize.
     * @return array The sanitized settings.
     */
    public function sanitize_settings( $input ): array {
        return Includes::get_instance()->settings()->sanitize( $input );
    }
    /**
     * Get the shortcodes for the plugin.
     *
     * @return array The shortcodes for the plugin.
     */
    public function get_shortcodes(): array {
        return Includes::get_instance()->shortcodes()->definitions();
    }
    /**
     * Register the assets for the plugin.
     *
     * @return void
     */
    public function register_assets(): void {
        ( new Assets() )->register();
    }
    /**
     * Load the text domain for the plugin.
     *
     * @return void
     */
    public function load_textdomain(): void {
        I18n::load_textdomain();
    }
}
