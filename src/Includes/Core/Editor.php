<?php
/**
 * Editor class for the MSPress plugin.
 *
 * @package MSPress
 */
namespace MSPress\Includes\Core;

use MSPress\Includes\Functions\Helpers\SanitizationHelper;
use MSPress\Includes\Functions\Helpers\FormFieldHelper;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class Editor {
    /**
     * Saves a MSPress page.
     *
     * @param int $mspress_id The ID of the MSPress container.
     * @param int $page_id The ID of the page to save (optional).
     * @return bool True on success, false on failure.
     */
    public static function save_mspress_page( int $mspress_id, int $page_id = 0 ): bool {
        if ( 'POST' !== strtoupper( $_SERVER['REQUEST_METHOD'] ?? '' ) || 'save_mspress_page' !== ( $_POST['mspress_action'] ?? '' ) || ! check_admin_referer( 'mspress_save_mspress_page', 'mspress_save_mspress_page_nonce' ) ) {
            do_action( 'mspress_editor_save_failed', $mspress_id, $page_id, 'request' );
            return false;
        }
        $page = $page_id ? get_post( $page_id ) : null;
        if ( ! $page_id && ! current_user_can( 'mspress_page_create' ) ) {
            do_action( 'mspress_editor_save_failed', $mspress_id, $page_id, 'permission' );
            return false;
        }
        if ( $page_id && ( ! $page || PostType::PAGE !== $page->post_type || ! current_user_can( 'mspress_page_edit' ) || ( (int) $page->post_author !== get_current_user_id() && ! current_user_can( 'mspress_page_edit_others' ) ) || ( 'publish' === $page->post_status && ! current_user_can( 'mspress_page_edit_published' ) ) ) ) {
            do_action( 'mspress_editor_save_failed', $mspress_id, $page_id, 'permission' );
            return false;
        }

        $input = wp_unslash( $_POST['mspress_page'] ?? [] );
        $input = is_array( $input ) ? $input : [];
        $input = apply_filters( 'mspress_editor_save_input', $input, $mspress_id, $page_id );
        $title = SanitizationHelper::text( $input['title'] ?? '' );
        if ( '' === $title ) {
            do_action( 'mspress_editor_save_failed', $mspress_id, $page_id, 'title' );
            return false;
        }

        if ( ! current_user_can( 'mspress_page_publish' ) ) {
            do_action( 'mspress_editor_save_failed', $mspress_id, $page_id, 'publish' );
            return false;
        }

        $post_id = wp_insert_post( [
            'ID' => $page_id,
            'post_type' => PostType::PAGE,
            'post_title' => $title,
            'post_content' => wp_kses_post( (string) ( $input['content'] ?? '' ) ),
            'post_status' => 'publish',
            'post_author' => get_current_user_id(),
        ], true );
        if ( is_wp_error( $post_id ) ) {
            do_action( 'mspress_editor_save_failed', $mspress_id, $page_id, 'insert' );
            return false;
        }

        update_post_meta( $post_id, '_mspress_mspress_id', $mspress_id );
        do_action( 'mspress_editor_page_saved', $post_id, $mspress_id, $page_id );
        return true;
    }
    /**
     * Renders the form for creating or editing a MSPress page.
     *
     * @param \WP_Post|null $page The page to edit, or null for a new page.
     * @return void
     */
    public static function render_mspress_page_form( ?\WP_Post $page = null ): void {
        do_action( 'mspress_editor_form_before', $page );
        ?>
        <form method="post" class="card shadow-sm">
            <?php wp_nonce_field( 'mspress_save_mspress_page', 'mspress_save_mspress_page_nonce' ); ?>
            <input type="hidden" name="mspress_action" value="save_mspress_page">
            <div class="card-body"><div class="mb-3"><label class="form-label" for="mspress-page-title"><?php esc_html_e( 'Page Title', 'mspress' ); ?></label><input class="form-control" id="mspress-page-title" name="mspress_page[title]" value="<?php echo esc_attr( $page ? $page->post_title : '' ); ?>" required></div><?php FormFieldHelper::tinymce( 'mspress-page-content', 'mspress_page[content]', __( 'Page Content', 'mspress' ), $page ? $page->post_content : '', 14, true ); ?></div>
            <div class="card-footer d-flex justify-content-end gap-2"><a class="btn btn-outline-secondary" href="<?php echo esc_url( admin_url( 'admin.php?page=mspress-manage' ) ); ?>"><?php esc_html_e( 'Cancel', 'mspress' ); ?></a><button class="btn btn-primary" type="submit"><?php echo esc_html( $page ? __( 'Save Page', 'mspress' ) : __( 'Create Page', 'mspress' ) ); ?></button></div>
        </form>
        <?php
        do_action( 'mspress_editor_form_after', $page );
    }
}