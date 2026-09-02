<?php
/**
 * Entra capabilities for the MSPress plugin.
 *
 * @package MSPress
 */
namespace MSPress\Includes\Plugins\Entra\Includes\Core;

use MSPress\Includes\Core\Capabilities as CoreCapabilities;

final class Capabilities {
	/**
	 * Register Entra capabilities with MSPress core.
	 *
	 * @return void
	 */
	public static function register(): void {
		CoreCapabilities::extend( self::plugin_definitions() );
	}

	/**
	 * Return Entra capability definitions.
	 *
	 * @return array<string, array{group: string, label: string, description: string}>
	 */
	private static function plugin_definitions(): array {
		return [
			'entra_int_read' => [ 
				'group' => 'Entra', 
				'label' => __( 'Read Entra', 'mspress' ),
				'description' => __( 'Allows reading internal MSPress content.', 'mspress' ) 
			]
		];
	}
}