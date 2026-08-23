<?php

namespace MSPress\Includes\Plugins\Onedrive\Includes\OneDrive;

use League\OAuth2\Client\Provider\GenericProvider;
use MSPress\Includes\MSGraph\GraphService;

final class OneDriveOAuthService {
    public function __construct(private GraphService $graph, private OneDriveTokenService $tokens) {
    }

    public function get_authorization_url(): string {
        $provider = $this->provider();
        $state = wp_generate_password(32, false);
        $url = $provider->getAuthorizationUrl([
            'scope' => 'openid profile email offline_access User.Read Files.ReadWrite.All',
            'state' => $state,
        ]);
        $user_id = get_current_user_id();
        set_transient('mspress_onedrive_oauth_' . $user_id, [
            'state' => $state,
            'pkce_code' => $provider->getPkceCode(),
        ], 10 * MINUTE_IN_SECONDS);

        return $url;
    }

    public function handle_callback(string $code, string $state): bool {
        $user_id = get_current_user_id();
        $pending = get_transient('mspress_onedrive_oauth_' . $user_id);
        delete_transient('mspress_onedrive_oauth_' . $user_id);
        if (!is_array($pending) || empty($pending['state']) || !hash_equals((string) $pending['state'], $state)) {
            throw new \RuntimeException('Invalid OneDrive OAuth state.');
        }

        $provider = $this->provider();
        if (!empty($pending['pkce_code'])) {
            $provider->setPkceCode((string) $pending['pkce_code']);
        }
        $token = $provider->getAccessToken('authorization_code', ['code' => $code]);
        $response = wp_remote_get('https://graph.microsoft.com/v1.0/me', [
            'timeout' => 30,
            'headers' => ['Authorization' => 'Bearer ' . $token->getToken(), 'Accept' => 'application/json'],
        ]);
        if (is_wp_error($response)) {
            throw new \RuntimeException($response->get_error_message());
        }

        $profile = json_decode(wp_remote_retrieve_body($response), true);
        if (!is_array($profile)) {
            throw new \RuntimeException('Microsoft returned an invalid OneDrive administrator profile.');
        }

        if (!$this->tokens->store_authorization([
            'access_token' => $token->getToken(),
            'refresh_token' => $token->getRefreshToken(),
            'expires' => $token->getExpires(),
            'expires_in' => max(60, ((int) $token->getExpires()) - time()),
        ], [
            'id' => $profile['id'] ?? '',
            'email' => $profile['mail'] ?? $profile['userPrincipalName'] ?? '',
        ])) {
            throw new \RuntimeException('Unable to securely store the OneDrive authorization.');
        }

        return true;
    }

    private function provider(): GenericProvider {
        $tenant_id = $this->graph->get_tenant_id();
        $client_id = $this->graph->get_client_id();
        $client_secret = $this->graph->get_client_secret();
        if (!$tenant_id || !$client_id || !$client_secret) {
            throw new \RuntimeException('Shared Microsoft Graph credentials are not configured.');
        }

        return new GenericProvider([
            'clientId' => $client_id,
            'clientSecret' => $client_secret,
            'redirectUri' => home_url('/ms-onedrive-oauth-callback', 'https'),
            'urlAuthorize' => "https://login.microsoftonline.com/{$tenant_id}/oauth2/v2.0/authorize",
            'urlAccessToken' => "https://login.microsoftonline.com/{$tenant_id}/oauth2/v2.0/token",
            'urlResourceOwnerDetails' => 'https://graph.microsoft.com/v1.0/me',
            'pkceMethod' => 'S256',
        ]);
    }
}
