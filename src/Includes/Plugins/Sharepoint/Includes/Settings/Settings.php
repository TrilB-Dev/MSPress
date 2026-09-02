<?php
/**
 * Settings for the Demo plugin.
 * @package MSPress
 * @subpackage Includes\Plugins\Sharepoint\Includes
 * @since 1.0.0
 */
namespace MSPress\Includes\Plugins\Sharepoint\Includes\Settings;
use MSPress\Includes\Settings\Settings as BaseSettings;
use MSPress\Includes\Functions\Helpers\SanitizationHelper;

final class Settings {
    /**
     * Returns the settings for the Demo plugin.
     *
     * @return array The settings array.
     */
    public function register(): void {
        BaseSettings::register_group( 'sharepoint', [
            'sharepoint_setting_1' => '',
            'sharepoint_setting_2' => false,
        ] );
    }

    public function get_settings_page(): array {
        return [
            'slug' => 'sharepoint',
            'settings_group' => 'sharepoint',
            'label' => __( 'SharePoint', 'mspress' ),
            'title' => __( 'SharePoint plugin settings', 'mspress' ),
            'layout' => 'table',
            'fields' => [
                [
                    'key' => 'sharepoint_setting_1',
                    'label' => __( 'SharePoint text setting', 'mspress' ),
                    'description' => __( 'A short value used to demonstrate SharePoint plugin setting metadata.', 'mspress' ),
                    'tooltip' => __( 'This tooltip uses the default question icon.', 'mspress' ),
                    'type' => 'text',
                    'default' => '',
                ],
                [
                    'key' => 'sharepoint_setting_2',
                    'label' => __( 'Enable SharePoint setting', 'mspress' ),
                    'description' => __( 'Toggle the second SharePoint setting on or off.', 'mspress' ),
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
        $input['sharepoint_setting_1'] = SanitizationHelper::text( $input['sharepoint_setting_1'] ?? '' );
        $input['sharepoint_setting_2'] = ! empty( $input['sharepoint_setting_2'] );
        BaseSettings::set_group( 'sharepoint', $input );
        return $input;
    }
}