<?php
/**
 * MSPress Exchange Plugin Assets
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Assets
 * @since 1.0.0
 */

namespace MSPress\Includes\Plugins\Exchange\Assets;

use MSPress\Assets\Assets as CoreAssets;

final class Assets {
    private CoreAssets $assets;

    public function __construct( CoreAssets $assets ) {
        $this->assets = $assets;
    }

    /**
     * Constructor for the Exchange plugin assets.
     */
    public function register(): void {
        $this->assets->register_page( 'mspress', [ 'scripts' => $this->register_frontend_assets( [] )['scripts'] ] );
        $this->assets->register_page( 'mspress-settings', $this->register_admin_assets( [] ) );
    }

    public function register_admin_assets( array $assets ): array {
        if ( 'mspress-settings' !== sanitize_key( $_GET['page'] ?? '' ) || 'exchange' !== sanitize_key( $_GET['tab'] ?? '' ) ) {
            return $assets;
        }
        $assets['styles'][] = [ 'handle' => 'mspress-admin-exchange', 'src' => MSPRESS_URL . 'src/Includes/Plugins/Exchange/Assets/dist/css/exchange.css' ];
        $assets['scripts'][] = [ 'handle' => 'mspress-admin-exchange', 'src' => MSPRESS_URL . 'src/Includes/Plugins/Exchange/Assets/dist/js/exchange.js', 'deps' => [ 'mspress-bootstrap', 'mspress-bootstrap-select' ], 'in_footer' => true ];
        return $assets;
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