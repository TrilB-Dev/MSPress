<?php
/**
 * MSPress OneDrive Plugin Assets
 *
 * @package MSPress
 * @subpackage Plugins\Onedrive\Assets
 * @since 1.0.0
 */

namespace MSPress\Includes\Plugins\Onedrive\Assets;

use MSPress\Includes\Functions\Helpers\ImageHelper;
use MSPress\Includes\Functions\Helpers\LoaderHelper;

final class Assets {
    /**
     * The loader helper instance.
     *
     * @var LoaderHelper
     */
    private LoaderHelper $loader;

    /**
     * Constructor for the OneDrive plugin assets.
     *
     * @param LoaderHelper|null $loader The loader helper instance.
     */
    public function __construct( ?LoaderHelper $loader = null ) {
        $this->loader = $loader ?? new LoaderHelper();
    }

    /**
     * Register the OneDrive plugin asset hooks.
     *
     * @return void
     */
    public function register(): void {
        $this->loader->register_component(
            $this,
            [
                [
                    'type' => 'filter',
                    'hook' => 'mspress_frontend_assets',
                    'callback' => 'register_frontend_assets',
                    'accepted_args' => 2,
                ],
                [
                    'type' => 'filter',
                    'hook' => 'mspress_admin_assets',
                    'callback' => 'register_admin_assets',
                    'accepted_args' => 2,
                ],
            ]
        )->run();
    }

    /**
     * Registers the frontend assets for the OneDrive plugin.
     *
     * @param array  $assets The current assets.
     * @param string $context The asset context.
     * @return array Updated asset bundle.
     */
    public function register_frontend_assets( array $assets, string $context = 'frontend' ): array {
        $assets['scripts'][] = [
            'handle' => 'mspress-onedrive',
            'src' => MSPRESS_URL . 'src/Includes/Plugins/Onedrive/Assets/dist/js/onedrive.frontend.js',
            'in_footer' => true,
        ];
        $assets['styles'][] = [
            'handle' => 'mspress-onedrive',
            'src' => MSPRESS_URL . 'src/Includes/Plugins/Onedrive/Assets/dist/css/onedrive.frontend.css',
        ];

        return $assets;
    }

    /**
     * Registers the admin assets for the OneDrive plugin.
     *
     * @param array  $assets The current assets.
     * @param string $context The asset context.
     * @return array Updated asset bundle.
     */
    public function register_admin_assets( array $assets, string $context = 'admin' ): array {
        $assets['scripts'][] = [
            'handle' => 'mspress-admin-onedrive',
            'src' => MSPRESS_URL . 'src/Includes/Plugins/Onedrive/Assets/dist/js/onedrive.admin.js',
            'in_footer' => true,
        ];
        $assets['styles'][] = [
            'handle' => 'mspress-admin-onedrive',
            'src' => MSPRESS_URL . 'src/Includes/Plugins/Onedrive/Assets/dist/css/onedrive.admin.css',
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
        return ImageHelper::get_image_url( 'mspress-onedrive', $file );
    }
}