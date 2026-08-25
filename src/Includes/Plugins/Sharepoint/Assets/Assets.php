<?php
/**
 * MSPress SharePoint Plugin Assets
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Sharepoint\Assets
 * @since 1.0.0
 */

namespace MSPress\Includes\Plugins\Sharepoint\Assets;

use MSPress\Assets\Assets as CoreAssets;

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
            'handle' => 'mspress-sharepoint',
            'src' => MSPRESS_URL . 'src/includes/Plugins/Sharepoint/Assets/dist/js/sharepoint.js',
            'in_footer' => true,
        ];

        return $assets;
    }
}