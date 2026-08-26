<?php
namespace MSPress\Includes\Plugins\Exchange\Admin;

use MSPress\Includes\Functions\Helpers\EncryptionHelper;
use MSPress\Includes\Plugins\Exchange\Includes\Includes;
use MSPress\Includes\Settings\Settings as BaseSettings;

final class ExchangeSettings {
    public function render(): void {
        $settings = BaseSettings::get_group( 'exchange', [] ) ?? [];
        $profiles = is_array( $settings['sender_profiles'] ?? null ) ? $settings['sender_profiles'] : [];
        $nonce = wp_create_nonce( 'mspress_exchange_settings' );
        echo '<div class="mspress-exchange-settings" data-exchange-settings data-ajax-url="' . esc_url( admin_url( 'admin-ajax.php' ) ) . '" data-nonce="' . esc_attr( $nonce ) . '">';
        if ( isset( $_GET['updated'] ) ) {
            echo '<div class="notice notice-success is-dismissible"><p>' . esc_html__( 'Exchange settings saved.', 'mspress' ) . '</p></div>';
        }
        echo '<form method="post" action="' . esc_url( admin_url( 'admin-post.php' ) ) . '" class="card mspress-exchange-form">';
        echo '<input type="hidden" name="action" value="mspress_exchange_save_settings">';
        wp_nonce_field( 'mspress_exchange_save_settings' );
        echo '<div class="card-header"><h2 class="h5 mb-0">' . esc_html__( 'Sending', 'mspress' ) . '</h2></div><div class="card-body">';
        echo '<p><label><input type="checkbox" name="settings[enabled]" value="1" ' . checked( ! empty( $settings['enabled'] ), true, false ) . '> ' . esc_html__( 'Send WordPress email through Microsoft Graph', 'mspress' ) . '</label></p>';
        echo '<p class="mb-0"><label for="mspress-exchange-default-sender">' . esc_html__( 'Default sender', 'mspress' ) . '</label><select class="selectpicker form-select" data-live-search="true" id="mspress-exchange-default-sender" name="settings[default_sender]"><option value="">' . esc_html__( 'Choose a sender', 'mspress' ) . '</option>';
        foreach ( $profiles as $profile ) {
            $email = EncryptionHelper::decrypt( (string) ( $profile['address'] ?? '' ) );
            if ( ! is_email( $email ) || empty( $profile['enabled'] ) ) { continue; }
            echo '<option value="' . esc_attr( $email ) . '" ' . selected( $settings['default_sender'] ?? '', $email, false ) . '>' . esc_html( ( $profile['name'] ?: $email ) . ' <' . $email . '>' ) . '</option>';
        }
        echo '</select></p>';
        echo '<h3 class="h6 mt-4">' . esc_html__( 'Sender profiles', 'mspress' ) . '</h3><p><button type="button" class="button" data-exchange-import>' . esc_html__( 'Import directory mailboxes', 'mspress' ) . '</button></p>';
        echo '<div class="table-responsive"><table class="widefat striped"><thead><tr><th>' . esc_html__( 'Email', 'mspress' ) . '</th><th>' . esc_html__( 'Name', 'mspress' ) . '</th><th>' . esc_html__( 'Type', 'mspress' ) . '</th><th>' . esc_html__( 'Enabled', 'mspress' ) . '</th><th>' . esc_html__( 'Remove', 'mspress' ) . '</th></tr></thead><tbody data-exchange-profiles>';
        foreach ( $profiles as $index => $profile ) { $this->profile_row( $index, $profile ); }
        echo '</tbody></table></div></div><div class="card-footer"><button type="submit" class="button button-primary">' . esc_html__( 'Save Exchange settings', 'mspress' ) . '</button></div></form>';
        $this->render_templates();
        $this->render_logs( is_array( $settings['sent_logs'] ?? null ) ? $settings['sent_logs'] : [] );
        echo '<div class="modal fade" id="mspress-exchange-import" tabindex="-1" aria-hidden="true"><div class="modal-dialog modal-xl"><div class="modal-content"><div class="modal-header"><h2 class="modal-title fs-5">' . esc_html__( 'Import directory mailboxes', 'mspress' ) . '</h2><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="' . esc_attr__( 'Close', 'mspress' ) . '"></button></div><div class="modal-body"><div data-exchange-import-status></div><div class="table-responsive"><table class="widefat striped"><thead><tr><th>' . esc_html__( 'Email', 'mspress' ) . '</th><th>' . esc_html__( 'Name', 'mspress' ) . '</th><th>' . esc_html__( 'Type', 'mspress' ) . '</th><th>' . esc_html__( 'Add', 'mspress' ) . '</th></tr></thead><tbody data-exchange-import-rows></tbody></table></div></div><div class="modal-footer"><button type="button" class="button button-primary" data-bs-dismiss="modal">' . esc_html__( 'Done', 'mspress' ) . '</button></div></div></div></div></div>';
    }

    private function profile_row( int $index, array $profile ): void {
        $email = EncryptionHelper::decrypt( (string) ( $profile['address'] ?? '' ) );
        echo '<tr><td><input type="email" name="settings[sender_profiles][' . absint( $index ) . '][email]" value="' . esc_attr( is_string( $email ) ? $email : '' ) . '"></td><td><input type="text" name="settings[sender_profiles][' . absint( $index ) . '][name]" value="' . esc_attr( $profile['name'] ?? '' ) . '"></td><td><select name="settings[sender_profiles][' . absint( $index ) . '][type]"><option value="user" ' . selected( $profile['type'] ?? 'user', 'user', false ) . '>' . esc_html__( 'User', 'mspress' ) . '</option><option value="shared" ' . selected( $profile['type'] ?? '', 'shared', false ) . '>' . esc_html__( 'Shared mailbox', 'mspress' ) . '</option></select></td><td><input type="checkbox" name="settings[sender_profiles][' . absint( $index ) . '][enabled]" value="1" ' . checked( ! empty( $profile['enabled'] ), true, false ) . '></td><td><input type="checkbox" name="settings[sender_profiles][' . absint( $index ) . '][remove]" value="1"></td></tr>';
    }

    private function render_templates(): void {
        echo '<section class="card mt-4"><div class="card-header"><h2 class="h5 mb-0">' . esc_html__( 'Email templates', 'mspress' ) . '</h2></div><div class="card-body">';
        $terms = get_terms( [ 'taxonomy' => 'mspress_email_template_type', 'hide_empty' => false ] );
        foreach ( is_wp_error( $terms ) ? [] : $terms as $term ) {
            $posts = get_posts( [ 'post_type' => 'mspress_email_template', 'numberposts' => -1, 'tax_query' => [ [ 'taxonomy' => 'mspress_email_template_type', 'field' => 'term_id', 'terms' => $term->term_id ] ] ] );
            echo '<h3 class="h5">' . esc_html( $term->name ) . '</h3><table class="widefat striped mb-3"><thead><tr><th>' . esc_html__( 'Template', 'mspress' ) . '</th><th>' . esc_html__( 'Edit', 'mspress' ) . '</th></tr></thead><tbody>';
            foreach ( $posts as $post ) { echo '<tr><td>' . esc_html( $post->post_title ) . '</td><td><a href="' . esc_url( get_edit_post_link( $post->ID ) ) . '">' . esc_html__( 'Edit template', 'mspress' ) . '</a></td></tr>'; }
            echo '</tbody></table>';
        }
        echo '</div></section>';
    }

    private function render_logs( array $logs ): void {
        echo '<section class="card mt-4"><div class="card-header"><h2 class="h5 mb-0">' . esc_html__( 'Sent email log', 'mspress' ) . '</h2></div><div class="card-body"><div class="table-responsive"><table class="widefat striped"><thead><tr><th>' . esc_html__( 'Date', 'mspress' ) . '</th><th>' . esc_html__( 'Sender', 'mspress' ) . '</th><th>' . esc_html__( 'Recipients', 'mspress' ) . '</th><th>' . esc_html__( 'Subject', 'mspress' ) . '</th></tr></thead><tbody>';
        foreach ( $logs as $log ) { echo '<tr><td>' . esc_html( $log['date'] ?? '' ) . '</td><td>' . esc_html( $log['sender'] ?? '' ) . '</td><td>' . esc_html( $log['to'] ?? '' ) . '</td><td>' . esc_html( $log['subject'] ?? '' ) . '</td></tr>'; }
        if ( ! $logs ) { echo '<tr><td colspan="4">' . esc_html__( 'No Graph emails have been sent yet.', 'mspress' ) . '</td></tr>'; }
        echo '</tbody></table></div></div></section>';
    }
}
