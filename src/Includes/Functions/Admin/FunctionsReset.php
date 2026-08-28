<?php

namespace MSPress\Includes\Functions\Admin;

use MSPress\Admin\Manager\Tools\MSPressReset;

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
        ( new MSPressReset() )->handle_reset();
    }
}