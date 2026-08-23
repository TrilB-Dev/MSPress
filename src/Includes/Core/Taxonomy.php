<?php

namespace MSPress\Includes\Core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class Taxonomy {
	public const CATEGORY = 'mspress_category';
	public const TAG = 'mspress_tag';

	public static function register(): void {
		register_taxonomy( self::CATEGORY, [ PostType::WIKI, PostType::PAGE ], [
			'labels' => [ 'name' => __( 'Wiki Categories', 'mspress' ), 'singular_name' => __( 'Wiki Category', 'mspress' ) ],
			'public' => true,
			'show_ui' => false,
			'show_in_rest' => true,
			'hierarchical' => true,
		] );

		register_taxonomy( self::TAG, [ PostType::WIKI, PostType::PAGE ], [
			'labels' => [ 'name' => __( 'Wiki Tags', 'mspress' ), 'singular_name' => __( 'Wiki Tag', 'mspress' ) ],
			'public' => true,
			'show_ui' => false,
			'show_in_rest' => true,
			'hierarchical' => false,
		] );
	}
}
