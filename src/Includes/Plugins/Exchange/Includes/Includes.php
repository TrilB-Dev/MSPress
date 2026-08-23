<?php
/**
 * MSPress Exchange Plugin Includes
 *
 * @package MSPress
 * @subpackage Plugins\Demo\Includes
 * @since 1.0.0
 */

namespace MSPress\Includes\Plugins\Email\Includes;
use MSPress\Includes\Plugins\Email\Includes\Core\Shortcodes;
use MSPress\Includes\Plugins\Email\Includes\Settings\Settings;

final class Includes {
    private static ?self $instance = null;
    private Settings $settings;
    private Shortcodes $shortcodes;

    private function __construct() {
        $this->settings = new Settings();
        $this->shortcodes = new Shortcodes();
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

    public function shortcodes(): Shortcodes {
        return $this->shortcodes;
    }
}