<?php
/**
 * Settings access restriction fields.
 *
 * @package TrilBDev
 * @subpackage Admin\Manager\Settings
 */
namespace MSPress\Admin\Manager\Settings;

use MSPress\Includes\Functions\Helpers\FormFieldHelper;
use MSPress\Includes\Functions\Helpers\SanitizationHelper;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class SettingsAccess {
	/**
	 * Render access restriction fields.
	 *
	 * @param array<string, mixed> $values Current settings.
	 * @return void
	 */
	public function render( array $values ): void {
		$fields = [
			'create_wikis' => [ 'label' => __( 'Who can create wikis?', 'mspress' ), 'description' => __( 'Choose the minimum capability required to create MSPress wikis.', 'mspress' ), 'tooltip' => __( 'Users without this capability cannot create new wikis.', 'mspress' ) ],
			'write_pages' => [ 'label' => __( 'Who can write wiki pages?', 'mspress' ), 'description' => __( 'Choose the minimum capability required to create or edit wiki pages.', 'mspress' ), 'tooltip' => __( 'This controls editing access to wiki page content.', 'mspress' ) ],
			'view_analytics' => [ 'label' => __( 'Who can check analytics?', 'mspress' ), 'description' => __( 'Choose the minimum capability required to view MSPress analytics.', 'mspress' ), 'tooltip' => __( 'Analytics data is shown only to users who meet this capability.', 'mspress' ), 'tooltip_type' => 'info' ],
			'manage_plugins' => [ 'label' => __( 'Who can manage plugins?', 'mspress' ), 'description' => __( 'Choose the minimum capability required to manage MSPress plugins.', 'mspress' ), 'tooltip' => __( 'Use a trusted administrator-level capability for plugin management.', 'mspress' ), 'tooltip_icon' => 'fa-shield-halved' ],
		];
		foreach ( $fields as $key => $field ) {
			$key = SanitizationHelper::key( $key );
			$id = 'mspress-access-' . $key;
			$name = 'mspress_access[' . $key . ']';
			$options = [
				[ 'value' => 'manage_options', 'label' => __( 'Administrators', 'mspress' ) ],
				[ 'value' => 'edit_posts', 'label' => __( 'Editors', 'mspress' ) ],
				[ 'value' => 'publish_posts', 'label' => __( 'Authors', 'mspress' ) ],
			];
			$current = $values[ $key ] ?? 'manage_options';
			$current = is_array( $current ) ? $current : [ $current ];
			$current = array_values( array_filter( array_map( 'sanitize_key', $current ) ) );
			$selected = [];
			foreach ( $options as $option ) {
				if ( in_array( $option['value'], $current, true ) ) {
					$selected[] = $option;
				}
			}
			if ( empty( $selected ) ) {
				$selected[] = $options[0];
			}
			echo '<tr><th scope="row">' . FormFieldHelper::label( $id, $field['label'], $field ) . '</th><td>' . FormFieldHelper::bootstrap_multiselect( $name, [ 'id' => $id, 'data' => $options, 'selected' => array_column( $selected, 'value' ) ] ) . '</td></tr>';
		}
	}
}
