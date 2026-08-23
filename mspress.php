<?php
/**
 * Plugin Name: MSPress
 * Plugin URI: https://trilb.dev
 * Description: A Microsoft 365 integration plugin for WordPress, providing seamless access to Microsoft 365 services and features within your WordPress site.
 * Version: 1.0.0
 * Author: MrTrilB
 * Author URI: https://trilb.dev
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

define( 'MSPRESS_FILE', __FILE__ );
define( 'MSPRESS_DIR', plugin_dir_path( __FILE__ ) );
define( 'MSPRESS_URL', plugin_dir_url( __FILE__ ) );
define( 'MSPRESS_BASENAME', plugin_basename( __FILE__ ) );
define( 'MSPRESS_ROOT', MSPRESS_DIR );
define( 'MSPRESS_ROOT_URL', MSPRESS_URL );
define( 'MSPRESS_VERSION', '1.0.0' );
define( 'MSPRESS_PLUGINS', MSPRESS_ROOT . 'src/Includes/Plugins' );

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

/**
 * Run Plugin Deactivation tasks.
 */
function deactivate_mspress(): void {
    \MSPress\Includes\Core\WP\Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_mspress' );
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

use MSPRESS\Plugin;

/**
 * Begins execution of the plugin.
 */
function run_mspress() {
    new Plugin();
}

// Initialize the plugin immediately so activation and deactivation hooks register correctly.
run_mspress();