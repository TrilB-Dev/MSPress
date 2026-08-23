<?php
/**
 * CredentialService class for the MSPress plugin.
 *
 * @package MSPress
 */
namespace MSPress\Includes\MSGraph;

use MSPress\Includes\Functions\Helpers\EncryptionHelper;
use MSPress\Includes\Settings\Settings;

final class CredentialService {
    /**
     * Check if the plugin has an encryption key set.
     *
     * @return bool True if the encryption key is set, false otherwise.
     */
    public function has_encryption_key(): bool {
        return EncryptionHelper::has_runtime_key();
    }
    /**
     * Get the tenant ID from the plugin settings.
     *
     * @return string|null The tenant ID, or null if not set or if the encryption key is missing.
     */
    public function get_tenant_id(): ?string {
        return $this->get_credential('tenant_id');
    }
    /**
     * Get the client ID from the plugin settings.
     *
     * @return string|null The client ID, or null if not set or if the encryption key is missing.
     */
    public function get_client_id(): ?string {
        return $this->get_credential('client_id');
    }
    /**
     * Get the client secret from the plugin settings.
     *
     * @return string|null The client secret, or null if not set or if the encryption key is missing.
     */
    public function get_client_secret(): ?string {
        return $this->get_credential('client_secret');
    }
    /**
     * Get a credential value from the plugin settings.
     *
     * @param string $name The name of the credential to retrieve.
     * @return string|null The credential value, or null if not set or if the encryption key is missing.
     */
    private function get_credential(string $name): ?string {
        $options = Settings::get_group('ms365') ?? [];
        if (empty($options[$name]) || !$this->has_encryption_key()) {
            return null;
        }

        try {
            return (string) EncryptionHelper::decrypt($options[$name]);
        } catch (\Throwable $e) {
            return null;
        }
    }
}
