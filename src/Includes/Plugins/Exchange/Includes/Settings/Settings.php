<?php
/**
 * Settings for the Exchange plugin.
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Includes
 * @since 1.0.0
 */
namespace MSPress\Includes\Plugins\Exchange\Includes\Settings;
use MSPress\Includes\Settings\Settings as BaseSettings;
use MSPress\Includes\Functions\Helpers\SanitizationHelper;
use MSPress\Includes\Functions\Helpers\EncryptionHelper;

final class Settings {
    /**
     * Returns the settings for the Exchange plugin.
     *
     * @return array The settings array.
     */
    public function register(): void {
        BaseSettings::register_group( 'exchange', [
            'enabled' => false,
            'default_sender' => '',
            'sender_profiles' => [],
        ] );
    }

    public function get_settings_page(): array {
        return [
            'slug' => 'exchange',
            'label' => __( 'Exchange', 'mspress' ),
            'title' => __( 'Microsoft Exchange email settings', 'mspress' ),
            'layout' => 'box',
            'fields' => [
                [
                    'key' => 'enabled',
                    'label' => __( 'Send WordPress email through Microsoft Graph', 'mspress' ),
                    'description' => __( 'When enabled, WordPress email is sent with the configured Microsoft 365 application instead of the local mail transport.', 'mspress' ),
                    'type' => 'checkbox',
                    'default' => false,
                ],
                [
                    'key' => 'default_sender',
                    'label' => __( 'Default sender email', 'mspress' ),
                    'description' => __( 'Use an enabled sender profile, including a shared mailbox such as info@example.com.', 'mspress' ),
                    'type' => 'email',
                    'default' => '',
                ],
                [
                    'key' => 'sender_profiles',
                    'label' => __( 'Sender profiles', 'mspress' ),
                    'description' => __( 'Enter a JSON array with email, name, type (user or shared), and enabled fields. A shared mailbox still requires the matching Microsoft Graph application permission.', 'mspress' ),
                    'type' => 'textarea',
                    'default' => '[]',
                ],
            ],
        ];
    }

    public function sanitize( $input ): array {
        $input = is_array( $input ) ? $input : [];
        $raw_profiles = $input['sender_profiles'] ?? [];
        if ( is_string( $raw_profiles ) ) {
            $raw_profiles = json_decode( wp_unslash( $raw_profiles ), true );
        }
        $profiles = [];
        foreach ( (array) $raw_profiles as $profile ) {
            if ( ! is_array( $profile ) ) {
                continue;
            }
            $email = sanitize_email( $profile['email'] ?? '' );
            if ( ! is_email( $email ) ) {
                continue;
            }
            $encrypted_email = EncryptionHelper::encrypt( $email );
            if ( null === $encrypted_email ) {
                continue;
            }
            $profiles[] = [
                'address' => $encrypted_email,
                'name' => SanitizationHelper::text( $profile['name'] ?? '' ),
                'type' => in_array( $profile['type'] ?? '', [ 'user', 'shared' ], true ) ? $profile['type'] : 'user',
                'enabled' => ! empty( $profile['enabled'] ),
            ];
        }
        $input = [
            'enabled' => ! empty( $input['enabled'] ),
            'default_sender' => sanitize_email( $input['default_sender'] ?? '' ),
            'sender_profiles' => $profiles,
        ];
        BaseSettings::set_group( 'exchange', $input );
        return $input;
    }
}