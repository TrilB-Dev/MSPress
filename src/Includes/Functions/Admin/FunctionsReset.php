<?php

namespace MSPress\Includes\Functions\Admin;

use MSPress\Admin\Manager\Tools\PluginReset;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class FunctionsReset {
    /**
     * Resets the plugin settings to their default values.
     *
     * @return void
     */
    public static function reset_settings(): void {
        ( new PluginReset() )->handle_reset();
    }
}