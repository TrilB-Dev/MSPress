<?php
/**
 * MSPress OneDrive Plugin Includes
 *
 * @package MSPress
 * @subpackage Plugins\Onedrive\Includes
 * @since 1.0.0
 */

namespace MSPress\Includes\Plugins\Onedrive\Includes;
use MSPress\Includes\Plugins\Onedrive\Includes\Core\Shortcodes;
use MSPress\Includes\Plugins\Onedrive\Includes\Settings\Settings;
use MSPress\Includes\MSGraph\GraphService;
use MSPress\Includes\Plugins\Onedrive\Includes\OneDrive\OneDriveFileManager;
use MSPress\Includes\Plugins\Onedrive\Includes\OneDrive\OneDriveOAuthController;

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
        GraphService::get_instance();
        ( new OneDriveFileManager() );
        ( new OneDriveOAuthController() )->register();
    }

    public function settings(): Settings {
        return $this->settings;
    }

    public function shortcodes(): Shortcodes {
        return $this->shortcodes;
    }
}