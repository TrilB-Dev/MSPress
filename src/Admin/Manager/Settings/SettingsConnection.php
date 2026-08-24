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

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class SettingsConnection {
    public function render(): void {
        if ( 'POST' === strtoupper( (string) ( $_SERVER['REQUEST_METHOD'] ?? '' ) ) && isset( $_POST['mspress_connection_save'] ) ) {
            $this->save();
        }

        $settings = Settings::get_group( 'ms365', [] ) ?? [];
        $can_edit = current_user_can( 'mspress_settings_connection_edit' );
        $tenant_id = $this->display_credential( $settings['tenant_id'] ?? '' );
        $client_id = $this->display_credential( $settings['client_id'] ?? '' );
        ?>
        <?php settings_errors( 'mspress_connection' ); ?>
        <form class="card mspress-settings-form" method="post" action="<?php echo esc_url( admin_url( 'admin.php?page=mspress-settings&tab=connection' ) ); ?>">
            <?php wp_nonce_field( 'mspress_save_connection', 'mspress_connection_nonce' ); ?>
            <input type="hidden" name="mspress_connection_save" value="1" />
            <div class="card-body">
                <fieldset <?php disabled( ! $can_edit ); ?>>
                    <div class="mb-4">
                        <?php echo FormFieldHelper::checkbox( 'mspress_ms365[enabled]', 'on', '', [ 'id' => 'mspress-ms365-enabled', 'checked' => 'on' === ( $settings['enabled'] ?? 'off' ) ] ); ?>
                        <?php echo FormFieldHelper::label( 'mspress-ms365-enabled', __( 'Enable Microsoft Graph', 'mspress' ), [ 'description' => __( 'Allow MSPress integrations to use the configured application-only Graph connection.', 'mspress' ) ] ); ?>
                    </div>
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
        if ( ! EncryptionHelper::has_runtime_key() ) {
            add_settings_error( 'mspress_connection', 'missing_key', __( 'MSPRESS_ENCRYPTION_KEY is not configured in wp-config.php.', 'mspress' ) );
            return;
        }

        $encrypted_tenant = EncryptionHelper::encrypt( $tenant_id );
        $encrypted_client = EncryptionHelper::encrypt( $client_id );
        $encrypted_secret = '' === $client_secret ? (string) ( $current['client_secret'] ?? '' ) : EncryptionHelper::encrypt( $client_secret );
        if ( null === $encrypted_tenant || null === $encrypted_client || null === $encrypted_secret || '' === $encrypted_secret ) {
            add_settings_error( 'mspress_connection', 'encryption_failed', __( 'The connection could not be encrypted. Check the encryption key and try again.', 'mspress' ) );
            return;
        }

        $current['enabled'] = ! empty( $input['enabled'] ) ? 'on' : 'off';
        $current['tenant_id'] = $encrypted_tenant;
        $current['client_id'] = $encrypted_client;
        $current['client_secret'] = $encrypted_secret;
        if ( ! Settings::set_group( 'ms365', $current ) ) {
            add_settings_error( 'mspress_connection', 'save_failed', __( 'The connection settings could not be saved.', 'mspress' ) );
            return;
        }

        add_settings_error( 'mspress_connection', 'saved', __( 'Microsoft Graph connection settings saved.', 'mspress' ), 'updated' );
    }

    private function display_credential( $encrypted ): string {
        if ( ! is_string( $encrypted ) || '' === $encrypted || ! EncryptionHelper::has_runtime_key() ) {
            return '';
        }

        return (string) ( EncryptionHelper::decrypt( $encrypted ) ?? '' );
    }
}