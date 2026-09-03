<?php
/**
 * SettingsManager class for MSPress plugin.
 *
 * @package MSPress
 * @subpackage Admin\Manager\Settings
 * @since 1.0.0
 */
namespace MSPress\Admin\Manager\Settings;

use MSPress\Admin\Manager\Manager;
use MSPress\Assets\Assets;
use MSPress\Admin\Manager\Settings\SettingsPlugins;
use MSPress\Includes\Functions\Helpers\SanitizationHelper;
use MSPress\Includes\Functions\Helpers\FormFieldHelper;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class SettingsManager extends Manager {
    /**
     * The SettingsPlugins instance.
     *
     * @since 1.0.0
     * @access private
     * @var SettingsPlugins $plugins_page The SettingsPlugins instance.
     */
    private SettingsPlugins $plugins_page;
    /**
     * The SettingsConnection instance.
     *
     * @since 1.0.0
     * @access private
     * @var SettingsConnection $connection_page The SettingsConnection instance.
     */
    private SettingsConnection $connection_page;
    /**
     * The Page variable.
     *
     * @since 1.0.0
     * @access protected
     * @var string $page The page variable.
     */
    protected $page;
    /**
     * `Constructor` method for the `DashboardManager` class. 
     *
     * @since 1.0.0
     * @return void
     */

    public function __construct() {
        /**
         * Set the page variable to 'dashboard'.
         *
         * @since 1.0.0
         */
        $this->page = 'dashboard';
        /**
         * Initialize the Plugins Settings pages.
         *
         * @since 1.0.0
         */
        $this->plugins_page = new SettingsPlugins();
        /**
         * Initialize the Connection Settings page.
         *
         * @since 1.0.0
         */
        $this->connection_page = new SettingsConnection();
    }
    /**
     * Renders the settings page.
     *
     * @since 1.0.0
     * @return void
     */
    public function render(): void {
        $tab = SanitizationHelper::key( wp_unslash( $_GET['tab'] ?? 'plugins' ), 'plugins' );
        $tab = $this->normalize_tab( $tab );
        $tab_context = [
            'plugins' => [ 'description' => __( 'View the MSPress plugins installed on this site.', 'mspress' ), 'tooltip' => __( 'Plugin-specific configuration is available from each plugin settings page when provided.', 'mspress' ) ],
            'third-party' => [ 'description' => __( 'View third-party plugins installed on this site.', 'mspress' ), 'tooltip' => __( 'Third-party plugin settings are managed through WordPress or the plugin author’s own settings page.', 'mspress' ) ],
            'connection' => [ 'description' => __( 'Configure the Microsoft Graph application connection used by MSPress integrations.', 'mspress' ), 'tooltip' => __( 'Credentials are encrypted before they are stored and the client secret is never displayed.', 'mspress' ) ],
        ];
        $this->header( __( 'Settings', 'mspress' ) );
        echo '<div id="mspress-settings-panel" data-current-tab="' . esc_attr( $tab ) . '">';
        $this->render_tab_content( $tab );
        echo '</div>';
        $this->footer();
    }

    /**
     * Render the settings panel returned by the AJAX tab loader.
     * @since 1.0.0
     * @param string $tab The tab to render.
     */
    public function render_tab_content( string $tab ): void {
        $tab = $this->normalize_tab( $tab );
        $view_capabilities = [
            'plugins' => [ 'mspress_settings_plugins_view' ],
            'third-party' => [ 'mspress_settings_plugins_view', 'mspress_settings_plugins_ext_view' ],
            'connection' => [ 'mspress_settings_connection_view' ],
        ];
        if ( $this->plugins_page->has_settings_page( $tab ) && ! $this->plugins_page->can_view_settings_page( $tab ) ) {
            wp_die( esc_html__( 'You are not authorized to view these MSPress settings.', 'mspress' ) );
        }
        $can_view = true;
        foreach ( $view_capabilities[ $tab ] ?? [] as $capability ) {
            if ( ! current_user_can( $capability ) ) {
                $can_view = false;
                break;
            }
        }
        if ( ! $can_view ) {
            wp_die( esc_html__( 'You are not authorized to view these MSPress settings.', 'mspress' ) );
        }
        $values = [];
        echo '<div class="mspress-settings-tab-content" role="tabpanel">';
        $tab_context = [
            'plugins' => [ 'description' => __( 'View the MSPress plugins installed on this site.', 'mspress' ), 'tooltip' => __( 'Plugin-specific configuration is available from each plugin settings page when provided.', 'mspress' ) ],
            'third-party' => [ 'description' => __( 'View third-party plugins installed on this site.', 'mspress' ), 'tooltip' => __( 'Third-party plugin settings are managed through WordPress or the plugin author’s own settings page.', 'mspress' ) ],
            'connection' => [ 'description' => __( 'Configure the Microsoft Graph application connection used by MSPress integrations.', 'mspress' ), 'tooltip' => __( 'Credentials are encrypted before they are stored and the client secret is never displayed.', 'mspress' ) ],
        ];
        if ( isset( $tab_context[ $tab ] ) ) {
            echo '<p class="text-secondary mb-4">' . esc_html( $tab_context[ $tab ]['description'] ) . ' ' . FormFieldHelper::label( 'mspress-settings-context', __( 'Settings information', 'mspress' ), [ 'tooltip' => $tab_context[ $tab ]['tooltip'], 'tooltip_type' => 'info', 'tooltip_icon' => 'fa-circle-info', 'class' => 'visually-hidden' ] ) . '</p>';
        }
        if ( 'connection' === $tab ) {
            $this->connection_page->render();
        } else {
            $this->plugins_page->render( $tab );
        }
        echo '</div>';
    }
    /**
     * Normalize the tab name to ensure it is valid.
     *
     * @since 1.0.0
     * @param string $tab The tab name to normalize.
     * @return string The normalized tab name.
     */
    private function normalize_tab( string $tab ): string {
        $allowed = [ 'plugins', 'third-party', 'connection' ];
        if ( in_array( $tab, $allowed, true ) || $this->plugins_page->has_settings_page( $tab ) ) {
            return $tab;
        }
        return 'plugins';
    }
    /**
     * Register assets for the settings page.
     *
     * @since 1.0.0
     * @param Assets $assets The Assets instance to register assets with.
     */
    public function register_assets( Assets $assets ): void {
        $settings_assets = $this->assets( 'settings' );
        $settings_assets['scripts'][] = [
            'handle' => 'mspress-admin-plugins',
            'src' => MSPRESS_URL . 'src/Assets/dist/js/plugins.admin.js',
            'deps' => [ 'mspress-bootstrap' ],
            'in_footer' => true,
        ];
        $assets->register_page( 'mspress-settings', $settings_assets );
    }

}
