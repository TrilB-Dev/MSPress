<?php
/**
 * MSPress Exchange Plugin Assets
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Assets
 * @since 1.0.0
 */

namespace MSPress\Includes\Plugins\Exchange\Assets;

use MSPress\Includes\Functions\Helpers\ImageHelper;
use MSPress\Includes\Functions\Helpers\LoaderHelper;
use MSPress\Includes\Functions\Helpers\RequestHelper;

final class Assets {
    /**
     * The loader helper instance.
     *
     * @var LoaderHelper
     */
    private LoaderHelper $loader;

    /**
     * Constructor for the Exchange plugin assets.
     *
     * @param LoaderHelper|null $loader The loader helper instance.
     */
    public function __construct( ?LoaderHelper $loader = null ) {
        $this->loader = $loader ?? new LoaderHelper();
    }

    /**
     * Register the Exchange plugin asset hooks.
     *
     * @return void
     */
    public function register(): void {
        $this->loader->register_component(
            $this,
            [
                [
                    'type' => 'filter',
                    'hook' => 'mspress_frontend_assets',
                    'callback' => 'register_frontend_assets',
                    'accepted_args' => 2,
                ],
                [
                    'type' => 'filter',
                    'hook' => 'mspress_admin_assets',
                    'callback' => 'register_admin_assets',
                    'accepted_args' => 4,
                ],
            ]
        )->run();
    }

    /**
     * Registers the frontend assets for the Exchange plugin.
     *
     * @param array  $assets The current assets.
     * @param string $context The context (e.g., 'frontend', 'admin').
     * @return array The updated assets with Exchange assets included.
     */
    public function register_frontend_assets( array $assets, string $context = 'frontend' ): array {
        $assets['scripts'][] = [
            'handle' => 'mspress-public-exchange',
            'src' => MSPRESS_URL . 'src/Includes/Plugins/Exchange/Assets/dist/js/exchange.frontend.js',
            'in_footer' => true,
        ];
        $assets['styles'][] = [
            'handle' => 'mspress-public-exchange',
            'src' => MSPRESS_URL . 'src/Includes/Plugins/Exchange/Assets/dist/css/exchange.frontend.css',
        ];

        return $assets;
    }

    /**
     * Registers the admin assets for the Exchange plugin.
     *
     * @param array  $assets The current assets.
     * @param string $context The context (e.g., 'frontend', 'admin').
     * @return array The updated assets with Exchange assets included.
     */
    public function register_admin_assets( array $assets, string $context = 'admin' ): array {
        $page = RequestHelper::get_key( 'page' );
        $tab = RequestHelper::get_key( 'tab' );

        $is_plugins_page = 'mspress-settings' === $page && 'plugins' === $tab;
        $is_settings = in_array( $page, [ 'mspress-exchange', 'mspress-exchange-settings' ], true )
            || ( 'mspress-settings' === $page && 'exchange-settings' === $tab );
        $is_exchange_page = in_array( $page, [ 'mspress-exchange-email-templates', 'mspress-exchange-route-trace', 'mspress-exchange-sent-log' ], true )
            || ( 'mspress-settings' === $page && in_array( $tab, [ 'exchange-email-templates', 'exchange-trace-route', 'exchange-sent-logs' ], true ) );

        if ( ! $is_plugins_page && ! $is_settings && ! $is_exchange_page ) {
            return $assets;
        }

        $assets['styles'][] = [
            'handle' => 'mspress-admin-exchange',
            'src' => MSPRESS_URL . 'src/Includes/Plugins/Exchange/Assets/dist/css/exchange.admin.css',
        ];

        $script = 'exchange.settings.admin';
        if ( $is_exchange_page ) {
            $script = 'exchange.templates.admin';

            if ( in_array( $page, [ 'mspress-exchange-route-trace' ], true ) || 'exchange-trace-route' === $tab ) {
                $script = 'exchange.trace.admin';
            } elseif ( in_array( $page, [ 'mspress-exchange-sent-log' ], true ) || 'exchange-sent-logs' === $tab ) {
                $script = 'exchange.logs.admin';
            }
        }

        $assets['scripts'][] = [
            'handle' => 'mspress-admin-' . $script,
            'src' => MSPRESS_URL . 'src/Includes/Plugins/Exchange/Assets/dist/js/' . $script . '.js',
            'deps' => [ 'mspress-bootstrap', 'mspress-bootstrap-select' ],
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