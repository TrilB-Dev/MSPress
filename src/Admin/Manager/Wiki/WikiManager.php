<?php

namespace MSPress\Admin\Manager\Wiki;

use MSPress\Admin\Manager\Manager;
use MSPress\Assets\Assets;
use MSPress\Includes\Functions\Admin\FunctionsWiki;
use MSPress\Includes\Core\PostType;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class WikiManager extends Manager {
    public function __construct( private FunctionsWiki $functions ) {
    }

    public function register_assets( Assets $assets ): void {
        $this->register_page_assets( $assets, [ 'mspress-manage' ], 'wiki' );
    }

    public function render(): void {
        $this->header( __( 'Manage Wiki', 'mspress' ) );
        $notice = $this->functions->save_wiki();
        if ( '' !== $notice ) {
            echo wp_kses_post( $notice );
        }

        $wikis = new \WP_Query(
            [
                'post_type' => PostType::WIKI,
                'post_status' => [ 'publish', 'draft', 'pending' ],
                'posts_per_page' => 20,
                'orderby' => 'date',
                'order' => 'DESC',
            ]
        );
        ?>
        <div class="row g-4">
            <div class="col-12 col-xl-7">
                <div class="card mspress-wiki-manager-card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="h4 mb-0"><?php esc_html_e( 'Wikis', 'mspress' ); ?></h2>
                            <span class="badge text-bg-light"><?php echo esc_html( (string) $wikis->found_posts ); ?></span>
                        </div>
                        <?php if ( $wikis->have_posts() ) : ?>
                            <div class="list-group list-group-flush">
                                <?php while ( $wikis->have_posts() ) : $wikis->the_post(); ?>
                                    <div class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong><?php the_title(); ?></strong>
                                            <div class="small text-secondary"><?php echo esc_html( get_post_status_object( get_post_status() )->label ?? get_post_status() ); ?></div>
                                        </div>
                                        <a class="btn btn-sm btn-outline-primary" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'View', 'mspress' ); ?></a>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php else : ?>
                            <p class="text-secondary mb-0"><?php esc_html_e( 'No wikis have been created yet.', 'mspress' ); ?></p>
                        <?php endif; wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h2 class="h4 mb-3"><?php esc_html_e( 'Create a wiki', 'mspress' ); ?></h2>
                        <form method="post">
                            <input type="hidden" name="mspress_action" value="create_wiki">
                            <?php wp_nonce_field( 'mspress_create_wiki', 'mspress_create_wiki_nonce' ); ?>
                            <div class="mb-3">
                                <label class="form-label" for="mspress-wiki-name"><?php esc_html_e( 'Name', 'mspress' ); ?></label>
                                <input class="form-control" id="mspress-wiki-name" name="mspress_wiki[name]" type="text" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="mspress-wiki-description"><?php esc_html_e( 'Description', 'mspress' ); ?></label>
                                <textarea class="form-control" id="mspress-wiki-description" name="mspress_wiki[description]" rows="4"></textarea>
                            </div>
                            <button class="btn btn-primary" type="submit"><?php esc_html_e( 'Create wiki', 'mspress' ); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $this->footer();
    }
}
