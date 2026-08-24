<?php
/**
 * MSPress Exchange Plugin Assets
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Assets
 * @since 1.0.0
 */

namespace MSPress\Includes\Plugins\Exchange\Assets;

use MSPress\Includes\Functions\Helpers\LoaderHelper;

final class Assets {
    private LoaderHelper $loader;

    public function __construct( ?LoaderHelper $loader = null ) {
        $this->loader = $loader ?? new LoaderHelper();
    }

    /**
     * Constructor for the Exchange plugin assets.
     */
    public function register(): void {
        $this->loader->register_component( $this, [
            [ 'type' => 'filter', 'hook' => 'mspress_frontend_assets', 'callback' => 'register_frontend_assets' ],
        ] )->run();
    }

    public function register_frontend_assets( array $assets ): array {
        $assets['scripts'][] = [
            'handle' => 'mspress-demo',
            'src' => MSPRESS_URL . 'src/includes/Plugins/Exchange/Assets/dist/js/exchange.js',
            'in_footer' => true,
        ];

        return $assets;
    }
}