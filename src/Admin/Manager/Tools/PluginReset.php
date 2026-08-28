<?php
/**
 * PluginReset class for MSPress plugin.
 *
 * @package MSPress
 * @subpackage Admin\Manager\Tools
 * @since 1.0.0
 */

namespace MSPress\Admin\Manager\Tools;

use MSPress\Admin\Manager\Manager;
use MSPress\Includes\Functions\Helpers\AjaxHelper;
use MSPress\Includes\Functions\Helpers\AlertHelper;
use MSPress\Includes\Functions\Helpers\FormFieldHelper;
use MSPress\Includes\Functions\Helpers\LoaderHelper;
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

final class PluginReset extends Manager {
    /**
     * Register hooks owned by the plugin reset tool.
     *
     * @since 1.0.0
     * @param LoaderHelper|null $loader WordPress hook loader.
     */
    public function __construct( ?LoaderHelper $loader = null ) {
        ( $loader ?? new LoaderHelper() )->register_component( $this, [
            [ 'type' => 'action', 'hook' => 'admin_post_mspress_reset', 'callback' => 'handle_reset' ],
        ] )->run();
    }

    /**
     * Render the plugin reset tool content.
     *
    * @since 1.0.0
     * @return void
     */
    public function render_page_content(): void {
        if ( '1' === RequestHelper::get_text( 'reset_complete' ) ) {
            AlertHelper::render_admin_notice( __( 'The selected MSPress data was reset successfully.', 'mspress' ), 'success' );
        }
        if ( '1' === RequestHelper::get_text( 'reset_failed' ) ) {
            AlertHelper::render_admin_notice( __( 'The selected MSPress data could not be reset.', 'mspress' ), 'error' );
        }
        ?>
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="h5"><?php esc_html_e( 'Reset MSPress data', 'mspress' ); ?></h2>
                <p class="text-secondary"><?php esc_html_e( 'Reset MSPress settings and registered plugin data to their factory values. This does not delete WordPress content.', 'mspress' ); ?></p>
                <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
                    <?php echo FormFieldHelper::input( 'action', 'mspress_reset', [ 'type' => 'hidden' ] ); ?>
                    <?php wp_nonce_field( 'mspress_reset', 'mspress_reset_nonce' ); ?>
                    <?php echo FormFieldHelper::label( 'mspress-reset-scope', __( 'Reset scope', 'mspress' ) ); ?>
                    <?php echo FormFieldHelper::select( 'scope', $this->scope_options(), 'core', [ 'id' => 'mspress-reset-scope' ] ); ?>
                    <fieldset class="mt-4" id="mspress-reset-plugins">
                        <legend><?php esc_html_e( 'Plugin data', 'mspress' ); ?></legend>
                        <?php
        foreach ( $this->plugin_options() as $slug => $plugin ) {
                            echo FormFieldHelper::checkbox( 'plugins[]', $slug, $plugin['name'], [ 'id' => 'mspress-reset-' . $slug ] );
        }
        ?>
                    </fieldset>
                    <div class="mt-4">
                        <?php echo FormFieldHelper::checkbox( 'confirm', '1', __( 'I understand that this action cannot be undone.', 'mspress' ), [ 'id' => 'mspress-reset-confirm', 'required' => true ] ); ?>
                    </div>
                    <div class="mt-4">
                        <?php echo FormFieldHelper::button( __( 'Reset selected data', 'mspress' ), [ 'type' => 'submit', 'class' => 'btn-danger' ] ); ?>
                    </div>
                </form>
            </div>
        </div>
        <?php
    }

    /**
     * Process a plugin reset request.
     *
     * @since 1.0.0
     * @return void
     */
    public function handle_reset(): void {
        if ( ! AjaxHelper::is_method( 'POST' ) || ! PermissionHelper::can( 'mspress_tools_reset' ) || ! AjaxHelper::has_valid_nonce( 'mspress_reset', 'mspress_reset_nonce' ) ) {
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
            if ( ! is_scalar( $slug ) ) {
                continue;
            }
            $slug = sanitize_key( (string) $slug );
            if ( isset( $options[ $slug ] ) ) {
                $groups[] = $options[ $slug ]['group'];
            }
        }
        return array_values( array_unique( $groups ) );
    }
}