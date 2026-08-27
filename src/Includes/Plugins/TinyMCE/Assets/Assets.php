<?php
/**
 * TinyMCE Editor Plugin Assets
 *
 * @package MSPress
 * @subpackage Plugins\TinyMCE\Assets
 * @since 1.0.0
 */

namespace MSPress\Includes\Plugins\TinyMCE\Assets;

use MSPress\Assets\Assets as CoreAssets;
use MSPress\Includes\Plugins\TinyMCE\Includes\Settings\Settings;

final class Assets {
    /**
     * The core assets manager.
     *
     * @var CoreAssets
     */
    private CoreAssets $assets;
    /**
     * Constructor for the TinyMCE plugin assets.
     *
     * @param CoreAssets $assets The core assets manager.
     */
    public function __construct( CoreAssets $assets ) {
        $this->assets = $assets;
    }

    /**
     * Registers the TinyMCE plugin assets with the core assets manager.
     * 
     * @return void
     */
    public function register(): void {
        $this->assets->register_page( 'mspress-settings', $this->register_admin_assets( [] ) );
    }
    /**
     * Registers the admin assets for the TinyMCE plugin.
     *
     * @param array  $assets The current assets.
     * @param string $context The context (e.g., 'frontend', 'admin').
     * @return array The updated assets with TinyMCE assets included.
     */
    public function register_admin_assets( array $assets, string $context = '' ): array {
        $base_url = MSPRESS_URL . 'src/Includes/Plugins/TinyMCE/Assets/tinymce/';

        $assets['styles'][] = [
            'handle' => 'mspress-tinymce-skin',
            'src' => $base_url . 'skins/ui/' . Settings::ui_skin() . '/skin.min.css',
        ];
        $assets['scripts'][] = [
            'handle' => 'mspress-tinymce',
            'src' => $base_url . 'tinymce.min.js',
            'in_footer' => true,
        ];
        $assets['scripts'][] = [
            'handle' => 'mspress-tinymce-boot',
            'src' => MSPRESS_URL . 'src/Includes/Plugins/TinyMCE/Assets/js/tinymce.js',
            'deps' => [ 'mspress-tinymce' ],
            'in_footer' => true,
            'localize' => [
                'object_name' => 'mspressTinyMCE',
                'data' => [
                    'mediaTitle' => __( 'Insert media', 'mspress' ),
                    'mediaButton' => __( 'Insert into editor', 'mspress' ),
                    'mediaTooltip' => __( 'Insert media', 'mspress' ),
                ],
            ],
        ];

        $assets['enqueue_media'] = true;

        return $assets;
    }
}