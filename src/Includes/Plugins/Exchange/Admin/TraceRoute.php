<?php
/**
 * Admin Trace Route class for the Exchange plugin.
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Admin
 * @since 1.0.0
 */
namespace MSPress\Includes\Plugins\Exchange\Admin;


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class TraceRoute {

    /**
    * Renders the route trace page.
     *
     * @since 1.0.0
     * @return void
     */
    public static function render(): void {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e( 'Trace Route', 'mspress' ); ?></h1>
            <p><?php esc_html_e( 'View the route trace for the Exchange plugin.', 'mspress' ); ?></p>
            <form method="post" action="options.php">
                <?php
                settings_fields( 'mspress_exchange_route_trace' );
                do_settings_sections( 'mspress_exchange_route_trace' );
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }
}