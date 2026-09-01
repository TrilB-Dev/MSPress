<?php
/**
 * MSPress Exchange Plugin Includes
 *
 * @package MSPress
 * @subpackage Plugins\Exchange\Includes
 * @since 1.0.0
 */

namespace MSPress\Includes\Plugins\Exchange\Includes;

use MSPress\Includes\Includes as CoreIncludes;
use MSPress\Includes\Plugins\Exchange\Includes\Core\Shortcodes;
use MSPress\Includes\Plugins\Exchange\Includes\Settings\Settings;
use MSPress\Includes\Plugins\Exchange\Includes\Mail\ExchangeMailer;
use MSPress\Includes\Plugins\Exchange\Admin\EmailTemplates;

final class Includes {
    private static ?self $instance = null;
    private Settings $settings;
    private Shortcodes $shortcodes;
    private ExchangeMailer $mailer;
    private EmailTemplates $templates;

    private function __construct() {
        $this->settings = new Settings();
        $this->shortcodes = new Shortcodes();
        $this->mailer = ExchangeMailer::get_instance();
        $this->templates = new EmailTemplates();
    }

    public static function get_instance(): self {
        return self::$instance ??= new self();
    }

    public function init(): void {
        $this->settings->register();
        add_action( 'mspress_graph_oauth_connected', [ $this->settings, 'handle_oauth_connected' ] );
        $this->mailer->register();
        $core = CoreIncludes::get_instance()->core();
        $core->post_types()->register_post_type(
            [
                'post_type' => 'mspress_email_template',
                'args' => [
                    'labels' => [
                        'name' => __( 'Email Templates', 'mspress' ),
                        'singular_name' => __( 'Email Template', 'mspress' ),
                    ],
                    'public' => false,
                    'show_ui' => true,
                    'show_in_menu' => 'mspress-ms365',
                    'supports' => [ 'title', 'editor', 'revisions' ],
                    'show_in_rest' => true,
                    'capability_type' => 'post',
                    'map_meta_cap' => true,
                ],
            ]
        );
        $core->taxonomies()->register_taxonomy(
            [
                'taxonomy' => 'mspress_email_template_type',
                'object_type' => [ 'mspress_email_template' ],
                'args' => [
                    'labels' => [
                        'name' => __( 'Template Types', 'mspress' ),
                        'singular_name' => __( 'Template Type', 'mspress' ),
                    ],
                    'public' => false,
                    'show_ui' => true,
                    'show_in_rest' => true,
                    'hierarchical' => true,
                ],
            ]
        );
        $this->templates->register();
    }

    public function settings(): Settings {
        return $this->settings;
    }

    public function shortcodes(): Shortcodes {
        return $this->shortcodes;
    }
}