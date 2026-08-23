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
			'mspress_create' => __( 'Create Wikis', 'mspress' ),
			'mspress_publish' => __( 'Publish Wikis', 'mspress' ),
			'mspress_edit' => __( 'Edit Wikis', 'mspress' ),
			'mspress_edit_others' => __( 'Edit Others\' Wikis', 'mspress' ),
			'mspress_edit_published' => __( 'Edit Published Wikis', 'mspress' ),
			'mspress_delete' => __( 'Delete Wikis', 'mspress' ),
			'mspress_delete_others' => __( 'Delete Others\' Wikis', 'mspress' ),
			'mspress_delete_published' => __( 'Delete Published Wikis', 'mspress' ),
			'mspress_page_delete' => __( 'Delete Wiki Pages', 'mspress' ),
			'mspress_page_delete_others' => __( 'Delete Others\' Wiki Pages', 'mspress' ),
			'mspress_page_delete_published' => __( 'Delete Published Wiki Pages', 'mspress' ),
			'mspress_settings_general_view' => __( 'View General Settings', 'mspress' ),
			'mspress_settings_general_edit' => __( 'Edit General Settings', 'mspress' ),
			'mspress_settings_layout_view' => __( 'View Layout Settings', 'mspress' ),
			'mspress_settings_layout_edit' => __( 'Edit Layout Settings', 'mspress' ),
			'mspress_settings_access_view' => __( 'View Access Settings', 'mspress' ),
			'mspress_settings_access_edit' => __( 'Edit Access Settings', 'mspress' ),
			'mspress_settings_plugins_view' => __( 'View Plugin Settings', 'mspress' ),
			'mspress_settings_plugins_int_view' => __( 'View Internal Plugin Settings', 'mspress' ),
			'mspress_settings_plugins_int_edit' => __( 'Edit Internal Plugin Settings', 'mspress' ),
			'mspress_settings_plugins_ext_view' => __( 'View Extension Settings', 'mspress' ),
			'mspress_settings_plugins_ext_edit' => __( 'Edit Extension Settings', 'mspress' ),
			'mspress_tools_debug' => __( 'Use MSPress Debug Tools', 'mspress' ),
			'mspress_tools_import' => __( 'Import MSPress Content', 'mspress' ),
			'mspress_tools_export' => __( 'Export MSPress Content', 'mspress' ),
			'mspress_tools_analytics' => __( 'View MSPress Analytics', 'mspress' ),
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