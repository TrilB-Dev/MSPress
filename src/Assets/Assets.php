<?php
/**
 * MSPress Assets
 *
 * @package MSPress
 * @subpackage Assets
 * @since 1.0.0
 */
namespace MSPress\Assets;

use MSPress\Includes\Functions\Helpers\LoaderHelper;
use MSPress\Includes\Functions\Helpers\RequestHelper;
use MSPress\Includes\Functions\Helpers\SanitizationHelper;
use MSPress\Includes\Functions\Helpers\ImageHelper;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Assets
 *
 * Manages the registration and enqueueing of assets for the MSPress plugin.
 */
final class Assets {
    /**
     * Array to hold registered assets for different pages.
     *
     * @var array
     */
    private array $pages = [];
    /**
     * Registers the default assets for the plugin.
     *
     * @return void
     */
    public function register(): void {
        ( new LoaderHelper() )->register_component( $this, 
        [
            [ 
                'type' => 'filter', 
                'hook' => 'mspress_base_assets', 
                'callback' => 'default_assets', 
                'priority' => 90,
                'accepted_args' => 2 
            ],
            [ 
                'type' => 'action', 
                'hook' => 'wp_enqueue_scripts', 
                'callback' => 'enqueue_frontend' 
            ],
            [ 
                'type' => 'action', 
                'hook' => 'admin_enqueue_scripts', 
                'callback' => 'enqueue_admin' 
            ],
        ] )->run();
    }
    /**
     * Registers assets for a specific page.
     *
     * @param string $page The page identifier.
     * @param array  $assets The assets to register for the page.
     * @return void
     */
    public function register_page( string $page, array $assets ): void {
        $page = SanitizationHelper::key( $page );
        $this->pages[ $page ] = [
            'styles' => array_merge( 
                $this->pages[ $page ]['styles'] ?? [], 
                $assets['styles'] ?? [] 
            ),
            'scripts' => array_merge( 
                $this->pages[ $page ]['scripts'] ?? [], 
                $assets['scripts'] ?? [] 
            ),
            'enqueue_media' => ( 
                $this->pages[ $page ]['enqueue_media'] ?? false ) || ! empty( $assets['enqueue_media'] 
            ),
        ];
    }
    /**
     * Returns the default assets for the plugin.
     *
     * @param array  $assets The current assets.
     * @param string $context The context (e.g., 'frontend', 'admin').
     * @return array The default assets.
     */
    public function default_assets( array $assets, string $context ): array {
        $defaults = [
            'styles'  => [
                [
                    'handle' => 'mspress-wp-override',
                    'src' => MSPRESS_URL . 'src/Assets/dist/css/wpoverride.css',
                    'version' => '1.0.0',
                    'deps' => [ 'forms' ],
                ],
                [
                    'handle' => 'mspress-bootstrap',
                    'src' => MSPRESS_URL . 'src/Assets/dist/css/bootstrap.css',
                    'version' => '5.3.8',
                    'deps' => [ 'mspress-wp-override' ],
                ],
                [
                    'handle' => 'mspress-bootstrap-select',
                    'src' => MSPRESS_URL . 'src/Assets/dist/css/bootstrap-select.css',
                    'version' => '1.2.2',
                    'deps' => [ 'mspress-bootstrap' ]
                ],
            ],
            'scripts' => [
                [
                    'handle' => 'mspress-bootstrap',
                    'src' => MSPRESS_URL . 'src/Assets/dist/js/bootstrap.js',
                    'version' => '5.3.8',
                    'in_footer' => true
                ],
                [
                    'handle' => 'mspress-bootstrap-select',
                    'src' => MSPRESS_URL . 'src/Assets/dist/js/bootstrap-select.js',
                    'version' => '1.2.2',
                    'deps' => [ 'mspress-bootstrap' ],
                    'in_footer' => true
                ],
            ],
        ];

        if ( 'admin' === $context ) {
            $defaults['styles'][] = [
                'handle' => 'mspress-admin-ui',
                'src' => MSPRESS_URL . 'src/Assets/dist/css/ui.admin.css',
            ];
            $defaults['scripts'][] = [
                'handle' => 'mspress-admin-ui',
                'src' => MSPRESS_URL . 'src/Assets/dist/js/ui.admin.js',
                'deps' => [ 'mspress-bootstrap' ],
                'in_footer' => true,
            ];
        }

        return [ 'base' => $defaults ] + $defaults;
    }

    /**
     * Enqueues the frontend assets for the plugin.
     *
     * @return void
     */
    public function enqueue_frontend(): void {
        $registered = $this->pages['mspress'] ?? [];
        $base = apply_filters( 
            'mspress_base_assets', 
            [], 
            'frontend' 
        );
        $this->enqueue_registered( 'frontend', [
            'styles'  => array_merge( 
                $base['styles'] ?? [], 
                $registered['styles'] ?? [] 
            ),
            'scripts' => array_merge( 
                $base['scripts'] ?? [], 
                $registered['scripts'] ?? [] 
            ),
            'enqueue_media' => ! empty( $registered['enqueue_media'] ),
        ] );
    }
    /**
     * Enqueues the admin assets for the plugin.
     *
     * @param string $hook_suffix The current admin page hook suffix.
     * @return void
     */
    public function enqueue_admin( string $hook_suffix ): void {
        $page = RequestHelper::get_key( 'page' );
        $is_mspress_page = false !== strpos( 
            $hook_suffix, 
            'mspress' ) || isset( $this->pages[ $page ] 
        );
        if ( ! $is_mspress_page ) {
            return;
        }

        $base = apply_filters( 
            'mspress_base_assets', 
            [], 
            'admin' 
        );
        $assets = [
            'styles'  => $base['styles'] ?? [],
            'scripts' => $base['scripts'] ?? [],
            'enqueue_media' => false,
        ];

        if ( $is_mspress_page ) {
            $registered = $this->pages[ $page ] ?? [];
            $assets['styles'] = array_merge( 
                $assets['styles'], 
                $registered['styles'] ?? [] 
            );
            $assets['scripts'] = array_merge( 
                $assets['scripts'], 
                $registered['scripts'] ?? [] 
            );
            $assets['enqueue_media'] = ! empty( $registered['enqueue_media'] );
        }

        $this->enqueue_registered( 'admin', [
            'styles'  => $assets['styles'],
            'scripts' => $assets['scripts'],
            'enqueue_media' => $assets['enqueue_media'],
        ] );

    }
    /**
     * Enqueues the registered assets for a given context.
     *
     * @param string $context The context (e.g., 'frontend', 'admin').
     * @param array  $assets The assets to enqueue.
     * @return void
     */
    private function enqueue_registered( string $context, array $assets ): void {
        $assets = apply_filters( 
            'mspress_' . $context . '_assets', 
            $assets, 
            $context 
        );
        $this->enqueue_bundle( $assets );
    }
    /**
     * Enqueues a bundle of assets (styles and scripts).
     *
     * @param array $assets The assets to enqueue.
     * @return void
     */
    public function enqueue_bundle( array $assets ): void {
        if ( ! empty( $assets['enqueue_media'] ) ) {
            LoaderHelper::enqueue_media();
        }

        if ( isset( $assets['styles'] ) && is_string( $assets['styles'] ) ) {
            $bundle_name = $this->resolve_bundle_name( $assets['styles'] );
            $assets['styles'] = [ [ 
                'handle' => 'mspress-admin-' . $assets['styles'], 
                'src' => MSPRESS_URL . 'src/Assets/dist/css/' . $bundle_name . '.css' 
            ] ];
        }
        if ( isset( $assets['scripts'] ) && is_string( $assets['scripts'] ) ) {
            $bundle_name = $this->resolve_bundle_name( $assets['scripts'] );
            $assets['scripts'] = [ [ 
                'handle' => 'mspress-admin-' . $assets['scripts'], 
                'src' => MSPRESS_URL . 'src/Assets/dist/js/' . $bundle_name . '.js', 
                'deps' => [ 'mspress-bootstrap' ] 
            ] ];
        }
        foreach ( $assets['styles'] ?? [] as $style ) {
            LoaderHelper::enqueue_style( 
                $style['handle'], 
                $style['src'], 
                $style['deps'] ?? [], 
                $style['version'] ?? MSPRESS_VERSION, 
                $style['media'] ?? 'all' 
            );
        }
        foreach ( $assets['scripts'] ?? [] as $script ) {
            LoaderHelper::enqueue_script( 
                $script['handle'], 
                $script['src'], 
                $script['deps'] ?? [], 
                $script['version'] ?? MSPRESS_VERSION, 
                $script['in_footer'] ?? true 
            );
            if ( isset( $script['localize']['object_name'], $script['localize']['data'] ) ) {
                LoaderHelper::localize_script( 
                    $script['handle'], 
                    $script['localize']['object_name'], 
                    $script['localize']['data'] 
                );
            }
        }
        if ( 'mspress-settings' === RequestHelper::get_key( 'page' ) ) {
            $settings_config = [
                'ajaxUrl' => admin_url( 'admin-ajax.php' ),
                'nonce' => wp_create_nonce( 'mspress_settings_tabs' ),
                'pluginNonce' => wp_create_nonce( 'mspress_plugin_toggle' ),
                'pluginSettingsNonce' => wp_create_nonce( 'mspress_plugin_settings' ),
            ];
            foreach ( [ 'mspress-admin-settings', 'mspress-admin-plugins' ] as $handle ) {
                if ( wp_script_is( $handle, 'enqueued' ) ) {
                    LoaderHelper::localize_script( 
                        $handle, 
                        'mspressSettingsTabs', 
                        $settings_config 
                    );
                }
            }
        }
    }
    /**
     * Get an image asset URL from the core Images directory.
     *
     * @param string $file The image path relative to Assets/images.
     * @return string The image URL, or an empty string when the path is invalid.
     */
    /**
     * Map a logical bundle name to the compiled asset file name.
     *
     * @param string $bundle Logical bundle name.
     * @return string Compiled bundle file name.
     */
    private function resolve_bundle_name( string $bundle ): string {
        $mapping = [
            'dashboard' => 'dashboard.admin',
            'debug' => 'debug.admin',
            'settings' => 'admin.settings',
            'plugins' => 'plugins.admin',
        ];

        return $mapping[ $bundle ] ?? ( $bundle . '.admin' );
    }

    public static function get_image( string $file ): string {
        return ImageHelper::get_image_url( 'core', $file );
    }
}
