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
use MSPress\Includes\Functions\Helpers\RequestHelper;

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
        $this->assets->register_page( 'mspress-exchange', $this->register_admin_assets( [] ) );
        $this->assets->register_page( 'mspress-exchange-settings', $this->register_admin_assets( [] ) );
        $this->assets->register_page( 'mspress-exchange-email-templates', $this->register_admin_assets( [] ) );
        $this->assets->register_page( 'mspress-exchange-route-trace', $this->register_admin_assets( [] ) );
        $this->assets->register_page( 'mspress-exchange-sent-log', $this->register_admin_assets( [] ) );
    }

    public function register_admin_assets( array $assets ): array {
        $page = RequestHelper::get_key( 'page' );
        $tab = RequestHelper::get_key( 'tab' );
        $is_settings = in_array( $page, [ 'mspress-exchange', 'mspress-exchange-settings' ], true ) || ( 'mspress-settings' === $page && 'exchange-settings' === $tab );
        $is_exchange_page = in_array( $page, [ 'mspress-exchange-email-templates', 'mspress-exchange-route-trace', 'mspress-exchange-sent-log' ], true ) || ( 'mspress-settings' === $page && in_array( $tab, [ 'exchange-email-templates', 'exchange-trace-rout', 'exchange-sent-logs' ], true ) );
        if ( ! $is_settings && ! $is_exchange_page ) {
            return $assets;
        }
        $assets['styles'][] = [ 'handle' => 'mspress-admin-exchange', 'src' => MSPRESS_URL . 'src/Includes/Plugins/Exchange/Assets/dist/css/exchange.css' ];
        if ( $is_settings ) {
            $assets['scripts'][] = [ 'handle' => 'mspress-admin-exchange', 'src' => MSPRESS_URL . 'src/Includes/Plugins/Exchange/Assets/dist/js/exchange.js', 'deps' => [ 'mspress-bootstrap', 'mspress-bootstrap-select' ], 'in_footer' => true ];
        }
        return $assets;
    }

    public function register_frontend_assets( array $assets ): array {
        $assets['scripts'][] = [
            'handle' => 'mspress-public-exchange',
            'src' => MSPRESS_URL . 'src/Includes/Plugins/Exchange/Assets/dist/js/exchange-public.js',
            'in_footer' => true,
        ];

        return $assets;
    }
}