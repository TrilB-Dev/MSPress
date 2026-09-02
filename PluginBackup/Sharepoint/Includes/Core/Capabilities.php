<?php
/**
 * Entra capabilities for the MSPress plugin.
 *
 * @package MSPress
 */
namespace MSPress\Includes\Plugins\Sharepoint\Includes\Core;

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
	 * Return SharePoint capability definitions.
	 *
	 * @return array<string, array{group: string, label: string, description: string}>
	 */
	private static function plugin_definitions(): array {
		return [
			'sharepoint_files_read' => [
				'group' => 'SharePoint',
				'label' => __( 'Read SharePoint files', 'mspress' ),
				'description' => __( 'Allows reading files through the SharePoint integration.', 'mspress' )
			]
		];
	}
}