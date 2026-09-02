<?php
/**
 * Entra capabilities for the MSPress plugin.
 *
 * @package MSPress
 */
namespace MSPress\Includes\Plugins\Onedrive\Includes\Core;

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
	 * Return OneDrive capability definitions.
	 *
	 * @return array<string, array{group: string, label: string, description: string}>
	 */
	private static function plugin_definitions(): array {
		return [
			'onedrive_files_read' => [
				'group' => 'OneDrive',
				'label' => __( 'Read OneDrive files', 'mspress' ),
				'description' => __( 'Allows reading files through the OneDrive integration.', 'mspress' )
			]
		];
	}
}