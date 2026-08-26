<?php
/**
 * Email templates admin page for the Exchange plugin.
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Admin
 * @since 1.0.0
 */
namespace MSPress\Includes\Plugins\Exchange\Admin;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class EmailTemplates {

    /**
     * Renders the email templates page.
     *
     * @since 1.0.0
     * @return void
     */
    public static function render(): void {
        echo '<div class="card mspress-exchange-page-card"><div class="card-header"><h2 class="h5 mb-0">' . esc_html__( 'Email templates', 'mspress' ) . '</h2></div><div class="card-body">';
        $terms = get_terms( [ 'taxonomy' => 'mspress_email_template_type', 'hide_empty' => false ] );
        foreach ( is_wp_error( $terms ) ? [] : $terms as $term ) {
            $posts = get_posts( [ 'post_type' => 'mspress_email_template', 'numberposts' => -1, 'tax_query' => [ [ 'taxonomy' => 'mspress_email_template_type', 'field' => 'term_id', 'terms' => $term->term_id ] ] ] );
            echo '<h3 class="h5">' . esc_html( $term->name ) . '</h3><table class="widefat striped mb-3"><thead><tr><th>' . esc_html__( 'Template', 'mspress' ) . '</th><th>' . esc_html__( 'Edit', 'mspress' ) . '</th></tr></thead><tbody>';
            foreach ( $posts as $post ) {
                echo '<tr><td>' . esc_html( $post->post_title ) . '</td><td><a href="' . esc_url( get_edit_post_link( $post->ID ) ) . '">' . esc_html__( 'Edit template', 'mspress' ) . '</a></td></tr>';
            }
            echo '</tbody></table>';
        }
        echo '</div></div>';
    }
}