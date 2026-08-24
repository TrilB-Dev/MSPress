<?php
/**
 * Settings for the Exchange plugin.
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Includes
 * @since 1.0.0
 */
namespace MSPress\Includes\Plugins\Email\Includes\Settings;
use MSPress\Includes\Settings\Settings as BaseSettings;
use MSPress\Includes\Functions\Helpers\SanitizationHelper;

final class Settings {
    /**
     * Returns the settings for the Exchange plugin.
     *
     * @return array The settings array.
     */
    public function register(): void {
        BaseSettings::register_group( 'demo', [
            'demo_setting_1' => '',
            'demo_setting_2' => false,
        ] );
    }

    public function get_settings_page(): array {
        return [
            'slug' => 'demo',
            'label' => __( 'Exchange', 'mspress' ),
            'title' => __( 'Exchange plugin settings', 'mspress' ),
            'layout' => 'table',
            'fields' => [
                [
                    'key' => 'demo_setting_1',
                    'label' => __( 'Exchange text setting', 'mspress' ),
                    'description' => __( 'A short value used to demonstrate plugin setting metadata.', 'mspress' ),
                    'tooltip' => __( 'This tooltip uses the default question icon.', 'mspress' ),
                    'type' => 'text',
                    'default' => '',
                ],
                [
                    'key' => 'demo_setting_2',
                    'label' => __( 'Enable demo setting', 'mspress' ),
                    'description' => __( 'Toggle the second Exchange setting on or off.', 'mspress' ),
                    'tooltip' => __( 'This tooltip uses the info icon and demonstrates a custom icon override.', 'mspress' ),
                    'tooltip_type' => 'info',
                    'tooltip_icon' => 'fa-circle-exclamation',
                    'default' => false,
                ],
            ],
        ];
    }

    public function sanitize( $input ): array {
        $input = is_array( $input ) ? $input : [];
        $input['demo_setting_1'] = SanitizationHelper::text( $input['demo_setting_1'] ?? '' );
        $input['demo_setting_2'] = ! empty( $input['demo_setting_2'] );
        BaseSettings::set_group( 'demo', $input );
        return $input;
    }
}