<?php
/**
 * OAuthController class for handling Microsoft OAuth callbacks in the MSPress plugin.
 *
 * @package MSPress
 */
namespace MSPress\Includes\MSGraph;

use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use MSPress\Includes\MSGraph\GraphService;

final class OAuthController {
    /**
     * Register the OAuth callback route and query variable.
     */
    public function register(): void {
        $this->register_route();
        add_filter( 'query_vars', [ $this, 'query_vars' ] );
        add_action( 'template_redirect', [ $this, 'handle_callback' ] );
    }
    /**
     * Register the rewrite rule for the OAuth callback.
     */
    public function register_route(): void {
        add_rewrite_rule( '^ms-oauth-callback/?$', 'index.php?mspress_ms_oauth=1', 'top' );
    }
    /**
     * Add the custom query variable for the OAuth callback.
     *
     * @param array $vars The existing query variables.
     * @return array The modified query variables including 'mspress_ms_oauth'.
     */
    public function query_vars( array $vars ): array {
        $vars[] = 'mspress_ms_oauth';
        return $vars;
    }
    /**
     * Handle the OAuth callback from Microsoft.
     *
     * This method processes the OAuth callback, retrieves user information,
     * and logs the user in or creates a new user if necessary.
     */
    public function handle_callback(): void {
        if ( ! $this->is_callback_request() ) {
            return;
        }

        $code = isset( $_GET['code'] ) ? sanitize_text_field( wp_unslash( $_GET['code'] ) ) : '';
        $state = isset( $_GET['state'] ) ? sanitize_text_field( wp_unslash( $_GET['state'] ) ) : '';
        $error = isset( $_GET['error'] ) ? sanitize_text_field( wp_unslash( $_GET['error'] ) ) : '';

        if ( $error !== '' || $code === '' || $state === '' ) {
            wp_die( esc_html__( 'Microsoft sign-in was not completed. Please try again.', 'mspress' ) );
        }

        try {
            $oauth_service = GraphService::get_instance()->get_oauth_service();
            \MSPress\Includes\Functions\Helpers\LoggerHelper::write_log( 'MSGraph OAuth controller: service=' . ( $oauth_service ? 'available' : 'unavailable' ) . ', code_present=' . ( $code !== '' ? 'yes' : 'no' ) . ', state_present=' . ( $state !== '' ? 'yes' : 'no' ) );
            if ( $oauth_service === null ) {
                wp_die( esc_html__( 'Microsoft sign-in is not configured. Please try again later.', 'mspress' ) );
            }

            $user_data = $oauth_service->handle_oauth_callback( $code, $state );
            do_action( 'mspress_graph_oauth_connected', $user_data );
            $email = sanitize_email( $user_data['email'] ?? '' );

            if ( $email === '' || ! is_email( $email ) ) {
                wp_die( esc_html__( 'Could not retrieve a valid email address from Microsoft.', 'mspress' ) );
            }

            $user = get_user_by( 'email', $email );
            if ( ! $user ) {
                $username = sanitize_user( strstr( $email, '@', true ) ?: 'mspress-user', true );
                $base_username = $username ?: 'mspress-user';
                $suffix = 1;
                while ( username_exists( $username ) ) {
                    $username = $base_username . $suffix++;
                }

                $user_id = wp_create_user( $username, wp_generate_password(), $email );
                if ( is_wp_error( $user_id ) ) {
                    wp_die( esc_html( $user_id->get_error_message() ) );
                }

                wp_update_user( [
                    'ID' => $user_id,
                    'display_name' => sanitize_text_field( $user_data['display_name'] ?? '' ),
                    'first_name' => sanitize_text_field( $user_data['first_name'] ?? '' ),
                    'last_name' => sanitize_text_field( $user_data['last_name'] ?? '' ),
                ] );
                $user = get_user_by( 'id', $user_id );
            }

            wp_set_current_user( $user->ID, $user->user_login );
            wp_set_auth_cookie( $user->ID, true );
            do_action( 'wp_login', $user->user_login, $user );
            wp_safe_redirect( admin_url() );
            exit;
        } catch ( \Throwable $exception ) {
            if ( isset( $oauth_service ) && $oauth_service instanceof OAuthService ) {
                $oauth_service->clear_oauth_transaction();
            }
            $last_response = isset( $oauth_service ) && $oauth_service instanceof OAuthService
                ? $oauth_service->get_last_oauth_response()
                : null;
            $details = $this->format_oauth_error_details( $exception, $last_response );
            \MSPress\Includes\Functions\Helpers\LoggerHelper::write_log( 'MSGraph OAuth controller error: ' . $details );
            wp_die(
                '<p>' . esc_html( __( 'Microsoft sign-in could not be completed.', 'mspress' ) ) . '</p>' .
                '<p>' . esc_html( __( 'Return to the Exchange settings page and start a new connection. If this continues, verify the Microsoft app registration and consent settings.', 'mspress' ) ) . '</p>' .
                '<p>' . esc_html( __( 'Full authorization server response:', 'mspress' ) ) . '</p>' .
                '<pre style="white-space: pre-wrap; overflow-wrap: anywhere;">' . esc_html( $details ) . '</pre>'
            );
        }
    }

    /**
     * Format the complete OAuth exception details without exposing secrets.
     *
     * @param \Throwable $exception The OAuth exception.
     * @return string Safe diagnostic details.
     */
    private function format_oauth_error_details( \Throwable $exception, ?array $last_response = null ): string {
        $details = [
            'exception_type' => get_class( $exception ),
            'error_code' => $exception->getCode(),
            'error_message' => $exception->getMessage(),
        ];

        if ( $exception instanceof IdentityProviderException ) {
            $response = $exception->getResponseBody();
            if ( is_string( $response ) ) {
                $decoded = json_decode( $response, true );
                $details['authorization_server_response'] = is_array( $decoded ) ? $decoded : $response;
            } else {
                $details['authorization_server_response'] = $response;
            }
        }

        if ( is_array( $last_response ) ) {
            $details['authorization_server_request_method'] = $last_response['request_method'] ?? null;
            $details['authorization_server_request_url'] = $last_response['request_url'] ?? null;
            $details['authorization_server_request_headers'] = $last_response['request_headers'] ?? [];
            $details['authorization_server_http_status'] = $last_response['status'] ?? null;
            $details['authorization_server_content_type'] = $last_response['content_type'] ?? null;
            $details['authorization_server_headers'] = $last_response['headers'] ?? [];
            $details['authorization_server_raw_response'] = $last_response['body'] ?? '';
        }

        $safe_details = $this->redact_oauth_error_values( $details );
        $formatted = wp_json_encode( $safe_details, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES );

        return is_string( $formatted ) ? $formatted : print_r( $safe_details, true );
    }

    /**
     * Redact sensitive values from OAuth error details recursively.
     *
     * @param mixed $value Value to sanitize.
     * @return mixed Sanitized value.
     */
    private function redact_oauth_error_values( $value ) {
        $sensitive_keys = [ 'access_token', 'refresh_token', 'client_secret', 'id_token', 'token', 'code' ];
        if ( is_array( $value ) ) {
            $sanitized = [];
            foreach ( $value as $key => $item ) {
                $sanitized[ $key ] = in_array( strtolower( (string) $key ), $sensitive_keys, true )
                    ? '[redacted]'
                    : $this->redact_oauth_error_values( $item );
            }
            return $sanitized;
        }

        if ( is_string( $value ) ) {
            return (string) preg_replace(
                '/(["\']?(?:access_token|refresh_token|client_secret|id_token|token|code)["\']?\s*[:=]\s*["\'])(.*?)(["\'])/i',
                '$1[redacted]$3',
                $value
            );
        }

        return $value;
    }

    /**
     * Determine whether the current request is the Microsoft callback.
     *
     * The path fallback keeps the callback usable until rewrite rules are
     * refreshed after plugin activation or a site permalink change.
     */
    private function is_callback_request(): bool {
        if ( get_query_var( 'mspress_ms_oauth' ) ) {
            return true;
        }

        $request_path = wp_parse_url( wp_unslash( $_SERVER['REQUEST_URI'] ?? '' ), PHP_URL_PATH );
        $callback_path = wp_parse_url( self::callback_url(), PHP_URL_PATH );

        return is_string( $request_path ) && is_string( $callback_path ) && untrailingslashit( $request_path ) === untrailingslashit( $callback_path );
    }

    private static function callback_url(): string {
        return home_url( '/ms-oauth-callback' );
    }
}