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
use MSPress\Includes\Plugins\TinyMCE\Assets\Assets as TinyMCEAssets;
use MSPress\Includes\Functions\Helpers\ImageHelper;

final class Assets {
    /**
     * The core assets manager.
     *
     * @var CoreAssets
     */
    private CoreAssets $assets;
    /**
     * The TinyMCE plugin assets manager.
     *
     * @var TinyMCEAssets
     */
    private TinyMCEAssets $tiny_mce_assets;
    /**
     * Constructor for the Exchange plugin assets.
     *
     * @param CoreAssets $assets The core assets manager.
     */
    public function __construct( CoreAssets $assets ) {
        $this->assets = $assets;
        $this->tiny_mce_assets = new TinyMCEAssets( $assets );
    }

    /**
     * Registers the Exchange plugin assets.
     *
     * @return void
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
    /**
     * Registers the admin assets for the Exchange plugin.
     *
     * @param array  $assets The current assets.
     * @param string $context The context (e.g., 'frontend', 'admin').
     * @return array The updated assets with Exchange assets included.
     */
    public function register_admin_assets( array $assets, string $context = '' ): array {
        $page = RequestHelper::get_key( 'page' );
        $tab = RequestHelper::get_key( 'tab' );
        $is_settings = in_array( $page, [ 'mspress-exchange', 'mspress-exchange-settings' ], true ) || ( 'mspress-settings' === $page && 'exchange-settings' === $tab );
        $is_exchange_page = in_array( $page, [ 'mspress-exchange-email-templates', 'mspress-exchange-route-trace', 'mspress-exchange-sent-log' ], true ) || ( 'mspress-settings' === $page && in_array( $tab, [ 'exchange-email-templates', 'exchange-trace-rout', 'exchange-sent-logs' ], true ) );
        $is_template_page = 'mspress-exchange-email-templates' === $page || ( 'mspress-settings' === $page && 'exchange-email-templates' === $tab );
        if ( ! $is_settings && ! $is_exchange_page ) {
            return $assets;
        }
        $assets['styles'][] = [ 'handle' => 'mspress-admin-exchange', 'src' => MSPRESS_URL . 'src/Includes/Plugins/Exchange/Assets/dist/css/exchange.styles.css' ];
        $script = 'exchange.settings';
        if ( $is_exchange_page ) {
            $script = 'exchange.templates';
            if ( in_array( $page, [ 'mspress-exchange-route-trace' ], true ) || 'exchange-trace-rout' === $tab ) {
                $script = 'exchange.trace';
            } elseif ( in_array( $page, [ 'mspress-exchange-sent-log' ], true ) || 'exchange-sent-logs' === $tab ) {
                $script = 'exchange.logs';
            }
        }
        $assets['scripts'][] = [ 'handle' => 'mspress-admin-' . $script, 'src' => MSPRESS_URL . 'src/Includes/Plugins/Exchange/Assets/dist/js/' . $script . '.js', 'deps' => [ 'mspress-bootstrap', 'mspress-bootstrap-select' ], 'in_footer' => true ];

        if ( $is_template_page ) {
            $assets = $this->tiny_mce_assets->register_admin_assets( $assets );
        }

        return $assets;
    }
    /**
     * Registers the frontend assets for the Exchange plugin.
     *
     * @param array $assets The current assets.
     * @return array The updated assets with Exchange frontend assets included.
     */
    public function register_frontend_assets( array $assets ): array {
        $assets['scripts'][] = [
            'handle' => 'mspress-public-exchange',
            'src' => MSPRESS_URL . 'src/Includes/Plugins/Exchange/Assets/dist/js/exchange-public.js',
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
        return ImageHelper::get_image_url( 'mspress-exchange', $file );
    }
}