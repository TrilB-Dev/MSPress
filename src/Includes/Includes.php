<?php
/**
 * Composition root for the MSPress plugin.
 *
 * @package MSPress
 */

namespace MSPress\Includes;

use MSPress\Includes\Core\Core;
use MSPress\Includes\Core\Shortcodes;
use MSPress\Includes\Settings\Settings;

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
	 * The core service coordinator.
	 *
	 * @var Core
	 */
	private Core $core;
	/**
	 * Private constructor to prevent direct instantiation.
	 */
	private function __construct() {
		$this->core = Core::get_instance();
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
		$this->core->init();
	}
	/**
	 * Get the Settings instance.
	 *
	 * @return Settings The Settings instance.
	 */
	public function settings(): Settings {
		return $this->core->settings();
	}
	/**
	 * Get the Shortcodes instance.
	 *
	 * @return Shortcodes The Shortcodes instance.
	 */
	public function shortcodes(): Shortcodes {
		return $this->core->shortcodes();
	}
}
