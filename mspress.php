<?php
/**
 * Plugin Name: MSPress
 * Plugin URI: https://github.com/TrilB-Dev/MSPress
 * Description: A Microsoft 365 integration plugin for WordPress, providing seamless access to Microsoft 365 services and features within your WordPress site.
 * Version: 1.0.0
 * Author: MSPress
 * Author URI: https://github.com/TrilB-Dev/MSPress
 * License: GPL-2.0-or-later
 * Requires at least: 6.4
 * Requires PHP: 8.1
 * Text Domain: mspress
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * Plugin path and URL constants.
 */

define( 'MSPRESS_VERSION', '0.4.2-Dev' );
define( 'MSPRESS_NAME', 'mspress' );
define( 'MSPRESS_FILE', __FILE__ );
define( 'MSPRESS_DIR', plugin_dir_path( __FILE__ ) );
define( 'MSPRESS_URL', plugin_dir_url( __FILE__ ) );
define( 'MSPRESS_BASENAME', plugin_basename( __FILE__ ) );
define( 'MSPRESS_ROOT', MSPRESS_DIR );
define( 'MSPRESS_ROOT_URL', MSPRESS_URL );
define( 'MSPRESS_API', MSPRESS_DIR . 'src/API' );
define( 'MSPRESS_ASSETS', MSPRESS_DIR . 'src/Assets' );
define( 'MSPRESS_ASSETS_URL', MSPRESS_URL . 'src/Assets' );
define( 'MSPRESS_ADMIN', MSPRESS_DIR . 'src/Admin' );
define( 'MSPRESS_ADMIN_URL', MSPRESS_URL . 'src/Admin' );
define( 'MSPRESS_LANGUAGES', MSPRESS_DIR . 'src/languages' );
define( 'MSPRESS_INCLUDES', MSPRESS_DIR . 'src/Includes' );
define( 'MSPRESS_CORE', MSPRESS_INCLUDES . '/Core' );
define( 'MSPRESS_SETTINGS', MSPRESS_INCLUDES . '/Settings' );
define( 'MSPRESS_PLUGINS', MSPRESS_INCLUDES . '/Plugins' );
define( 'MSPRESS_PLUGINS_URL', MSPRESS_URL . 'src/Includes/Plugins' );

/**
 * Composer autoloader.
 */
$vendor_autoload = MSPRESS_ROOT . '/vendor/autoload.php';
if ( ! file_exists( $vendor_autoload ) ) {
    // Log error and deactivate plugin gracefully
    add_action( 'admin_notices', function() {
        echo '<div class="notice notice-error"><p><strong>MSPress Error:</strong> Composer dependencies are missing. Please run <code>composer install</code> in the plugin directory.</p></div>';
    } );
    return; // Exit early without loading the plugin
}

require_once $vendor_autoload;
/**
 * Run Plugin Activation tasks.
 */
function activate_mspress(): void {
    \MSPress\Includes\Core\WP\Activator::activate();
    \MSPress\Includes\Core\Capabilities::register();
}
register_activation_hook( __FILE__, 'activate_mspress' );
/**
 * Run Plugin Deactivation tasks.
 */
function deactivate_mspress(): void {
    \MSPress\Includes\Core\WP\Deactivator::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_mspress' );
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */

use MSPress\Plugin;

/**
 * Begins execution of the plugin.
 */
function run_mspress() {
    new Plugin();
}

// Initialize the plugin immediately so activation and deactivation hooks register correctly.
run_mspress();