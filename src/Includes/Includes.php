<?php
/**
 * Composition root for the MSPress plugin.
 *
 * @package MSPress
 */

namespace MSPress\Includes;

use MSPress\Admin\Admin;
use MSPress\Includes\Core\Shortcodes;
use MSPress\Includes\Core\PostType;
use MSPress\Includes\Core\Taxonomy;
use MSPress\Includes\Plugins\Plugins;
use MSPress\Includes\Settings\Settings;
use MSPress\Includes\Settings\MigrationService;
use MSPress\Includes\Functions\OAuthController;
use MSPress\Assets\Assets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class Includes {
	/**
	 * The singleton instance of the Includes class.
	 *
	 * @var ?Includes
	 */
	private static ?self $instance = null;
	/**
	 * The Settings instance.
	 *
	 * @var Settings
	 */
	private Settings $settings;
	/**
	 * The Shortcodes instance.
	 *
	 * @var Shortcodes
	 */
	private Shortcodes $shortcodes;
	/**
	 * The Assets instance.
	 *
	 * @var Assets
	 */
	private Assets $assets;
	/**
	 * The MSPress plugin registry.
	 *
	 * @var Plugins
	 */
	private Plugins $plugins;
	private OAuthController $oauth;
	/**
	 * Private constructor to prevent direct instantiation.
	 */
	private function __construct() {
		$this->settings = new Settings();
		$this->shortcodes = new Shortcodes();
		$this->assets = new Assets();
		$this->plugins = Plugins::get_instance();
		$this->oauth = new OAuthController();
	}
	/**
	 * Get the singleton instance of the Includes class.
	 *
	 * @return Includes The singleton instance.
	 */
	public static function get_instance(): self {
		return self::$instance ??= new self();
	}
	/**
	 * Initialize the Includes class.
	 *
	 * @return void
	 */
	public function init(): void {
		PostType::register();
		Taxonomy::register();
		$this->settings->register();
		MigrationService::run();
		$this->shortcodes->register();
		$this->assets->register();
		if ( is_admin() ) {
			new Admin( $this->assets );
		}
		$this->plugins->init();
		$this->oauth->register();
	}
	/**
	 * Get the Settings instance.
	 *
	 * @return Settings The Settings instance.
	 */
	public function settings(): Settings {
		return $this->settings;
	}
	/**
	 * Get the Shortcodes instance.
	 *
	 * @return Shortcodes The Shortcodes instance.
	 */
	public function shortcodes(): Shortcodes {
		return $this->shortcodes;
	}
}
