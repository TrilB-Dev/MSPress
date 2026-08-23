<?php
/**
 * Settings-related admin functions for MSPress.
 *
 * @package MSPress
 * @subpackage Includes\Functions\Admin
 * @since 1.0.0
 */
namespace MSPress\Includes\Functions\Admin;

use MSPress\Includes\Settings\Settings;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class FunctionsSettings {
    /**
     * Plugin functions used to collect provider-backed settings pages.
     *
     * @var FunctionsPlugins
     */
    private FunctionsPlugins $plugin_functions;

    public function __construct( FunctionsPlugins $plugin_functions ) {
        $this->plugin_functions = $plugin_functions;
    }

    /**
     * Register MSPress and provider-backed plugin settings.
     *
     * @return void
     */
    public function register_settings(): void {
        register_setting( 'mspress_settings', 'mspress_tools', [ 'sanitize_callback' => [ $this, 'sanitize_tools' ] ] );

        foreach ( $this->plugin_functions->plugin_settings_pages() as $page ) {
            register_setting(
                'mspress_settings',
                'mspress_' . $page['slug'],
                [ 'sanitize_callback' => $page['provider']->sanitize_settings( ... ) ]
            );
        }
    }

    public function sanitize_tools( $input ): array {
        $input = is_array( $input ) ? $input : [];
        foreach ( [ 'debug_logging', 'console_logging' ] as $key ) {
            $input[ $key ] = ! empty( $input[ $key ] );
            Settings::set( $key, $input[ $key ] );
        }
        return $input;
    }
}