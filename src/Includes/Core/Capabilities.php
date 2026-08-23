<?php
/**
 * Capability definitions for the MSPress plugin.
 *
 * @package MSPress
 */

namespace MSPress\Includes\Core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class Capabilities {
	public static function definitions(): array {
		return [
			'mspress_admin_view' => __( 'View MSPress', 'mspress' ),
			'mspress_settings_plugins_view' => __( 'View Plugin Settings', 'mspress' ),
			'mspress_settings_plugins_int_view' => __( 'View Internal Plugin Settings', 'mspress' ),
			'mspress_settings_plugins_int_edit' => __( 'Edit Internal Plugin Settings', 'mspress' ),
			'mspress_settings_plugins_ext_view' => __( 'View Extension Settings', 'mspress' ),
			'mspress_settings_plugins_ext_edit' => __( 'Edit Extension Settings', 'mspress' ),
			'mspress_settings_connection_view' => __( 'View Microsoft Graph Connection Settings', 'mspress' ),
			'mspress_settings_connection_edit' => __( 'Edit Microsoft Graph Connection Settings', 'mspress' ),
			'mspress_tools_debug' => __( 'Use MSPress Debug Tools', 'mspress' ),
		];
	}

	/**
	 * Add plugin capabilities to the administrator role.
	 *
	 * @return void
	 */
	public static function register(): void {
		$role = get_role( 'administrator' );
		if ( ! $role ) {
			return;
		}

		foreach ( array_keys( self::definitions() ) as $capability ) {
			$role->add_cap( $capability );
		}
	}
}