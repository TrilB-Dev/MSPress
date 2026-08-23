<?php
/**
 * TrilB.Dev Plugin - Demo Wiki Plugin Assets
 *
 * @package MSPress
 * @subpackage Admin\Wiki\Plugins\Demo\Assets
 * @since 1.0.0
 */

namespace MSPress\Includes\Plugins\Entra\Assets;

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
            'handle' => 'mspress-entra',
            'src' => MSPRESS_URL . 'src/includes/Plugins/Entra/Assets/dist/js/demo.js',
            'in_footer' => true,
        ];

        return $assets;
    }
}