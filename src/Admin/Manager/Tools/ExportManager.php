<?php
/**
 * ExportManager class for MSPress plugin.
 * 
 * @package MSPress
 * @subpackage Admin\Manager\Tools
 * @since 1.0.0
 */
namespace MSPress\Admin\Manager\Tools;

use MSPress\Admin\Manager\Manager;
use MSPress\Includes\Functions\Helpers\FormFieldHelper;
use MSPress\Includes\Functions\Helpers\UrlHelper;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class ExportManager extends Manager {
    /**
     * Render the JSON export form below the tools settings form.
     *
     * @return void
     */
    public function __construct() {
    }
    /**
     * Render the JSON export form below the tools settings form.
     *
     * @return void
     */
    public function render_page_content(): void {
        echo '<div class="card shadow-sm"><div class="card-body"><h2 class="h5">' . esc_html__( 'Export MSPress data', 'mspress' ) . '</h2><p class="text-secondary">' . esc_html__( 'Download your MSPress content and settings as a JSON file.', 'mspress' ) . '</p>';
        echo wp_kses_post( FormFieldHelper::button( esc_html__( 'Export MSPress JSON', 'mspress' ), [ 'href' => UrlHelper::admin_action_nonce( 'mspress_export', 'mspress_export' ), 'class' => 'btn-outline-primary' ] ) );
        echo '</div></div>';
    }

    /**
     * Render export and database tool fields.
     *
     * @return void
     */
    public function render(): void {
        echo '<tr><th scope="row">' . wp_kses_post( FormFieldHelper::label( 'mspress-export', esc_html__( 'Import and export', 'mspress' ), [ 'description' => __( 'Export or import MSPress content and settings as JSON.', 'mspress' ), 'tooltip' => __( 'Exports are protected with a WordPress nonce.', 'mspress' ) ] ) ) . '</th><td>' . wp_kses_post( FormFieldHelper::button( esc_html__( 'Export MSPress JSON', 'mspress' ), [ 'href' => UrlHelper::admin_action_nonce( 'mspress_export', 'mspress_export' ), 'class' => 'btn-outline-primary' ] ) ) . '</td></tr>';
        echo '<tr><th scope="row">' . FormFieldHelper::label( 'mspress-database-manager', esc_html__( 'Database manager', 'mspress' ), [ 'description' => __( 'The settings table is managed automatically during plugin activation.', 'mspress' ), 'tooltip' => __( 'Manual database changes are not required for normal MSPress operation.', 'mspress' ) ] ) . '</th><td>' . esc_html__( 'Managed automatically', 'mspress' ) . '</td></tr>';
    }
}