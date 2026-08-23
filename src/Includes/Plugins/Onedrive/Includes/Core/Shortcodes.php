<?php

namespace MSPress\Includes\Plugins\Onedrive\Includes\Core;

use MSPress\Includes\Functions\Helpers\ShortcodeHelper;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Shortcodes supplied by the MSPress OneDrive plugin.
 */
final class Shortcodes {
    /**
     * Return this plugin's shortcode definitions.
     *
     * @return array<int, array<string, mixed>>
     */
    public static function definitions(): array {
        return [
            ShortcodeHelper::define(
                'mspress_onedrive',
                [ self::class, 'render_demo' ],
                [ 'message' => __( 'MSPress OneDrive', 'mspress' ) ],
                [
                    'description' => __( 'Render a message from the MSPress OneDrive plugin.', 'mspress' ),
                    'category' => 'demo',
                ]
            ),
        ];
    }

    /**
     * Render the Demo shortcode.
     *
     * @param array<string, mixed> $atts Shortcode attributes.
     * @param string|null $content Enclosed content.
     * @param string $tag Shortcode tag.
     */
    public static function render_demo( array $atts = [], ?string $content = null, string $tag = '' ): string {
        return esc_html( (string) $atts['message'] );
    }
}