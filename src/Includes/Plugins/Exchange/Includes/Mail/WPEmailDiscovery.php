<?php
/**
 * Discovers WordPress email code and template directories.
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Includes\Mail
 * @since 1.0.0
 */
namespace MSPress\Includes\Plugins\Exchange\Includes\Mail;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class WPEmailDiscovery {
	private const CACHE_KEY = 'mspress_exchange_wp_email_discovery';
	private const CACHE_TTL = HOUR_IN_SECONDS;

	/**
	 * Discover email calls and template directories without executing files.
	 *
	 * @return array<int, array<string, mixed>>
	 */
	public static function discover(): array {
		$cached = get_transient( self::CACHE_KEY );
		if ( is_array( $cached ) ) {
			return $cached;
		}

		$results = [];
		foreach ( self::scan_roots() as $source => $root ) {
			if ( ! is_dir( $root ) ) {
				continue;
			}
			self::scan_directory( $root, $source, $results );
		}

		usort( $results, static fn( array $first, array $second ): int => strcmp( $first['path'], $second['path'] ) );
		set_transient( self::CACHE_KEY, $results, self::CACHE_TTL );
		return $results;
	}

	/**
	 * Clear the cached discovery results.
	 *
	 * @return void
	 */
	public static function clear_cache(): void {
		delete_transient( self::CACHE_KEY );
	}

	/**
	 * Get the roots that contain WordPress and its extensions.
	 *
	 * @return array<string, string>
	 */
	private static function scan_roots(): array {
		$roots = [
			'WordPress core' => untrailingslashit( ABSPATH ) . DIRECTORY_SEPARATOR . 'wp-includes',
			'WordPress admin' => untrailingslashit( ABSPATH ) . DIRECTORY_SEPARATOR . 'wp-admin',
			'Plugins' => defined( 'WP_PLUGIN_DIR' ) ? WP_PLUGIN_DIR : '',
		];
		if ( function_exists( 'get_theme_root' ) ) {
			$roots['Themes'] = get_theme_root();
		}
		return array_filter( $roots );
	}

	/**
	 * Scan PHP files and directories below a known WordPress root.
	 *
	 * @param string                                      $root    Scan root.
	 * @param string                                      $source  Source label.
	 * @param array<int, array<string, mixed>>            $results Results by reference.
	 * @return void
	 */
	private static function scan_directory( string $root, string $source, array &$results ): void {
		$template_directories = [];
		try {
			$iterator = new \RecursiveIteratorIterator(
				new \RecursiveDirectoryIterator( $root, \FilesystemIterator::SKIP_DOTS ),
				\RecursiveIteratorIterator::LEAVES_ONLY
			);
			foreach ( $iterator as $file ) {
				$path = $file->getPathname();
				if ( preg_match( '#[\\/]vendor[\\/]|[\\/]node_modules[\\/]|[\\/]\.git[\\/]#i', $path ) ) {
					continue;
				}
				if ( ! $file->isFile() ) {
					continue;
				}
				$relative_path = ltrim( str_replace( '\\', '/', substr( $path, strlen( $root ) ) ), '/' );
				$directory = $file->getPath();
				if ( self::is_template_directory( $directory ) && ! isset( $template_directories[ $directory ] ) ) {
					$template_directories[ $directory ] = true;
					$results[] = [
						'source' => $source,
						'path' => ltrim( str_replace( '\\', '/', substr( $directory, strlen( $root ) ) ), '/' ) . '/',
						'absolute_path' => $directory,
						'mail_calls' => 0,
						'template_directory' => true,
					];
				}
				if ( 'php' !== strtolower( $file->getExtension() ) ) {
					continue;
				}
				$contents = file_get_contents( $path );
				if ( false === $contents ) {
					continue;
				}
				$mail_calls = preg_match_all( '/\bwp_mail\s*\(/i', $contents, $matches, PREG_OFFSET_CAPTURE );
				if ( ! $mail_calls ) {
					continue;
				}
				$results[] = [
					'source' => $source,
					'path' => $relative_path,
					'absolute_path' => $path,
					'mail_calls' => (int) $mail_calls,
					'template_directory' => false,
				];
			}
		} catch ( \UnexpectedValueException $exception ) {
			return;
		}
	}

	/**
	 * Check whether a file is inside a conventional email template directory.
	 *
	 * @param string $directory File directory.
	 * @return bool
	 */
	private static function is_template_directory( string $directory ): bool {
		return (bool) preg_match( '#(?:^|[\\/])(templates?[\\/]emails?|emails?)(?:[\\/]|$)#i', $directory );
	}
}
