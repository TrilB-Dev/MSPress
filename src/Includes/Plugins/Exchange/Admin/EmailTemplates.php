<?php
/**
 * Email templates admin page for the Exchange plugin.
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Admin
 */
namespace MSPress\Includes\Plugins\Exchange\Admin;

use MSPress\Includes\Functions\Helpers\EncryptionHelper;
use MSPress\Includes\Functions\Helpers\FormFieldHelper;
use MSPress\Includes\Plugins\TinyMCE\Includes\Functions\Helpers\TinyMCEHelper;
use MSPress\Includes\Settings\Settings as BaseSettings;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class EmailTemplates {

    public function register(): void {
        add_action( 'add_meta_boxes_mspress_email_template', [ $this, 'add_meta_box' ] );
        add_action( 'save_post_mspress_email_template', [ $this, 'save' ], 10, 2 );
        add_action( 'registered_taxonomy_mspress_email_template_type', [ $this, 'seed_types' ] );
    }

    public function add_meta_box(): void {
        add_meta_box( 'mspress-email-template-content', __( 'Email content', 'mspress' ), [ $this, 'render_editor' ], 'mspress_email_template', 'normal', 'high' );
    }

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
        $global = wp_parse_args( $global, [ 'header' => [], 'footer' => [] ] );
        $header = wp_parse_args( $global['header'], [ 
            'template' => 'plain', 
            'background' => 
            '#ffffff', 'color' => 
            '#1d2327', 
            'font' => 'Arial', 
            'size' => 16, 'weight' => '600', 
            'margin' => 0, 
            'padding' => 24 
        ] );
        $footer = wp_parse_args( $global['footer'], [ 'background' => '#f6f7f7', 'html' => '', 'margin' => 0, 'padding' => 24, 'radius' => 0 ] );
        ?>
        <div class="card mspress-exchange-page-card" data-exchange-email-templates>
            <div class="card-header">
                <h2 class="h5 mb-0">
                    <?php esc_html_e( 'Email templates', 'mspress' ); ?>
                </h2>
            </div>
            <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
                <?php echo FormFieldHelper::input( 'action', 'mspress_exchange_save_settings', [ 'type' => 'hidden' ] ); ?>
                <?php wp_nonce_field( 'mspress_exchange_save_settings' ); ?>
                <div class="card-body">
                    <div class="accordion" id="mspress-email-accordion">
                    <?php self::render_global_section(); ?>
                    <?php foreach ( $categories as $slug => $category ) : ?>
                        <?php if ( 'multisite' === $slug && ! is_multisite() ) { continue; } ?>
                        <?php self::render_category( $slug, $category, $overrides ); ?>
                    <?php endforeach; ?>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <?php echo FormFieldHelper::button( __( 'Save email settings', 'mspress' ), [ 'type' => 'submit' ] ); ?>
                </div>
                <?php self::render_header_modal( $header ); ?>
                <?php self::render_footer_modal( $footer ); ?>
                <?php self::render_template_modal( self::sender_options( $settings ) ); ?>
            </form>
        </div>
        <?php
    }

    private static function sender_options( array $settings ): array {
        $options = [ '' => __( 'Choose a sender', 'mspress' ) ];
        foreach ( (array) ( $settings['sender_profiles'] ?? [] ) as $profile ) {
            $email = EncryptionHelper::decrypt( (string) ( $profile['address'] ?? '' ) );
            if ( is_email( $email ) && ( ! array_key_exists( 'enabled', $profile ) || ! empty( $profile['enabled'] ) ) ) {
                $options[ $email ] = ( $profile['name'] ?: $email ) . ' <' . $email . '>';
            }
        }
        return $options;
    }

    private static function render_global_section(): void {
        ?>
        <div class="accordion-item">
            <h3 class="accordion-header">
                <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#mspress-email-global">
                    <?php esc_html_e( 'Global', 'mspress' ); ?>
                </button>
            </h3>
            <div id="mspress-email-global" class="accordion-collapse collapse show" data-bs-parent="#mspress-email-accordion">
                <div class="accordion-body">
                    <div class="d-flex flex-wrap gap-2">
                        <?php
                        echo FormFieldHelper::button(
                            __( 'Edit header', 'mspress' ),
                            [
                                'type'       => 'button',
                                'class'      => 'btn-outline-primary',
                                'attributes' => [
                                    'data-bs-toggle' => 'modal',
                                    'data-bs-target' => '#mspress-email-header-edit',
                                ],
                            ]
                        );
                        echo FormFieldHelper::button(
                            __( 'Edit footer', 'mspress' ),
                            [
                                'type'       => 'button',
                                'class'      => 'btn-outline-primary',
                                'attributes' => [
                                    'data-bs-toggle' => 'modal',
                                    'data-bs-target' => '#mspress-email-footer-edit',
                                ],
                            ]
                        );
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    private static function render_category( string $slug, array $category, array $overrides ): void {
        $catalog = is_readable( $category[1] ) ? require $category[1] : [];
        ?>
        <div class="accordion-item">
            <h3 class="accordion-header">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#mspress-email-<?php echo esc_attr( $slug ); ?>">
                    <?php echo esc_html( $category[0] ); ?>
                </button>
            </h3>
            <div id="mspress-email-<?php echo esc_attr( $slug ); ?>" class="accordion-collapse collapse" data-bs-parent="#mspress-email-accordion">
                <div class="accordion-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped align-middle mb-0">
                            <thead>
                                <tr>
                                    <th><?php esc_html_e( 'Email', 'mspress' ); ?></th>
                                    <th><?php esc_html_e( 'Source', 'mspress' ); ?></th>
                                    <th><?php esc_html_e( 'Recipient', 'mspress' ); ?></th>
                                    <th><?php esc_html_e( 'Subject', 'mspress' ); ?></th>
                                    <th class="text-end"><?php esc_html_e( 'Actions', 'mspress' ); ?></th>
                                </tr>
                            </thead>
                            <tbody>
        <?php foreach ( is_array( $catalog ) ? $catalog : [] as $id => $template ) : ?>
            <?php $data = array_merge( $template, $overrides[ $slug ][ $id ] ?? [] ); ?>
            <tr>
                <td><?php echo esc_html( $template['name'] ?? $id ); ?></td>
                <td><?php echo esc_html( $template['source'] ?? '' ); ?></td>
                <td><?php echo esc_html( $data['recipient'] ?? '' ); ?></td>
                <td><?php echo esc_html( $data['subject'] ?? '' ); ?></td>
                <td class="text-end text-nowrap">
                    <?php
                    echo FormFieldHelper::button(
                        __( 'Edit', 'mspress' ),
                        [
                            'type'       => 'button',
                            'class'      => 'btn-sm btn-primary',
                            'attributes' => [
                                'data-exchange-email-edit' => true,
                                'data-category'            => $slug,
                                'data-template-id'         => $id,
                                'data-template'            => wp_json_encode(
                                    [
                                        'name'      => $template['name'] ?? $id,
                                        'sender'    => $data['sender'] ?? '',
                                        'recipient' => $data['recipient'] ?? '',
                                        'subject'   => $data['subject'] ?? $template['subject'] ?? '',
                                        'html'      => $data['html'] ?? $template['body'] ?? '',
                                    ]
                                ),
                            ],
                        ]
                    );
                    echo FormFieldHelper::button(
                        __( 'Reset', 'mspress' ),
                        [
                            'type'  => 'submit',
                            'class' => 'btn-sm btn-outline-secondary',
                            'name'  => 'reset_template',
                            'value' => $slug . ':' . $id,
                        ]
                    );
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    private static function render_header_modal( array $header ): void {
        ?>
        <div class="modal fade" id="mspress-email-header-edit" tabindex="-1" aria-labelledby="mspress-email-header-edit-title" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-5" id="mspress-email-header-edit-title">
                            <?php esc_html_e( 'Edit email header', 'mspress' ); ?>
                        </h2>
                        <?php
                        echo FormFieldHelper::button(
                            '',
                            [
                                'type'       => 'button',
                                'class'      => 'btn-close',
                                'attributes' => [
                                    'data-bs-dismiss' => 'modal',
                                    'aria-label'     => __( 'Close', 'mspress' ),
                                ],
                            ]
                        );
                        ?>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <?php echo FormFieldHelper::label( 'mspress-email-header-template', __( 'Template', 'mspress' ) ); ?>
                                <?php echo FormFieldHelper::select( 'settings[email_global][header][template]', [ 'plain' => __( 'Plain', 'mspress' ), 'brand' => __( 'Brand', 'mspress' ), 'minimal' => __( 'Minimal', 'mspress' ) ], $header['template'], [ 'id' => 'mspress-email-header-template' ] ); ?>
                            </div>
                            <div class="col-md-4">
                                <?php echo FormFieldHelper::label( 'mspress-email-header-background', __( 'Background color', 'mspress' ) ); ?>
                                <?php echo FormFieldHelper::input( 'settings[email_global][header][background]', $header['background'], [ 'type' => 'color', 'id' => 'mspress-email-header-background' ] ); ?>
                            </div>
                            <div class="col-md-4">
                                <?php echo FormFieldHelper::label( 'mspress-email-header-color', __( 'Text color', 'mspress' ) ); ?>
                                <?php echo FormFieldHelper::input( 'settings[email_global][header][color]', $header['color'], [ 'type' => 'color', 'id' => 'mspress-email-header-color' ] ); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo FormFieldHelper::label( 'mspress-email-header-font', __( 'Font family', 'mspress' ) ); ?>
                                <?php echo FormFieldHelper::text_input( 'settings[email_global][header][font]', $header['font'], [ 'id' => 'mspress-email-header-font' ] ); ?>
                            </div>
                            <div class="col-md-2">
                                <?php echo FormFieldHelper::label( 'mspress-email-header-size', __( 'Font size', 'mspress' ) ); ?>
                                <?php echo FormFieldHelper::input( 'settings[email_global][header][size]', $header['size'], [ 'type' => 'number', 'id' => 'mspress-email-header-size', 'attributes' => [ 'min' => 0, 'max' => 200 ] ] ); ?>
                            </div>
                            <div class="col-md-2">
                                <?php echo FormFieldHelper::label( 'mspress-email-header-weight', __( 'Weight', 'mspress' ) ); ?>
                                <?php echo FormFieldHelper::select( 'settings[email_global][header][weight]', [ '400' => '400', '500' => '500', '600' => '600', '700' => '700' ], $header['weight'], [ 'id' => 'mspress-email-header-weight' ] ); ?>
                            </div>
                            <div class="col-md-2">
                                <?php echo FormFieldHelper::label( 'mspress-email-header-margin', __( 'Margin', 'mspress' ) ); ?>
                                <?php echo FormFieldHelper::input( 'settings[email_global][header][margin]', $header['margin'], [ 'type' => 'number', 'id' => 'mspress-email-header-margin', 'attributes' => [ 'min' => 0, 'max' => 200 ] ] ); ?>
                            </div>
                            <div class="col-md-2">
                                <?php echo FormFieldHelper::label( 'mspress-email-header-padding', __( 'Padding', 'mspress' ) ); ?>
                                <?php echo FormFieldHelper::input( 'settings[email_global][header][padding]', $header['padding'], [ 'type' => 'number', 'id' => 'mspress-email-header-padding', 'attributes' => [ 'min' => 0, 'max' => 200 ] ] ); ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php echo FormFieldHelper::button( __( 'Close', 'mspress' ), [ 'type' => 'button', 'class' => 'btn-secondary', 'attributes' => [ 'data-bs-dismiss' => 'modal' ] ] ); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    private static function render_footer_modal( array $footer ): void {
        ?>
        <div class="modal fade" id="mspress-email-footer-edit" tabindex="-1" aria-labelledby="mspress-email-footer-edit-title" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-5" id="mspress-email-footer-edit-title">
                            <?php esc_html_e( 'Edit email footer', 'mspress' ); ?>
                        </h2>
                        <?php
                        echo FormFieldHelper::button(
                            '',
                            [
                                'type'       => 'button',
                                'class'      => 'btn-close',
                                'attributes' => [
                                    'data-bs-dismiss' => 'modal',
                                    'aria-label'     => __( 'Close', 'mspress' ),
                                ],
                            ]
                        );
                        ?>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <?php echo FormFieldHelper::label( 'mspress-email-footer-background', __( 'Background color', 'mspress' ) ); ?>
                                <?php echo FormFieldHelper::input( 'settings[email_global][footer][background]', $footer['background'], [ 'type' => 'color', 'id' => 'mspress-email-footer-background' ] ); ?>
                            </div>
                            <div class="col-md-2">
                                <?php echo FormFieldHelper::label( 'mspress-email-footer-margin', __( 'Margin', 'mspress' ) ); ?>
                                <?php echo FormFieldHelper::input( 'settings[email_global][footer][margin]', $footer['margin'], [ 'type' => 'number', 'id' => 'mspress-email-footer-margin' ] ); ?>
                            </div>
                            <div class="col-md-2">
                                <?php echo FormFieldHelper::label( 'mspress-email-footer-padding', __( 'Padding', 'mspress' ) ); ?>
                                <?php echo FormFieldHelper::input( 'settings[email_global][footer][padding]', $footer['padding'], [ 'type' => 'number', 'id' => 'mspress-email-footer-padding' ] ); ?>
                            </div>
                            <div class="col-md-2">
                                <?php echo FormFieldHelper::label( 'mspress-email-footer-radius', __( 'Radius', 'mspress' ) ); ?>
                                <?php echo FormFieldHelper::input( 'settings[email_global][footer][radius]', $footer['radius'], [ 'type' => 'number', 'id' => 'mspress-email-footer-radius' ] ); ?>
                            </div>
                            <div class="col-12">
                                <?php TinyMCEHelper::render( 'mspress-email-footer-html', 'settings[email_global][footer][html]', __( 'Footer content', 'mspress' ), $footer['html'], 8, true ); ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php echo FormFieldHelper::button( __( 'Close', 'mspress' ), [ 'type' => 'button', 'class' => 'btn-secondary', 'attributes' => [ 'data-bs-dismiss' => 'modal' ] ] ); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    private static function render_template_modal( array $sender_options ): void {
        ?>
        <div class="modal fade" id="mspress-email-edit" tabindex="-1" aria-labelledby="mspress-email-edit-title" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-5" id="mspress-email-edit-title">
                            <?php esc_html_e( 'Edit email template', 'mspress' ); ?>
                        </h2>
                        <?php
                        echo FormFieldHelper::button(
                            '',
                            [
                                'type'       => 'button',
                                'class'      => 'btn-close',
                                'attributes' => [
                                    'data-bs-dismiss' => 'modal',
                                    'aria-label'     => __( 'Close', 'mspress' ),
                                ],
                            ]
                        );
                        ?>
                    </div>
                    <div class="modal-body">
                        <?php echo FormFieldHelper::input( 'email_template_category', '', [ 'type' => 'hidden' ] ); ?>
                        <?php echo FormFieldHelper::input( 'email_template_id', '', [ 'type' => 'hidden' ] ); ?>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <?php echo FormFieldHelper::label( 'mspress-email-sender', __( 'Sender profile', 'mspress' ) ); ?>
                                <?php echo FormFieldHelper::bootstrap_select( 'settings[email_templates][__category__][__id__][sender]', [ 'data' => $sender_options, 'id' => 'mspress-email-sender', 'live_search' => true, 'class' => 'form-select' ] ); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo FormFieldHelper::label( 'mspress-email-recipient', __( 'Recipient', 'mspress' ) ); ?>
                                <?php echo FormFieldHelper::text_input( 'settings[email_templates][__category__][__id__][recipient]', '', [ 'id' => 'mspress-email-recipient' ] ); ?>
                            </div>
                            <div class="col-12">
                                <?php echo FormFieldHelper::label( 'mspress-email-subject', __( 'Subject', 'mspress' ) ); ?>
                                <?php echo FormFieldHelper::text_input( 'settings[email_templates][__category__][__id__][subject]', '', [ 'id' => 'mspress-email-subject' ] ); ?>
                            </div>
                            <div class="col-12">
                                <?php TinyMCEHelper::render( 'mspress-email-html', 'settings[email_templates][__category__][__id__][html]', __( 'HTML body', 'mspress' ), '', 12, true ); ?>
                                <div class="small text-muted mt-2" data-exchange-smart-tags>
                                    <?php esc_html_e( 'Insert smart tag:', 'mspress' ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php echo FormFieldHelper::button( __( 'Cancel', 'mspress' ), [ 'type' => 'button', 'class' => 'btn-secondary', 'attributes' => [ 'data-bs-dismiss' => 'modal' ] ] ); ?>
                        <?php echo FormFieldHelper::button( __( 'Save template', 'mspress' ), [ 'type' => 'submit' ] ); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    public function render_editor( \WP_Post $post ): void {
        wp_nonce_field( 'mspress_save_email_template', 'mspress_email_template_nonce' );
        $subject = (string) get_post_meta( $post->ID, '_mspress_email_subject', true );
        $html = (string) get_post_meta( $post->ID, '_mspress_email_html', true );
        $plain = (string) get_post_meta( $post->ID, '_mspress_email_plain', true );
        $placeholders = (string) get_post_meta( $post->ID, '_mspress_email_placeholders', true );
        ?>
        <p>
            <?php echo FormFieldHelper::label( 'mspress-email-subject', __( 'Subject', 'mspress' ) ); ?>
            <?php echo FormFieldHelper::text_input( 'mspress_email_subject', $subject, [ 'class' => 'widefat', 'id' => 'mspress-email-subject' ] ); ?>
        </p>
        <?php
        TinyMCEHelper::render( 'mspress-email-html', 'mspress_email_html', __( 'Rich HTML body', 'mspress' ), $html, 14, true );
        ?>
        <p>
            <?php echo FormFieldHelper::label( 'mspress-email-plain', __( 'Plain-text fallback', 'mspress' ) ); ?>
            <?php echo FormFieldHelper::textarea( 'mspress_email_plain', $plain, [ 'class' => 'widefat', 'rows' => 8, 'id' => 'mspress-email-plain' ] ); ?>
        </p>
        <p>
            <?php echo FormFieldHelper::label( 'mspress-email-placeholders', __( 'Available placeholders', 'mspress' ) ); ?>
            <?php echo FormFieldHelper::text_input( 'mspress_email_placeholders', $placeholders, [ 'class' => 'widefat', 'id' => 'mspress-email-placeholders', 'placeholder' => '{user_name}, {site_name}' ] ); ?>
        </p>
        <?php
    }

    public function save( int $post_id, \WP_Post $post ): void {
        if ( ! isset( $_POST['mspress_email_template_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mspress_email_template_nonce'] ) ), 'mspress_save_email_template' ) ) { return; }
        if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || 'mspress_email_template' !== $post->post_type || ! current_user_can( 'edit_post', $post_id ) ) { return; }
        update_post_meta( $post_id, '_mspress_email_subject', sanitize_text_field( wp_unslash( $_POST['mspress_email_subject'] ?? '' ) ) );
        update_post_meta( $post_id, '_mspress_email_html', wp_kses_post( wp_unslash( $_POST['mspress_email_html'] ?? '' ) ) );
        update_post_meta( $post_id, '_mspress_email_plain', sanitize_textarea_field( wp_unslash( $_POST['mspress_email_plain'] ?? '' ) ) );
        update_post_meta( $post_id, '_mspress_email_placeholders', sanitize_text_field( wp_unslash( $_POST['mspress_email_placeholders'] ?? '' ) ) );
    }

    public function seed_types(): void {
        foreach ( [ 'user' => __( 'User', 'mspress' ), 'admin' => __( 'Admin', 'mspress' ), 'report' => __( 'Report', 'mspress' ) ] as $slug => $name ) {
            if ( ! term_exists( $slug, 'mspress_email_template_type' ) ) { wp_insert_term( $name, 'mspress_email_template_type', [ 'slug' => $slug ] ); }
        }
    }
}