<?php
/**
 * DebugManager class for MSPress plugin.
 * 
 * @package MSPress
 * @subpackage Admin\Manager\Tools
 * @since 1.0.0
 */
namespace MSPress\Admin\Manager\Tools;

use MSPress\Admin\Manager\Manager;
use MSPress\Includes\Functions\Helpers\FormFieldHelper;
use MSPress\Includes\MSGraph\GraphService;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class DebugManager extends Manager {
    /**
     * Constructor for the DebugManager class.
     *
     * @since 1.0.0
     */
    public function __construct() {
    }
    /**
     * Render the debug settings page content.
     *
     * @return void
     */
    public function render_page_content(): void {
        $diagnostics = null;
        if ( isset( $_POST['mspress_run_graph_diagnostics'] ) ) {
            if ( ! current_user_can( 'mspress_tools_debug' ) || ! check_admin_referer( 'mspress_run_graph_diagnostics', 'mspress_graph_diagnostics_nonce' ) ) {
                wp_die( esc_html__( 'You are not authorized to run Microsoft Graph diagnostics.', 'mspress' ) );
            }

            try {
                $graph = GraphService::get_instance();
                $diagnostics_service = $graph->get_diagnostics();
                $diagnostics = $diagnostics_service->test_direct_curl_connection();
                $diagnostics['diagnostics'] = array_merge(
                    is_array( $diagnostics['diagnostics'] ?? null ) ? $diagnostics['diagnostics'] : [],
                    [
                        'graph_initialization_error' => $graph->get_connection_error() ?: 'none',
                        'token_endpoint_probe' => $diagnostics_service->probe_token_endpoint( (string) $graph->get_tenant_id() ),
                        'dns_context' => $diagnostics_service->get_dns_context_summary( [ 'login.microsoftonline.com', 'graph.microsoft.com' ] ),
                        'proxy_context' => $diagnostics_service->get_proxy_context_summary(),
                        'http_hook_context' => $diagnostics_service->get_http_hook_context_summary(),
                    ]
                );
            } catch ( \Throwable $error ) {
                $diagnostics = [
                    'success' => false,
                    'message' => __( 'The diagnostics could not be completed.', 'mspress' ),
                    'trace' => [ $error->getMessage() ],
                ];
            }
        }
        ?>
        <?php if ( is_array( $diagnostics ) ) : ?>
            <div class="notice <?php echo ! empty( $diagnostics['success'] ) ? 'notice-success' : 'notice-error'; ?> is-dismissible">
                <p><strong><?php echo esc_html( $diagnostics['message'] ?? __( 'Diagnostics completed.', 'mspress' ) ); ?></strong></p>
            </div>
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h2 class="h5"><?php esc_html_e( 'Microsoft Graph diagnostic trace', 'mspress' ); ?></h2>
                    <?php if ( ! empty( $diagnostics['trace'] ) && is_array( $diagnostics['trace'] ) ) : ?>
                        <pre class="bg-light border rounded p-3 mb-3" style="white-space: pre-wrap;"><?php echo esc_html( implode( "\n", array_map( 'strval', $diagnostics['trace'] ) ) ); ?></pre>
                    <?php endif; ?>
                    <?php if ( ! empty( $diagnostics['diagnostics'] ) && is_array( $diagnostics['diagnostics'] ) ) : ?>
                        <dl class="row mb-0">
                            <?php foreach ( $diagnostics['diagnostics'] as $key => $value ) : ?>
                                <dt class="col-sm-4 text-break"><?php echo esc_html( (string) $key ); ?></dt>
                                <dd class="col-sm-8 text-break"><?php echo esc_html( is_array( $value ) ? wp_json_encode( $value ) : (string) $value ); ?></dd>
                            <?php endforeach; ?>
                        </dl>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h2 class="h5"><?php esc_html_e( 'Microsoft Graph diagnostics', 'mspress' ); ?></h2>
                <p class="text-secondary"><?php esc_html_e( 'Test the configured application credentials against Microsoft Entra over TLS 1.2. The test does not display credentials or tokens.', 'mspress' ); ?></p>
                <form method="post" action="<?php echo esc_url( admin_url( 'admin.php?page=mspress-tools&tool=debug' ) ); ?>">
                    <?php wp_nonce_field( 'mspress_run_graph_diagnostics', 'mspress_graph_diagnostics_nonce' ); ?>
                    <input type="hidden" name="mspress_run_graph_diagnostics" value="1" />
                    <?php echo FormFieldHelper::button( __( 'Run Graph diagnostics', 'mspress' ), [ 'type' => 'submit', 'class' => 'btn-primary' ] ); ?>
                </form>
                <p class="small text-secondary mt-3 mb-0"><?php esc_html_e( 'A successful result confirms token acquisition, but does not test delegated OAuth mailbox access.', 'mspress' ); ?></p>
            </div>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="h5"><?php esc_html_e( 'Debug logging', 'mspress' ); ?></h2>
                <p class="text-secondary"><?php esc_html_e( 'Configure diagnostic logging from the Tools settings tab.', 'mspress' ); ?></p>
                <a class="btn btn-primary" href="<?php echo esc_url( admin_url( 'admin.php?page=mspress-settings&tab=tools' ) ); ?>"><?php esc_html_e( 'Open Tools Settings', 'mspress' ); ?></a>
            </div>
        </div>
        <?php
    }

    /**
     * Render debug-related settings fields.
     *
     * @param array<string, mixed> $values Current settings.
     * @return void
     */
    public function render( array $values ): void {
        $field_id = 'mspress-debug-logging';
        $field = [
            'description' => __( 'Write diagnostic information to the WordPress debug log.', 'mspress' ),
            'tooltip' => __( 'Enable this only while investigating a problem, because logs can grow over time.', 'mspress' ),
            'tooltip_type' => 'info',
        ];
        echo '<tr><th scope="row">' . wp_kses_post( FormFieldHelper::label( $field_id, __( 'Debug logging', 'mspress' ), $field ) ) . '</th><td>' . wp_kses_post( FormFieldHelper::checkbox( 'mspress_tools[debug_logging]', '1', __( 'Enable MSPress debug logging', 'mspress' ), [ 'id' => $field_id, 'checked' => ! empty( $values['debug_logging'] ) ] ) ) . '</td></tr>';

        $field_id = 'mspress-console-logging';
        $field = [
            'description' => __( 'Write diagnostic information to the browser console.', 'mspress' ),
            'tooltip' => __( 'Use this during frontend troubleshooting and disable it afterward.', 'mspress' ),
        ];
        echo '<tr><th scope="row">' . wp_kses_post( FormFieldHelper::label( $field_id, __( 'Console logging', 'mspress' ), $field ) ) . '</th><td>' . wp_kses_post( FormFieldHelper::checkbox( 'mspress_tools[console_logging]', '1', __( 'Enable browser console logging', 'mspress' ), [ 'id' => $field_id, 'checked' => ! empty( $values['console_logging'] ) ] ) ) . '</td></tr>';
    }
}