<?php
/**
 * Migrates legacy TrilB.Dev settings into MSPress storage.
 *
 * @package MSPress
 */

namespace MSPress\Includes\Settings;

use MSPress\Includes\Functions\Helpers\EncryptionHelper;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class MigrationService {
    private const VERSION = '1.0.0';
    private const STATUS_OPTION = 'mspress_migration_status';

    public static function run(): void {
        $status = get_option( self::STATUS_OPTION, [] );
        if ( is_array( $status ) && self::VERSION === ( $status['version'] ?? '' ) && 'complete' === ( $status['state'] ?? '' ) ) {
            return;
        }

        $legacy = self::get_legacy_settings();
        if ( ! is_array( $legacy ) || [] === $legacy ) {
            self::record( 'complete', 'no_legacy_settings' );
            return;
        }

        $current = Settings::get_group( 'ms365', [] ) ?? [];
        if ( self::has_credentials( $current ) ) {
            self::record( 'complete', 'target_already_configured' );
            return;
        }

        if ( ! EncryptionHelper::has_runtime_key() || ! defined( 'TRILBDEV_ENCRYPTION_KEY' ) ) {
            self::record( 'pending', 'encryption_key_unavailable' );
            return;
        }

        $migrated = [
            'enabled' => ( 'on' === ( $legacy['enable_ms365'] ?? 'off' ) ) ? 'on' : 'off',
        ];

        foreach ( [ 'client_id', 'tenant_id', 'client_secret' ] as $field ) {
            $encrypted = isset( $legacy[ $field ] ) && is_string( $legacy[ $field ] ) ? $legacy[ $field ] : '';
            if ( '' === $encrypted ) {
                self::record( 'failed', 'missing_credential_' . $field );
                return;
            }

            $plaintext = EncryptionHelper::decrypt_with_legacy_key( $encrypted );
            if ( null === $plaintext ) {
                self::record( 'failed', 'credential_decryption_failed' );
                return;
            }

            $reencrypted = EncryptionHelper::encrypt( $plaintext );
            if ( null === $reencrypted ) {
                self::record( 'pending', 'credential_reencryption_failed' );
                return;
            }

            $migrated[ $field ] = $reencrypted;
        }

        if ( Settings::set_group( 'ms365', array_merge( $current, $migrated ) ) ) {
            self::record( 'complete', 'migrated' );
        } else {
            self::record( 'pending', 'settings_write_failed' );
        }
    }

    private static function has_credentials( array $settings ): bool {
        foreach ( [ 'client_id', 'tenant_id', 'client_secret' ] as $field ) {
            if ( empty( $settings[ $field ] ) ) {
                return false;
            }
        }

        return true;
    }

    private static function get_legacy_settings(): ?array {
        $option = get_option( 'trilbdev_ms365_settings', null );
        if ( is_array( $option ) ) {
            return $option;
        }

        global $wpdb;
        $table = $wpdb->prefix . 'trilbdev_settings';
        $table_exists = $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $table ) );
        if ( $table_exists !== $table ) {
            return null;
        }

        $serialized = $wpdb->get_var(
            $wpdb->prepare(
                "SELECT setting_value FROM {$table} WHERE setting_key = %s",
                'trilbdev_ms365_settings'
            )
        );
        if ( null === $serialized ) {
            return null;
        }

        $settings = maybe_unserialize( $serialized );
        return is_array( $settings ) ? $settings : null;
    }

    private static function record( string $state, string $reason ): void {
        update_option(
            self::STATUS_OPTION,
            [
                'version' => self::VERSION,
                'state' => $state,
                'reason' => sanitize_key( $reason ),
                'updated_at' => current_time( 'mysql' ),
            ],
            false
        );
    }
}
