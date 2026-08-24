<?php

namespace MSPress\Includes\Plugins\Exchange\Includes\Core;

use MSPress\Includes\Functions\Helpers\ShortcodeHelper;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Shortcodes supplied by the Exchange MSPress plugin.
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
                'mspress_demo',
                [ self::class, 'render_demo' ],
                [ 'message' => __( 'MSPress Exchange', 'mspress' ) ],
                [
                    'description' => __( 'Render a message from the MSPress Exchange plugin.', 'mspress' ),
                    'category' => 'demo',
                ]
            ),
        ];
    }

    /**
     * Render the Exchange shortcode.
     *
     * @param array<string, mixed> $atts Shortcode attributes.
     * @param string|null $content Enclosed content.
     * @param string $tag Shortcode tag.
     */
    public static function render_demo( array $atts = [], ?string $content = null, string $tag = '' ): string {
        return esc_html( (string) $atts['message'] );
    }
}