<?php
/**
 * Language internationalization (i18n) for the Exchange plugin.
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Includes
 * @since 1.0.0
 * 
 */
namespace MSPress\Includes\Plugins\Exchange\Includes\Core;

class I18n {
    /**
     * Loads the plugin's text domain for translation.
     */
    public static function load_textdomain(): void {
        load_plugin_textdomain(
            'mspress',
            false,
            dirname( plugin_basename( MSPRESS_FILE ) ) . '/src/includes/Plugins/Exchange/Language/'
        );
    }
}