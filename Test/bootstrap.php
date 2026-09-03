<?php

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . DIRECTORY_SEPARATOR );
}

if ( ! function_exists( '__' ) ) {
	function __( string $text, string $domain = '' ): string {
		return $text;
	}
}

if ( ! function_exists( 'wp_json_encode' ) ) {
	function wp_json_encode( $value, int $flags = 0 ): string|false {
		return json_encode( $value, $flags );
	}
}

if ( ! function_exists( 'sanitize_key' ) ) {
	function sanitize_key( string $key ): string {
		$key = strtolower( $key );

		return preg_replace( '/[^a-z0-9_\-]/', '', $key ) ?? '';
	}
}

if ( ! class_exists( 'WP_Error' ) ) {
	class WP_Error {
		private string $code;
		private string $message;

		public function __construct( string $code = '', string $message = '' ) {
			$this->code = $code;
			$this->message = $message;
		}

		public function get_error_code(): string {
			return $this->code;
		}

		public function get_error_message(): string {
			return $this->message;
		}
	}
}

if ( ! class_exists( 'wpdb' ) ) {
	class wpdb {
		public string $prefix = 'wp_';

		/**
		 * @var array<string, array<string, mixed>>
		 */
		private array $settings = [];

		public function prepare( string $query, ...$args ): string {
			foreach ( $args as $arg ) {
				$query = preg_replace( '/%s/', "'" . addslashes( (string) $arg ) . "'", $query, 1 );
			}

			return $query;
		}

		public function get_var( string $query ) {
			if ( ! preg_match( "/setting_group = '([^']+)'/", $query, $matches ) ) {
				return null;
			}

			return $this->settings[ $matches[1] ]['setting_value'] ?? null;
		}

		/**
		 * @param array<string, mixed> $data
		 * @param array<int, string>   $format
		 */
		public function replace( string $table, array $data, array $format = [] ): int {
			$this->settings[ (string) $data['setting_group'] ] = $data;

			return 1;
		}
	}
}

global $wpdb;
if ( ! isset( $wpdb ) ) {
	$wpdb = new wpdb();
}

require_once dirname( __DIR__ ) . '/vendor/autoload.php';