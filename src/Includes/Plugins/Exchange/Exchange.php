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
use MSPress\Includes\Plugins\CapabilitiesProviderInterface;
use MSPress\Includes\Plugins\I18nProviderInterface;
use MSPress\Includes\Plugins\PluginInterface;
use MSPress\Includes\Plugins\SettingsProviderInterface;
use MSPress\Includes\Plugins\SettingsPageProviderInterface;
use MSPress\Includes\Plugins\ShortcodeProviderInterface;
use MSPress\Includes\Plugins\AdminMenuProviderInterface;
use MSPress\Includes\Plugins\Exchange\Assets\Assets;
use MSPress\Assets\Assets as CoreAssets;
use MSPress\Includes\Plugins\Exchange\Includes\Includes;
use MSPress\Includes\Plugins\Exchange\Includes\Core\I18n;
use MSPress\Includes\Plugins\Exchange\Includes\Core\Capabilities;
use MSPress\Includes\Plugins\Exchange\Admin\EmailTemplates;
use MSPress\Includes\Plugins\Exchange\Admin\ExchangeSettings;
use MSPress\Includes\Plugins\Exchange\Admin\TraceRout;
use MSPress\Includes\Plugins\Exchange\Admin\SentLogs;
use MSPress\Includes\Functions\Helpers\EncryptionHelper;
use MSPress\Includes\Functions\Helpers\MSIconHelper;
use MSPress\Includes\Settings\Settings as BaseSettings;

class Exchange implements PluginInterface, SettingsProviderInterface, SettingsPageProviderInterface, AssetsProviderInterface, I18nProviderInterface, ShortcodeProviderInterface, AdminSidebarProviderInterface, AdminMenuProviderInterface, CapabilitiesProviderInterface {
    /**
     * Get the plugin slug.
     *
     * @return string The plugin slug.
     */
    public function get_slug(): string {
        return 'mspress-exchange';
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
     * Get the plugin icon.
     *
     * @return string The plugin icon.
     */
    public function get_icon(): string {
        return MSIconHelper::get_icon( 'exchange', 'svg' );
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
        return 'TrilB.Dev Team';
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
     * Return Exchange-owned admin pages.
     *
     * @return array<int, array<string, mixed>>
     */
    public function get_admin_menu(): array {
        return [
            [
                'page_title' => __( 'Exchange', 'mspress' ),
                'menu_title' => __( 'Exchange', 'mspress' ),
                'menu_slug' => 'mspress-exchange-settings',
                'parent' => 'mspress',
                'callback' => [ ExchangeSettings::class, 'render' ],
                'capability' => 'mspress_settings_plugins_view',
                'children' => [
                    [ 'page_title' => __( 'Exchange Settings', 'mspress' ), 'menu_title' => __( 'Exchange Settings', 'mspress' ), 'menu_slug' => 'mspress-exchange-settings', 'callback' => [ ExchangeSettings::class, 'render' ], 'capability' => 'mspress_settings_plugins_view' ],
                    [ 'page_title' => __( 'Email Templates', 'mspress' ), 'menu_title' => __( 'Email Templates', 'mspress' ), 'menu_slug' => 'mspress-exchange-email-templates', 'callback' => [ EmailTemplates::class, 'render' ], 'capability' => 'edit_posts' ],
                    [ 'page_title' => __( 'Route Trace', 'mspress' ), 'menu_title' => __( 'Route Trace', 'mspress' ), 'menu_slug' => 'mspress-exchange-route-trace', 'callback' => [ TraceRout::class, 'render' ], 'capability' => 'mspress_tools_debug' ],
                    [ 'page_title' => __( 'Sent Log', 'mspress' ), 'menu_title' => __( 'Sent Log', 'mspress' ), 'menu_slug' => 'mspress-exchange-sent-log', 'callback' => [ SentLogs::class, 'render' ], 'capability' => 'mspress_tools_debug' ],
                ],
            ],
        ];
    }
    /**
     * Registers the settings for the plugin.
     * @since 1.0.0
     * @return void
     */
    public function register_settings(): void {
        Includes::get_instance()->settings()->register();
    }

    public function register_capabilities(): void {
        Capabilities::register();
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
        $settings = BaseSettings::get_group( 'exchange', [] ) ?? [];
        $account = is_array( $settings['account'] ?? null ) ? $settings['account'] : [];
        $email = EncryptionHelper::decrypt( (string) ( $account['email'] ?? '' ) );

        if ( ! is_string( $email ) || ! is_email( $email ) ) {
            return [];
        }

        return [
            [
                'type' => 'group',
                'label' => __( 'Exchange', 'mspress' ),
                'slug' => 'exchange',
                'icon' => 'fa-solid fa-envelope',
                'capability' => 'mspress_settings_plugins_view',
                'items' => [
                    [
                        'label' => __( 'Exchange Settings', 'mspress' ),
                        'page' => 'mspress-settings',
                        'query' => [ 'tab' => 'exchange-settings' ],
                        'icon' => 'fa-solid fa-gauge-high',
                        'capability' => 'mspress_settings_plugins_view',
                    ],
                    [
                        'label' => __( 'Email Templates', 'mspress' ),
                        'page' => 'mspress-settings',
                        'query' => [ 'tab' => 'exchange-email-templates' ],
                        'icon' => 'fa-solid fa-file-lines',
                        'capability' => 'edit_posts',
                    ],
                    [
                        'label' => __( 'Route Trace', 'mspress' ),
                        'page' => 'mspress-settings',
                        'query' => [ 'tab' => 'exchange-trace-rout' ],
                        'icon' => 'fa-solid fa-route',
                        'capability' => 'mspress_tools_debug',
                    ],
                    [
                        'label' => __( 'Sent Log', 'mspress' ),
                        'page' => 'mspress-settings',
                        'query' => [ 'tab' => 'exchange-sent-logs' ],
                        'icon' => 'fa-solid fa-paper-plane',
                        'capability' => 'mspress_tools_debug',
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
    public function register_assets( CoreAssets $assets ): void {
        ( new Assets( $assets ) )->register();
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
