<?php
/**
 * TokenService class for handling Microsoft Graph access tokens in the MSPress plugin.
 *
 * @package MSPress
 */
namespace MSPress\Includes\MSGraph;

use MSPress\Includes\Functions\Helpers\LoggerHelper as utilities;
use MSPress\Includes\Functions\Helpers\MS365ConnectionHelper;

final class TokenService {
    /**
     * Constructor for TokenService.
     *
     * @param CredentialService $credentials The credential service used for retrieving client credentials.
     */
    public function __construct(
        private CredentialService $credentials
    ) {
    }
    /**
     * Get the access token for Microsoft Graph API.
     *
     * @return string|null The access token or null if retrieval fails.
     */
    public function getAccessToken(): ?string {
        $token = get_transient('mspress_msgraph_token');
        if (is_array($token) && !empty($token['access_token'])) {
            if (!isset($token['expires']) || $token['expires'] > (time() + 300)) {
                return $token['access_token'];
            }
        }

        try {
            if (!$this->credentials->has_encryption_key()) {
                utilities::write_log('MSGraph getAccessToken error: MSPRESS_ENCRYPTION_KEY is not configured.');
                return null;
            }

            $clientId = trim((string) $this->credentials->get_client_id());
            $tenantId = MS365ConnectionHelper::normalize_tenant_id(trim((string) $this->credentials->get_tenant_id()));
            $clientSecret = trim((string) $this->credentials->get_client_secret());

            if (empty($tenantId) || !MS365ConnectionHelper::is_valid_tenant_identifier($tenantId)) {
                utilities::write_log('MSGraph getAccessToken error: Tenant ID is missing or invalid after normalization.');
                return null;
            }

            if (in_array(strtolower($tenantId), ['common', 'organizations', 'consumers'], true)) {
                utilities::write_log('MSGraph getAccessToken error: Tenant ID cannot be common, organizations, or consumers for client_credentials flow.');
                return null;
            }

            $tokenUrl = "https://login.microsoftonline.com/{$tenantId}/oauth2/v2.0/token";
            $tokenRequestArgs = [
                'body' => [
                    'grant_type' => 'client_credentials',
                    'client_id' => $clientId,
                    'client_secret' => $clientSecret,
                    'scope' => 'https://graph.microsoft.com/.default',
                ],
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
            ];

            utilities::write_log('MSGraph WP token request URL: ' . $tokenUrl);
            utilities::write_log('MSGraph WP token request fields: ' . implode(', ', array_keys($tokenRequestArgs['body'])));

            $response = wp_remote_post($tokenUrl, $tokenRequestArgs);
            if (is_wp_error($response)) {
                utilities::write_log('MSGraph token request error: ' . $response->get_error_message());
                return $this->fetch_access_token_via_curl($tokenUrl, $tokenRequestArgs['body']);
            }

            $statusCode = (int) wp_remote_retrieve_response_code($response);
            $contentType = (string) wp_remote_retrieve_header($response, 'content-type');
            $bodyString = wp_remote_retrieve_body($response);
            utilities::write_log('MSGraph WP token response status: ' . $statusCode . ', Content-Type: ' . $contentType);

            $body = json_decode($bodyString, true);
            if (!is_array($body) || empty($body['access_token'])) {
                utilities::write_log('MSGraph WP token response fields: ' . (is_array($body) ? implode(', ', array_keys($body)) : 'invalid JSON'));
                utilities::write_log('MSGraph token response missing access_token. Falling back to cURL.');
                return $this->fetch_access_token_via_curl($tokenUrl, $tokenRequestArgs['body']);
            }

            return $this->cacheToken($body);
        } catch (\Throwable $e) {
            utilities::write_log('MSGraph getAccessToken error: ' . $e->getMessage());
            return null;
        }
    }
    /**
     * Fetch access token using cURL as a fallback method.
     *
     * @param string $tokenUrl The token endpoint URL.
     * @param array $postBody The POST body parameters for the token request.
     * @return string|null The access token or null if retrieval fails.
     */
    private function fetch_access_token_via_curl(string $tokenUrl, array $postBody): ?string {
        $bodyString = http_build_query($postBody, '', '&', PHP_QUERY_RFC3986);
        utilities::write_log('MSGraph fallback cURL token request starting. URL: ' . $tokenUrl);
        $ch = curl_init($tokenUrl);
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $bodyString,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
            CURLOPT_USERAGENT => 'MSPress/1.0',
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/x-www-form-urlencoded',
                'Accept: application/json',
            ],
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2 | CURL_SSLVERSION_MAX_TLSv1_2,
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);

        utilities::write_log('MSGraph fallback cURL token request result: HTTP ' . $httpCode . ', error: ' . $curlError);
        if ($response === false || $httpCode !== 200) {
            utilities::write_log('MSGraph fallback cURL token request failed: HTTP ' . $httpCode . ', error: ' . $curlError);
            return null;
        }

        $body = json_decode($response, true);
        if (!is_array($body) || empty($body['access_token'])) {
            utilities::write_log('MSGraph fallback cURL token response fields: ' . (is_array($body) ? implode(', ', array_keys($body)) : 'invalid JSON'));
            return null;
        }

        utilities::write_log('MSGraph fallback cURL token request succeeded.');
        return $this->cacheToken($body);
    }
    /**
     * Cache the access token in a transient for future use.
     *
     * @param array $body The response body containing the access token and expiration.
     * @return string|null The cached access token or null if caching fails.
     */
    private function cacheToken(array $body): ?string {
        $expiresIn = (int) ($body['expires_in'] ?? 3600);
        $tokenData = [
            'access_token' => $body['access_token'],
            'expires' => time() + $expiresIn,
        ];
        set_transient('mspress_msgraph_token', $tokenData, $expiresIn);

        return $body['access_token'];
    }
}
