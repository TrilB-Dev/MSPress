<?php
/**
 * Core service coordinator for MSPress.
 *
 * @package MSPress
 */

namespace MSPress\Includes\Core;

use MSPress\Assets\Assets;
use MSPress\Includes\MSGraph\OAuthController;
use MSPress\Includes\Plugins\Plugins;
use MSPress\Includes\Settings\Settings;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class Core {
    /**
     * The singleton instance of the Core class.
     *
     * @var ?Core
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
     * The Plugins instance.
     *
     * @var Plugins
     */
	private Plugins $plugins;
    /**
     * The OAuthController instance.
     *
     * @var OAuthController
     */
	private OAuthController $oauth;
    /**
     * Flag to indicate if the Core has been initialized.
     *
     * @var bool
     */
	private bool $initialized = false;
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
     * Get the singleton instance of the Core class.
     *
     * @return Core The singleton instance.
     */
	public static function get_instance(): self {
		return self::$instance ??= new self();
	}
    /**
     * Initialize the Core class and its components.
     *
     * @return void
     */
	public function init(): void {
		if ( $this->initialized ) {
			return;
		}

		$this->initialized = true;
		$this->settings->register();
		$this->shortcodes->register();
		$this->assets->register();

		if ( is_admin() ) {
			new \MSPress\Admin\Admin( $this->assets );
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