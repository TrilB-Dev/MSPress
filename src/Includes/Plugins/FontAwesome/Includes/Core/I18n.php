<?php
/**
 * This file manages the internationalization functionality of the plugin.
 * 
 * 
 * 
 * @package MSPress\Includes\Plugins\FontAwesome\Includes
 * @since 1.0.0
 */

namespace MSPress\Includes\Plugins\FontAwesome\Includes;

final class I18n {
    public static function load_textdomain(): void {
        load_plugin_textdomain(
            'mspress',
            false,
            dirname( plugin_basename( MSPRESS_FILE ) ) . '/src/Includes/Plugins/FontAwesome/Language/'
        );
    }
}