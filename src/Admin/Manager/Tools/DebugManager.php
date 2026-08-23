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
        echo '<div class="card shadow-sm"><div class="card-body"><h2 class="h5">' . esc_html__( 'Debug logging', 'mspress' ) . '</h2><p class="text-secondary">' . esc_html__( 'Configure diagnostic logging from the Tools settings tab.', 'mspress' ) . '</p><a class="btn btn-primary" href="' . esc_url( admin_url( 'admin.php?page=mspress-settings&tab=tools' ) ) . '">' . esc_html__( 'Open Tools Settings', 'mspress' ) . '</a></div></div>';
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