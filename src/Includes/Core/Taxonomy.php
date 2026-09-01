<?php

namespace MSPress\Includes\Core;

use MSPress\Includes\Settings\Settings;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class Taxonomy {
    public const CATEGORY = 'mspress_category';
    public const TAG = 'mspress_tag';

    /**
     * @var array<string, array<string, mixed>>
     */
    private array $definitions = [];

    /**
     * @var array<string, bool>
     */
    private array $registered = [];

    public function register(): void {
        $this->register_taxonomy(
            [
                'taxonomy' => self::CATEGORY,
                'object_type' => [ PostType::MSPRESS, PostType::PAGE ],
                'args' => self::category_args(),
            ]
        );
        $this->register_taxonomy(
            [
                'taxonomy' => self::TAG,
                'object_type' => [ PostType::MSPRESS, PostType::PAGE ],
                'args' => self::tag_args(),
            ]
        );

        foreach ( $this->definitions as $definition ) {
            $this->register_definition( $definition );
        }
    }

    /**
     * Queue or register a taxonomy definition.
     *
     * @param array<string, mixed> $definition Taxonomy metadata.
     * @param bool                  $replace Replace an existing definition.
     * @return bool Whether the definition was accepted.
     */
    public function register_taxonomy( array $definition, bool $replace = false ): bool {
        $taxonomy = sanitize_key( (string) ( $definition['taxonomy'] ?? '' ) );
        $object_type = $definition['object_type'] ?? [];
        $args = $definition['args'] ?? [];

        if ( '' === $taxonomy || ! is_array( $object_type ) || ! is_array( $args ) || [] === $object_type ) {
            return false;
        }

        $definition = apply_filters( 'mspress_taxonomy_definition', [
            'taxonomy' => $taxonomy,
            'object_type' => array_values( array_filter( array_map( 'sanitize_key', $object_type ) ) ),
            'args' => $args,
        ], $taxonomy );

        if ( ! is_array( $definition ) || [] === $definition['object_type'] || ( isset( $this->definitions[ $taxonomy ] ) && ! $replace ) ) {
            return false;
        }

        $this->definitions[ $taxonomy ] = $definition;
        if ( $this->is_registered() ) {
            return $this->register_definition( $definition, true );
        }

        return true;
    }

    /**
     * @param array<int, array<string, mixed>> $definitions
     * @return array<int, string> Accepted taxonomy names.
     */
    public function register_taxonomies( array $definitions, bool $replace = false ): array {
        $registered = [];
        foreach ( $definitions as $definition ) {
            if ( $this->register_taxonomy( $definition, $replace ) ) {
                $registered[] = sanitize_key( (string) $definition['taxonomy'] );
            }
        }
        return $registered;
    }

    /** @return array<string, array<string, mixed>> */
    public function definitions(): array {
        return $this->definitions;
    }

    private function register_definition( array $definition, bool $replace = false ): bool {
        $taxonomy = $definition['taxonomy'];
        if ( isset( $this->registered[ $taxonomy ] ) && ! $replace ) {
            return false;
        }
        $result = register_taxonomy( $taxonomy, $definition['object_type'], $definition['args'] );
        if ( is_wp_error( $result ) ) {
            return false;
        }
        $this->registered[ $taxonomy ] = true;
        do_action( 'mspress_taxonomy_registered', $taxonomy, $definition );
        return true;
    }

    private function is_registered(): bool {
        return did_action( 'init' ) > 0;
    }

    /**
    * Build the hierarchical MSPress category taxonomy definition.
     *
     * @return array<string, mixed> Registration arguments.
     */
    public static function category_args(): array {
        return apply_filters( 'mspress_category_taxonomy_args', [
            'labels' => [ 'name' => __( 'MSPress Categories', 'mspress' ), 'singular_name' => __( 'MSPress Category', 'mspress' ) ],
            'hierarchical' => true,
            'public' => true,
            'show_ui' => false,
            'show_in_rest' => true,
            'rewrite' => [ 'slug' => self::setting_slug( 'category_slug', 'mspress-category' ) ],
        ], self::CATEGORY );
    }

    /**
    * Build the non-hierarchical MSPress tag taxonomy definition.
     *
     * @return array<string, mixed> Registration arguments.
     */
    public static function tag_args(): array {
        return apply_filters( 'mspress_tag_taxonomy_args', [
            'labels' => [ 'name' => __( 'MSPress Tags', 'mspress' ), 'singular_name' => __( 'MSPress Tag', 'mspress' ) ],
            'hierarchical' => false,
            'public' => true,
            'show_ui' => false,
            'show_in_rest' => true,
            'rewrite' => [ 'slug' => self::setting_slug( 'tag_slug', 'mspress-tag' ) ],
        ], self::TAG );
    }

    public static function get_taxonomy_names(): array {
        return [ self::CATEGORY, self::TAG ];
    }

    private static function setting_slug( string $key, string $fallback ): string {
        $value = sanitize_title( (string) Settings::get( $key, $fallback ) );
        return $value !== '' ? $value : $fallback;
    }
}
