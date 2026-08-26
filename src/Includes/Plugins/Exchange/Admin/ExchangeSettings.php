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
               
                <div class="card-body">
                    <?php echo FormFieldHelper::input( 'action', 'mspress_exchange_save_settings', [ 'type' => 'hidden' ] ); ?>
                    <?php wp_nonce_field( 'mspress_exchange_save_settings' ); ?>

                    <div class="mb-3">
                        <?php echo FormFieldHelper::switch( 'settings[enabled]', '1', __( 'Exchange Integration', 'mspress' ), [ 'checked' => ! empty( $settings['enabled'] ) ] ); ?>
                        <?php echo FormFieldHelper::form_text( __( 'Send WordPress email through Microsoft Graph', 'mspress' ) ); ?>
                    </div>
                    <h3 class="h6 mt-4"><?php esc_html_e( 'Sender profiles', 'mspress' ); ?></h3>
                    <p>
                        <?php echo FormFieldHelper::button( __( 'Import Sender Profiles', 'mspress' ), [ 'type' => 'button', 'class' => 'btn-secondary', 'attributes' => [ 'data-exchange-profile-import' => true, 'data-bs-toggle' => 'modal', 'data-bs-target' => '#mspress-exchange-profile-import', 'data-bs-placement' => 'top', 'title' => __( 'Find user and shared mailboxes in the directory and add them as sender profiles.', 'mspress' ), 'aria-label' => __( 'Import Sender Profiles. Find user and shared mailboxes in the directory and add them as sender profiles.', 'mspress' ) ] ] ); ?>
                        <?php echo FormFieldHelper::button( __( 'Edit Sender Profiles', 'mspress' ), [ 'type' => 'button', 'class' => 'btn-warning', 'attributes' => [ 'data-exchange-profile-edit' => true, 'data-bs-toggle' => 'modal', 'data-bs-target' => '#mspress-exchange-profile-edit', 'data-bs-placement' => 'top', 'title' => __( 'Edit the local names and mailbox types of saved sender profiles, or delete profiles.', 'mspress' ), 'aria-label' => __( 'Edit Sender Profiles. Edit the local names and mailbox types of saved sender profiles, or delete profiles.', 'mspress' ) ] ] ); ?>
                    </p>

                    <p class="mb-0">
                        <?php
                        $sender_options = [ '' => __( 'Choose a sender', 'mspress' ) ];
                        foreach ( $profiles as $profile ) {
                            $email = EncryptionHelper::decrypt( (string) ( $profile['address'] ?? '' ) );
                            if ( ! is_email( $email ) ) {
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

                <div class="modal fade" id="mspress-exchange-profile-edit" tabindex="-1" aria-labelledby="mspress-exchange-profile-edit-title" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title fs-5" id="mspress-exchange-profile-edit-title"><?php esc_html_e( 'Edit sender profiles', 'mspress' ); ?></h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?php esc_attr_e( 'Close', 'mspress' ); ?>"></button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="widefat striped align-middle">
                                        <thead>
                                            <tr>
                                                <th><?php esc_html_e( 'Email address', 'mspress' ); ?></th>
                                                <th><?php esc_html_e( 'Name', 'mspress' ); ?></th>
                                                <th><?php esc_html_e( 'Type', 'mspress' ); ?></th>
                                                <th><?php esc_html_e( 'Enabled', 'mspress' ); ?></th>
                                                <th><?php esc_html_e( 'Delete', 'mspress' ); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody data-exchange-profiles>
                                            <?php foreach ( $profiles as $index => $profile ) : ?>
                                                <?php $this->profile_row( $index, $profile ); ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <?php echo FormFieldHelper::button( __( 'Save profiles', 'mspress' ), [ 'type' => 'submit', 'class' => 'btn-primary', 'attributes' => [ 'data-exchange-profile-save' => true ] ] ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="modal fade" id="mspress-exchange-profile-import" tabindex="-1" aria-labelledby="mspress-exchange-profile-import-title" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title fs-5" id="mspress-exchange-profile-import-title"><?php esc_html_e( 'Import sender profiles', 'mspress' ); ?></h2>
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
            <td><?php echo FormFieldHelper::input( 'settings[sender_profiles][' . absint( $index ) . '][email]', is_string( $email ) ? $email : '', [ 'type' => 'email', 'attributes' => [ 'readonly' => true ] ] ); ?></td>
            <td><?php echo FormFieldHelper::text_input( 'settings[sender_profiles][' . absint( $index ) . '][name]', (string) ( $profile['name'] ?? '' ) ); ?></td>
            <td><?php echo FormFieldHelper::select( 'settings[sender_profiles][' . absint( $index ) . '][type]', [ 'user' => __( 'User', 'mspress' ), 'shared' => __( 'Shared mailbox', 'mspress' ) ], $profile['type'] ?? 'user' ); ?></td>
            <td><?php echo FormFieldHelper::input( 'settings[sender_profiles][' . absint( $index ) . '][enabled]', '0', [ 'type' => 'hidden' ] ); ?><?php echo FormFieldHelper::checkbox( 'settings[sender_profiles][' . absint( $index ) . '][enabled]', '1', '', [ 'checked' => ! array_key_exists( 'enabled', $profile ) || ! empty( $profile['enabled'] ), 'class' => 'form-check-input', 'attributes' => [ 'aria-label' => __( 'Enable sender profile', 'mspress' ) ] ] ); ?></td>
            <td><button type="button" class="btn btn-danger" data-exchange-profile-delete aria-label="<?php esc_attr_e( 'Delete profile', 'mspress' ); ?>"><i class="fa-solid fa-trash" aria-hidden="true"></i><span class="visually-hidden"><?php esc_html_e( 'Delete profile', 'mspress' ); ?></span></button></td>
        </tr>
        <?php
    }

}
