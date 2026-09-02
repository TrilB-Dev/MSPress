<?php
/**
 * MSPress Entra Plugin Assets
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Entra\Assets
 * @since 1.0.0
 */

namespace MSPress\Includes\Plugins\Entra\Assets;

use MSPress\Includes\Functions\Helpers\ImageHelper;
use MSPress\Includes\Functions\Helpers\LoaderHelper;

final class Assets {
    /**
     * The loader helper instance.
     * 
     * @var LoaderHelper The loader helper instance.
     */
    private LoaderHelper $loader;
    /**
     * Constructor for the TinyMCE plugin assets.
     *
     * @param LoaderHelper|null $loader The loader helper instance.
     */
    public function __construct( ?LoaderHelper $loader = null ) {
        $this->loader = $loader ?? new LoaderHelper();
    }

    /**
     * Registers the assets for the Entra plugin.
     * 
     * @return void
     * @since 1.0.0
     */
    public function register(): void {
        $this->loader->register_component( $this,
        [
            [
                'type' => 'filter',
                'hook' => 'mspress_frontend_assets',
                'callback' => 'register_frontend_assets',
                'accepted_args' => 2,
            ],
        ] )->run();
        $this->loader->register_component( $this,
        [
            [
                'type' => 'filter',
                'hook' => 'mspress_admin_assets',
                'callback' => 'register_admin_assets',
                'accepted_args' => 2,
            ],
        ] )->run();
    }
    /**
     * Registers the frontend assets for the Entra plugin.
     *
     * @param array $assets The current assets.
     * @return array The updated assets with Entra assets included.
     */
    public function register_frontend_assets( array $assets ): array {
        $assets['scripts'][] = [
            'handle' => 'mspress-entra-frontend-js',
            'src' => MSPRESS_URL . 'src/Includes/Plugins/Entra/Assets/dist/js/entra.frontend.js',
            'in_footer' => true,
        ];
        $assets['styles'][] = [
            'handle' => 'mspress-entra-frontend-style',
            'src' => MSPRESS_URL . 'src/Includes/Plugins/Entra/Assets/dist/css/entra.frontend.css',
        ];

        return $assets;
    }
    /**
     * Registers the admin assets for the Entra plugin.
     *
     * @param array $assets The current assets.
     * @return array The updated assets with Entra assets included.
     * @since 1.0.0
     */
    public function register_admin_assets( array $assets ): array {
        $assets['scripts'][] = [
            'handle' => 'mspress-entra-admin-js',
            'src' => MSPRESS_URL . 'src/Includes/Plugins/Entra/Assets/dist/js/entra.admin.js',
            'in_footer' => true,
        ];
        $assets['styles'][] = [
            'handle' => 'mspress-entra-admin-style',
            'src' => MSPRESS_URL . 'src/Includes/Plugins/Entra/Assets/dist/css/entra.admin.css',
        ];

        return $assets;
    }
    /**
     * Get an image asset URL from the core Images directory.
     *
     * @param string $file The image path relative to Assets/images.
     * @return string The image URL, or an empty string when the path is invalid.
     */
    public static function get_image( string $file ): string {
        return ImageHelper::get_image_url( 'mspress-entra', $file );
    }
}