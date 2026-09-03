<?php
/**
 * Higher-level helpers for the MSPress WordPress hook loader.
 *
 * @package MSPress\Includes\Functions\Helpers
 * @since 1.0.0
 */
namespace MSPress\Includes\Functions\Helpers;

use MSPress\Includes\Core\WP\WPLoader;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Extend the core loader with component hook registration helpers.
 */
class LoaderHelper extends WPLoader {
    /**
     * Register multiple hooks belonging to one component.
     *
     * Each definition requires `type`, `hook`, and `callback`, and may provide
     * `priority` and `accepted_args`.
     *
     * @param object|string|array $component Callback component.
     * @param array<int, array<string, mixed>> $hooks Hook definitions.
     * @return self
     */
    public function register_component( object|string|array $component, array $hooks ): self {
        foreach ( $hooks as $definition ) {
            $type = SanitizationHelper::one_of( SanitizationHelper::key( $definition['type'] ?? 'action', 'action' ), [ 'action', 'filter' ], 'action' );
            $hook = SanitizationHelper::text( $definition['hook'] ?? '' );
            $callback = SanitizationHelper::text( $definition['callback'] ?? '' );
            $priority = SanitizationHelper::integer_range( $definition['priority'] ?? 10, 0, PHP_INT_MAX, 10 );
            $accepted_args = SanitizationHelper::integer_range( $definition['accepted_args'] ?? 1, 0, PHP_INT_MAX, 1 );

            if ( '' === $hook || '' === $callback ) {
                throw new \InvalidArgumentException( 'Hook definitions require a hook and callback string.' );
            }
            if ( 'filter' === $type ) {
                $this->add_filter( $hook, $component, $callback, $priority, $accepted_args );
                continue;
            }
            if ( 'action' === $type ) {
                $this->add_action( $hook, $component, $callback, $priority, $accepted_args );
                continue;
            }
            throw new \InvalidArgumentException( 'Hook definition type must be action or filter.' );
        }

        return $this;
    }

    /**
     * Enqueue a stylesheet through the shared plugin helper layer.
     *
     * @param string       $handle Name of the stylesheet.
     * @param string       $src URL to the stylesheet.
     * @param array<int, string> $deps Optional dependency handles.
     * @param string|bool|null $ver Version string.
     * @param string       $media Media type.
     * @return void
     */
    public static function enqueue_style( string $handle, string $src = '', array $deps = [], $ver = false, string $media = 'all' ): void {
        if ( function_exists( 'wp_enqueue_style' ) ) {
            wp_enqueue_style( $handle, $src, $deps, $ver, $media );
        }
    }

    /**
     * Enqueue a script through the shared plugin helper layer.
     *
     * @param string $handle Name of the script.
     * @param string $src URL to the script.
     * @param array<int, string> $deps Optional dependency handles.
     * @param string|bool|null $ver Version string.
     * @param bool $in_footer Whether to enqueue in the footer.
     * @return void
     */
    public static function enqueue_script( string $handle, string $src = '', array $deps = [], $ver = false, bool $in_footer = true ): void {
        if ( function_exists( 'wp_enqueue_script' ) ) {
            wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
        }
    }

    /**
     * Localize a script through the shared plugin helper layer.
     *
     * @param string $handle Script handle.
     * @param string $object_name JS object name.
     * @param array|string|int|float|bool|null $data Data to localize.
     * @return void
     */
    public static function localize_script( string $handle, string $object_name, $data ): void {
        if ( function_exists( 'wp_localize_script' ) ) {
            wp_localize_script( $handle, $object_name, $data );
        }
    }

    /**
     * Enqueue media library through the shared plugin helper layer.
     *
     * @return void
     */
    public static function enqueue_media(): void {
        if ( function_exists( 'wp_enqueue_media' ) ) {
            wp_enqueue_media();
        }
    }
}
