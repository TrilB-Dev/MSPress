<?php
/**
 * Settings for the Exchange plugin.
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Includes
 * @since 1.0.0
 */
namespace MSPress\Includes\Plugins\Exchange\Includes\Settings;
use Http\Promise\FulfilledPromise;
use Http\Promise\RejectedPromise;
use Microsoft\Kiota\Abstractions\Authentication\AccessTokenProvider;
use Microsoft\Kiota\Abstractions\Authentication\AllowedHostsValidator;
use Microsoft\Kiota\Abstractions\Authentication\BaseBearerTokenAuthenticationProvider;
use Microsoft\Kiota\Http\GuzzleRequestAdapter;
use MSPress\Includes\Settings\Settings as BaseSettings;
use MSPress\Includes\Functions\Helpers\SanitizationHelper;
use MSPress\Includes\Functions\Helpers\EncryptionHelper;
use MSPress\Includes\Functions\Helpers\FormFieldHelper;
use MSPress\Includes\Functions\Helpers\AjaxHelper;
use MSPress\Includes\Functions\Helpers\PermissionHelper;
use MSPress\Includes\Functions\Helpers\MSIconHelper;
use MSPress\Includes\Functions\Helpers\RequestHelper;
use MSPress\Includes\MSGraph\GraphService;
use MSPress\Includes\Plugins\Exchange\Admin\ExchangeSettings;
use MSPress\Includes\Plugins\Exchange\Includes\Kiota\Exchange;
use MSPress\Includes\Plugins\Exchange\Includes\Mail\ExchangeDiscovery;

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
        add_action( 'wp_ajax_mspress_exchange_validate_mailbox', [ $this, 'ajax_validate_mailbox' ] );
        add_action( 'wp_ajax_mspress_exchange_save_profile', [ $this, 'ajax_save_profile' ] );
        add_action( 'admin_post_mspress_exchange_save_settings', [ $this, 'save_admin_settings' ] );
        add_action( 'wp_mail_succeeded', [ $this, 'log_wordpress_mail' ] );
        add_filter( 'mspress_graph_oauth_redirect', [ $this, 'filter_oauth_redirect' ], 10, 2 );
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
            'settings_group' => 'exchange',
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
                    'slug' => 'exchange-trace-route',
                    'label' => __( 'Route Trace', 'mspress' ),
                    'title' => __( 'Exchange route trace', 'mspress' ),
                    'capability' => 'mspress_tools_debug',
                    'render_page' => [ \MSPress\Includes\Plugins\Exchange\Admin\TraceRoute::class, 'render' ],
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
        $connect_url = $oauth ? $oauth->get_authorization_url( null, [ 'purpose' => 'exchange_connect' ], 'openid profile email offline_access User.Read.All Mail.Read.Shared' ) : '';

        ?>
        <div class="d-flex flex-wrap align-items-center gap-3">
            <span class="badge <?php echo esc_attr( $connected ? 'text-bg-success' : 'text-bg-secondary' ); ?>">
                <?php echo esc_html( $connected ? __( 'Connected', 'mspress' ) : __( 'Not connected', 'mspress' ) ); ?>
            </span>
        <?php
        if ( $connected ) {
            ?>
            <strong><?php echo esc_html( $email ); ?></strong>
            <?php
        }
        if ( $connect_url ) {
            ?>
            <a
                class="btn <?php echo esc_attr( $connected ? 'btn-success' : 'btn-primary' ); ?> mspress-exchange-connect-button"
                href="<?php echo esc_url( $connect_url ); ?>"
            >
                <img
                    class="mspress-button-icon"
                    src="<?php echo esc_url( MSIconHelper::get_icon( 'exchange', 'svg' ) ); ?>"
                    aria-hidden="true"
                    height="30"
                    width="30"
                >
                <?php echo esc_html( $connected ? __( 'Reconnect account', 'mspress' ) : __( 'Connect Microsoft 365 account', 'mspress' ) ); ?>
            </a>
            <?php
        }
        ?>
        </div>
        <p class="description mt-2 mb-0">
            <?php esc_html_e( 'The connected account must also have Exchange access to any shared mailbox used for sending. Consent and mailbox delegation are separate from importing an address.', 'mspress' ); ?>
        </p>
        <?php
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
        $settings['sender_profiles'] = $this->add_profile( $settings['sender_profiles'] ?? [], $email, $account['display_name'] ?? '', 'user' );
        $saved = BaseSettings::set_group( 'exchange', $settings );
        \MSPress\Includes\Functions\Helpers\LoggerHelper::write_log( 'Exchange OAuth persistence completed: saved=' . ( $saved ? 'yes' : 'no' ) );
    }

    public function handle_oauth_connected( array $account ): void {
        $context = is_array( $account['oauth_context'] ?? null ) ? $account['oauth_context'] : [];
        if ( 'exchange_connect' !== ( $context['purpose'] ?? '' ) ) {
            return;
        }

        $this->save_connected_account( $account );
    }

    public function filter_oauth_redirect( string $redirect_url, array $account ): string {
        $context = is_array( $account['oauth_context'] ?? null ) ? $account['oauth_context'] : [];
        if ( 'exchange_connect' === ( $context['purpose'] ?? '' ) ) {
            return admin_url( 'admin.php?page=mspress-settings&tab=exchange-settings&exchange_connected=1' );
        }

        return $redirect_url;
    }

    public function ajax_directory_mailboxes(): void {
        if ( ! AjaxHelper::authorized( 'mspress_exchange_settings', 'mspress_settings_plugins_int_edit' ) ) {
            AjaxHelper::unauthorized( __( 'You are not authorized to import Exchange mailboxes.', 'mspress' ) );
        }

        $settings = BaseSettings::get_group( 'exchange', [] ) ?? [];
        $account = is_array( $settings['account'] ?? null ) ? $settings['account'] : [];
        $token = EncryptionHelper::decrypt( (string) ( $account['access_token'] ?? '' ) );
        if ( ! is_string( $token ) || '' === $token ) {
            wp_send_json_error( [ 'message' => __( 'The connected Microsoft 365 account does not have a usable access token. Reconnect the account and try again.', 'mspress' ) ], 400 );
        }

        try {
            $token_provider = new class( $token ) implements AccessTokenProvider {
                private AllowedHostsValidator $allowed_hosts_validator;

                public function __construct( private string $token ) {
                    $this->allowed_hosts_validator = new AllowedHostsValidator( [ 'graph.microsoft.com' ] );
                }

                public function getAuthorizationTokenAsync( string $url, array $additionalAuthenticationContext = [] ): \Http\Promise\Promise {
                    if ( ! $this->allowed_hosts_validator->isUrlHostValid( $url ) ) {
                        return new RejectedPromise( new \InvalidArgumentException( 'Host not allowed for Graph token requests.' ) );
                    }

                    return new FulfilledPromise( $this->token );
                }

                public function getAllowedHostsValidator(): AllowedHostsValidator {
                    return $this->allowed_hosts_validator;
                }
            };
            $authentication_provider = new BaseBearerTokenAuthenticationProvider( $token_provider );
            $request_adapter = new GuzzleRequestAdapter(
                $authentication_provider,
                null,
                null,
                new \GuzzleHttp\Client( \MSPress\Includes\MSGraph\TlsTransport::guzzle_options() )
            );
            $graph = new Exchange( $request_adapter );
            $exchange_settings = $graph->me()->settings()->exchange()->get()->wait();
        } catch ( \Throwable $exception ) {
            $error = $exception->getMessage();
            \MSPress\Includes\Functions\Helpers\LoggerHelper::write_log( 'Exchange mailbox import failed: ' . $error );
            wp_send_json_error( [ 'message' => __( 'Microsoft Graph could not return the connected user Exchange settings. Reconnect the account and try again.', 'mspress' ) ], 502 );
        }

        $email = EncryptionHelper::decrypt( (string) ( $account['email'] ?? '' ) );
        $known = array_map( 'strtolower', array_filter( array_map( 'sanitize_email', RequestHelper::array( $_POST, 'known' ) ), 'is_email' ) );
        if ( ! $exchange_settings || ! $exchange_settings->getPrimaryMailboxId() ) {
            wp_send_json_success( [ 'mailboxes' => [], 'reason' => 'no_exchange_mailbox' ] );
        }
        if ( ! is_string( $email ) || ! is_email( $email ) ) {
            wp_send_json_success( [ 'mailboxes' => [], 'reason' => 'invalid_connected_account' ] );
        }
        if ( in_array( strtolower( $email ), $known, true ) ) {
            wp_send_json_success( [ 'mailboxes' => [], 'reason' => 'already_configured' ] );
        }

        $mailboxes = [
            [
                'email' => sanitize_email( $email ),
                'name' => SanitizationHelper::text( $account['display_name'] ?? '' ),
                'type' => 'user',
            ],
        ];
        wp_send_json_success( [ 'mailboxes' => $mailboxes ] );
    }

    public function ajax_validate_mailbox(): void {
        if ( ! AjaxHelper::authorized( 'mspress_exchange_settings', 'mspress_settings_plugins_int_edit' ) ) {
            AjaxHelper::unauthorized( __( 'You are not authorized to validate Exchange mailboxes.', 'mspress' ) );
        }
        $email = sanitize_email( SanitizationHelper::text( $_POST['email'] ?? '' ) );
        $graph = $this->get_delegated_graph();
        if ( ! $graph ) {
            wp_send_json_error( [ 'message' => __( 'Reconnect the Microsoft 365 account before validating a mailbox.', 'mspress' ) ], 400 );
        }
        $result = ExchangeDiscovery::validate( $graph, $email );
        if ( empty( $result['valid'] ) ) {
            wp_send_json_error( [ 'message' => 'access_denied' === ( $result['reason'] ?? '' ) ? __( 'The mailbox was found, but the connected account does not have permission to use it. Ensure the account has Send As or Full Access to the mailbox.', 'mspress' ) : __( 'The mailbox address could not be found.', 'mspress' ) ], 400 );
        }
        wp_send_json_success( [ 'email' => $result['email'], 'name' => $result['name'] ] );
    }

    public function ajax_save_profile(): void {
        if ( ! AjaxHelper::authorized( 'mspress_exchange_settings', 'mspress_settings_plugins_int_edit' ) ) {
            AjaxHelper::unauthorized( __( 'You are not authorized to save sender profiles.', 'mspress' ) );
        }
        $email = sanitize_email( SanitizationHelper::text( $_POST['email'] ?? '' ) );
        $name = SanitizationHelper::text( $_POST['name'] ?? '' );
        $type = SanitizationHelper::one_of( SanitizationHelper::key( $_POST['type'] ?? 'user' ), [ 'user', 'shared' ], 'user' );
        $graph = $this->get_delegated_graph();
        if ( ! $graph ) {
            wp_send_json_error( [ 'message' => __( 'Reconnect the Microsoft 365 account before saving a profile.', 'mspress' ) ], 400 );
        }
        $validation = ExchangeDiscovery::validate( $graph, $email );
        if ( empty( $validation['valid'] ) ) {
            wp_send_json_error( [ 'message' => __( 'Validate the mailbox before saving the sender profile.', 'mspress' ) ], 400 );
        }
        $settings = BaseSettings::get_group( 'exchange', [] ) ?? [];
        $settings['sender_profiles'] = $this->add_profile( $settings['sender_profiles'] ?? [], $validation['email'], $name ?: $validation['name'], $type );
        BaseSettings::set_group( 'exchange', $settings );
        wp_send_json_success( [ 'message' => __( 'Sender profile saved.', 'mspress' ) ] );
    }

    private function add_profile( $profiles, string $email, string $name, string $type ): array {
        $email = sanitize_email( $email );
        foreach ( (array) $profiles as $profile ) {
            $existing = EncryptionHelper::decrypt( (string) ( $profile['address'] ?? '' ) );
            if ( is_string( $existing ) && strtolower( $existing ) === strtolower( $email ) ) {
                return (array) $profiles;
            }
        }
        $encrypted = EncryptionHelper::encrypt( $email );
        if ( null === $encrypted ) {
            return (array) $profiles;
        }
        $profiles[] = [ 'address' => $encrypted, 'name' => SanitizationHelper::text( $name ), 'type' => $type, 'enabled' => true ];
        return $profiles;
    }

    private function get_delegated_graph(): ?Exchange {
        try {
            $settings = BaseSettings::get_group( 'exchange', [] ) ?? [];
            $account = is_array( $settings['account'] ?? null ) ? $settings['account'] : [];
            $token = EncryptionHelper::decrypt( (string) ( $account['access_token'] ?? '' ) );
            if ( ! is_string( $token ) || '' === $token ) {
                return null;
            }
            $token_provider = new class( $token ) implements AccessTokenProvider {
                private AllowedHostsValidator $allowed_hosts_validator;
                public function __construct( private string $token ) { $this->allowed_hosts_validator = new AllowedHostsValidator( [ 'graph.microsoft.com' ] ); }
                public function getAuthorizationTokenAsync( string $url, array $additionalAuthenticationContext = [] ): \Http\Promise\Promise { return $this->allowed_hosts_validator->isUrlHostValid( $url ) ? new FulfilledPromise( $this->token ) : new RejectedPromise( new \InvalidArgumentException( 'Host not allowed.' ) ); }
                public function getAllowedHostsValidator(): AllowedHostsValidator { return $this->allowed_hosts_validator; }
            };
            return new Exchange( new GuzzleRequestAdapter( new BaseBearerTokenAuthenticationProvider( $token_provider ), null, null, new \GuzzleHttp\Client( \MSPress\Includes\MSGraph\TlsTransport::guzzle_options() ) ) );
        } catch ( \Throwable $exception ) {
            return null;
        }
    }

    public function render_profiles( $value ): void {
        $profiles = is_array( $value ) ? $value : [];
        if ( ! $profiles ) {
            ?>
            <p class="text-secondary mb-0">
                <?php esc_html_e( 'No sender profiles configured yet.', 'mspress' ); ?>
            </p>
            <?php
            return;
        }

        ?>
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th>
                            <?php esc_html_e( 'Email', 'mspress' ); ?>
                        </th>
                        <th>
                            <?php esc_html_e( 'Name', 'mspress' ); ?>
                        </th>
                        <th>
                            <?php esc_html_e( 'Type', 'mspress' ); ?>
                        </th>
                        <th>
                            <?php esc_html_e( 'Enabled', 'mspress' ); ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ( $profiles as $index => $profile ) {
            if ( ! is_array( $profile ) ) {
                continue;
            }
            $email = EncryptionHelper::decrypt( (string) ( $profile['address'] ?? $profile['email'] ?? '' ) );
            $prefix = 'settings[sender_profiles][' . absint( $index ) . ']';
            ?>
                    <tr>
                        <td>
                            <?php
                            echo FormFieldHelper::input(
                                $prefix . '[email]',
                                is_string( $email ) ? $email : '',
                                [
                                    'type' => 'email',
                                    'class' => 'form-control',
                                ]
                            );
                            ?>
                        </td>
                        <td>
                            <?php
                            echo FormFieldHelper::input(
                                $prefix . '[name]',
                                (string) ( $profile['name'] ?? '' ),
                                [
                                    'type' => 'text',
                                    'class' => 'form-control',
                                ]
                            );
                            ?>
                        </td>
                        <td>
                            <?php
                            echo FormFieldHelper::select(
                                $prefix . '[type]',
                                [
                                    'user' => __( 'User', 'mspress' ),
                                    'shared' => __( 'Shared mailbox', 'mspress' ),
                                ],
                                (string) ( $profile['type'] ?? 'user' ),
                                [ 'class' => 'form-select' ]
                            );
                            ?>
                        </td>
                        <td>
                            <?php
                            echo FormFieldHelper::checkbox(
                                $prefix . '[enabled]',
                                '1',
                                '',
                                [
                                    'checked' => ! empty( $profile['enabled'] ),
                                    'class' => 'form-check-input',
                                ]
                            );
                            ?>
                        </td>
                    </tr>
            <?php
        }
        ?>
                </tbody>
            </table>
        </div>
        <?php
    }
}