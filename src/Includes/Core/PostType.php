<?php

namespace MSPress\Includes\Core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class PostType {
	public const WIKI = 'mspress_wiki';
	public const PAGE = 'mspress_page';

	public static function register(): void {
		register_post_type( self::WIKI, [
			'labels' => [ 'name' => __( 'Wikis', 'mspress' ), 'singular_name' => __( 'Wiki', 'mspress' ) ],
			'public' => true,
			'show_ui' => false,
			'show_in_rest' => true,
			'has_archive' => true,
			'supports' => [ 'title', 'editor', 'excerpt', 'thumbnail', 'author' ],
		] );

		register_post_type( self::PAGE, [
			'labels' => [ 'name' => __( 'Wiki Pages', 'mspress' ), 'singular_name' => __( 'Wiki Page', 'mspress' ) ],
			'public' => true,
			'show_ui' => false,
			'show_in_rest' => true,
			'has_archive' => false,
			'supports' => [ 'title', 'editor', 'excerpt', 'thumbnail', 'author' ],
		] );
	}
}
