<?php
/**
 * Admin settings page for the Exchange plugin.
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Admin
 * @since 1.0.0
 */
namespace MSPress\Includes\Plugins\Exchange\Admin;

use MSPress\Includes\Functions\Helpers\EncryptionHelper;
use MSPress\Includes\Settings\Settings as BaseSettings;

final class ExchangeSettings {
    public function render(): void {
        $settings = BaseSettings::get_group( 'exchange', [] ) ?? [];
        $profiles = is_array( $settings['sender_profiles'] ?? null ) ? $settings['sender_profiles'] : [];
        $nonce = wp_create_nonce( 'mspress_exchange_settings' );
        ?>
        <div class="mspress-exchange-settings card shadow-sm" data-exchange-settings data-ajax-url="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" data-nonce="<?php echo esc_attr( $nonce ); ?>">
            <?php if ( isset( $_GET['updated'] ) ) : ?>
                <div class="notice notice-success is-dismissible">
                    <p><?php esc_html_e( 'Exchange settings saved.', 'mspress' ); ?></p>
                </div>
            <?php endif; ?>

            <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" class="mspress-exchange-form">
                <div class="card-header">
                    <h2 class="card-title h5 mb-0"><?php esc_html_e( 'Sending', 'mspress' ); ?></h2>
                </div>

                <div class="card-body">
                    <input type="hidden" name="action" value="mspress_exchange_save_settings">
                    <?php wp_nonce_field( 'mspress_exchange_save_settings' ); ?>

                    <p>
                        <label>
                            <input type="checkbox" name="settings[enabled]" value="1" <?php checked( ! empty( $settings['enabled'] ), true ); ?>>
                            <?php esc_html_e( 'Send WordPress email through Microsoft Graph', 'mspress' ); ?>
                        </label>
                    </p>

                    <p class="mb-0">
                        <label for="mspress-exchange-default-sender"><?php esc_html_e( 'Default sender', 'mspress' ); ?></label>
                        <select class="selectpicker form-select" data-live-search="true" id="mspress-exchange-default-sender" name="settings[default_sender]">
                            <option value=""><?php esc_html_e( 'Choose a sender', 'mspress' ); ?></option>
                            <?php foreach ( $profiles as $profile ) : ?>
                                <?php
                                $email = EncryptionHelper::decrypt( (string) ( $profile['address'] ?? '' ) );
                                if ( ! is_email( $email ) || empty( $profile['enabled'] ) ) {
                                    continue;
                                }
                                ?>
                                <option value="<?php echo esc_attr( $email ); ?>" <?php selected( $settings['default_sender'] ?? '', $email ); ?>>
                                    <?php echo esc_html( ( $profile['name'] ?: $email ) . ' <' . $email . '>' ); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </p>

                    <h3 class="h6 mt-4"><?php esc_html_e( 'Sender profiles', 'mspress' ); ?></h3>
                    <p>
                        <button type="button" class="btn btn-secondary" data-exchange-import>
                            <?php esc_html_e( 'Import directory mailboxes', 'mspress' ); ?>
                        </button>
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
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><?php esc_html_e( 'Save Exchange settings', 'mspress' ); ?></button>
                </div>
            </form>

            <div class="modal fade" id="mspress-exchange-import" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title fs-5"><?php esc_html_e( 'Import directory mailboxes', 'mspress' ); ?></h2>
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
            <td>
                <input type="email" name="settings[sender_profiles][<?php echo absint( $index ); ?>][email]" value="<?php echo esc_attr( is_string( $email ) ? $email : '' ); ?>">
            </td>
            <td>
                <input type="text" name="settings[sender_profiles][<?php echo absint( $index ); ?>][name]" value="<?php echo esc_attr( $profile['name'] ?? '' ); ?>">
            </td>
            <td>
                <select name="settings[sender_profiles][<?php echo absint( $index ); ?>][type]">
                    <option value="user" <?php selected( $profile['type'] ?? 'user', 'user' ); ?>><?php esc_html_e( 'User', 'mspress' ); ?></option>
                    <option value="shared" <?php selected( $profile['type'] ?? '', 'shared' ); ?>><?php esc_html_e( 'Shared mailbox', 'mspress' ); ?></option>
                </select>
            </td>
            <td>
                <input type="checkbox" name="settings[sender_profiles][<?php echo absint( $index ); ?>][enabled]" value="1" <?php checked( ! empty( $profile['enabled'] ), true ); ?>>
            </td>
            <td>
                <input type="checkbox" name="settings[sender_profiles][<?php echo absint( $index ); ?>][remove]" value="1">
            </td>
        </tr>
        <?php
    }

}
