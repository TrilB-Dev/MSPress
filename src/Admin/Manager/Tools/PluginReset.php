<?php

namespace MSPress\Admin\Manager\Tools;

use MSPress\Includes\Functions\Helpers\AjaxHelper;
use MSPress\Includes\Functions\Helpers\AlertHelper;
use MSPress\Includes\Functions\Helpers\FormFieldHelper;
use MSPress\Includes\Functions\Helpers\PermissionHelper;
use MSPress\Includes\Functions\Helpers\RequestHelper;
use MSPress\Includes\Functions\Helpers\SanitizationHelper;
use MSPress\Includes\Plugins\PluginInterface;
use MSPress\Includes\Plugins\Plugins;
use MSPress\Includes\Plugins\SettingsPageProviderInterface;
use MSPress\Includes\Settings\Settings;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class PluginReset {
    /**
     * Resets the plugin settings to their default values.
     *
     * @return void
     */
    public function render_page_content(): void {
        if ( '1' === RequestHelper::get_text( 'reset_complete' ) ) {
            AlertHelper::render_admin_notice( __( 'The selected MSPress data was reset successfully.', 'mspress' ), 'success' );
        }
        if ( '1' === RequestHelper::get_text( 'reset_failed' ) ) {
            AlertHelper::render_admin_notice( __( 'The selected MSPress data could not be reset.', 'mspress' ), 'error' );
        }
        echo '<p>' . esc_html__( 'Reset MSPress settings and registered plugin data to their factory values. This does not delete WordPress content.', 'mspress' ) . '</p>';
        echo '<form method="post" action="' . esc_url( admin_url( 'admin-post.php' ) ) . '">';
        echo FormFieldHelper::input( 'action', 'mspress_reset', [ 'type' => 'hidden' ] );
        echo FormFieldHelper::input( 'mspress_reset_nonce', wp_create_nonce( 'mspress_reset' ), [ 'type' => 'hidden' ] );
        echo FormFieldHelper::label( 'mspress-reset-scope', __( 'Reset scope', 'mspress' ) );
        echo FormFieldHelper::select( 'scope', $this->scope_options(), 'core', [ 'id' => 'mspress-reset-scope' ] );
        echo '<fieldset class="mt-4" id="mspress-reset-plugins"><legend>' . esc_html__( 'Plugin data', 'mspress' ) . '</legend>';
        foreach ( $this->plugin_options() as $slug => $plugin ) {
            echo FormFieldHelper::checkbox( 'plugins[]', $slug, $plugin['name'], [ 'id' => 'mspress-reset-' . $slug ] );
        }
        echo '</fieldset><div class="mt-4">' . FormFieldHelper::checkbox( 'confirm', '1', __( 'I understand that this action cannot be undone.', 'mspress' ), [ 'id' => 'mspress-reset-confirm', 'required' => true ] ) . '</div>';
        echo '<div class="mt-4">' . FormFieldHelper::button( __( 'Reset selected data', 'mspress' ), [ 'type' => 'submit', 'class' => 'btn-danger' ] ) . '</div></form>';
    }

    public function handle_reset(): void {
        if ( ! PermissionHelper::can( 'mspress_tools_reset' ) || ! AjaxHelper::has_valid_nonce( 'mspress_reset', 'mspress_reset_nonce' ) ) {
            wp_die( esc_html__( 'The reset request could not be authorized.', 'mspress' ), '', [ 'response' => 403 ] );
        }
        if ( ! RequestHelper::boolean( $_POST, 'confirm' ) ) {
            $this->redirect( false );
        }
        $scope = RequestHelper::key( $_POST, 'scope', 'core' );
        $groups = $this->groups_for_scope( $scope, RequestHelper::array( $_POST, 'plugins' ) );
        $success = 'all' === $scope ? Settings::reset_all() : ( ! empty( $groups ) && Settings::reset_groups( $groups ) );
        $this->redirect( $success );
    }

    private function redirect( bool $success ): void {
        wp_safe_redirect( admin_url( 'admin.php?page=mspress-tools&tool=reset&' . ( $success ? 'reset_complete=1' : 'reset_failed=1' ) ) );
        exit;
    }

    private function scope_options(): array {
        return [ 'all' => __( 'All MSPress data', 'mspress' ), 'core' => __( 'MSPress core only', 'mspress' ), 'plugins' => __( 'Selected plugins', 'mspress' ) ];
    }

    private function plugin_options(): array {
        $options = [];
        foreach ( Plugins::get_instance()->get_registered_plugins() as $plugin ) {
            if ( ! $plugin instanceof PluginInterface || ! $plugin instanceof SettingsPageProviderInterface ) {
                continue;
            }
            $page = $plugin->get_settings_page();
            $group = SanitizationHelper::key( $page['settings_group'] ?? '' );
            if ( '' !== $group ) {
                $options[ sanitize_key( $plugin->get_slug() ) ] = [ 'name' => $plugin->get_name(), 'group' => $group ];
            }
        }
        return $options;
    }

    private function groups_for_scope( string $scope, array $plugins ): array {
        if ( 'core' === $scope ) {
            return Settings::core_groups();
        }
        if ( 'plugins' !== $scope ) {
            return [];
        }
        $options = $this->plugin_options();
        $groups = [];
        foreach ( $plugins as $slug ) {
            $slug = sanitize_key( (string) $slug );
            if ( isset( $options[ $slug ] ) ) {
                $groups[] = $options[ $slug ]['group'];
            }
        }
        return array_values( array_unique( $groups ) );
    }
}