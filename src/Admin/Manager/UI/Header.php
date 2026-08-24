<?php
/**
 * Header UI component for MSPress admin pages.
 *
 * @package MSPress
 * @subpackage Admin\Manager\UI
 * @since 1.0.0
 */
namespace MSPress\Admin\Manager\UI;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class Header {
	/**
	 * Renders the header for MSPress admin pages.
	 *
	 * @return void
	 */
	public static function render(): void {
		$links = [
					[ 
					'label' => __( 'Documentation', 'mspress' ), 
					'url' => 'https://github.com/TrilB-Dev/MSPress'
					],
					[ 
					'label' => __( 'Community', 'mspress' ), 
					'url' => 'https://github.com/TrilB-Dev/MSPress/discussions'
					],
					[ 
					'label' => __( 'Extensions', 'mspress' ), 
					'url' => 'https://github.com/TrilB-Dev/MSPress'
					],
					[ 
					'label' => __( 'Support', 'mspress' ), 
					'url' => 'https://github.com/TrilB-Dev/MSPress/issues'
					],
					[ 
					'label' => __( 'Roadmap', 'mspress' ), 
					'url' => 'https://github.com/TrilB-Dev/MSPress/issues'
					],
					[ 
					'label' => __( 'Account', 'mspress' ), 
					'url' => 'https://github.com/TrilB-Dev/MSPress'
					],
			];
		?>
		<header class="mspress-header border-bottom">
			<nav class="navbar navbar-expand-lg" aria-label="<?php esc_attr_e( 'MSPress header navigation', 'mspress' ); ?>"> 
				<div class="container-fluid mspress-shell px-3 px-lg-4">
					<a href="<?php echo esc_url( admin_url( 'admin.php?page=mspress' ) ); ?>">
						<img class="navbar-brand d-flex align-items-center gap-2 src="<?php echo esc_url( MSPRESS_ASSETS_URL . '/Images/Logo/MSPress-Logo.svg' ); ?>" alt="" />
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mspress-header-menu" aria-controls="mspress-header-menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle header navigation', 'mspress' ); ?>">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="mspress-header-menu">
						<ul class="navbar-nav ms-auto align-items-lg-start gap-lg-1">
							<?php foreach ( $links as $link ) : ?>
								<li class="nav-item"><a class="nav-link" href="<?php echo esc_url( $link['url'] ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $link['label'] ); ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<?php
	}
}
