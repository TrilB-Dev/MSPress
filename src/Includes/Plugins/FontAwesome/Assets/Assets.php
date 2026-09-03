<?php
/**
 * MSPress - FontAwesome Assets
 *
 * @package MSPress
 * @since 1.0.0
 */
namespace MSPress\Includes\Plugins\FontAwesome\Assets;

use MSPress\Includes\Functions\Helpers\ImageHelper;
use MSPress\Includes\Functions\Helpers\LoaderHelper;
use MSPress\Includes\Functions\Helpers\RequestHelper;
use MSPress\Includes\Plugins\FontAwesome\Includes\Settings\Settings as FontAwesomeSettings;

final class Assets {
    /**
     * The loader helper instance.
     *
     * @var LoaderHelper
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
        $this->loader->register_component(
            $this,
            [
                [
                    'type' => 'action',
                    'hook' => 'admin_enqueue_scripts',
                    'callback' => 'enqueue_wordpress_fontawesome_handles',
                    'accepted_args' => 1,
                ],
                [
                    'type' => 'filter',
                    'hook' => 'mspress_admin_assets',
                    'callback' => 'register_icon_picker_assets',
                    'accepted_args' => 2,
                ],
            ]
        )->run();
    }

    /**
     * Enqueue the active WordPress FontAwesome plugin handles.
     *
     * We intentionally only use the WordPress plugin handles so we do not load a
     * duplicate MSPress-managed FontAwesome bundle.
     *
     * @param string $hook_suffix The current admin page hook suffix.
     * @return void
     */
    public function enqueue_wordpress_fontawesome_handles( string $hook_suffix = '' ): void {
        $page = RequestHelper::get_key( 'page' );
        if ( false === strpos( $hook_suffix, 'mspress' ) && 0 !== strpos( $page, 'mspress' ) ) {
            return;
        }

        $handle = $this->resolve_wordpress_fontawesome_handle();
        if ( '' === $handle ) {
            return;
        }

        if ( wp_style_is( $handle, 'registered' ) || wp_style_is( $handle, 'enqueued' ) ) {
            LoaderHelper::enqueue_style( $handle );
        }

        if ( wp_script_is( $handle, 'registered' ) || wp_script_is( $handle, 'enqueued' ) ) {
            LoaderHelper::enqueue_script( $handle );
        }
    }

    /**
     * Add the icon picker assets to the central asset bundle.
     *
     * @param array  $assets The current asset bundle.
     * @param string $context The asset context.
     * @return array Updated asset bundle.
     */
    public function register_icon_picker_assets( array $assets, string $context = 'admin' ): array {
        if ( ! $this->should_enqueue_icon_picker() ) {
            return $assets;
        }

        $assets['styles'][] = [
            'handle' => 'mspress-fontawesome-icon-picker',
            'src' => MSPRESS_URL . 'src/Includes/Plugins/FontAwesome/Assets/dist/css/fontawesome.icon-picker.css',
        ];
        $assets['scripts'][] = [
            'handle' => 'mspress-fontawesome-icon-picker',
            'src' => MSPRESS_URL . 'src/Includes/Plugins/FontAwesome/Assets/dist/js/fontawesome.icon-picker.js',
            'deps' => [ 'jquery' ],
            'in_footer' => true,
            'localize' => [
                'object_name' => 'mspress_fa_picker',
                'data' => [
                    'ajax_url' => admin_url( 'admin-ajax.php' ),
                    'nonce' => wp_create_nonce( 'mspress_fontawesome_picker' ),
                    'strings' => [
                        'search_placeholder' => __( 'Search icons...', 'mspress' ),
                        'no_icons_found' => __( 'No icons found', 'mspress' ),
                        'loading' => __( 'Loading...', 'mspress' ),
                        'select_icon' => __( 'Select Icon', 'mspress' ),
                        'close' => __( 'Close', 'mspress' ),
                    ],
                ],
            ],
        ];

        return $assets;
    }

    /**
     * Resolve the active WordPress FontAwesome handle.
     *
     * @return string The handle to enqueue: font-awesome-kit or font-awesome-cdn.
     */
    private function resolve_wordpress_fontawesome_handle(): string {
        $source = strtolower( (string) FontAwesomeSettings::source() );

        if ( 'kit' === $source ) {
            return 'font-awesome-kit';
        }

        return 'font-awesome-cdn';
    }

    /**
     * Determine whether the icon picker should be loaded for the current screen.
     *
     * @return bool True when the picker is valid for the current screen.
     */
    private function should_enqueue_icon_picker(): bool {
        $screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;
        if ( ! $screen ) {
            return false;
        }

        return false !== strpos( $screen->id, 'mspress' )
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