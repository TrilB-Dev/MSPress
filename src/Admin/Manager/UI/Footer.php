<?php
/**
 * Footer UI component for MSPress admin pages.
 *
 * @package MSPress
 * @subpackage Admin\Manager\UI
 * @since 1.0.0
 */
namespace MSPress\Admin\Manager\UI;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class Footer {
	public static function render(): void {
		?>
					</section>
				</div>
			</div>
		</main>
		<footer class="mspress-footer border-top">
			<div class="container-fluid px-3 px-lg-4 py-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
				<span class="small text-secondary">&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> MSPress</span>
				<span class="small text-secondary"><?php esc_html_e( 'Powered by', 'mspress' ); ?> <a class="fw-semibold text-decoration-none" href="https://trilb.dev/collection/web-extension/wordpress/mspress" target="_blank" rel="noopener noreferrer">MSPress</a></span>
			</div>
		</footer>
		<?php
	}
}
