<?php
/**
 * Settings for the Exchange plugin.
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Includes
 * @since 1.0.0
 */
namespace MSPress\Includes\Plugins\Exchange\Includes\Settings;
use MSPress\Includes\Settings\Settings as BaseSettings;
use MSPress\Includes\Functions\Helpers\SanitizationHelper;
use MSPress\Includes\Functions\Helpers\EncryptionHelper;
use MSPress\Includes\Functions\Helpers\FormFieldHelper;
use MSPress\Includes\MSGraph\GraphService;

final class Settings {
    /**
     * Returns the settings for the Exchange plugin.
     *
     * @return array The settings array.
     */
    public function register(): void {
        BaseSettings::register_group( 'exchange', [
            'enabled' => false,
            'default_sender' => '',
            'sender_profiles' => [],
            'account' => [],
        ] );
        add_action( 'admin_post_mspress_exchange_import_mailboxes', [ $this, 'import_mailboxes' ] );
    }

    public function get_settings_page(): array {
        return [
            'slug' => 'exchange',
            'label' => __( 'Exchange', 'mspress' ),
            'title' => __( 'Microsoft Exchange email settings', 'mspress' ),
            'layout' => 'table',
            'fields' => [
                [
                    'key' => 'account',
                    'label' => __( 'Microsoft 365 account', 'mspress' ),
                    'description' => __( 'Connect the mailbox account used to discover your primary address and directory mailboxes. Microsoft Graph administrator consent for User.ReadBasic.All may be required.', 'mspress' ),
                    'type' => 'custom',
                    'default' => [],
                    'render' => [ $this, 'render_account' ],
                ],
                [
                    'key' => 'enabled',
                    'label' => __( 'Send WordPress email through Microsoft Graph', 'mspress' ),
                    'description' => __( 'When enabled, WordPress email is sent with the configured Microsoft 365 application instead of the local mail transport.', 'mspress' ),
                    'type' => 'checkbox',
                    'default' => false,
                ],
                [
                    'key' => 'default_sender',
                    'label' => __( 'Default sender email', 'mspress' ),
                    'description' => __( 'Use an enabled sender profile, including a shared mailbox such as info@example.com.', 'mspress' ),
                    'type' => 'email',
                    'default' => '',
                ],
                [
                    'key' => 'sender_profiles',
                    'label' => __( 'Sender profiles', 'mspress' ),
                    'description' => __( 'Enable the accounts WordPress may use as senders. Imported shared mailboxes will appear here when available.', 'mspress' ),
                    'type' => 'custom',
                    'default' => [],
                    'render' => [ $this, 'render_profiles' ],
                ],
            ],
        ];
    }

    public function sanitize( $input ): array {
        $input = is_array( $input ) ? $input : [];
        $raw_profiles = $input['sender_profiles'] ?? [];
        if ( is_string( $raw_profiles ) ) {
            $raw_profiles = json_decode( wp_unslash( $raw_profiles ), true );
        }
        $profiles = [];
        foreach ( (array) $raw_profiles as $profile ) {
            if ( ! is_array( $profile ) ) {
                continue;
            }
            $email = sanitize_email( $profile['email'] ?? '' );
            if ( ! is_email( $email ) ) {
                continue;
            }
            $encrypted_email = EncryptionHelper::encrypt( $email );
            if ( null === $encrypted_email ) {
                continue;
            }
            $profiles[] = [
                'address' => $encrypted_email,
                'name' => SanitizationHelper::text( $profile['name'] ?? '' ),
                'type' => in_array( $profile['type'] ?? '', [ 'user', 'shared' ], true ) ? $profile['type'] : 'user',
                'enabled' => ! empty( $profile['enabled'] ),
            ];
        }
        $existing = BaseSettings::get_group( 'exchange', [] ) ?? [];
        $input = [
            'enabled' => ! empty( $input['enabled'] ),
            'default_sender' => sanitize_email( $input['default_sender'] ?? '' ),
            'sender_profiles' => $profiles,
            'account' => is_array( $existing['account'] ?? null ) ? $existing['account'] : [],
        ];
        BaseSettings::set_group( 'exchange', $input );
        return $input;
    }

    public function render_account( $value ): void {
        $account = is_array( $value ) ? $value : [];
        $email = EncryptionHelper::decrypt( (string) ( $account['email'] ?? '' ) );
        $connected = is_string( $email ) && is_email( $email );
        $oauth = GraphService::get_instance()->get_oauth_service();
        $connect_url = $oauth ? $oauth->get_authorization_url( null, [ 'purpose' => 'exchange_connect' ], 'openid profile email offline_access User.Read Mail.ReadBasic User.ReadBasic.All' ) : '';

        echo '<div class="d-flex flex-wrap align-items-center gap-3">';
        echo '<span class="badge ' . ( $connected ? 'text-bg-success' : 'text-bg-secondary' ) . '">' . esc_html( $connected ? __( 'Connected', 'mspress' ) : __( 'Not connected', 'mspress' ) ) . '</span>';
        if ( $connected ) {
            echo '<strong>' . esc_html( $email ) . '</strong>';
            echo '<a class="button" href="' . esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=mspress_exchange_import_mailboxes' ), 'mspress_exchange_import' ) ) . '">' . esc_html__( 'Import directory mailboxes', 'mspress' ) . '</a>';
        }
        if ( $connect_url ) {
            echo '<a class="button button-primary" href="' . esc_url( $connect_url ) . '">' . esc_html( $connected ? __( 'Reconnect account', 'mspress' ) : __( 'Connect Microsoft 365 account', 'mspress' ) ) . '</a>';
        }
        echo '</div>';
        echo '<p class="description mt-2 mb-0">' . esc_html__( 'The connected account must also have Exchange access to any shared mailbox used for sending. Consent and mailbox delegation are separate from importing an address.', 'mspress' ) . '</p>';
    }

    public function save_connected_account( array $account ): void {
        $email = sanitize_email( $account['email'] ?? '' );
        \MSPress\Includes\Functions\Helpers\LoggerHelper::write_log( 'Exchange OAuth persistence started: email_present=' . ( $email !== '' ? 'yes' : 'no' ) . ', access_token_present=' . ( ! empty( $account['access_token'] ) ? 'yes' : 'no' ) . ', refresh_token_present=' . ( ! empty( $account['refresh_token'] ) ? 'yes' : 'no' ) );
        if ( ! is_email( $email ) ) {
            \MSPress\Includes\Functions\Helpers\LoggerHelper::write_log( 'Exchange OAuth persistence skipped: invalid account email.' );
            return;
        }

        $encrypted_email = EncryptionHelper::encrypt( $email );
        $encrypted_access = EncryptionHelper::encrypt( (string) ( $account['access_token'] ?? '' ) );
        $encrypted_refresh = EncryptionHelper::encrypt( (string) ( $account['refresh_token'] ?? '' ) );
        if ( null === $encrypted_email || null === $encrypted_access || null === $encrypted_refresh ) {
            \MSPress\Includes\Functions\Helpers\LoggerHelper::write_log( 'Exchange OAuth persistence skipped: account encryption failed.' );
            return;
        }

        $settings = BaseSettings::get_group( 'exchange', [] ) ?? [];
        $settings['account'] = [
            'email' => $encrypted_email,
            'user_id' => sanitize_text_field( $account['id'] ?? '' ),
            'display_name' => sanitize_text_field( $account['display_name'] ?? '' ),
            'tenant_id' => sanitize_text_field( $account['tenant_id'] ?? '' ),
            'access_token' => $encrypted_access,
            'refresh_token' => $encrypted_refresh,
            'expires' => absint( $account['expires'] ?? 0 ),
        ];
        $saved = BaseSettings::set_group( 'exchange', $settings );
        \MSPress\Includes\Functions\Helpers\LoggerHelper::write_log( 'Exchange OAuth persistence completed: saved=' . ( $saved ? 'yes' : 'no' ) );
    }

    public function import_mailboxes(): void {
        if ( ! current_user_can( 'mspress_settings_plugins_int_edit' ) ) {
            wp_die( esc_html__( 'You are not authorized to import Exchange mailboxes.', 'mspress' ), '', [ 'response' => 403 ] );
        }
        check_admin_referer( 'mspress_exchange_import' );

        $settings = BaseSettings::get_group( 'exchange', [] ) ?? [];
        $account = is_array( $settings['account'] ?? null ) ? $settings['account'] : [];
        $token = EncryptionHelper::decrypt( (string) ( $account['access_token'] ?? '' ) );
        if ( ! is_string( $token ) || '' === $token ) {
            wp_die( esc_html__( 'Connect a Microsoft 365 account before importing mailboxes.', 'mspress' ) );
        }

        $response = wp_remote_get( add_query_arg( [
            '$select' => 'displayName,mail,userPrincipalName',
            '$filter' => 'mail ne null',
            '$top' => 999,
        ], 'https://graph.microsoft.com/v1.0/users' ), [
            'headers' => [ 'Authorization' => 'Bearer ' . $token, 'Accept' => 'application/json' ],
            'timeout' => 30,
        ] );
        if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {
            wp_die( esc_html__( 'Microsoft Graph could not return directory mailboxes. Verify delegated directory consent and try again.', 'mspress' ) );
        }

        $body = json_decode( wp_remote_retrieve_body( $response ), true );
        $profiles = is_array( $settings['sender_profiles'] ?? null ) ? $settings['sender_profiles'] : [];
        $known = [];
        foreach ( $profiles as $profile ) {
            $known_email = EncryptionHelper::decrypt( (string) ( $profile['address'] ?? '' ) );
            if ( is_string( $known_email ) ) {
                $known[ strtolower( $known_email ) ] = true;
            }
        }
        foreach ( (array) ( $body['value'] ?? [] ) as $mailbox ) {
            $address = sanitize_email( $mailbox['mail'] ?? $mailbox['userPrincipalName'] ?? '' );
            if ( ! is_email( $address ) || isset( $known[ strtolower( $address ) ] ) ) {
                continue;
            }
            $encrypted = EncryptionHelper::encrypt( $address );
            if ( null === $encrypted ) {
                continue;
            }
            $profiles[] = [
                'address' => $encrypted,
                'name' => SanitizationHelper::text( $mailbox['displayName'] ?? '' ),
                'type' => 'user',
                'enabled' => false,
            ];
            $known[ strtolower( $address ) ] = true;
        }
        $settings['sender_profiles'] = $profiles;
        BaseSettings::set_group( 'exchange', $settings );
        wp_safe_redirect( admin_url( 'admin.php?page=mspress-settings&tab=third-party&plugin=exchange&exchange_imported=1' ) );
        exit;
    }

    public function render_profiles( $value ): void {
        $profiles = is_array( $value ) ? $value : [];
        if ( ! $profiles ) {
            echo '<p class="text-secondary mb-0">' . esc_html__( 'No sender profiles configured yet.', 'mspress' ) . '</p>';
            return;
        }

        echo '<div class="table-responsive"><table class="table align-middle mb-0"><thead><tr><th>' . esc_html__( 'Email', 'mspress' ) . '</th><th>' . esc_html__( 'Name', 'mspress' ) . '</th><th>' . esc_html__( 'Type', 'mspress' ) . '</th><th>' . esc_html__( 'Enabled', 'mspress' ) . '</th></tr></thead><tbody>';
        foreach ( $profiles as $index => $profile ) {
            if ( ! is_array( $profile ) ) {
                continue;
            }
            $email = EncryptionHelper::decrypt( (string) ( $profile['address'] ?? $profile['email'] ?? '' ) );
            $prefix = 'settings[sender_profiles][' . absint( $index ) . ']';
            echo '<tr>';
            echo '<td>' . FormFieldHelper::input( $prefix . '[email]', is_string( $email ) ? $email : '', [ 'type' => 'email', 'class' => 'form-control' ] ) . '</td>';
            echo '<td>' . FormFieldHelper::input( $prefix . '[name]', (string) ( $profile['name'] ?? '' ), [ 'type' => 'text', 'class' => 'form-control' ] ) . '</td>';
            echo '<td>' . FormFieldHelper::select( $prefix . '[type]', [ 'user' => __( 'User', 'mspress' ), 'shared' => __( 'Shared mailbox', 'mspress' ) ], (string) ( $profile['type'] ?? 'user' ), [ 'class' => 'form-select' ] ) . '</td>';
            echo '<td>' . FormFieldHelper::checkbox( $prefix . '[enabled]', '1', '', [ 'checked' => ! empty( $profile['enabled'] ), 'class' => 'form-check-input' ] ) . '</td>';
            echo '</tr>';
        }
        echo '</tbody></table></div>';
    }
}