<?php
/**
 * Settings for the OneDrive plugin.
 * @package MSPress
 * @subpackage Plugins\Onedrive\Includes
 * @since 1.0.0
 */
namespace MSPress\Includes\Plugins\Onedrive\Includes\Settings;
use MSPress\Includes\Settings\Settings as BaseSettings;
use MSPress\Includes\Functions\Helpers\SanitizationHelper;

final class Settings {
    /**
    * Returns the settings for the OneDrive plugin.
     *
     * @return array The settings array.
     */
    public function register(): void {
        BaseSettings::register_group( 'onedrive', [
            'onedrive_drive_id' => '',
            'connected_email' => '',
            'connected_user_id' => '',
            'connected_at' => 0,
            'refresh_token' => '',
        ] );
    }

    public function get_settings_page(): array {
        return [
            'slug' => 'onedrive',
            'settings_group' => 'onedrive',
            'label' => __( 'OneDrive', 'mspress' ),
            'title' => __( 'OneDrive plugin settings', 'mspress' ),
            'layout' => 'table',
            'fields' => [
                [
                    'key' => 'onedrive_drive_id',
                    'label' => __( 'OneDrive drive ID', 'mspress' ),
                    'description' => __( 'The drive used by the OneDrive file manager.', 'mspress' ),
                    'type' => 'text',
                    'default' => '',
                ],
                [
                    'key' => 'connected_email',
                    'label' => __( 'Connected account', 'mspress' ),
                    'description' => __( 'The Microsoft account authorized for delegated OneDrive access.', 'mspress' ),
                    'type' => 'text',
                    'default' => '',
                ],
            ],
        ];
    }

    public function sanitize( $input ): array {
        $input = is_array( $input ) ? $input : [];
        $current = BaseSettings::get_group( 'onedrive', [] ) ?? [];
        $input['onedrive_drive_id'] = SanitizationHelper::text( $input['onedrive_drive_id'] ?? $current['onedrive_drive_id'] ?? '' );
        $input['connected_email'] = sanitize_email( $current['connected_email'] ?? '' );
        $input['connected_user_id'] = SanitizationHelper::text( $current['connected_user_id'] ?? '' );
        $input['connected_at'] = absint( $current['connected_at'] ?? 0 );
        $input['refresh_token'] = (string) ( $current['refresh_token'] ?? '' );
        BaseSettings::set_group( 'onedrive', $input );
        return $input;
    }
}