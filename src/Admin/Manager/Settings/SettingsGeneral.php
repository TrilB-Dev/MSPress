<?php
/**
 * Settings general fields.
 * @package MSPress
 * @subpackage Admin\Manager\Settings
 * @since 1.0.0
 */
namespace MSPress\Admin\Manager\Settings;

use MSPress\Includes\Functions\Helpers\FormFieldHelper;
use MSPress\Includes\Functions\Helpers\PermalinkHelper;
use MSPress\Includes\Functions\Helpers\SanitizationHelper;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class SettingsGeneral {
	/**
	 * Render general MSPress settings fields.
	 *
	 * @param array<string, mixed> $values Current settings.
	 * @return void
	 */
	public function render( array $values ): void {
		$fields = [
			'root_name' => [ 'label' => __( 'MSPress Root Name', 'mspress' ), 'description' => __( 'The name used for the main MSPress area.', 'mspress' ), 'tooltip' => __( 'This name appears in the admin interface and generated titles.', 'mspress' ) ],
			'root_description' => [ 'label' => __( 'MSPress Description', 'mspress' ), 'description' => __( 'A short description for the MSPress knowledge base.', 'mspress' ), 'tooltip' => __( 'This can be used by themes and integrations when describing the MSPress area.', 'mspress' ), 'type' => 'textarea' ],
			'archive_title' => [ 'label' => __( 'Wiki Archive Title', 'mspress' ), 'description' => __( 'The title shown on Wiki archive and index views.', 'mspress' ), 'tooltip' => __( 'Use a concise title that makes the documentation area clear to visitors.', 'mspress' ) ],
			'archive_description' => [ 'label' => __( 'Wiki Archive Description', 'mspress' ), 'description' => __( 'Supporting text shown on Wiki archive and index views.', 'mspress' ), 'tooltip' => __( 'A short introduction helps visitors understand what they can find in the Wiki.', 'mspress' ), 'type' => 'textarea' ],
			'root_slug' => [ 'label' => __( 'MSPress Root Slug', 'mspress' ), 'description' => __( 'The URL slug for the MSPress root.', 'mspress' ), 'tooltip' => __( 'Use lowercase letters, numbers, and hyphens for the most reliable URLs.', 'mspress' ) ],
			'category_slug' => [ 'label' => __( 'Custom Category Slug', 'mspress' ), 'description' => __( 'The URL slug used for MSPress categories.', 'mspress' ), 'tooltip' => __( 'Changing this value flushes the WordPress rewrite rules.', 'mspress' ), 'tooltip_type' => 'info' ],
			'tag_slug' => [ 'label' => __( 'Custom Tags Slug', 'mspress' ), 'description' => __( 'The URL slug used for MSPress tags.', 'mspress' ), 'tooltip' => __( 'Changing this value flushes the WordPress rewrite rules.', 'mspress' ), 'tooltip_type' => 'info' ],
			'permalink' => [ 'label' => __( 'MSPress Permalink', 'mspress' ), 'description' => __( 'The permalink structure used by MSPress content.', 'mspress' ), 'tooltip' => __( 'Choose a structure that remains readable and stable after publication.', 'mspress' ) ],
			'enable_schema' => [ 'label' => __( 'Enable Documentation Schema', 'mspress' ), 'description' => __( 'Allow MSPress themes and integrations to expose documentation metadata.', 'mspress' ), 'tooltip' => __( 'Keep this enabled when search engines and integrations should understand the Wiki structure.', 'mspress' ), 'type' => 'checkbox', 'default' => true ],
		];
		foreach ( $fields as $key => $field ) {
			$key = SanitizationHelper::key( $key );
			$id = 'mspress-' . $key;
			$name = 'mspress_general[' . $key . ']';
			$value = 'permalink' === $key ? PermalinkHelper::sanitize_pattern( $values[ $key ] ?? '' ) : SanitizationHelper::text( $values[ $key ] ?? $field['default'] ?? '' );
			echo '<tr><th scope="row">' . FormFieldHelper::label( $id, $field['label'], $field ) . '</th><td>';
			if ( 'textarea' === ( $field['type'] ?? '' ) ) {
				echo FormFieldHelper::textarea( $name, $value, [ 'id' => $id, 'rows' => 3 ] );
			} elseif ( 'checkbox' === ( $field['type'] ?? '' ) ) {
				echo FormFieldHelper::checkbox( $name, '1', $field['label'], [ 'id' => $id, 'checked' => ! empty( $values[ $key ] ?? $field['default'] ) ] );
			} else {
				echo FormFieldHelper::text_input( $name, $value, [ 'id' => $id, 'data-permalink-field' => 'permalink' === $key ? 'permalink' : null ] );
			}
			if ( 'permalink' === $key ) {
				echo '<div class="mspress-permalink-tokens mt-2" aria-label="' . esc_attr__( 'Available permalink tokens', 'mspress' ) . '">';
				foreach ( PermalinkHelper::token_definitions() as $token => $description ) {
					echo FormFieldHelper::button( $token, [
						'class' => 'btn-sm btn-outline-secondary me-1 mb-1',
						'type' => 'button',
						'attributes' => [
							'data-permalink-token' => $token,
							'title' => $description,
						],
					] );
				}
				echo '</div><div class="form-text">' . esc_html__( 'Click a token to add it to the pattern. Tokens are inserted with a trailing slash and reappear when removed.', 'mspress' ) . '</div>';
			}
			echo '</td></tr>';
		}
	}
}
