<?php
/**
 * TinyMCE Editor Plugin Includes
 *
 * @package MSPress
 * @subpackage Plugins\TinyMCE\Includes
 * @since 1.0.0
 */

namespace MSPress\Includes\Plugins\TinyMCE\Includes;

use MSPress\Includes\Plugins\TinyMCE\Includes\Settings\Settings;

final class Includes {
    /**
     * Singleton instance of the Includes class.
     *
     * @var self|null
     */
    private static ?self $instance = null;
    /**
     * @var Settings The settings instance.
     */
    private Settings $settings;
    private function __construct() {
        $this->settings = new Settings();
    }

    public static function get_instance(): self {
        return self::$instance ??= new self();
    }

    public function init(): void {
        $this->settings->register();
    }

    public function settings(): Settings {
        return $this->settings;
    }

}