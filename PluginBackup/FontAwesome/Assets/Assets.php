<?php
/**
 * MSPress - FontAwesome Assets
 *
 * @package MSPress
 * @since 1.0.0
 */
namespace MSPress\Includes\Plugins\FontAwesome\Assets;

use MSPress\Includes\Functions\Helpers\LoaderHelper;
use MSPress\Includes\Plugins\FontAwesome\Includes\Settings\Settings as FontAwesomeSettings;
use MSPress\Includes\Functions\Helpers\ImageHelper;

final class Assets {
    /**
     * The loader helper instance.
     * 
     * @var LoaderHelper The loader helper instance.
     */
    private LoaderHelper $loader;
    /**
     * Constructor for the Assets class.
     *
     * @param LoaderHelper|null $loader The loader helper instance.
     */ 
    public function __construct( ?LoaderHelper $loader = null ) {
        $this->loader = $loader ?? new LoaderHelper();
    }
    /**
     * Registers the assets for the plugin.
     *
     * @return void
     */
    public function register(): void {
        $this->loader->register_component( $this,
        [
            [ 
                'type' => 'action',
                'hook' => 'admin_enqueue_scripts',
                'callback' => 'enqueue_admin_assets' 
            ],
        ] )->run();
    }
    /**
     * Enqueues the admin assets for the plugin.
     *
     * @param string $hook_suffix The current admin page hook suffix.
     * @return void
     */
    public function enqueue_admin_assets( string $hook_suffix = '' ): void {

        $this->enqueue_fontawesome_vendor_assets( $hook_suffix );
        
        $this->enqueue_icon_picker();
    }
    /**
     * Enqueues the FontAwesome vendor assets for the plugin.
     *
     * @param string $hook_suffix The current admin page hook suffix.
     * @return void
     */
    private function enqueue_fontawesome_vendor_assets( string $hook_suffix ): void {
        $page = sanitize_key( $_GET['page'] ?? '' );
        if ( false === strpos( $hook_suffix, 'mspress' ) && 0 !== strpos( $page, 'mspress' ) ) {
            return;
        }

        $source = FontAwesomeSettings::source();
        $kit_id = FontAwesomeSettings::kit_id();
        $use_kit = '' !== $kit_id;

        if ( $use_kit ) {
            foreach ( [ 'font-awesome-kit', 'font-awesome-cdn' ] as $handle ) {
                wp_dequeue_style( $handle );
                wp_dequeue_script( $handle );
            }
        }

        wp_add_inline_script(
            'mspress-admin-ui',
            'window.mspressFontAwesomeSettings = ' . wp_json_encode( [
                'source' => $source,
                'kit_id' => $kit_id,
            ] ) . ';',
            'before'
        );

        if ( $use_kit ) {
            return;
        }

        $handle = 'kit' === $source ? 'font-awesome-kit' : 'font-awesome-cdn';
        if ( wp_style_is( $handle, 'registered' ) || wp_style_is( $handle, 'enqueued' ) ) {
                wp_enqueue_style( $handle );
        }

        if ( wp_script_is( $handle, 'registered' ) || wp_script_is( $handle, 'enqueued' ) ) {
            wp_enqueue_script( $handle );
        }
    }
    /**
     * Enqueues the icon picker assets for the plugin.
     *
     * @return void
     */
    public function enqueue_icon_picker(): void {
        if ( ! $this->should_enqueue_icon_picker() ) {
            return;
        }

        wp_enqueue_style(
            'mspress-fontawesome-icon-picker',
            MSPRESS_URL . 'src/Includes/Plugins/FontAwesome/Assets/dist/css/fontawesome.icon-picker-style.css',
            [],
            MSPRESS_VERSION
        );
        wp_enqueue_script(
            'mspress-fontawesome-icon-picker',
            MSPRESS_URL . 'src/Includes/Plugins/FontAwesome/Assets/dist/js/fontawesome.icon-picker-script.js',
            [ 'jquery' ],
            MSPRESS_VERSION,
            true
        );

        wp_localize_script( 'mspress-fontawesome-icon-picker', 'mspress_fa_picker', [
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'nonce' => wp_create_nonce( 'mspress_fontawesome_picker' ),
            'strings' => [
                'search_placeholder' => __( 'Search icons...', 'mspress' ),
                'no_icons_found' => __( 'No icons found', 'mspress' ),
                'loading' => __( 'Loading...', 'mspress' ),
                'select_icon' => __( 'Select Icon', 'mspress' ),
                'close' => __( 'Close', 'mspress' ),
            ],
        ] );
    }
    /**
     * Determines whether the icon picker assets should be enqueued.
     *
     * @return bool True if the icon picker assets should be enqueued, false otherwise.
     */
    private function should_enqueue_icon_picker(): bool {
        $screen = get_current_screen();
        if ( ! $screen ) {
            return false;
        }

        return strpos( $screen->id, 'mspress' ) !== false
            || in_array( $screen->id, [ 'post', 'page', 'custom_css', 'customize' ], true );
    }
    /**
     * Get an image asset URL from the core Images directory.
     *
     * @param string $file The image path relative to Assets/images.
     * @return string The image URL, or an empty string when the path is invalid.
     */
    public static function get_image( string $file ): string {

        return ImageHelper::get_image_url( 'mspress-fontawesome', $file );

    }
}