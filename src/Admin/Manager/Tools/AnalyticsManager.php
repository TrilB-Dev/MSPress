<?php
/**
 * AnalyticsManager class for MSPress plugin.
 *
 * @package MSPress
 * @subpackage Admin\Manager\Tools
 * @since 1.0.0
 */
namespace MSPress\Admin\Manager\Tools;

use MSPress\Admin\Manager\Manager;
use MSPress\Assets\Assets;
use MSPress\Includes\Analytics\Analytics;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class AnalyticsManager extends Manager {
    /**
     * The Page variable.
     *
     * @since 1.0.0
     * @access protected
     * @var string $page The page variable.
     */
    protected $page;
    /**
     * `Constructor` method for the `DashboardManager` class. 
     *
     * @since 1.0.0
     * @return void
     */

    public function __construct() {
        /**
         * Set the page variable to 'dashboard'.
         *
         * @since 1.0.0
         */
        $this->page = 'analytics';

    }
    /**
     * Renders the analytics page.
     *
     * @since 1.0.0
     * @return void
     */
    public function render_content(): void {
        echo '<div class="mspress-analytics-summary">';
        $this->card( __( 'Total Wiki Page Views', 'mspress' ), Analytics::total_views(), 'mspress-manage' );
        echo '</div><h2 class="h4 mt-4">' . esc_html__( 'Most Viewed Wiki Pages', 'mspress' ) . '</h2><div class="table-responsive"><table class="table mspress-analytics-table table-striped table-hover align-middle"><thead><tr><th>' . esc_html__( 'Page', 'mspress' ) . '</th><th>' . esc_html__( 'Views', 'mspress' ) . '</th></tr></thead><tbody>';
        foreach ( Analytics::top_pages() as $page ) {
            printf( '<tr><td><a href="%s">%s</a></td><td>%d</td></tr>', esc_url( $page['link'] ), esc_html( $page['title'] ), absint( $page['views'] ) );
        }
        echo '</tbody></table></div>';
    }
}
