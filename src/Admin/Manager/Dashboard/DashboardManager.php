<?php

namespace MSPress\Admin\Manager\Dashboard;

use MSPress\Admin\Manager\Manager;
use MSPress\Assets\Assets;
use MSPress\Includes\MSGraph\GraphService;
use MSPress\Includes\Plugins\DashboardProviderInterface;
use MSPress\Includes\Plugins\Plugins;

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
        $this->render_statuses();
        $this->render_cards();
        $this->footer();
    }

    private function render_statuses(): void {
        $statuses = [
            [
                'label'    => __( 'Microsoft Graph', 'mspress' ),
                'state'    => $this->graph_state(),
                'message'  => $this->graph_message(),
                'icon'     => 'dashicons-cloud',
                'url'      => admin_url( 'admin.php?page=mspress-settings&tab=connection' ),
                'priority' => 10,
            ],
        ];

        foreach ( Plugins::get_instance()->get_registered_plugins() as $plugin ) {
            if ( $plugin instanceof DashboardProviderInterface && Plugins::get_instance()->is_plugin_enabled( $plugin->get_slug() ) ) {
                foreach ( $plugin->get_dashboard_statuses() as $status ) {
                    if ( is_array( $status ) && $this->can_render( $status ) ) {
                        $statuses[] = $status;
                    }
                }
            }
        }
        $filtered_statuses = apply_filters( 'mspress_dashboard_statuses', $statuses );
        $statuses = is_array( $filtered_statuses ) ? array_filter( $filtered_statuses, [ $this, 'can_render' ] ) : [];
        usort( $statuses, static fn( $left, $right ) => (int) ( $left['priority'] ?? 100 ) <=> (int) ( $right['priority'] ?? 100 ) );
        ?>
        <section class="mb-4" aria-labelledby="mspress-dashboard-statuses">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 id="mspress-dashboard-statuses" class="h5 mb-0"><?php esc_html_e( 'Connection status', 'mspress' ); ?></h2>
                <span class="small text-secondary"><?php esc_html_e( 'Live service readiness', 'mspress' ); ?></span>
            </div>
            <div class="row g-3">
                <?php foreach ( $statuses as $status ) : ?>
                    <?php $this->status_card( $status ); ?>
                <?php endforeach; ?>
            </div>
        </section>
        <?php
    }

    private function render_cards(): void {
        $filtered_cards = apply_filters( 'mspress_dashboard_cards', [] );
        $cards = is_array( $filtered_cards ) ? array_filter( $filtered_cards, [ $this, 'can_render' ] ) : [];
        foreach ( Plugins::get_instance()->get_registered_plugins() as $plugin ) {
            if ( $plugin instanceof DashboardProviderInterface && Plugins::get_instance()->is_plugin_enabled( $plugin->get_slug() ) ) {
                foreach ( $plugin->get_dashboard_cards() as $card ) {
                    if ( is_array( $card ) && $this->can_render( $card ) ) {
                        $cards[] = $card;
                    }
                }
            }
        }
        usort( $cards, static fn( $left, $right ) => (int) ( $left['priority'] ?? 100 ) <=> (int) ( $right['priority'] ?? 100 ) );
        ?>
        <section aria-labelledby="mspress-dashboard-cards">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 id="mspress-dashboard-cards" class="h5 mb-0"><?php esc_html_e( 'MSPress services', 'mspress' ); ?></h2>
                <span class="small text-secondary"><?php esc_html_e( 'Provided by installed extensions', 'mspress' ); ?></span>
            </div>
            <div class="row g-3">
                <?php foreach ( $cards as $card ) : ?>
                    <?php $this->dashboard_card( $card ); ?>
                <?php endforeach; ?>
                <?php if ( empty( $cards ) ) : ?>
                    <div class="col-12"><p class="text-secondary mb-0"><?php esc_html_e( 'No service cards have been registered yet.', 'mspress' ); ?></p></div>
                <?php endif; ?>
            </div>
        </section>
        <?php
    }

    private function status_card( array $status ): void {
        $state = in_array( $status['state'] ?? '', [ 'connected', 'ready', 'warning', 'error', 'disabled' ], true ) ? $status['state'] : 'warning';
        $state_labels = [ 'connected' => __( 'Connected', 'mspress' ), 'ready' => __( 'Ready', 'mspress' ), 'warning' => __( 'Attention needed', 'mspress' ), 'error' => __( 'Unavailable', 'mspress' ), 'disabled' => __( 'Disabled', 'mspress' ) ];
        $content = '<span class="mspress-summary-icon dashicons ' . esc_attr( $status['icon'] ?? 'dashicons-admin-generic' ) . '" aria-hidden="true"></span><span class="text-uppercase small fw-semibold text-secondary">' . esc_html( $status['label'] ?? __( 'Service', 'mspress' ) ) . '</span><strong class="h5 mb-1">' . esc_html( $state_labels[ $state ] ) . '</strong><span class="small text-secondary">' . esc_html( $status['message'] ?? '' ) . '</span>';
        $this->linked_dashboard_item( $content, $status['url'] ?? '' );
    }

    private function dashboard_card( array $card ): void {
        $content = '<span class="mspress-summary-icon dashicons ' . esc_attr( $card['icon'] ?? 'dashicons-admin-generic' ) . '" aria-hidden="true"></span><span class="fw-semibold text-body">' . esc_html( $card['title'] ?? __( 'Service', 'mspress' ) ) . '</span>';
        if ( isset( $card['value'] ) ) {
            $content .= '<strong class="h4 mb-0">' . esc_html( (string) $card['value'] ) . '</strong>';
        }
        $content .= '<span class="small text-secondary">' . esc_html( $card['description'] ?? '' ) . '</span>';
        $this->linked_dashboard_item( $content, $card['url'] ?? '' );
    }

    private function linked_dashboard_item( string $content, string $url ): void {
        $tag = '' !== $url ? 'a' : 'div';
        $attributes = '' !== $url ? ' href="' . esc_url( $url ) . '"' : '';
        echo '<' . $tag . $attributes . ' class="mspress-summary-card h-100 d-flex flex-column gap-1">' . $content . '</' . $tag . '>';
    }

    private function graph_state(): string {
        $graph = GraphService::get_instance();
        if ( null !== $graph->get_connection_error() ) {
            return 'error';
        }
        return null !== $graph->get_graph() ? 'connected' : 'error';
    }

    private function graph_message(): string {
        $graph = GraphService::get_instance();
        if ( null !== $graph->get_connection_error() ) {
            return __( 'Review the Microsoft Graph settings and connection diagnostics.', 'mspress' );
        }

        return null !== $graph->get_graph() ? __( 'Microsoft Graph connection is active.', 'mspress' ) : __( 'Configure Microsoft Graph credentials to activate this service.', 'mspress' );
    }

    private function can_render( $item ): bool {
        return is_array( $item ) && ( empty( $item['capability'] ) || current_user_can( $item['capability'] ) );
    }

    public function register_assets( Assets $assets ): void {
        $this->register_page_assets( $assets, [ 'mspress' ], 'dashboard' );
    }
}
