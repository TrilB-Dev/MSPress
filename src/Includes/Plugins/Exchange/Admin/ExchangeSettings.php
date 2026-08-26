<?php
/**
 * Admin settings page for the Exchange plugin.
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Admin
 * @since 1.0.0
 */
namespace MSPress\Includes\Plugins\Exchange\Admin;

use MSPress\Includes\Functions\Helpers\AlertHelper;
use MSPress\Includes\Functions\Helpers\EncryptionHelper;
use MSPress\Includes\Functions\Helpers\FormFieldHelper;
use MSPress\Includes\Functions\Helpers\RequestHelper;
use MSPress\Includes\Settings\Settings as BaseSettings;

final class ExchangeSettings {
    public function render(): void {
        $settings = BaseSettings::get_group( 'exchange', [] ) ?? [];
        $profiles = is_array( $settings['sender_profiles'] ?? null ) ? $settings['sender_profiles'] : [];
        $nonce = wp_create_nonce( 'mspress_exchange_settings' );
        ?>
        <div class="mspress-exchange-settings card shadow-sm" data-exchange-settings data-ajax-url="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" data-nonce="<?php echo esc_attr( $nonce ); ?>">
            <?php if ( '' !== RequestHelper::get_text( 'updated' ) ) : ?>
                <?php AlertHelper::admin_success( __( 'Exchange settings saved.', 'mspress' ) ); ?>
            <?php endif; ?>

            <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" class="mspress-exchange-form">
                <div class="card-header">
                    <h2 class="card-title h5 mb-0"><?php esc_html_e( 'Sending', 'mspress' ); ?></h2>
                </div>

                <div class="card-body">
                    <input type="hidden" name="action" value="mspress_exchange_save_settings">
                    <?php wp_nonce_field( 'mspress_exchange_save_settings' ); ?>

                    <p><?php echo FormFieldHelper::checkbox( 'settings[enabled]', '1', __( 'Send WordPress email through Microsoft Graph', 'mspress' ), [ 'checked' => ! empty( $settings['enabled'] ) ] ); ?></p>
                    <h3 class="h6 mt-4"><?php esc_html_e( 'Sender profiles', 'mspress' ); ?></h3>
                    <p>
                        <?php echo FormFieldHelper::button( __( 'Import directory mailboxes', 'mspress' ), [ 'type' => 'button', 'class' => 'btn-secondary', 'attributes' => [ 'data-exchange-import' => true, 'data-bs-toggle' => 'modal', 'data-bs-target' => '#mspress-exchange-import' ] ] ); ?>
                    </p>

                    <div class="table-responsive">
                        <table class="widefat striped">
                            <thead>
                                <tr>
                                    <th><?php esc_html_e( 'Email', 'mspress' ); ?></th>
                                    <th><?php esc_html_e( 'Name', 'mspress' ); ?></th>
                                    <th><?php esc_html_e( 'Type', 'mspress' ); ?></th>
                                    <th><?php esc_html_e( 'Enabled', 'mspress' ); ?></th>
                                    <th><?php esc_html_e( 'Remove', 'mspress' ); ?></th>
                                </tr>
                            </thead>
                            <tbody data-exchange-profiles>
                                <?php foreach ( $profiles as $index => $profile ) : ?>
                                    <?php $this->profile_row( $index, $profile ); ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <p class="mb-0">
                        <?php
                        $sender_options = [ '' => __( 'Choose a sender', 'mspress' ) ];
                        foreach ( $profiles as $profile ) {
                            $email = EncryptionHelper::decrypt( (string) ( $profile['address'] ?? '' ) );
                            if ( ! is_email( $email ) || empty( $profile['enabled'] ) ) {
                                continue;
                            }
                            $sender_options[ $email ] = ( $profile['name'] ?: $email ) . ' <' . $email . '>';
                        }
                        echo FormFieldHelper::label( 'mspress-exchange-default-sender', __( 'Default sender', 'mspress' ) );
                        echo FormFieldHelper::bootstrap_select( 'settings[default_sender]', [ 'data' => $sender_options, 'selected' => $settings['default_sender'] ?? '', 'id' => 'mspress-exchange-default-sender', 'live_search' => true, 'class' => 'form-select' ] );
                        ?>
                    </p>
                </div>

                <div class="card-footer">
                    <?php echo FormFieldHelper::button( __( 'Save Exchange settings', 'mspress' ), [ 'type' => 'submit' ] ); ?>
                </div>
            </form>

            <div class="modal fade" id="mspress-exchange-import" tabindex="-1" aria-labelledby="mspress-exchange-import-title" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title fs-5" id="mspress-exchange-import-title"><?php esc_html_e( 'Import directory mailboxes', 'mspress' ); ?></h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?php esc_attr_e( 'Close', 'mspress' ); ?>"></button>
                        </div>
                        <div class="modal-body">
                            <div data-exchange-import-status></div>
                            <div class="table-responsive">
                                <table class="widefat striped">
                                    <thead>
                                        <tr>
                                            <th><?php esc_html_e( 'Email', 'mspress' ); ?></th>
                                            <th><?php esc_html_e( 'Name', 'mspress' ); ?></th>
                                            <th><?php esc_html_e( 'Type', 'mspress' ); ?></th>
                                            <th><?php esc_html_e( 'Add', 'mspress' ); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody data-exchange-import-rows></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><?php esc_html_e( 'Done', 'mspress' ); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    private function profile_row( int $index, array $profile ): void {
        $email = EncryptionHelper::decrypt( (string) ( $profile['address'] ?? '' ) );
        ?>
        <tr>
            <td><?php echo FormFieldHelper::input( 'settings[sender_profiles][' . absint( $index ) . '][email]', is_string( $email ) ? $email : '', [ 'type' => 'email' ] ); ?></td>
            <td><?php echo FormFieldHelper::text_input( 'settings[sender_profiles][' . absint( $index ) . '][name]', (string) ( $profile['name'] ?? '' ) ); ?></td>
            <td><?php echo FormFieldHelper::select( 'settings[sender_profiles][' . absint( $index ) . '][type]', [ 'user' => __( 'User', 'mspress' ), 'shared' => __( 'Shared mailbox', 'mspress' ) ], $profile['type'] ?? 'user' ); ?></td>
            <td><?php echo FormFieldHelper::checkbox( 'settings[sender_profiles][' . absint( $index ) . '][enabled]', '1', '', [ 'checked' => ! empty( $profile['enabled'] ) ] ); ?></td>
            <td><?php echo FormFieldHelper::checkbox( 'settings[sender_profiles][' . absint( $index ) . '][remove]', '1' ); ?></td>
        </tr>
        <?php
    }

}
