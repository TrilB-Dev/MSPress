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
use MSPress\Includes\Functions\Helpers\AjaxHelper;
use MSPress\Includes\Functions\Helpers\PermissionHelper;
use MSPress\Includes\Functions\Helpers\RequestHelper;
use MSPress\Includes\MSGraph\GraphService;
use MSPress\Includes\Plugins\Exchange\Admin\ExchangeSettings;

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
            'email_templates' => [],
            'email_global' => [],
            'account' => [],
            'sent_logs' => [],
            'wordpress_mail_logs' => [],
        ] );
        add_action( 'wp_ajax_mspress_exchange_directory_mailboxes', [ $this, 'ajax_directory_mailboxes' ] );
        add_action( 'admin_post_mspress_exchange_save_settings', [ $this, 'save_admin_settings' ] );
        add_action( 'wp_mail_succeeded', [ $this, 'log_wordpress_mail' ] );
    }

    public function save_admin_settings(): void {
        if ( ! PermissionHelper::can( 'mspress_settings_plugins_int_edit' ) ) {
            wp_die( esc_html__( 'You are not authorized to save Exchange settings.', 'mspress' ), '', [ 'response' => 403 ] );
        }
        if ( ! AjaxHelper::has_valid_nonce( 'mspress_exchange_save_settings', '_wpnonce' ) ) {
            wp_die( esc_html__( 'The security check failed. Please try again.', 'mspress' ), '', [ 'response' => 403 ] );
        }
        $input = RequestHelper::array( $_POST, 'settings' );
        $reset = SanitizationHelper::text( $_POST['reset_template'] ?? '' );
        if ( preg_match( '/^(admin|comments|multisite|user):([a-z0-9_-]+)$/', $reset, $matches ) ) {
            unset( $input['email_templates'][ $matches[1] ][ $matches[2] ] );
        }
        $this->sanitize( $input, $reset );
        wp_safe_redirect( admin_url( 'admin.php?page=mspress-settings&tab=exchange-settings&updated=1' ) );
        exit;
    }

    public function get_settings_page(): array {
        return [
            'slug' => 'exchange-settings',
            'label' => __( 'Exchange', 'mspress' ),
            'title' => __( 'Microsoft Exchange email settings', 'mspress' ),
            'layout' => 'table',
            'capability' => 'mspress_settings_plugins_int_view',
            'fields' => [
                [
                    'key' => 'account',
                    'label' => __( 'Microsoft 365 account', 'mspress' ),
                    'description' => __( 'Connect the Microsoft 365 account used by Exchange.', 'mspress' ),
                    'type' => 'custom',
                    'default' => [],
                    'render' => [ $this, 'render_account' ],
                ],
            ],
            'tabs' => [
                [
                    'slug' => 'exchange-email-templates',
                    'label' => __( 'Email Templates', 'mspress' ),
                    'title' => __( 'Exchange email templates', 'mspress' ),
                    'capability' => 'edit_posts',
                    'render_page' => [ \MSPress\Includes\Plugins\Exchange\Admin\EmailTemplates::class, 'render' ],
                ],
                [
                    'slug' => 'exchange-trace-rout',
                    'label' => __( 'Route Trace', 'mspress' ),
                    'title' => __( 'Exchange route trace', 'mspress' ),
                    'capability' => 'mspress_tools_debug',
                    'render_page' => [ \MSPress\Includes\Plugins\Exchange\Admin\TraceRout::class, 'render' ],
                ],
                [
                    'slug' => 'exchange-sent-logs',
                    'label' => __( 'Sent Log', 'mspress' ),
                    'title' => __( 'Exchange sent logs', 'mspress' ),
                    'capability' => 'mspress_tools_debug',
                    'render_page' => [ \MSPress\Includes\Plugins\Exchange\Admin\SentLogs::class, 'render' ],
                ],
            ],
            'render_page' => [ new ExchangeSettings(), 'render' ],
        ];
    }

    public function sanitize( $input, string $reset = '' ): array {
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
            if ( ! empty( $profile['remove'] ) ) {
                continue;
            }
            $email = sanitize_email( SanitizationHelper::text( $profile['email'] ?? '' ) );
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
                'type' => SanitizationHelper::one_of( SanitizationHelper::key( $profile['type'] ?? '' ), [ 'user', 'shared' ], 'user' ),
                'enabled' => ! array_key_exists( 'enabled', $profile ) || ! empty( $profile['enabled'] ),
            ];
        }
        $existing = BaseSettings::get_group( 'exchange', [] ) ?? [];
        $input = [
            'enabled' => ! empty( $input['enabled'] ),
            'default_sender' => sanitize_email( SanitizationHelper::text( $input['default_sender'] ?? '' ) ),
            'sender_profiles' => $profiles,
            'email_templates' => $this->sanitize_email_templates( $input['email_templates'] ?? [], $reset ),
            'email_global' => $this->sanitize_email_global( $input['email_global'] ?? [] ),
            'account' => is_array( $existing['account'] ?? null ) ? $existing['account'] : [],
            'sent_logs' => is_array( $existing['sent_logs'] ?? null ) ? $existing['sent_logs'] : [],
            'wordpress_mail_logs' => is_array( $existing['wordpress_mail_logs'] ?? null ) ? $existing['wordpress_mail_logs'] : [],
        ];
        BaseSettings::set_group( 'exchange', $input );
        return $input;
    }

    private function sanitize_email_templates( $templates, string $reset = '' ): array {
        $existing = BaseSettings::get_group( 'exchange', [] ) ?? [];
        $sanitized = is_array( $existing['email_templates'] ?? null ) ? $existing['email_templates'] : [];
        if ( preg_match( '/^(admin|comments|multisite|user):([a-z0-9_-]+)$/', $reset, $matches ) ) {
            unset( $sanitized[ $matches[1] ][ $matches[2] ] );
        }
        $catalogs = [
            'admin' => dirname( __DIR__, 2 ) . '/Templates/WP/AdminEmail.php',
            'comments' => dirname( __DIR__, 2 ) . '/Templates/WP/CommentsEmail.php',
            'multisite' => dirname( __DIR__, 2 ) . '/Templates/WP/MultisiteEmail.php',
            'user' => dirname( __DIR__, 2 ) . '/Templates/WP/UserEmail.php',
        ];
        foreach ( is_array( $templates ) ? $templates : [] as $category => $entries ) {
            $category = SanitizationHelper::key( $category );
            if ( ! in_array( $category, [ 'admin', 'comments', 'multisite', 'user' ], true ) || ! is_array( $entries ) ) {
                continue;
            }
            if ( 'multisite' === $category && ! is_multisite() ) {
                continue;
            }
            $catalog = is_readable( $catalogs[ $category ] ) ? require $catalogs[ $category ] : [];
            foreach ( $entries as $template_id => $entry ) {
                if ( ! is_array( $entry ) ) {
                    continue;
                }
                $template_id = SanitizationHelper::key( $template_id );
                if ( '' === $template_id || ! is_array( $catalog ) || ! array_key_exists( $template_id, $catalog ) ) {
                    continue;
                }
                $sanitized[ $category ][ $template_id ] = [
                    'sender' => sanitize_email( SanitizationHelper::text( $entry['sender'] ?? '' ) ),
                    'recipient' => SanitizationHelper::text( $entry['recipient'] ?? '' ),
                    'subject' => SanitizationHelper::text( $entry['subject'] ?? '' ),
                    'html' => wp_kses_post( wp_unslash( $entry['html'] ?? '' ) ),
                ];
            }
        }
        return $sanitized;
    }

    private function sanitize_email_global( $global ): array {
        $global = is_array( $global ) ? $global : [];
        $header = is_array( $global['header'] ?? null ) ? $global['header'] : [];
        $footer = is_array( $global['footer'] ?? null ) ? $global['footer'] : [];
        $sanitize_color = static function ( $value, string $fallback = '' ): string {
            $value = sanitize_hex_color( SanitizationHelper::text( $value ?? '' ) );
            return is_string( $value ) ? $value : $fallback;
        };
        $sanitize_integer = static function ( $value, int $fallback = 0 ): int {
            return max( 0, min( 200, SanitizationHelper::integer( $value ?? $fallback ) ) );
        };
        return [
            'header' => [
                'template' => SanitizationHelper::one_of( SanitizationHelper::key( $header['template'] ?? '' ), [ 'plain', 'brand', 'minimal' ], 'plain' ),
                'background' => $sanitize_color( $header['background'] ?? '', '#ffffff' ),
                'color' => $sanitize_color( $header['color'] ?? '', '#1d2327' ),
                'font' => SanitizationHelper::text( $header['font'] ?? 'Arial' ),
                'size' => $sanitize_integer( $header['size'] ?? 16, 16 ),
                'weight' => SanitizationHelper::one_of( SanitizationHelper::key( $header['weight'] ?? '' ), [ '400', '500', '600', '700' ], '600' ),
                'margin' => $sanitize_integer( $header['margin'] ?? 0 ),
                'padding' => $sanitize_integer( $header['padding'] ?? 24 ),
            ],
            'footer' => [
                'background' => $sanitize_color( $footer['background'] ?? '', '#f6f7f7' ),
                'html' => wp_kses_post( wp_unslash( $footer['html'] ?? '' ) ),
                'margin' => $sanitize_integer( $footer['margin'] ?? 0 ),
                'padding' => $sanitize_integer( $footer['padding'] ?? 24 ),
                'radius' => $sanitize_integer( $footer['radius'] ?? 0 ),
            ],
        ];
    }

    public function log_sent( array $entry ): void {
        $settings = BaseSettings::get_group( 'exchange', [] ) ?? [];
        $logs = is_array( $settings['sent_logs'] ?? null ) ? $settings['sent_logs'] : [];
        array_unshift( $logs, [
            'date' => current_time( 'mysql' ),
            'to' => SanitizationHelper::text( $entry['to'] ?? '' ),
            'subject' => SanitizationHelper::text( $entry['subject'] ?? '' ),
            'sender' => sanitize_email( $entry['sender'] ?? '' ),
        ] );
        BaseSettings::set_group( 'exchange', array_merge( $settings, [ 'sent_logs' => array_slice( $logs, 0, 200 ) ] ) );
    }

    public function log_wordpress_mail( array $mail_data ): void {
        $settings = BaseSettings::get_group( 'exchange', [] ) ?? [];
        $logs = is_array( $settings['wordpress_mail_logs'] ?? null ) ? $settings['wordpress_mail_logs'] : [];
        $recipients = is_array( $mail_data['to'] ?? null ) ? implode( ', ', $mail_data['to'] ) : (string) ( $mail_data['to'] ?? '' );
        array_unshift( $logs, [
            'date' => current_time( 'mysql' ),
            'to' => SanitizationHelper::text( $recipients ),
            'subject' => SanitizationHelper::text( $mail_data['subject'] ?? '' ),
        ] );
        BaseSettings::set_group( 'exchange', array_merge( $settings, [ 'wordpress_mail_logs' => array_slice( $logs, 0, 200 ) ] ) );
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
        }
        if ( $connect_url ) {
            echo '<a class="button button-primary" href="' . esc_url( $connect_url ) . '">' . esc_html( $connected ? __( 'Reconnect account', 'mspress' ) : __( 'Connect Microsoft 365 account', 'mspress' ) ) . '</a>';
        }
        echo '</div>';
        echo '<p class="description mt-2 mb-0">' . esc_html__( 'The connected account must also have Exchange access to any shared mailbox used for sending. Consent and mailbox delegation are separate from importing an address.', 'mspress' ) . '</p>';
    }

    public function save_connected_account( array $account ): void {
        $email = sanitize_email( SanitizationHelper::text( $account['email'] ?? '' ) );
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
            'user_id' => SanitizationHelper::text( $account['id'] ?? '' ),
            'display_name' => SanitizationHelper::text( $account['display_name'] ?? '' ),
            'tenant_id' => SanitizationHelper::text( $account['tenant_id'] ?? '' ),
            'access_token' => $encrypted_access,
            'refresh_token' => $encrypted_refresh,
            'expires' => SanitizationHelper::integer( $account['expires'] ?? 0 ),
        ];
        $saved = BaseSettings::set_group( 'exchange', $settings );
        \MSPress\Includes\Functions\Helpers\LoggerHelper::write_log( 'Exchange OAuth persistence completed: saved=' . ( $saved ? 'yes' : 'no' ) );
    }

    public function handle_oauth_connected( array $account ): void {
        $context = is_array( $account['oauth_context'] ?? null ) ? $account['oauth_context'] : [];
        if ( 'exchange_connect' !== ( $context['purpose'] ?? '' ) ) {
            return;
        }
        $this->save_connected_account( $account );
        $redirect_url = admin_url( 'admin.php?page=mspress-settings&tab=exchange-settings&exchange_connected=1' );
        if ( ! wp_safe_redirect( $redirect_url ) ) {
            wp_redirect( $redirect_url );
        }
        exit;
    }

    public function ajax_directory_mailboxes(): void {
        if ( ! AjaxHelper::authorized( 'mspress_exchange_settings', 'mspress_settings_plugins_int_edit' ) ) {
            AjaxHelper::unauthorized( __( 'You are not authorized to import Exchange mailboxes.', 'mspress' ) );
        }

        $settings = BaseSettings::get_group( 'exchange', [] ) ?? [];
        $account = is_array( $settings['account'] ?? null ) ? $settings['account'] : [];
        $token = GraphService::get_instance()->getAccessToken();
        if ( ! is_string( $token ) || '' === $token ) {
            wp_send_json_error( [ 'message' => __( 'Microsoft Graph application access is unavailable. Check the MSPress Microsoft 365 connection settings and application consent.', 'mspress' ) ], 400 );
        }

        $mailbox_url = 'https://graph.microsoft.com/v1.0/users?' . http_build_query( [
            '$select' => 'displayName,mail,userPrincipalName',
            '$top' => 999,
        ], '', '&', PHP_QUERY_RFC3986 );
        $response = $this->fetch_directory_mailboxes( $mailbox_url, $token );
        if ( ! $response['success'] ) {
            $error = (string) ( $response['error'] ?? 'Unknown Microsoft Graph error.' );
            \MSPress\Includes\Functions\Helpers\LoggerHelper::write_log( 'Exchange mailbox import failed: ' . $error );
            wp_send_json_error( [ 'message' => sprintf( __( 'Microsoft Graph could not return directory mailboxes: %s', 'mspress' ), $error ) ], 502 );
        }

        $body = json_decode( (string) $response['body'], true );
        $mailboxes = [];
        $known = array_map( 'strtolower', array_filter( array_map( 'sanitize_email', RequestHelper::array( $_POST, 'known' ) ), 'is_email' ) );
        foreach ( (array) ( $body['value'] ?? [] ) as $mailbox ) {
            $address = sanitize_email( SanitizationHelper::text( $mailbox['mail'] ?? $mailbox['userPrincipalName'] ?? '' ) );
            if ( ! is_email( $address ) || in_array( strtolower( $address ), $known, true ) ) {
                continue;
            }
            $mailboxes[] = [
                'email' => $address,
                'name' => SanitizationHelper::text( $mailbox['displayName'] ?? '' ),
                'type' => 'user',
            ];
        }
        wp_send_json_success( [ 'mailboxes' => $mailboxes ] );
    }

    /**
        * Retrieve directory users with the application access token using cURL.
     *
     * @return array{success: bool, body?: string, error?: string}
     */
    private function fetch_directory_mailboxes( string $url, string $token ): array {
        if ( ! function_exists( 'curl_init' ) ) {
            return [ 'success' => false, 'error' => 'PHP cURL extension is unavailable.' ];
        }

        $parts = wp_parse_url( $url );
        if ( ! is_array( $parts ) || 'https' !== strtolower( (string) ( $parts['scheme'] ?? '' ) ) || 'graph.microsoft.com' !== strtolower( (string) ( $parts['host'] ?? '' ) ) ) {
            return [ 'success' => false, 'error' => 'Invalid Microsoft Graph directory URL.' ];
        }

        $handle = curl_init( $url );
        if ( false === $handle ) {
            return [ 'success' => false, 'error' => 'Could not initialize cURL.' ];
        }

        curl_setopt_array( $handle, [
            CURLOPT_HTTPGET => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
            CURLOPT_USERAGENT => 'MSPress/1.0',
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $token,
                'Accept: application/json',
            ],
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2 | CURL_SSLVERSION_MAX_TLSv1_2,
        ] );

        $body = curl_exec( $handle );
        $curl_error = curl_error( $handle );
        $status_code = (int) curl_getinfo( $handle, CURLINFO_HTTP_CODE );
        curl_close( $handle );

        if ( false === $body ) {
            return [ 'success' => false, 'error' => 'cURL error: ' . ( $curl_error ?: 'Unknown transport error.' ) ];
        }

        if ( 200 !== $status_code ) {
            $error_body = json_decode( (string) $body, true );
            $graph_error = is_array( $error_body['error'] ?? null ) ? $error_body['error'] : [];
            $error_code = (string) ( $graph_error['code'] ?? 'HTTP ' . $status_code );
            $error_message = (string) ( $graph_error['message'] ?? 'No Graph error details returned.' );
            return [ 'success' => false, 'error' => $error_code . ': ' . $error_message ];
        }

        return [ 'success' => true, 'body' => (string) $body ];
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