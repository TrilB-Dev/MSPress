<?php
/**
 * Email templates admin page for the Exchange plugin.
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Admin
 * @since 1.0.0
 */
namespace MSPress\Includes\Plugins\Exchange\Admin;

use MSPress\Includes\Functions\Helpers\EncryptionHelper;
use MSPress\Includes\Functions\Helpers\FormFieldHelper;
use MSPress\Includes\Settings\Settings as BaseSettings;
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
        $settings = BaseSettings::get_group( 'exchange', [] ) ?? [];
        $overrides = is_array( $settings['email_templates'] ?? null ) ? $settings['email_templates'] : [];
        $global = is_array( $settings['email_global'] ?? null ) ? $settings['email_global'] : [];
        $categories = [
            'admin' => [ __( 'Admin', 'mspress' ), dirname( __DIR__ ) . '/Templates/WP/AdminEmail.php' ],
            'comments' => [ __( 'Comments', 'mspress' ), dirname( __DIR__ ) . '/Templates/WP/CommentsEmail.php' ],
            'multisite' => [ __( 'Multisite', 'mspress' ), dirname( __DIR__ ) . '/Templates/WP/MultisiteEmail.php' ],
            'user' => [ __( 'User', 'mspress' ), dirname( __DIR__ ) . '/Templates/WP/UserEmail.php' ],
        ];
        $sender_options = [ '' => __( 'Choose a sender', 'mspress' ) ];
        foreach ( (array) ( $settings['sender_profiles'] ?? [] ) as $profile ) {
            $email = EncryptionHelper::decrypt( (string) ( $profile['address'] ?? '' ) );
            if ( is_email( $email ) && ( ! array_key_exists( 'enabled', $profile ) || ! empty( $profile['enabled'] ) ) ) {
                $sender_options[ $email ] = ( $profile['name'] ?: $email ) . ' <' . $email . '>';
            }
        }
        $global = wp_parse_args( $global, [ 'header' => [], 'footer' => [] ] );
        $header = wp_parse_args( $global['header'], [ 'template' => 'plain', 'background' => '#ffffff', 'color' => '#1d2327', 'font' => 'Arial', 'size' => 16, 'weight' => '600', 'margin' => 0, 'padding' => 24 ] );
        $footer = wp_parse_args( $global['footer'], [ 'background' => '#f6f7f7', 'html' => '', 'margin' => 0, 'padding' => 24, 'radius' => 0 ] );
        ?>
        <div class="card mspress-exchange-page-card" data-exchange-email-templates>
            <div class="card-header"><h2 class="h5 mb-0"><?php esc_html_e( 'Email templates', 'mspress' ); ?></h2></div>
            <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
                <?php echo FormFieldHelper::input( 'action', 'mspress_exchange_save_settings', [ 'type' => 'hidden' ] ); ?>
                <?php wp_nonce_field( 'mspress_exchange_save_settings' ); ?>
                <div class="card-body">
                    <div class="accordion" id="mspress-email-accordion">
                        <div class="accordion-item">
                            <h3 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#mspress-email-global"><?php esc_html_e( 'Global', 'mspress' ); ?></button></h3>
                            <div id="mspress-email-global" class="accordion-collapse collapse show" data-bs-parent="#mspress-email-accordion">
                                <div class="accordion-body">
                                    <h4 class="h6"><?php esc_html_e( 'Header', 'mspress' ); ?></h4>
                                    <div class="row g-3 mb-4">
                                        <div class="col-md-4"><label class="form-label" for="mspress-email-header-template"><?php esc_html_e( 'Template', 'mspress' ); ?></label><?php echo FormFieldHelper::select( 'settings[email_global][header][template]', [ 'plain' => __( 'Plain', 'mspress' ), 'brand' => __( 'Brand', 'mspress' ), 'minimal' => __( 'Minimal', 'mspress' ) ], $header['template'], [ 'id' => 'mspress-email-header-template' ] ); ?></div>
                                        <div class="col-md-4"><label class="form-label" for="mspress-email-header-background"><?php esc_html_e( 'Background color', 'mspress' ); ?></label><?php echo FormFieldHelper::input( 'settings[email_global][header][background]', $header['background'], [ 'type' => 'color', 'id' => 'mspress-email-header-background' ] ); ?></div>
                                        <div class="col-md-4"><label class="form-label" for="mspress-email-header-color"><?php esc_html_e( 'Text color', 'mspress' ); ?></label><?php echo FormFieldHelper::input( 'settings[email_global][header][color]', $header['color'], [ 'type' => 'color', 'id' => 'mspress-email-header-color' ] ); ?></div>
                                        <div class="col-md-4"><label class="form-label"><?php esc_html_e( 'Font family', 'mspress' ); ?></label><?php echo FormFieldHelper::text_input( 'settings[email_global][header][font]', $header['font'] ); ?></div>
                                        <div class="col-md-2"><label class="form-label"><?php esc_html_e( 'Font size', 'mspress' ); ?></label><?php echo FormFieldHelper::input( 'settings[email_global][header][size]', $header['size'], [ 'type' => 'number', 'attributes' => [ 'min' => 0, 'max' => 200 ] ] ); ?></div>
                                        <div class="col-md-2"><label class="form-label"><?php esc_html_e( 'Weight', 'mspress' ); ?></label><?php echo FormFieldHelper::select( 'settings[email_global][header][weight]', [ '400' => '400', '500' => '500', '600' => '600', '700' => '700' ], $header['weight'] ); ?></div>
                                        <div class="col-md-2"><label class="form-label"><?php esc_html_e( 'Margin', 'mspress' ); ?></label><?php echo FormFieldHelper::input( 'settings[email_global][header][margin]', $header['margin'], [ 'type' => 'number', 'attributes' => [ 'min' => 0, 'max' => 200 ] ] ); ?></div>
                                        <div class="col-md-2"><label class="form-label"><?php esc_html_e( 'Padding', 'mspress' ); ?></label><?php echo FormFieldHelper::input( 'settings[email_global][header][padding]', $header['padding'], [ 'type' => 'number', 'attributes' => [ 'min' => 0, 'max' => 200 ] ] ); ?></div>
                                    </div>
                                    <h4 class="h6"><?php esc_html_e( 'Footer', 'mspress' ); ?></h4>
                                    <div class="row g-3">
                                        <div class="col-md-4"><label class="form-label" for="mspress-email-footer-background"><?php esc_html_e( 'Background color', 'mspress' ); ?></label><?php echo FormFieldHelper::input( 'settings[email_global][footer][background]', $footer['background'], [ 'type' => 'color', 'id' => 'mspress-email-footer-background' ] ); ?></div>
                                        <div class="col-md-2"><label class="form-label"><?php esc_html_e( 'Margin', 'mspress' ); ?></label><?php echo FormFieldHelper::input( 'settings[email_global][footer][margin]', $footer['margin'], [ 'type' => 'number', 'attributes' => [ 'min' => 0, 'max' => 200 ] ] ); ?></div>
                                        <div class="col-md-2"><label class="form-label"><?php esc_html_e( 'Padding', 'mspress' ); ?></label><?php echo FormFieldHelper::input( 'settings[email_global][footer][padding]', $footer['padding'], [ 'type' => 'number', 'attributes' => [ 'min' => 0, 'max' => 200 ] ] ); ?></div>
                                        <div class="col-md-2"><label class="form-label"><?php esc_html_e( 'Radius', 'mspress' ); ?></label><?php echo FormFieldHelper::input( 'settings[email_global][footer][radius]', $footer['radius'], [ 'type' => 'number', 'attributes' => [ 'min' => 0, 'max' => 200 ] ] ); ?></div>
                                        <div class="col-12"><?php TinyMCEHelper::render( 'mspress-email-footer-html', 'settings[email_global][footer][html]', __( 'Footer content', 'mspress' ), $footer['html'], 8, true ); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php foreach ( $categories as $slug => $category ) : ?>
                            <?php if ( 'multisite' === $slug && ! is_multisite() ) { continue; } ?>
                            <?php $catalog = is_readable( $category[1] ) ? require $category[1] : []; ?>
                            <div class="accordion-item">
                                <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mspress-email-<?php echo esc_attr( $slug ); ?>"><?php echo esc_html( $category[0] ); ?></button></h3>
                                <div id="mspress-email-<?php echo esc_attr( $slug ); ?>" class="accordion-collapse collapse" data-bs-parent="#mspress-email-accordion">
                                    <div class="accordion-body p-0"><div class="table-responsive"><table class="table table-striped align-middle mb-0"><thead><tr><th><?php esc_html_e( 'Email', 'mspress' ); ?></th><th><?php esc_html_e( 'Source', 'mspress' ); ?></th><th><?php esc_html_e( 'Recipient', 'mspress' ); ?></th><th><?php esc_html_e( 'Subject', 'mspress' ); ?></th><th class="text-end"><?php esc_html_e( 'Actions', 'mspress' ); ?></th></tr></thead><tbody>
                                    <?php foreach ( is_array( $catalog ) ? $catalog : [] as $id => $template ) : ?>
                                        <?php $data = array_merge( $template, $overrides[ $slug ][ $id ] ?? [] ); ?>
                                        <tr><td><?php echo esc_html( $template['name'] ?? $id ); ?></td><td><?php echo esc_html( $template['source'] ?? '' ); ?></td><td><?php echo esc_html( $data['recipient'] ?? '' ); ?></td><td><?php echo esc_html( $data['subject'] ?? '' ); ?></td><td class="text-end text-nowrap"><button type="button" class="btn btn-sm btn-primary" data-exchange-email-edit data-category="<?php echo esc_attr( $slug ); ?>" data-template-id="<?php echo esc_attr( $id ); ?>" data-template="<?php echo esc_attr( wp_json_encode( [ 'name' => $template['name'] ?? $id, 'sender' => $data['sender'] ?? '', 'recipient' => $data['recipient'] ?? '', 'subject' => $data['subject'] ?? $template['subject'] ?? '', 'html' => $data['html'] ?? $template['body'] ?? '' ] ) ); ?>"><?php esc_html_e( 'Edit', 'mspress' ); ?></button> <button type="submit" class="btn btn-sm btn-outline-secondary" name="reset_template" value="<?php echo esc_attr( $slug . ':' . $id ); ?>"><?php esc_html_e( 'Reset', 'mspress' ); ?></button></td></tr>
                                    <?php endforeach; ?>
                                    </tbody></table></div></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="card-footer text-end"><?php echo FormFieldHelper::button( __( 'Save email settings', 'mspress' ), [ 'type' => 'submit' ] ); ?></div>
                <div class="modal fade" id="mspress-email-edit" tabindex="-1" aria-labelledby="mspress-email-edit-title" aria-hidden="true"><div class="modal-dialog modal-xl modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h2 class="modal-title fs-5" id="mspress-email-edit-title"><?php esc_html_e( 'Edit email template', 'mspress' ); ?></h2><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?php esc_attr_e( 'Close', 'mspress' ); ?>"></button></div><div class="modal-body"><input type="hidden" name="email_template_category" value=""><input type="hidden" name="email_template_id" value=""><div class="row g-3"><div class="col-md-6"><label class="form-label" for="mspress-email-sender"><?php esc_html_e( 'Sender profile', 'mspress' ); ?></label><?php echo FormFieldHelper::bootstrap_select( 'settings[email_templates][__category__][__id__][sender]', [ 'data' => $sender_options, 'id' => 'mspress-email-sender', 'live_search' => true, 'class' => 'form-select' ] ); ?></div><div class="col-md-6"><label class="form-label" for="mspress-email-recipient"><?php esc_html_e( 'Recipient', 'mspress' ); ?></label><input class="form-control" type="text" id="mspress-email-recipient" name="settings[email_templates][__category__][__id__][recipient]" value=""></div><div class="col-12"><label class="form-label" for="mspress-email-subject"><?php esc_html_e( 'Subject', 'mspress' ); ?></label><input class="form-control" type="text" id="mspress-email-subject" name="settings[email_templates][__category__][__id__][subject]" value=""></div><div class="col-12"><?php TinyMCEHelper::render( 'mspress-email-html', 'settings[email_templates][__category__][__id__][html]', __( 'HTML body', 'mspress' ), '', 12, true ); ?><div class="small text-muted mt-2" data-exchange-smart-tags><?php esc_html_e( 'Insert smart tag:', 'mspress' ); ?></div></div></div></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php esc_html_e( 'Cancel', 'mspress' ); ?></button><button type="submit" class="btn btn-primary"><?php esc_html_e( 'Save template', 'mspress' ); ?></button></div></div></div></div>
            </form>
        </div>
        <?php
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