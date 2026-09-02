<?php

namespace MSPress\Includes\Plugins\Onedrive\Includes\OneDrive;

final class OneDriveOAuthController {
    public function register(): void {
        add_rewrite_rule( '^ms-onedrive-oauth-callback/?$', 'index.php?mspress_onedrive_oauth=1', 'top' );
        add_filter( 'query_vars', [ $this, 'query_vars' ] );
        add_action( 'template_redirect', [ $this, 'handle_callback' ] );
        add_action( 'wp_ajax_mspress_onedrive_authorize', [ $this, 'authorize' ] );
    }

    public function query_vars( array $vars ): array {
        $vars[] = 'mspress_onedrive_oauth';
        return $vars;
    }

    public function authorize(): void {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( [ 'message' => __( 'You are not allowed to connect OneDrive.', 'mspress' ) ], 403 );
        }

        try {
            $service = $this->service();
            wp_redirect( $service->get_authorization_url() );
            exit;
        } catch ( \Throwable $exception ) {
            wp_send_json_error( [ 'message' => __( 'OneDrive authorization is not configured.', 'mspress' ) ], 500 );
        }
    }

    public function handle_callback(): void {
        if ( ! get_query_var( 'mspress_onedrive_oauth' ) ) {
            return;
        }

        if ( ! is_user_logged_in() || ! current_user_can( 'manage_options' ) ) {
            wp_die( esc_html__( 'You are not allowed to connect OneDrive.', 'mspress' ), '', [ 'response' => 403 ] );
        }

        $code = isset( $_GET['code'] ) ? sanitize_text_field( wp_unslash( $_GET['code'] ) ) : '';
        $state = isset( $_GET['state'] ) ? sanitize_text_field( wp_unslash( $_GET['state'] ) ) : '';
        $error = isset( $_GET['error'] ) ? sanitize_text_field( wp_unslash( $_GET['error'] ) ) : '';

        if ( $error !== '' || $code === '' || $state === '' ) {
            wp_die( esc_html__( 'OneDrive authorization was not completed. Please try again.', 'mspress' ) );
        }

        try {
            $this->service()->handle_callback( $code, $state );
            wp_safe_redirect( admin_url( 'admin.php?page=onedrive&onedrive_connected=1' ) );
            exit;
        } catch ( \Throwable $exception ) {
            wp_die( esc_html__( 'OneDrive authorization could not be completed. Please authorize the connection again.', 'mspress' ) );
        }
    }

    private function service(): OneDriveOAuthService {
        $graph = \MSPress\Includes\MSGraph\GraphService::get_instance();
        return new OneDriveOAuthService( $graph, new OneDriveTokenService( $graph ) );
    }
}
