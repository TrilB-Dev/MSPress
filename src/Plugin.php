<?php
/**
 * Main plugin controller.
 *
 * @package MSPress
 */

namespace MSPress;

use MSPress\Admin\Admin;
use MSPress\Assets\Assets;
use MSPress\Includes\Core\WP\I18n;
use MSPress\Includes\Includes;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class Plugin {
    /**
     * Plugin version.
     *
     * @var string
     */
    const MSPRESS_VERSION = '1.0.0';

    /**
     * Register the plugin's WordPress hooks.
     */
    public function __construct() {
        add_action( 'plugins_loaded', [ $this, 'load_textdomain' ] );
        add_action( 'init', [ $this, 'initialize' ] );
    }

    /**
     * Initialize plugin-owned modules.
     */
    public function initialize(): void {
        Includes::get_instance()->init();
    }
    
    /**
     * Load the plugin text domain for translation.
     *
     * @return void
     */
	public function load_textdomain(): void {
		( new I18n() )->load_plugin_textdomain();
	}
}
