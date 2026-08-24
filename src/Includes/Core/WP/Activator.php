<?php
/**
 * Activator class for the MSPress plugin.
 *
 * @package MSPress
 */
namespace MSPress\Includes\Core\WP;

use MSPress\Includes\Functions\Helpers\EncryptionHelper;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class Activator {
    /** 
     * @var array<int, callable> 
     * */
    private static array $callbacks = array();

    /**
    * Register activation callbacks.
     *
     * @param callable $callback Callback invoked during activation.
     * @return void
     */
    public static function register( callable $callback ): void {
        self::$callbacks[] = $callback;
    }

    /**
    * Run plugin activation tasks.
     *
     * @param array<int, callable>|null $callbacks Optional callbacks for this run.
     * @return void
     */
    public static function activate( ?array $callbacks = null ): void {
        EncryptionHelper::ensure_configured();
        Database::install();
        foreach ( $callbacks ?? self::$callbacks as $callback ) {
            call_user_func( $callback );
        }

        flush_rewrite_rules();
    }
}
