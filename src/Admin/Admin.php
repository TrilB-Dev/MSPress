<?php
/**
 * Admin class for MSPress plugin.
 *
 * @package MSPress
 * @subpackage Admin
 * @since 1.0.0
 * 
 */
namespace MSPress\Admin;

use MSPress\Includes\Settings\Settings;
use MSPress\Includes\Functions\Admin\FunctionsPlugins;
use MSPress\Includes\Functions\Admin\FunctionsSettings;
use MSPress\Includes\Functions\Helpers\AjaxHelper;
use MSPress\Includes\Core\Capabilities;
use MSPress\Includes\Functions\Helpers\LoaderHelper;
use MSPress\Includes\Functions\Admin\FunctionsSidebar;
use MSPress\Assets\Assets;
use MSPress\Admin\Manager\Tools\ToolsManager;
use MSPress\Admin\Manager\Dashboard\DashboardManager;
use MSPress\Admin\Manager\Settings\SettingsManager;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class Admin {
    /**
     * The DashboardManager instance for managing the dashboard page. 
     * 
     * @var DashboardManager
     * */
    private DashboardManager $dashboard_manager;
    /**
     * SettingsManager instance for managing settings-related admin pages.
     *
     * @var SettingsManager
     */
    private SettingsManager $settings_manager;
    /**
    * ToolsManager instance for managing tools-related admin pages.
     *
    * @var ToolsManager
     */
    private ToolsManager $tools_manager;
    /**
     * LoaderHelper instance for managing action and filter hooks.
     *
     * @var LoaderHelper
     */
    private LoaderHelper $loader;
    /**
     * FunctionsPlugins instance for managing plugin-related admin functions.
     *
     * @var FunctionsPlugins
     */
    private FunctionsPlugins $plugin_functions;
    /**
     * Settings registration and sanitization callbacks.
     *
     * @var FunctionsSettings
     */
    private FunctionsSettings $settings_functions;

    public function __construct( Assets $assets ) {
        add_action( 'admin_menu', [ $this, 'register_admin_menu' ] );
        $this->dashboard_manager = new DashboardManager();
        $this->settings_manager = new SettingsManager();
        $this->tools_manager = new ToolsManager();
        $this->plugin_functions = new FunctionsPlugins();
        $this->settings_functions = new FunctionsSettings( $this->plugin_functions );
        $this->loader = new LoaderHelper();
        add_action( 'admin_init', [ $this->settings_functions, 'register_settings' ] );
        $this->dashboard_manager->register_assets( $assets );
        $this->settings_manager->register_assets( $assets );
        $this->tools_manager->register_assets( $assets );
        $this->loader->register_component( $this, [
            [ 'type' => 'action', 'hook' => 'wp_ajax_mspress_load_settings_tab', 'callback' => 'load_settings_tab' ],
        ] );
        $this->loader->register_component( $this->plugin_functions, [
            [ 'type' => 'action', 'hook' => 'wp_ajax_mspress_toggle_plugin', 'callback' => 'toggle_plugin' ],
            [ 'type' => 'action', 'hook' => 'wp_ajax_mspress_save_plugin_settings', 'callback' => 'save_plugin_settings' ],
        ] )->run();
    }
    /**
     * Register admin menu pages and subpages.
     * @since 1.0.0
     */
    public function register_admin_menu(): void {
        FunctionsSidebar::register_admin_menu( $this );
    }

    /**
     * Render the dashboard page.
     *
     * This method is responsible for rendering the dashboard page of the MSPress plugin.
     * It delegates the rendering to the DashboardManager instance.
     */
    public function render_dashboard(): void {
        $this->dashboard_manager->render();
    }
    /**
     * Render the settings page.
     *
     * This method is responsible for rendering the settings page of the MSPress plugin.
     * It delegates the rendering to the SettingsManager instance.
     */
    public function render_settings(): void {
        $this->settings_manager->render();
    }
    /**
     * Render the tools page.
     *
     * @return void
     */
    public function render_tools(): void {
        $this->tools_manager->render();
    }
    /**
     */
    public function load_settings_tab(): void {
        $tab = sanitize_key( $_POST['tab'] ?? 'general' );
        $view_capability = [
            'plugins' => 'mspress_settings_plugins_view',
            'third-party' => 'mspress_settings_plugins_ext_view',
            'connection' => 'mspress_settings_connection_view',
        ][ $tab ] ?? 'mspress_settings_plugins_view';
        if ( ! AjaxHelper::authorized( 'mspress_settings_tabs', $view_capability ) ) {
            AjaxHelper::unauthorized( __( 'You are not authorized to load MSPress settings.', 'mspress' ) );
        }

        ob_start();
        $this->settings_manager->render_tab_content( $tab );
        $html = (string) ob_get_clean();
        AjaxHelper::success( [ 'html' => $html, 'tab' => $tab ] );
    }

    /**
     * Get the capability for a given key, with a fallback.
     *
     * @param string $key The settings key to retrieve the capability for.
     * @param string $fallback The fallback capability if the key is not set or invalid.
     * @return string The capability associated with the key, or the fallback if not valid.
     */
    public function capability( string $key, string $fallback ): string {
        $value = Settings::get( $key, $fallback );
        $values = is_array( $value ) ? $value : [ $value ];
        $allowed = array_merge( [ 'manage_options', 'edit_posts', 'publish_posts', 'manage_categories', 'delete_posts' ], array_keys( Capabilities::definitions() ) );
        foreach ( $values as $value ) {
            $capability = sanitize_key( (string) $value );
            if ( in_array( $capability, $allowed, true ) ) {
                return $capability;
            }
        }
        return $fallback;
    }

}
