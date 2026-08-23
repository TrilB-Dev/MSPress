<?php
/**
 * Data transfer utility for the MSPress plugin.
 *
 * @package MSPress
 */
namespace MSPress\Includes\Tools;

use MSPress\Includes\Core\PostType;
use MSPress\Includes\Core\Taxonomy;
use MSPress\Includes\Functions\Helpers\SanitizationHelper;
use MSPress\Includes\Functions\Helpers\PostHelper;
use MSPress\Includes\Functions\Helpers\QueryHelper;
use MSPress\Includes\Functions\Helpers\TaxonomyHelper;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class DataTransfer {
    /**
     * Current version of the data transfer format.
     */
    public const VERSION = 1;
    /**
     * Export the plugin's data to an array.
     *
     * @return array The exported data.
     */
    public static function export(): array {
        $data = [ 'version' => self::VERSION, 'wikis' => [], 'pages' => [], 'categories' => [], 'tags' => [] ];
        $query = QueryHelper::posts( [ 'post_type' => [ PostType::WIKI, PostType::PAGE ], 'post_status' => 'any', 'posts_per_page' => -1 ] );
        while ( $query->have_posts() ) {
            $query->the_post();
            $post = PostHelper::current();
            if ( ! $post ) {
                continue;
            }

            $wiki_id = get_post_meta( $post->ID, '_mspress_wiki_id', true );
            if ( '' === (string) $wiki_id ) {
                $wiki_id = get_post_meta( $post->ID, '_wikipress_wiki_id', true );
            }
            $item = [ 'id' => $post->ID, 'title' => $post->post_title, 'content' => $post->post_content, 'excerpt' => $post->post_excerpt, 'status' => $post->post_status, 'wiki_id' => absint( $wiki_id ), 'categories' => TaxonomyHelper::names( TaxonomyHelper::terms( Taxonomy::CATEGORY, $post->ID ) ), 'tags' => TaxonomyHelper::names( TaxonomyHelper::terms( Taxonomy::TAG, $post->ID ) ) ];
            $data[ $post->post_type === PostType::WIKI ? 'wikis' : 'pages' ][] = $item;
        }
        wp_reset_postdata();
        foreach ( [ 'categories' => Taxonomy::CATEGORY, 'tags' => Taxonomy::TAG ] as $key => $taxonomy ) {
            $terms = TaxonomyHelper::terms( $taxonomy );
            foreach ( $terms as $term ) {
                $data[ $key ][] = [ 'name' => $term->name, 'slug' => $term->slug, 'description' => $term->description ];
            }
        }
        return $data;
    }
    /**
     * Export the plugin's data to a JSON string.
     *
     * @param int $flags Optional JSON encoding flags.
     * @return string The exported data as a JSON string.
     */
    public static function export_json( int $flags = 0 ): string {
        $json = wp_json_encode( self::export(), $flags );
        return is_string( $json ) ? $json : '';
    }
    /**
     * Validate the structure of the exported data.
     *
     * @param mixed $data The data to validate.
     * @return array An array containing 'valid' (bool) and 'errors' (array).
     */
    public static function validate( $data ): array {
        $errors = [];
        if ( ! is_array( $data ) ) {
            return [ 'valid' => false, 'errors' => [ __( 'The import data must be an object.', 'mspress' ) ] ];
        }
        if ( absint( $data['version'] ?? 0 ) !== self::VERSION ) {
            $errors[] = __( 'This MSPress export version is not supported.', 'mspress' );
        }
        foreach ( [ 'wikis', 'pages', 'categories', 'tags' ] as $key ) {
            if ( isset( $data[ $key ] ) && ! is_array( $data[ $key ] ) ) {
                /* translators: %s is the name of the export section. */
                $errors[] = sprintf( esc_html__( 'The %s export section must be an array.', 'mspress' ), $key );
            }
        }

        return [ 'valid' => empty( $errors ), 'errors' => $errors ];
    }
    /**
     * Import data into the plugin.
     *
     * @param array $data The data to import.
     * @return array|\WP_Error An array with import results or a WP_Error on failure.
     */
    public static function import( array $data ): array|\WP_Error {
        $validation = self::validate( $data );
        if ( ! $validation['valid'] ) {
            return new \WP_Error( 'invalid_import', implode( ' ', $validation['errors'] ) );
        }
        $wiki_map = [];
        $result = [ 'wikis' => 0, 'pages' => 0, 'categories' => 0, 'tags' => 0, 'errors' => [] ];
        foreach ( (array) ( $data['wikis'] ?? [] ) as $wiki ) {
            if ( ! is_array( $wiki ) ) {
                $result['errors'][] = __( 'A Wiki entry was skipped because it was invalid.', 'mspress' );
                continue;
            }
            $id = wp_insert_post( [ 'post_type' => PostType::WIKI, 'post_title' => SanitizationHelper::text( $wiki['title'] ?? '' ), 'post_content' => self::content( $wiki['content'] ?? '' ), 'post_status' => self::status( $wiki['status'] ?? 'draft' ) ], true );
            if ( ! is_wp_error( $id ) ) {
                $wiki_map[ absint( $wiki['id'] ?? 0 ) ] = (int) $id;
                $result['wikis']++;
            } else {
                $result['errors'][] = $id->get_error_message();
            }
        }
        foreach ( (array) ( $data['pages'] ?? [] ) as $page ) {
            if ( ! is_array( $page ) ) {
                $result['errors'][] = __( 'A page entry was skipped because it was invalid.', 'mspress' );
                continue;
            }
            $id = wp_insert_post( [ 'post_type' => PostType::PAGE, 'post_title' => SanitizationHelper::text( $page['title'] ?? '' ), 'post_content' => self::content( $page['content'] ?? '' ), 'post_excerpt' => SanitizationHelper::text( $page['excerpt'] ?? '' ), 'post_status' => self::status( $page['status'] ?? 'draft' ) ], true );
            if ( ! is_wp_error( $id ) ) {
                $result['pages']++;
                if ( ! empty( $wiki_map[ absint( $page['wiki_id'] ?? 0 ) ] ) ) {
                    update_post_meta( (int) $id, '_mspress_wiki_id', $wiki_map[ absint( $page['wiki_id'] ?? 0 ) ] );
                }
                self::set_terms( (int) $id, $page['categories'] ?? [], Taxonomy::CATEGORY );
                self::set_terms( (int) $id, $page['tags'] ?? [], Taxonomy::TAG );
            } else {
                $result['errors'][] = $id->get_error_message();
            }
        }
        $result['categories'] = self::import_terms( (array) ( $data['categories'] ?? [] ), Taxonomy::CATEGORY );
        $result['tags'] = self::import_terms( (array) ( $data['tags'] ?? [] ), Taxonomy::TAG );
        return $result;
    }
    /**
     * Import terms into a specified taxonomy.
     *
     * @param array  $terms    The terms to import.
     * @param string $taxonomy The taxonomy to import the terms into.
     * @return int The number of terms successfully imported.
     */
    private static function import_terms( array $terms, string $taxonomy ): int {
        $count = 0;
        foreach ( $terms as $term ) {
            if ( ! is_array( $term ) || empty( $term['name'] ) ) {
                continue;
            }
            $inserted = wp_insert_term( SanitizationHelper::text( $term['name'] ), $taxonomy, [ 'slug' => SanitizationHelper::slug( $term['slug'] ?? '' ), 'description' => SanitizationHelper::textarea( $term['description'] ?? '' ) ] );
            if ( ! is_wp_error( $inserted ) ) {
                $count++;
            }
        }
        return $count;
    }
    /**
     * Set terms for a post in a specified taxonomy.
     *
     * @param int    $post_id  The ID of the post.
     * @param mixed  $terms    The terms to set (can be an array of term names or slugs).
     * @param string $taxonomy The taxonomy to set the terms in.
     */
    private static function set_terms( int $post_id, $terms, string $taxonomy ): void {
        wp_set_post_terms( $post_id, TaxonomyHelper::names( $terms ), $taxonomy, false );
    }
    /**
     * Sanitize and validate a post status.
     *
     * @param mixed $status The status to sanitize.
     * @return string The sanitized status, defaulting to 'draft' if invalid.
     */
    private static function status( $status ): string {
        if ( ! is_scalar( $status ) ) {
            return 'draft';
        }

        $status = sanitize_key( (string) $status );
        return in_array( $status, [ 'publish', 'draft', 'private' ], true ) ? $status : 'draft';
    }
    /**
     * Sanitize content for safe use.
     *
     * @param mixed $content The content to sanitize.
     * @return string The sanitized content.
     */
    private static function content( $content ): string {
        return is_scalar( $content ) ? wp_kses_post( (string) $content ) : '';
    }
}
