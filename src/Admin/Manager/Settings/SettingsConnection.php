<?php
/**
 * Microsoft Graph connection settings for MSPress.
 *
 * @package MSPress
 */
namespace MSPress\Admin\Manager\Settings;

use MSPress\Includes\Functions\Helpers\EncryptionHelper;
use MSPress\Includes\Functions\Helpers\FormFieldHelper;
use MSPress\Includes\Functions\Helpers\MS365ConnectionHelper;
use MSPress\Includes\Settings\Settings;
use MSPress\Includes\MSGraph\GraphService;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class SettingsConnection {
    public function render(): void {
        if ( 'POST' === strtoupper( (string) ( $_SERVER['REQUEST_METHOD'] ?? '' ) ) ) {
            if ( isset( $_POST['mspress_connection_save'] ) ) {
                $this->save();
            } elseif ( isset( $_POST['mspress_add_encryption_key'] ) ) {
                $this->add_encryption_key();
            }
        }

        $can_edit = current_user_can( 'mspress_settings_connection_edit' );
        if ( ! EncryptionHelper::has_runtime_key() ) {
            $this->render_missing_key( $can_edit );
            return;
        }

        $settings = Settings::get_group( 'ms365', [] ) ?? [];
        $tenant_id = $this->display_credential( $settings['tenant_id'] ?? '' );
        $client_id = $this->display_credential( $settings['client_id'] ?? '' );
        $callback_url = GraphService::get_callback_url();
        ?>
        <?php settings_errors( 'mspress_connection' ); ?>
        <form class="card mspress-settings-form" method="post" action="<?php echo esc_url( admin_url( 'admin.php?page=mspress-settings&tab=connection' ) ); ?>">
            <?php wp_nonce_field( 'mspress_save_connection', 'mspress_connection_nonce' ); ?>
            <input type="hidden" name="mspress_connection_save" value="1" />
            <div class="card-body">
                <fieldset <?php disabled( ! $can_edit ); ?>>
                    <div class="row g-3">
                        <div class="col-12 col-xl-6">
                            <?php echo FormFieldHelper::label( 'mspress-ms365-tenant-id', __( 'Tenant ID or verified domain', 'mspress' ) ); ?>
                            <?php echo FormFieldHelper::input( 'mspress_ms365[tenant_id]', $tenant_id, [ 'id' => 'mspress-ms365-tenant-id', 'type' => 'text', 'placeholder' => __( 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx', 'mspress' ), 'autocomplete' => 'off' ] ); ?>
                        </div>
                        <div class="col-12 col-xl-6">
                            <?php echo FormFieldHelper::label( 'mspress-ms365-client-id', __( 'Application (client) ID', 'mspress' ) ); ?>
                            <?php echo FormFieldHelper::input( 'mspress_ms365[client_id]', $client_id, [ 'id' => 'mspress-ms365-client-id', 'type' => 'text', 'placeholder' => __( 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx', 'mspress' ), 'autocomplete' => 'off' ] ); ?>
                        </div>
                        <div class="col-12">
                            <?php echo FormFieldHelper::label( 'mspress-ms365-client-secret', __( 'Client secret', 'mspress' ), [ 'description' => __( 'Leave blank to keep the currently stored secret.', 'mspress' ) ] ); ?>
                            <?php echo FormFieldHelper::input( 'mspress_ms365[client_secret]', '', [ 'id' => 'mspress-ms365-client-secret', 'type' => 'password', 'autocomplete' => 'new-password' ] ); ?>
                        </div>
                        <div class="col-12">
                            <?php echo FormFieldHelper::label( 'mspress-ms365-callback-url', __( 'Browser callback URL', 'mspress' ), [ 'description' => __( 'Add this exact URL as a Web redirect URI in your Microsoft Entra app registration.', 'mspress' ) ] ); ?>
                            <div class="input-group">
                                <?php echo FormFieldHelper::input( 'mspress_callback_url', $callback_url, [ 'id' => 'mspress-ms365-callback-url', 'type' => 'url', 'readonly' => true, 'class' => 'font-monospace' ] ); ?>
                                <a class="button button-secondary" href="<?php echo esc_url( $callback_url ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Open callback', 'mspress' ); ?></a>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <?php if ( $can_edit ) : ?>
                    <p class="submit mb-0"><?php echo FormFieldHelper::button( __( 'Save connection', 'mspress' ), [ 'type' => 'submit', 'class' => 'btn-primary' ] ); ?></p>
                <?php endif; ?>
            </div>
        </form>
        <?php
    }

    private function save(): void {
        if ( ! current_user_can( 'mspress_settings_connection_edit' ) || ! check_admin_referer( 'mspress_save_connection', 'mspress_connection_nonce' ) ) {
            wp_die( esc_html__( 'You are not authorized to save the Microsoft Graph connection.', 'mspress' ) );
        }

        $input = isset( $_POST['mspress_ms365'] ) && is_array( $_POST['mspress_ms365'] ) ? wp_unslash( $_POST['mspress_ms365'] ) : [];
        $tenant_id = MS365ConnectionHelper::normalize_tenant_id( sanitize_text_field( (string) ( $input['tenant_id'] ?? '' ) ) );
        $client_id = sanitize_text_field( (string) ( $input['client_id'] ?? '' ) );
        $client_secret = sanitize_text_field( (string) ( $input['client_secret'] ?? '' ) );
        $current = Settings::get_group( 'ms365', [] ) ?? [];

        if ( '' === $tenant_id || ! MS365ConnectionHelper::is_valid_tenant_identifier( $tenant_id ) ) {
            add_settings_error( 'mspress_connection', 'invalid_tenant', __( 'Enter a valid tenant GUID or verified domain.', 'mspress' ) );
            return;
        }
        if ( ! MS365ConnectionHelper::is_guid( $client_id ) ) {
            add_settings_error( 'mspress_connection', 'invalid_client', __( 'Enter a valid application (client) ID GUID.', 'mspress' ) );
            return;
        }
        $encrypted_tenant = EncryptionHelper::encrypt( $tenant_id );
        $encrypted_client = EncryptionHelper::encrypt( $client_id );
        $encrypted_secret = '' === $client_secret ? (string) ( $current['client_secret'] ?? '' ) : EncryptionHelper::encrypt( $client_secret );
        if ( null === $encrypted_tenant || null === $encrypted_client || null === $encrypted_secret || '' === $encrypted_secret ) {
            add_settings_error( 'mspress_connection', 'encryption_failed', __( 'The connection could not be encrypted. Check the encryption key and try again.', 'mspress' ) );
            return;
        }

        $current['tenant_id'] = $encrypted_tenant;
        $current['client_id'] = $encrypted_client;
        $current['client_secret'] = $encrypted_secret;
        if ( ! Settings::set_group( 'ms365', $current ) ) {
            add_settings_error( 'mspress_connection', 'save_failed', __( 'The connection settings could not be saved.', 'mspress' ) );
            return;
        }

        add_settings_error( 'mspress_connection', 'saved', __( 'Microsoft Graph connection settings saved.', 'mspress' ), 'updated' );
    }

    private function add_encryption_key(): void {
        if ( ! current_user_can( 'mspress_settings_connection_edit' ) || ! check_admin_referer( 'mspress_add_encryption_key', 'mspress_encryption_key_nonce' ) ) {
            wp_die( esc_html__( 'You are not authorized to add the MSPress encryption key.', 'mspress' ) );
        }

        if ( EncryptionHelper::ensure_configured() ) {
            if ( EncryptionHelper::has_runtime_key() ) {
                add_settings_error( 'mspress_connection', 'key_added', __( 'The MSPress encryption key was added to wp-config.php.', 'mspress' ), 'updated' );
                return;
            }
        }

        add_settings_error( 'mspress_connection', 'key_failed', __( 'The encryption key could not be added automatically. Check that wp-config.php is writable and add the key manually.', 'mspress' ) );
    }

    private function render_missing_key( bool $can_edit ): void {
        ?>
        <?php settings_errors( 'mspress_connection' ); ?>
        <form class="card mspress-settings-form" method="post" action="<?php echo esc_url( admin_url( 'admin.php?page=mspress-settings&tab=connection' ) ); ?>">
            <?php wp_nonce_field( 'mspress_add_encryption_key', 'mspress_encryption_key_nonce' ); ?>
            <input type="hidden" name="mspress_add_encryption_key" value="1" />
            <div class="card-body">
                <h2 class="h5 card-title"><?php esc_html_e( 'Encryption key required', 'mspress' ); ?></h2>
                <p class="card-text"><?php esc_html_e( 'MSPress cannot display or save Microsoft Graph credentials until its encryption key is configured.', 'mspress' ); ?></p>
                <?php if ( $can_edit ) : ?>
                    <?php echo FormFieldHelper::button( __( 'Add key to wp-config.php', 'mspress' ), [ 'type' => 'submit', 'class' => 'btn-primary' ] ); ?>
                <?php else : ?>
                    <p class="mb-0 text-secondary"><?php esc_html_e( 'You do not have permission to configure the encryption key.', 'mspress' ); ?></p>
                <?php endif; ?>
            </div>
        </form>
        <?php
    }

    private function display_credential( $encrypted ): string {
        if ( ! is_string( $encrypted ) || '' === $encrypted || ! EncryptionHelper::has_runtime_key() ) {
            return '';
        }

        return (string) ( EncryptionHelper::decrypt( $encrypted ) ?? '' );
    }
}