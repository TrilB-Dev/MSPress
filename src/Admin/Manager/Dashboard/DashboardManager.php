<?php

namespace MSPress\Admin\Manager\Dashboard;

use MSPress\Admin\Manager\Manager;
use MSPress\Assets\Assets;
use MSPress\Includes\Core\PostType;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class DashboardManager extends Manager {

	/**
	 * TThe Page variable..
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
        $this->page = 'dashboard';

    }
    /**
     * Renders the dashboard page.
     *
     * @since 1.0.0
     * @return void
     */
    public function render(): void {
        $this->header( __( 'Dashboard', 'mspress' ) );
        $this->render_summary();
        $this->render_welcome();
        $this->render_recent_pages();
        $this->render_resources();
        $this->footer();
    }

    private function render_summary(): void {
        $wiki_counts  = wp_count_posts( PostType::WIKI );
        $page_counts  = wp_count_posts( PostType::PAGE );
        $wiki_total   = $this->total_count( $wiki_counts );
        $page_total   = $this->total_count( $page_counts );
        $page_publish = absint( $page_counts->publish ?? 0 );
        ?>
        <div class="row g-3 mb-4">
            <?php $this->summary_card( __( 'Wikis', 'mspress' ), $wiki_total, 'mspress-manage', 'dashicons-book-alt' ); ?>
            <?php $this->summary_card( __( 'Created', 'mspress' ), $page_total, 'mspress-manage', 'dashicons-edit-page' ); ?>
            <?php $this->summary_card( __( 'Published', 'mspress' ), $page_publish, 'mspress-manage', 'dashicons-yes-alt' ); ?>
        </div>
        <?php
    }

    private function render_welcome(): void {
        ?>
        <div class="row g-4 mb-4">
            <div class="col-12 col-xl-6">
                <div class="card mspress-welcome-card border-0 shadow-sm h-100">
                    <div class="card-body p-4 p-xl-5">
                        <p class="text-uppercase small fw-semibold text-primary mb-2"><?php esc_html_e( 'Your knowledge workspace', 'mspress' ); ?></p>
                        <h2 class="h3 mb-2"><?php esc_html_e( 'Welcome to MSPress', 'mspress' ); ?></h2>
                        <p class="text-secondary mb-0"><?php esc_html_e( 'Build, organise, and share a clear home for your knowledge. Start by creating a Wiki or adding your first page.', 'mspress' ); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6">
                <div class="card mspress-news-card border-0 shadow-sm h-100">
                    <div class="card-body p-4 p-xl-5">
                        <p class="text-uppercase small fw-semibold text-primary mb-2"><?php esc_html_e( 'From TrilB.Dev', 'mspress' ); ?></p>
                        <h2 class="h3 mb-2"><?php esc_html_e( 'Latest News', 'mspress' ); ?></h2>
                        <p class="text-secondary mb-0"><?php esc_html_e( 'MSPress news and updates will appear here soon.', 'mspress' ); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    private function render_recent_pages(): void {
        $query = new \WP_Query( [
            'post_type'      => PostType::PAGE,
            'post_status'    => 'publish',
            'posts_per_page' => 6,
            'orderby'        => 'modified',
            'order'          => 'DESC',
            'no_found_rows'  => true,
        ] );
        ?>
        <div class="card mspress-recent-card border-0 shadow-sm w-100 mb-4">
            <div class="card-header bg-white border-0 d-flex flex-wrap justify-content-between align-items-center gap-2 p-4">
                <div>
                    <p class="text-uppercase small fw-semibold text-primary mb-1"><?php esc_html_e( 'Keep things moving', 'mspress' ); ?></p>
                    <h2 class="h5 mb-0"><?php esc_html_e( 'Recently published or updated', 'mspress' ); ?></h2>
                </div>
                <a class="btn btn-sm btn-outline-primary" href="<?php echo esc_url( admin_url( 'admin.php?page=mspress-manage' ) ); ?>"><?php esc_html_e( 'Manage content', 'mspress' ); ?></a>
            </div>
            <div class="list-group list-group-flush">
                <?php if ( $query->have_posts() ) : ?>
                    <?php foreach ( $query->posts as $post ) : ?>
                        <a class="list-group-item list-group-item-action px-4 py-3" href="<?php echo esc_url( admin_url( 'admin.php?page=mspress-manage' ) ); ?>">
                            <span class="d-flex flex-column flex-md-row justify-content-between gap-1">
                                <span class="fw-semibold text-body"><?php echo esc_html( get_the_title( $post ) ); ?></span>
                                <span class="small text-secondary"><?php /* translators: %s is the date the Wiki page was last modified. */ echo esc_html( sprintf( esc_html__( 'Updated %s', 'mspress' ), get_the_modified_date( '', $post ) ) ); ?></span>
                            </span>
                        </a>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="text-secondary px-4 pb-4 mb-0"><?php esc_html_e( 'No published Wiki Pages yet.', 'mspress' ); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }

    private function render_resources(): void {
        $resources = [
            [ __( 'Documentation', 'mspress' ), __( 'Read the MSPress guides and product notes.', 'mspress' ), 'dashicons-media-document', 'https://trilb.dev/collection/web-extension/wordpress/mspress' ],
            [ __( 'Community', 'mspress' ), __( 'Connect with other people building their knowledge base.', 'mspress' ), 'dashicons-groups', 'https://trilb.dev/community/' ],
            [ __( 'Ask for Help', 'mspress' ), __( 'Get support when you need a hand with your setup.', 'mspress' ), 'dashicons-sos', 'https://trilb.dev/contact/' ],
            [ __( 'Tell us what you think', 'mspress' ), __( 'Share ideas that can make MSPress better.', 'mspress' ), 'dashicons-format-chat', 'https://trilb.dev/contact/' ],
        ];
        ?>
        <div class="row g-3">
            <?php foreach ( $resources as $resource ) : ?>
                <div class="col-12 col-sm-6 col-xl-3">
                    <a class="mspress-resource-card h-100" href="<?php echo esc_url( $resource[3] ); ?>" target="_blank" rel="noopener noreferrer">
                        <span class="dashicons <?php echo esc_attr( $resource[2] ); ?>" aria-hidden="true"></span>
                        <span class="fw-semibold"><?php echo esc_html( $resource[0] ); ?></span>
                        <span class="small text-secondary"><?php echo esc_html( $resource[1] ); ?></span>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }

    private function summary_card( string $label, int $value, string $slug, string $icon ): void {
        ?>
        <div class="col-12 col-md-4">
            <a class="mspress-summary-card h-100" href="<?php echo esc_url( admin_url( 'admin.php?page=' . $slug ) ); ?>">
                <span class="mspress-summary-icon dashicons <?php echo esc_attr( $icon ); ?>" aria-hidden="true"></span>
                <span class="text-uppercase small fw-semibold text-secondary"><?php echo esc_html( $label ); ?></span>
                <strong class="display-6 mspress-count-ready"><?php echo esc_html( number_format_i18n( $value ) ); ?></strong>
            </a>
        </div>
        <?php
    }

    private function total_count( $counts ): int {
        if ( ! is_object( $counts ) ) {
            return 0;
        }

        return array_sum( array_map( 'absint', get_object_vars( $counts ) ) );
    }

    public function register_assets( Assets $assets ): void {
        $this->register_page_assets( $assets, [ 'mspress' ], 'dashboard' );
    }
}
