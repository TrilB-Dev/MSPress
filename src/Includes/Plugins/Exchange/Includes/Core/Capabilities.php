<?php
/**
 * Entra capabilities for the MSPress plugin.
 *
 * @package MSPress
 */
namespace MSPress\Includes\Plugins\Exchange\Includes\Core;

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
	 * Return Exchange capability definitions.
	 *
	 * @return array<string, array{group: string, label: string, description: string}>
	 */
	private static function plugin_definitions(): array {
		return [
			'exchange_mail_send' => [
				'group' => 'Exchange',
				'label' => __( 'Send Exchange mail', 'mspress' ),
				'description' => __( 'Allows sending mail through the configured Exchange integration.', 'mspress' )
			]
		];
	}
}