<?php
/**
 * OAuthController class for handling Microsoft OAuth callbacks in the MSPress plugin.
 *
 * @package MSPress
 */
namespace MSPress\Includes\MSGraph;

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
        if ( ! get_query_var( 'mspress_ms_oauth' ) ) {
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
            if ( $oauth_service === null ) {
                wp_die( esc_html__( 'Microsoft sign-in is not configured. Please try again later.', 'mspress' ) );
            }

            $user_data = $oauth_service->handle_oauth_callback( $code, $state );
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
            wp_die( esc_html__( 'Microsoft sign-in could not be completed. Please try again.', 'mspress' ) );
        }
    }
}