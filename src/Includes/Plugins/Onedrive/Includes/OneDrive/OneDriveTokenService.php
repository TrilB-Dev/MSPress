<?php

namespace MSPress\Includes\Plugins\Onedrive\Includes\OneDrive;

use MSPress\Includes\Functions\Helpers\EncryptionHelper;
use MSPress\Includes\Functions\Helpers\LoggerHelper;
use MSPress\Includes\MSGraph\GraphService;
use MSPress\Includes\Settings\Settings;

final class OneDriveTokenService {
    private const ACCESS_TOKEN_TRANSIENT = 'mspress_onedrive_access_token';

    public function __construct(private GraphService $graph) {
    }

    public function get_access_token(): ?string {
        $cached = get_transient(self::ACCESS_TOKEN_TRANSIENT);
        if (is_array($cached) && !empty($cached['access_token']) && (int) ($cached['expires'] ?? 0) > time() + 300) {
            return (string) $cached['access_token'];
        }

        $settings = Settings::get_group('onedrive', []) ?? [];
        $encrypted_refresh_token = (string) ($settings['refresh_token'] ?? '');
        $refresh_token = $encrypted_refresh_token !== '' ? EncryptionHelper::decrypt($encrypted_refresh_token) : null;
        if (!$refresh_token) {
            LoggerHelper::write_log('OneDrive token error: no delegated refresh token is configured.');
            return null;
        }

        $tenant_id = $this->graph->get_tenant_id();
        $client_id = $this->graph->get_client_id();
        $client_secret = $this->graph->get_client_secret();
        if (!$tenant_id || !$client_id || !$client_secret) {
            LoggerHelper::write_log('OneDrive token error: shared Graph credentials are unavailable.');
            return null;
        }

        $response = wp_remote_post("https://login.microsoftonline.com/{$tenant_id}/oauth2/v2.0/token", [
            'timeout' => 30,
            'body' => [
                'grant_type' => 'refresh_token',
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'refresh_token' => $refresh_token,
                'scope' => 'openid profile email offline_access User.Read Files.ReadWrite.All',
            ],
            'headers' => ['Content-Type' => 'application/x-www-form-urlencoded'],
        ]);

        if (is_wp_error($response)) {
            LoggerHelper::write_log('OneDrive token refresh failed: ' . $response->get_error_message());
            return null;
        }

        $body = json_decode(wp_remote_retrieve_body($response), true);
        if (!is_array($body) || empty($body['access_token'])) {
            LoggerHelper::write_log('OneDrive token refresh returned no access token.');
            return null;
        }

        $this->cache_access_token($body);
        if (!empty($body['refresh_token'])) {
            $this->store_refresh_token((string) $body['refresh_token']);
        }

        return (string) $body['access_token'];
    }

    public function store_authorization(array $token_data, array $user_data = []): bool {
        if (empty($token_data['refresh_token'])) {
            return false;
        }

        $settings = Settings::get_group('onedrive', []) ?? [];
        $encrypted = EncryptionHelper::encrypt((string) $token_data['refresh_token']);
        if ($encrypted === null) {
            LoggerHelper::write_log('OneDrive token error: refresh token encryption failed.');
            return false;
        }

        $settings['refresh_token'] = $encrypted;
        $settings['connected_email'] = sanitize_email((string) ($user_data['email'] ?? ''));
        $settings['connected_user_id'] = sanitize_text_field((string) ($user_data['id'] ?? ''));
        $settings['connected_at'] = time();
        Settings::set_group('onedrive', $settings);
        $this->cache_access_token($token_data);

        return true;
    }

    public function is_connected(): bool {
        $settings = Settings::get_group('onedrive', []) ?? [];
        return !empty($settings['refresh_token']);
    }

    private function store_refresh_token(string $refresh_token): void {
        $settings = Settings::get_group('onedrive', []) ?? [];
        $encrypted = EncryptionHelper::encrypt($refresh_token);
        if ($encrypted !== null) {
            $settings['refresh_token'] = $encrypted;
            Settings::set_group('onedrive', $settings);
        }
    }

    private function cache_access_token(array $token_data): void {
        $expires_in = max(60, (int) ($token_data['expires_in'] ?? 3600));
        set_transient(self::ACCESS_TOKEN_TRANSIENT, [
            'access_token' => (string) $token_data['access_token'],
            'expires' => time() + $expires_in,
        ], $expires_in);
    }
}
