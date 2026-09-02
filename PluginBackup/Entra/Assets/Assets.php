<?php
/**
 * MSPress Entra Plugin Assets
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Entra\Assets
 * @since 1.0.0
 */

namespace MSPress\Includes\Plugins\Entra\Assets;

use MSPress\Assets\Assets as CoreAssets;
use MSPress\Includes\Functions\Helpers\ImageHelper;

final class Assets {
    /**
     * The core assets manager.
     *
     * @var CoreAssets
     */
    private CoreAssets $assets;
    /**
     * Constructor for the Entra plugin assets.
     *
     * @param CoreAssets $assets The core assets manager.
     */
    public function __construct( CoreAssets $assets ) {
        $this->assets = $assets;
    }

    /**
     * Registers the assets for the Entra plugin.
     * 
     * @return void
     * @since 1.0.0
     */
    public function register(): void {
        $this->assets->register_page( 'mspress', [ 'scripts' => $this->register_frontend_assets( [] )['scripts'] ] );
    }
    /**
     * Registers the frontend assets for the Entra plugin.
     *
     * @param array $assets The current assets.
     * @return array The updated assets with Entra assets included.
     */
    public function register_frontend_assets( array $assets ): array {
        $assets['scripts'][] = [
            'handle' => 'mspress-entra',
            'src' => MSPRESS_URL . 'src/Includes/Plugins/Entra/Assets/dist/js/entra.js',
            'in_footer' => true,
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