<?php
/**
 * MSPress encryption helpers.
 *
 * @package MSPress
 */

namespace MSPress\Includes\Functions\Helpers;

use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class EncryptionHelper {
    /**
     * Encrypt a value using the runtime encryption key.
     *
     * @param string $value The value to encrypt.
     * @return string|null The encrypted value or null on failure.
     */
    public static function encrypt( string $value ): ?string {
        if ( '' === $value ) {
            return '';
        }

        $key = self::load_key( self::runtime_key() );
        if ( null === $key ) {
            return null;
        }

        try {
            return Crypto::encrypt( $value, $key );
        } catch ( \Throwable $exception ) {
            return null;
        }
    }
    /**
     * Decrypt a value using the runtime encryption key.
     *
     * @param string $value The value to decrypt.
     * @return string|null The decrypted value or null on failure.
     */
    public static function decrypt( string $value ): ?string {
        return self::decrypt_with_key( $value, self::runtime_key() );
    }
    /**
     * Decrypt a value using the legacy encryption key.
     *
     * @param string $value The value to decrypt.
     * @return string|null The decrypted value or null on failure.
     */
    public static function decrypt_with_legacy_key( string $value ): ?string {
        if ( ! defined( 'TRILBDEV_ENCRYPTION_KEY' ) ) {
            return null;
        }

        return self::decrypt_with_key( $value, (string) constant( 'TRILBDEV_ENCRYPTION_KEY' ) );
    }
    /**
     * Check if a runtime encryption key is available.
     *
     * @return bool True if a runtime key is available, false otherwise.
     */
    public static function has_runtime_key(): bool {
        return null !== self::load_key( self::runtime_key() );
    }
    /**
     * Decrypt a value using a specified key.
     *
     * @param string $value The value to decrypt.
     * @param string|null $key_value The key to use for decryption.
     * @return string|null The decrypted value or null on failure.
     */
    private static function decrypt_with_key( string $value, ?string $key_value ): ?string {
        if ( '' === $value ) {
            return '';
        }

        $key = self::load_key( $key_value );
        if ( null === $key ) {
            return null;
        }

        try {
            return Crypto::decrypt( $value, $key );
        } catch ( \Throwable $exception ) {
            return null;
        }
    }
    /**
     * Get the runtime encryption key from the defined constant.
     *
     * @return string|null The runtime encryption key or null if not defined.
     */
    private static function runtime_key(): ?string {
        if ( ! defined( 'MSPRESS_ENCRYPTION_KEY' ) ) {
            return null;
        }

        return (string) constant( 'MSPRESS_ENCRYPTION_KEY' );
    }
    /**
     * Load a key from an ASCII-safe string.
     *
     * @param string|null $value The ASCII-safe string representation of the key.
     * @return Key|null The loaded key or null on failure.
     */
    private static function load_key( ?string $value ): ?Key {
        if ( null === $value || '' === $value || 'placeholder-key-for-intelephense' === $value ) {
            return null;
        }

        try {
            return Key::loadFromAsciiSafeString( $value );
        } catch ( \Throwable $exception ) {
            return null;
        }
    }
}
