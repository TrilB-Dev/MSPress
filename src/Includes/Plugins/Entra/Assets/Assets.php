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
            'handle' => 'mspress-entra',
            'src' => MSPRESS_URL . 'src/includes/Plugins/Entra/Assets/dist/js/entra.js',
            'in_footer' => true,
        ];

        return $assets;
    }
}