<?php
/**
 * MSPress OneDrive Plugin Assets
 *
 * @package MSPress
 * @subpackage Plugins\Onedrive\Assets
 * @since 1.0.0
 */

namespace MSPress\Includes\Plugins\Onedrive\Assets;

use MSPress\Assets\Assets as CoreAssets;
use MSPress\Includes\Functions\Helpers\ImageHelper;

final class Assets {
    private CoreAssets $assets;

    public function __construct( CoreAssets $assets ) {
        $this->assets = $assets;
    }

    /**
     * Constructor for the Demo plugin assets.
     */
    public function register(): void {
        $this->assets->register_page( 'mspress', [ 'scripts' => $this->register_frontend_assets( [] )['scripts'] ] );
    }

    public function register_frontend_assets( array $assets ): array {
        $assets['scripts'][] = [
            'handle' => 'mspress-onedrive',
            'src' => MSPRESS_URL . 'src/Includes/Plugins/Onedrive/Assets/dist/js/onedrive.js',
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
        return ImageHelper::get_image_url( 'mspress-onedrive', $file );
    }
}