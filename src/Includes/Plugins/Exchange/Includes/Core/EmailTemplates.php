<?php
/**
 * Provides the core functionality for the Exchange plugin.
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Includes
 * @since 1.0.0
 */
namespace MSPress\Includes\Plugins\Exchange\Includes\Core;

use MSPress\Includes\Plugins\TinyMCE\Includes\Functions\Helpers\TinyMCEHelper;

/** Provides editable subject and body fields for Exchange email templates. */
final class EmailTemplates {
    /**
     * Singleton instance of the EmailTemplates class.
     *
     * @var self|null
     */
    private static ?self $instance = null;
    /**
     * Get the singleton instance of the EmailTemplates class.
     *
     * @return self The singleton instance.
     */
    public static function get_instance(): self {
        return self::$instance ??= new self();
    }
    /**
     * Private constructor to prevent direct instantiation.
     */
    private function __construct() {}
    /**
     * Register the email template functionality.
     *
     * @return void
     */
    public function register(): void {
        add_action( 'add_meta_boxes_mspress_email_template', [ $this, 'add_meta_box' ] );
        add_action( 'save_post_mspress_email_template', [ $this, 'save' ], 10, 2 );
        add_action( 'registered_taxonomy_mspress_email_template_type', [ $this, 'seed_types' ] );
    }
    /**
     * Add the email template meta box to the post editor.
     *
     * @return void
     */
    public function add_meta_box(): void {
        add_meta_box( 'mspress-email-template-content', __( 'Email content', 'mspress' ), [ $this, 'render' ], 'mspress_email_template', 'normal', 'high' );
    }
    /**
     * Render the email template editor.
     *
     * @param \WP_Post $post The post object.
     * @return void
     */
    public function render( \WP_Post $post ): void {
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
     * Save the email template data when the post is saved.
     *
     * @param int $post_id The post ID.
     * @return void
     */
    public function save( int $post_id ): void {
        if ( ! isset( $_POST['mspress_email_template_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mspress_email_template_nonce'] ) ), 'mspress_save_email_template' ) ) {
            return;
        }
        if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        update_post_meta( $post_id, '_mspress_email_subject', sanitize_text_field( wp_unslash( $_POST['mspress_email_subject'] ?? '' ) ) );
        update_post_meta( $post_id, '_mspress_email_html', wp_kses_post( wp_unslash( $_POST['mspress_email_html'] ?? '' ) ) );
        update_post_meta( $post_id, '_mspress_email_plain', sanitize_textarea_field( wp_unslash( $_POST['mspress_email_plain'] ?? '' ) ) );
        update_post_meta( $post_id, '_mspress_email_placeholders', sanitize_text_field( wp_unslash( $_POST['mspress_email_placeholders'] ?? '' ) ) );
    }
    /**
     * Seed default email template types if they do not exist.
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