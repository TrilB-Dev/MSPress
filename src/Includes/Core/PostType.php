<?php
/**
 * Post type class for the MSPress plugin.
 *
 * @package MSPress
 */
namespace MSPress\Includes\Core;

use MSPress\Includes\Settings\Settings;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class PostType {
    /** @var array<string, array<string, mixed>> */
    private array $definitions = [];

    /** @var array<string, bool> */
    private array $registered = [];

    /**
     * The post type for the MSPress container.
     *
     * @var string
     */
    public const MSPRESS = 'mspress_mspress';
    /**
     * The post type for the public MSPress pages.
     *
     * @var string
     */
    public const PAGE = 'mspress_page';
    /**
     * The capability for the MSPress container post type.
     *
     * @var string
     */
    public const MSPRESS_CAPABILITY = 'mspress_mspress';
    /**
     * The capability for the public MSPress page post type.
     *
     * @var string
     */
    public const MSPRESS_CAPABILITY_PLURAL = 'mspress_mspress';
    /**
     * The capability for the public MSPress page post type.
     *
     * @var string
     */
    public const PAGE_CAPABILITY = 'mspress_page';
    /**
     * The capability for the public MSPress page post type.
     *
     * @var string
     */
    public const PAGE_CAPABILITY_PLURAL = 'mspress_pages';
    /**
     * Registers the post types for the MSPress plugin.
     *
     * @return void
     */
    public function register(): void {
        $this->register_post_type( [ 'post_type' => self::MSPRESS, 'args' => self::mspress_args() ] );
        $this->register_post_type( [ 'post_type' => self::PAGE, 'args' => self::page_args() ] );
        foreach ( $this->definitions as $definition ) {
            $this->register_definition( $definition );
        }
    }

    /**
     * Queue or register a post type definition.
     *
     * @param array<string, mixed> $definition Post type metadata.
     * @param bool                  $replace Replace an existing definition.
     * @return bool Whether the definition was accepted.
     */
    public function register_post_type( array $definition, bool $replace = false ): bool {
        $post_type = sanitize_key( (string) ( $definition['post_type'] ?? '' ) );
        $args = $definition['args'] ?? [];
        if ( '' === $post_type || ! is_array( $args ) ) {
            return false;
        }

        $definition = apply_filters( 'mspress_post_type_definition', [
            'post_type' => $post_type,
            'args' => $args,
        ], $post_type );
        if ( ! is_array( $definition ) || ( isset( $this->definitions[ $post_type ] ) && ! $replace ) ) {
            return false;
        }

        $this->definitions[ $post_type ] = $definition;
        if ( did_action( 'init' ) > 0 ) {
            return $this->register_definition( $definition, true );
        }
        return true;
    }

    /**
     * @param array<int, array<string, mixed>> $definitions
     * @return array<int, string> Accepted post type names.
     */
    public function register_post_types( array $definitions, bool $replace = false ): array {
        $registered = [];
        foreach ( $definitions as $definition ) {
            if ( $this->register_post_type( $definition, $replace ) ) {
                $registered[] = sanitize_key( (string) $definition['post_type'] );
            }
        }
        return $registered;
    }

    /** @return array<string, array<string, mixed>> */
    public function definitions(): array {
        return $this->definitions;
    }

    private function register_definition( array $definition, bool $replace = false ): bool {
        $post_type = $definition['post_type'];
        if ( isset( $this->registered[ $post_type ] ) && ! $replace ) {
            return false;
        }
        $result = register_post_type( $post_type, $definition['args'] );
        if ( is_wp_error( $result ) ) {
            return false;
        }
        $this->registered[ $post_type ] = true;
        do_action( 'mspress_post_type_registered', $post_type, $definition );
        return true;
    }
    /**
     * Get the post type name for the MSPress container.
     *
     * @return string The post type name.
     */
    public static function get_post_type_name(): string {
        return self::MSPRESS;
    }
    /**
     * Get the post type name for the public MSPress pages.
     *
     * @return string The post type name.
     */
    public static function page_rewrite_slug(): string {
        return self::setting_slug( 'root_slug', 'mspress' );
    }

    /**
     * Build the MSPress container post type definition.
     *
     * @return array<string, mixed> Registration arguments.
     */
    public static function mspress_args(): array {
        return apply_filters( 'mspress_mspress_post_type_args', [
            'labels' => [
                'name' => __( 'MSPress', 'mspress' ),
                'singular_name' => __( 'MSPress', 'mspress' ),
                'add_new_item' => __( 'Add New MSPress', 'mspress' ),
                'edit_item' => __( 'Edit MSPress', 'mspress' ),
            ],
            'public' => false,
            'show_ui' => false,
            'show_in_rest' => true,
            'supports' => [ 'title', 'editor', 'author', 'thumbnail', 'revisions' ],
            'capability_type' => [ self::MSPRESS_CAPABILITY, self::MSPRESS_CAPABILITY_PLURAL ],
            'map_meta_cap' => true,
        ], self::MSPRESS );
    }

    /**
     * Build the public MSPress page post type definition.
     *
     * @return array<string, mixed> Registration arguments.
     */
    public static function page_args(): array {
        return apply_filters( 'mspress_page_post_type_args', [
            'labels' => [
                'name' => __( 'MSPress Pages', 'mspress' ),
                'singular_name' => __( 'MSPress Page', 'mspress' ),
                'add_new_item' => __( 'Add New MSPress Page', 'mspress' ),
                'edit_item' => __( 'Edit MSPress Page', 'mspress' ),
            ],
            'public' => true,
            'show_ui' => false,
            'show_in_rest' => true,
            'has_archive' => false,
            'rewrite' => [ 'slug' => self::page_rewrite_slug() ],
            'supports' => [ 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions', 'page-attributes' ],
            'capability_type' => [ self::PAGE_CAPABILITY, self::PAGE_CAPABILITY_PLURAL ],
            'map_meta_cap' => true,
        ], self::PAGE );
    }
    /**
     * Get the post type names for the MSPress plugin.
     *
     * @return array<string> The post type names.
     */
    public static function get_post_type_names(): array {
        return [ self::MSPRESS, self::PAGE ];
    }
    /**
     * Get the post type names for the MSPress plugin.
     *
     * @return array<string> The post type names.
     */
    private static function setting_slug( string $key, string $fallback ): string {
        $value = sanitize_title( (string) Settings::get( $key, $fallback ) );
        return $value !== '' ? $value : $fallback;
    }
}
