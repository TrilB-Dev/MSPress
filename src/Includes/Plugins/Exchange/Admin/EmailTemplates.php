<?php
/**
 * Email templates admin page for the Exchange plugin.
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Admin
 * @since 1.0.0
 */
namespace MSPress\Includes\Plugins\Exchange\Admin;

use MSPress\Includes\Plugins\TinyMCE\Includes\Functions\Helpers\TinyMCEHelper;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class EmailTemplates {

    /**
     * Register the email-template admin hooks.
     *
     * @return void
     */
    public function register(): void {
        add_action( 'add_meta_boxes_mspress_email_template', [ $this, 'add_meta_box' ] );
        add_action( 'save_post_mspress_email_template', [ $this, 'save' ], 10, 2 );
        add_action( 'registered_taxonomy_mspress_email_template_type', [ $this, 'seed_types' ] );
    }

    /**
     * Add the email-template content meta box.
     *
     * @return void
     */
    public function add_meta_box(): void {
        add_meta_box( 'mspress-email-template-content', __( 'Email content', 'mspress' ), [ $this, 'render_editor' ], 'mspress_email_template', 'normal', 'high' );
    }

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

    /**
     * Render the email-template editor fields.
     *
     * @param \WP_Post $post The post object.
     * @return void
     */
    public function render_editor( \WP_Post $post ): void {
        wp_nonce_field( 'mspress_save_email_template', 'mspress_email_template_nonce' );
        $subject = (string) get_post_meta( $post->ID, '_mspress_email_subject', true );
        $html = (string) get_post_meta( $post->ID, '_mspress_email_html', true );
        $plain = (string) get_post_meta( $post->ID, '_mspress_email_plain', true );
        $placeholders = (string) get_post_meta( $post->ID, '_mspress_email_placeholders', true );

        echo '<p><label class="form-label" for="mspress-email-subject">' . esc_html__( 'Subject', 'mspress' ) . '</label><input class="widefat" type="text" id="mspress-email-subject" name="mspress_email_subject" value="' . esc_attr( $subject ) . '"></p>';
        TinyMCEHelper::render( 'mspress-email-html', 'mspress_email_html', __( 'Rich HTML body', 'mspress' ), $html, 14, true );
        echo '<p><label class="form-label" for="mspress-email-plain">' . esc_html__( 'Plain-text fallback', 'mspress' ) . '</label><textarea class="widefat" rows="8" id="mspress-email-plain" name="mspress_email_plain">' . esc_textarea( $plain ) . '</textarea></p>';
        echo '<p><label class="form-label" for="mspress-email-placeholders">' . esc_html__( 'Available placeholders', 'mspress' ) . '</label><input class="widefat" type="text" id="mspress-email-placeholders" name="mspress_email_placeholders" value="' . esc_attr( $placeholders ) . '" placeholder="{user_name}, {site_name}"></p>';
    }

    /**
     * Save email-template metadata.
     *
     * @param int      $post_id The post ID.
     * @param \WP_Post $post    The post object.
     * @return void
     */
    public function save( int $post_id, \WP_Post $post ): void {
        if ( ! isset( $_POST['mspress_email_template_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mspress_email_template_nonce'] ) ), 'mspress_save_email_template' ) ) {
            return;
        }
        if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || 'mspress_email_template' !== $post->post_type || ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        update_post_meta( $post_id, '_mspress_email_subject', sanitize_text_field( wp_unslash( $_POST['mspress_email_subject'] ?? '' ) ) );
        update_post_meta( $post_id, '_mspress_email_html', wp_kses_post( wp_unslash( $_POST['mspress_email_html'] ?? '' ) ) );
        update_post_meta( $post_id, '_mspress_email_plain', sanitize_textarea_field( wp_unslash( $_POST['mspress_email_plain'] ?? '' ) ) );
        update_post_meta( $post_id, '_mspress_email_placeholders', sanitize_text_field( wp_unslash( $_POST['mspress_email_placeholders'] ?? '' ) ) );
    }

    /**
     * Seed the default email-template types.
     *
     * @return void
     */
    public function seed_types(): void {
        foreach ( [ 'user' => __( 'User', 'mspress' ), 'admin' => __( 'Admin', 'mspress' ), 'report' => __( 'Report', 'mspress' ) ] as $slug => $name ) {
            if ( ! term_exists( $slug, 'mspress_email_template_type' ) ) {
                wp_insert_term( $name, 'mspress_email_template_type', [ 'slug' => $slug ] );
            }
        }
    }
}