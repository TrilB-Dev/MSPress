<?php
/**
 * Admin Trace Rout class for the Exchange plugin.
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Admin
 * @since 1.0.0
 */
namespace MSPress\Includes\Plugins\Exchange\Admin;


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class TraceRout {

    /**
     * Renders the rout trace page.
     *
     * @since 1.0.0
     * @return void
     */
    public static function render(): void {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e( 'Trace Rout', 'mspress' ); ?></h1>
            <p><?php esc_html_e( 'View the rout trace for the Exchange plugin.', 'mspress' ); ?></p>
            <form method="post" action="options.php">
                <?php
                settings_fields( 'mspress_exchange_rout_trace' );
                do_settings_sections( 'mspress_exchange_rout_trace' );
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }
}