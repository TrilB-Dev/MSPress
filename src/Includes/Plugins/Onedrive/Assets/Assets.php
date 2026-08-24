<?php
/**
 * MSPress OneDrive Plugin Assets
 *
 * @package MSPress
 * @subpackage Plugins\Onedrive\Assets
 * @since 1.0.0
 */

namespace MSPress\Includes\Plugins\Onedrive\Assets;

use MSPress\Includes\Functions\Helpers\LoaderHelper;

final class Assets {
    private LoaderHelper $loader;

    public function __construct( ?LoaderHelper $loader = null ) {
        $this->loader = $loader ?? new LoaderHelper();
    }

    /**
     * Constructor for the Demo plugin assets.
     */
    public function register(): void {
        $this->loader->register_component( $this, [
            [ 'type' => 'filter', 'hook' => 'mspress_frontend_assets', 'callback' => 'register_frontend_assets' ],
        ] )->run();
    }

    public function register_frontend_assets( array $assets ): array {
        $assets['scripts'][] = [
            'handle' => 'mspress-onedrive',
            'src' => MSPRESS_URL . 'src/includes/Plugins/Onedrive/Assets/dist/js/onedrive.js',
            'in_footer' => true,
        ];

        return $assets;
    }
}