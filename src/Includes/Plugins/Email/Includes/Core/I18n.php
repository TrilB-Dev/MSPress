<?php
/**
 * Language internationalization (i18n) for the Demo plugin.
 * @package MSPress
 * @subpackage Admin\Wiki\Plugins\Demo\Includes
 * @since 1.0.0
 * 
 */
namespace MSPress\Includes\Plugins\Email\Includes\Core;

class I18n {
    /**
     * Loads the plugin's text domain for translation.
     */
    public static function load_textdomain(): void {
        load_plugin_textdomain(
            'mspress',
            false,
            dirname( plugin_basename( MSPRESS_FILE ) ) . '/src/includes/Plugins/Email/Language/'
        );
    }
}