<?php
/**
 * Shortcodes supplied by the MSPress plugin.
 *
 * @package MSPress
 */

namespace MSPress\Includes\Core;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class Shortcodes {
    /** @var array<string, array<string, mixed>> */
    private array $definitions = [];

    /**
     * Register the plugin shortcodes with WordPress.
     */
    public function register( ?array $definition = null, bool $replace = false ): bool {
        if ( null !== $definition ) {
            $tag = sanitize_key( (string) ( $definition['tag'] ?? '' ) );
            $callback = $definition['callback'] ?? null;
            if ( '' === $tag || ! is_callable( $callback ) || ( isset( $this->definitions[ $tag ] ) && ! $replace ) ) {
                return false;
            }

            $definition['tag'] = $tag;
            $this->definitions[ $tag ] = $definition;
            add_shortcode( $tag, $callback );
            return true;
        }

        add_shortcode( 'ms_press_status', [ $this, 'render_status' ] );
        return true;
    }

    /**
     * Register multiple provider shortcodes.
     *
     * @param array<int, array<string, mixed>> $definitions
     */
    public function register_many( array $definitions, bool $replace = false ): array {
        $registered = [];
        foreach ( $definitions as $definition ) {
            if ( $this->register( $definition, $replace ) ) {
                $registered[] = (string) $definition['tag'];
            }
        }
        return $registered;
    }

    /**
     * Return this plugin's shortcode definitions.
     *
     * @return array<int, array<string, mixed>>
     */
    public function definitions(): array {
        return $this->definitions;
    }
    /**
     * Render the status message shortcode.
     *
     * @param array<string, mixed> $attributes Shortcode attributes.
     * @param string|null $content Shortcode content (not used).
     * @param string $tag Shortcode tag (not used).
     * @return string The rendered status message.
     */
    public function render_status( array $attributes = [], ?string $content = null, string $tag = '' ): string {
        $attributes = shortcode_atts(
			[ 'message' => __( 'MSPress is active.', 'mspress' ) ],
            $attributes,
            $tag ?: 'ms_press_status'
        );

        return '<p class="mspress-status">' . esc_html( $attributes['message'] ) . '</p>';
    }
}