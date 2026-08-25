<?php
/**
 * Language internationalization (i18n) for the TinyMCE plugin.
 * @package MSPress
 * @subpackage Plugins\TinyMCE\Includes
 * @since 1.0.0
 * 
 */
namespace MSPress\Includes\Plugins\TinyMCE\Includes;

class I18n {
    /**
     * Loads the plugin's text domain for translation.
     */
    public static function load_textdomain(): void {
        load_plugin_textdomain(
            'mspress',
            false,
            dirname( plugin_basename( MSPRESS_FILE ) ) . '/src/Includes/Plugins/TinyMCE/Language/'
        );
    }
}