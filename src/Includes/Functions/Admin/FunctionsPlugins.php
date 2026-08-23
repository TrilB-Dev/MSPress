<?php
/**
 * Plugin-related admin functions for MSPress.
 *
 * @package MSPress
 * @subpackage Includes\Functions\Admin
 * @since 1.0.0
 */
namespace MSPress\Includes\Functions\Admin;

use MSPress\Includes\Functions\Helpers\AjaxHelper;
use MSPress\Includes\Functions\Helpers\AlertHelper;
use MSPress\Includes\Plugins\PluginInterface;
use MSPress\Includes\Plugins\Plugins;
use MSPress\Includes\Plugins\SettingsPageProviderInterface;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class FunctionsPlugins {
    /**
    * Toggle the enabled state of an MSPress plugin.
     *
     * @return void
     */
    public function toggle_plugin(): void {
        if ( ! AjaxHelper::authorized( 'mspress_plugin_toggle', 'mspress_settings_plugins_int_edit' ) ) {
            AjaxHelper::unauthorized( __( 'You are not authorized to manage MSPress plugins.', 'mspress' ) );
        }

        $slug = sanitize_key( wp_unslash( $_POST['slug'] ?? '' ) );
        $enabled = ! empty( $_POST['enabled'] );
        $plugin = Plugins::get_instance()->get_registered_plugins()[ $slug ] ?? null;

        if ( ! $plugin instanceof PluginInterface ) {
            AjaxHelper::error( [ 'message' => __( 'The requested MSPress plugin was not found.', 'mspress' ) ], 404 );
        }
		if ( ! $this->is_internal_plugin( $plugin ) ) {
            AjaxHelper::unauthorized( __( 'You are not authorized to manage external MSPress plugins.', 'mspress' ) );
		}

        if ( ! Plugins::get_instance()->set_plugin_enabled( $slug, $enabled ) ) {
            AjaxHelper::error( [ 'message' => __( 'The MSPress plugin state could not be saved.', 'mspress' ) ], 500 );
        }

        AjaxHelper::success( [ 'slug' => $slug, 'enabled' => $enabled ] );
    }

    /**
    * Save settings submitted from an MSPress plugin modal.
     *
     * @return void
     */
    public function save_plugin_settings(): void {
        $slug = sanitize_key( wp_unslash( $_POST['slug'] ?? '' ) );
        $plugin = Plugins::get_instance()->get_registered_plugins()[ $slug ] ?? null;
        if ( ! $plugin instanceof PluginInterface || ! $plugin instanceof SettingsPageProviderInterface ) {
            $message = __( 'The requested MSPress plugin settings were not found.', 'mspress' );
            AjaxHelper::error( [ 'message' => $message, 'alert' => AlertHelper::get_admin_notice( $message, 'error' ) ], 404 );
        }
        $capability = $this->is_internal_plugin( $plugin ) ? 'mspress_settings_plugins_int_edit' : 'mspress_settings_plugins_ext_edit';
        if ( ! AjaxHelper::authorized( 'mspress_plugin_settings', $capability ) ) {
            $message = __( 'You are not authorized to save MSPress plugin settings.', 'mspress' );
            AjaxHelper::error( [ 'message' => $message, 'alert' => AlertHelper::get_admin_notice( $message, 'error' ) ], 403 );
        }

        $input = isset( $_POST['settings'] ) && is_array( $_POST['settings'] ) ? wp_unslash( $_POST['settings'] ) : [];
        $settings = $plugin->sanitize_settings( $input );

        AjaxHelper::success(
            [
                'slug' => $slug,
                'settings' => $settings,
                'message' => __( 'Plugin settings saved successfully.', 'mspress' ),
                'alert' => AlertHelper::get_admin_notice( __( 'Plugin settings saved successfully.', 'mspress' ), 'success' ),
            ]
        );
    }

    private function is_internal_plugin( PluginInterface $plugin ): bool {
        return 0 === strpos( get_class( $plugin ), 'MSPress\\Includes\\Plugins\\' );
    }

    /**
    * Collect settings pages from enabled MSPress plugins.
     *
     * @return array<int, array{provider: SettingsPageProviderInterface, slug: string, label: string, title: string, fields: array}>
     */
    public function plugin_settings_pages(): array {
        $pages = [];
        foreach ( Plugins::get_instance()->get_registered_plugins() as $plugin ) {
            if ( ! $plugin instanceof PluginInterface || ! $plugin instanceof SettingsPageProviderInterface || ! Plugins::get_instance()->is_plugin_enabled( $plugin->get_slug() ) ) {
                continue;
            }

            $page = $plugin->get_settings_page();
            if ( empty( $page['slug'] ) || empty( $page['label'] ) || empty( $page['fields'] ) ) {
                continue;
            }

            $page['provider'] = $plugin;
            $pages[] = $page;
        }
        return $pages;
    }
}
