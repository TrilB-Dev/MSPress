<?php
/**
 * GraphDiagnostics class for the MSPress plugin.
 *
 * @package MSPress
 */
namespace MSPress\Includes\MSGraph;

use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use Microsoft\Kiota\Abstractions\ApiException;
use MSPress\Includes\Functions\Helpers\LoggerHelper as utilities;
use MSPress\Includes\Functions\Helpers\MS365ConnectionHelper;
use MSPress\Includes\Functions\Helpers\NetworkDiagnosticsHelper;

final class GraphDiagnostics {
    /**
     * Constructor for GraphDiagnostics.
     *
     * @param CredentialService $credentials The credential service used for retrieving credentials.
     */
	public function __construct(private CredentialService $credentials) {
	}
    /**
     * Build a diagnostics report for the Microsoft Graph connection.
     *
     * @param \Throwable|null $exception An optional exception to include in the diagnostics.
     * @param array $additional Additional diagnostic information to include.
     * @return array The diagnostics report as an associative array.
     */
	public function build_connection_diagnostics(?\Throwable $exception = null, array $additional = []): array {
		try {
			$timezone = date_default_timezone_get() ?: 'UTC';
			$dateTime = new \DateTime('now', new \DateTimeZone($timezone));
			$diagnostics = [
				'timestamp' => $dateTime->format('Y-m-d H:i:s P'),
				'timezone' => $dateTime->getTimezone()->getName(),
			];
		} catch (\Throwable $error) {
			$diagnostics = [
				'timestamp' => gmdate('Y-m-d H:i:s \\U\\T\\C'),
				'timezone' => 'UTC',
			];
		}

		$diagnostics['tenant_id'] = $this->credentials->get_tenant_id() ?: '(missing)';
		$diagnostics['client_id'] = $this->credentials->get_client_id() ?: '(missing)';
		$diagnostics['server_addr'] = $_SERVER['SERVER_ADDR'] ?? 'unknown';
		$diagnostics['server_name'] = $_SERVER['SERVER_NAME'] ?? 'unknown';
		$diagnostics['public_ip'] = $this->resolve_public_ip_address();
		$diagnostics['capture_guidance'] = 'If the issue persists, capture outbound connections to login.microsoftonline.com and graph.microsoft.com from this server using tcpdump/Wireshark, or request firewall/IDS logs from your hosting provider.';

		if ($exception !== null) {
			$diagnostics['exception_type'] = get_class($exception);
			$diagnostics['exception_message'] = $exception->getMessage();
			$requestTraceIds = $this->extract_request_trace_ids($exception);
			if ($requestTraceIds) {
				$diagnostics['request_trace_ids'] = $requestTraceIds;
			}
		}

		return array_merge($diagnostics, $additional);
	}
    /**
     * Summarize a raw response snippet for diagnostics.
     *
     * @param string $raw The raw response body to summarize.
     * @return string A summarized version of the response body.
     */
	public function summarize_response_snippet(string $raw): string {
		$clean = wp_strip_all_tags($raw);
		$clean = preg_replace('/\s+/', ' ', trim((string) $clean));
		if ($clean === '') {
			return '[empty response body]';
		}

		return strlen($clean) > 180 ? substr($clean, 0, 177) . '...' : $clean;
	}
    /**
     * Get a summary of the proxy context for diagnostics.
     *
     * @return string A summary of the proxy context.
     */
	public function get_proxy_context_summary(): string {
		return NetworkDiagnosticsHelper::proxy_context();
	}
    /**
     * Get a summary of the DNS context for diagnostics.
     *
     * @param array $hosts An array of hostnames to check DNS resolution for.
     * @return string A summary of the DNS context.
     */
	public function get_dns_context_summary(array $hosts): string {
		return NetworkDiagnosticsHelper::dns_context($hosts);
	}
    /**
     * Get a summary of the HTTP hook context for diagnostics.
     *
     * @return string A summary of the HTTP hook context.
     */
	public function get_http_hook_context_summary(): string {
		return NetworkDiagnosticsHelper::http_hook_context();
	}
    /**
     * Get a summary of the HTTP request context for diagnostics.
     *
     * @return string A summary of the HTTP request context.
     */
	public function probe_token_endpoint(string $tenantSelector, string $authorityHost = 'login.microsoftonline.com'): array {
		$result = ['status' => 0, 'content_type' => 'unknown', 'is_json' => false, 'server' => ''];
		$tenantSelector = trim($tenantSelector);
		$authorityHost = trim($authorityHost) ?: 'login.microsoftonline.com';
		if ($tenantSelector === '') {
			return $result;
		}

		try {
			$response = wp_remote_post("https://{$authorityHost}/{$tenantSelector}/oauth2/v2.0/token", [
				'timeout' => 15,
				'body' => [
					'grant_type' => 'client_credentials',
					'client_id' => '00000000-0000-0000-0000-000000000000',
					'client_secret' => 'diagnostic',
					'scope' => 'https://graph.microsoft.com/.default',
				],
				'headers' => [
					'Content-Type' => 'application/x-www-form-urlencoded',
					'Accept' => 'application/json',
				],
			]);
			if (is_wp_error($response)) {
				return $result;
			}

			$result['status'] = (int) wp_remote_retrieve_response_code($response);
			$result['content_type'] = (string) wp_remote_retrieve_header($response, 'content-type');
			$result['server'] = (string) wp_remote_retrieve_header($response, 'server');
			$body = (string) wp_remote_retrieve_body($response);
			$result['is_json'] = is_array(json_decode($body, true)) || stripos($result['content_type'], 'json') !== false;
		} catch (\Throwable $error) {
			utilities::write_log('MSGraph diagnostic token probe error: ' . $error->getMessage());
		}

		return $result;
	}
    /**
     * Get a summary of the HTTP request context for diagnostics using cURL.
     *
     * @param string $tenantSelector The tenant selector to use in the request.
     * @param string $authorityHost The authority host to use in the request.
     * @return array A summary of the HTTP request context.
     */
	public function probe_token_endpoint_with_curl(string $tenantSelector, string $authorityHost = 'login.microsoftonline.com'): array {
		$result = ['status' => 0, 'content_type' => 'unknown', 'is_json' => false, 'error' => ''];
		if (!function_exists('curl_init')) {
			$result['error'] = 'curl extension unavailable';
			return $result;
		}

		$tenantSelector = trim($tenantSelector);
		$authorityHost = trim($authorityHost) ?: 'login.microsoftonline.com';
		if ($tenantSelector === '') {
			$result['error'] = 'empty tenant selector';
			return $result;
		}

		$handle = curl_init("https://{$authorityHost}/{$tenantSelector}/oauth2/v2.0/token");
		if ($handle === false) {
			$result['error'] = 'curl_init failed';
			return $result;
		}

		try {
			curl_setopt_array($handle, [
				CURLOPT_POST => true,
				CURLOPT_POSTFIELDS => http_build_query([
					'grant_type' => 'client_credentials',
					'client_id' => '00000000-0000-0000-0000-000000000000',
					'client_secret' => 'diagnostic',
					'scope' => 'https://graph.microsoft.com/.default',
				], '', '&', PHP_QUERY_RFC3986),
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_HEADER => true,
				CURLOPT_TIMEOUT => 15,
				CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
				CURLOPT_USERAGENT => 'MSPress/1.0',
				CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded', 'Accept: application/json'],
				CURLOPT_SSL_VERIFYPEER => true,
				CURLOPT_SSL_VERIFYHOST => 2,
				CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2 | CURL_SSLVERSION_MAX_TLSv1_2,
			]);

			$raw = curl_exec($handle);
			if ($raw === false) {
				$result['error'] = (string) curl_error($handle);
				return $result;
			}

			$headerSize = (int) curl_getinfo($handle, CURLINFO_HEADER_SIZE);
			$contentType = (string) curl_getinfo($handle, CURLINFO_CONTENT_TYPE);
			$body = substr((string) $raw, $headerSize);
			$result['status'] = (int) curl_getinfo($handle, CURLINFO_RESPONSE_CODE);
			$result['content_type'] = $contentType !== '' ? $contentType : 'unknown';
			$result['is_json'] = is_array(json_decode($body, true)) || stripos($result['content_type'], 'json') !== false;
		} catch (\Throwable $error) {
			$result['error'] = $error->getMessage();
		} finally {
			curl_close($handle);
		}

		return $result;
	}
    /**
     * Test a direct cURL connection to the Microsoft Graph token endpoint.
     *
     * @return array An array containing the success status, message, trace, and diagnostics.
     */
	public function test_direct_curl_connection(): array {
		$trace = [];
		$tenantId = MS365ConnectionHelper::normalize_tenant_id((string) $this->credentials->get_tenant_id());
		$clientId = trim((string) $this->credentials->get_client_id());
		$clientSecret = trim((string) $this->credentials->get_client_secret());

		if ($tenantId === '' || !MS365ConnectionHelper::is_guid($clientId) || $clientSecret === '') {
			return [
				'success' => false,
				'message' => 'Invalid credentials for direct cURL test',
				'trace' => ['Credential validation failed.'],
			];
		}

		if (!function_exists('curl_init')) {
			return [
				'success' => false,
				'message' => 'cURL is not available on this server.',
				'trace' => ['The PHP cURL extension is unavailable.'],
			];
		}

		$url = "https://login.microsoftonline.com/{$tenantId}/oauth2/v2.0/token";
		$postBody = http_build_query([
			'grant_type' => 'client_credentials',
			'client_id' => $clientId,
			'client_secret' => $clientSecret,
			'scope' => 'https://graph.microsoft.com/.default',
		], '', '&', PHP_QUERY_RFC3986);
		$handle = curl_init($url);
		curl_setopt_array($handle, [
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $postBody,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HEADER => true,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded', 'Accept: application/json'],
			CURLOPT_SSL_VERIFYPEER => true,
			CURLOPT_SSL_VERIFYHOST => 2,
			CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2 | CURL_SSLVERSION_MAX_TLSv1_2,
		]);

		$response = curl_exec($handle);
		$curlError = curl_error($handle);
		$status = (int) curl_getinfo($handle, CURLINFO_HTTP_CODE);
		$contentType = (string) curl_getinfo($handle, CURLINFO_CONTENT_TYPE);
		$headerSize = (int) curl_getinfo($handle, CURLINFO_HEADER_SIZE);
		curl_close($handle);
		$body = is_string($response) ? substr($response, $headerSize) : '';
		$summary = $this->summarize_response_snippet($body);
		$trace[] = 'HTTP ' . $status . ', Content-Type: ' . ($contentType ?: 'unknown');
		$trace[] = 'Response summary: ' . $summary;
		if ($curlError !== '') {
			$trace[] = 'cURL error: ' . $curlError;
		}

		return [
			'success' => $status === 200 && $curlError === '',
			'message' => $status === 200 && $curlError === ''
				? 'Direct cURL successful - authentication works!'
				: 'Direct cURL failed with HTTP ' . $status . ($curlError !== '' ? ': ' . $curlError : '.'),
			'trace' => $trace,
			'diagnostics' => $this->build_connection_diagnostics(null, [
				'curl_http_code' => $status,
				'curl_content_type' => $contentType,
				'curl_error' => $curlError ?: 'none',
			]),
		];
	}
    /**
     * Extract request trace IDs from an exception for diagnostics.
     *
     * @param \Throwable $exception The exception to extract trace IDs from.
     * @return array An associative array of trace IDs.
     */
	private function extract_request_trace_ids(\Throwable $exception): array {
		$traceIds = [];
		$responseBody = null;
		$headers = [];

		if ($exception instanceof ApiException) {
			$headers = $exception->getResponseHeaders();
		} elseif ($exception instanceof IdentityProviderException) {
			$responseBody = $exception->getResponseBody();
		}

		if (is_array($headers)) {
			foreach ($headers as $key => $value) {
				$name = strtolower((string) $key);
				if (in_array($name, ['x-ms-request-id', 'request-id', 'client-request-id', 'x-ms-correlation-request-id', 'correlation-id', 'trace-id'], true)) {
					$traceIds[$name] = is_array($value) ? implode(', ', $value) : (string) $value;
				}
			}
		}

		if (is_string($responseBody)) {
			$responseBody = json_decode($responseBody, true);
		}
		if (is_array($responseBody)) {
			foreach (['request-id', 'correlation-id', 'x-ms-request-id', 'x-ms-correlation-request-id'] as $field) {
				if (!empty($responseBody[$field])) {
					$traceIds[$field] = (string) $responseBody[$field];
				}
			}
		}

		return $traceIds;
	}
    /**
     * Resolve the public IP address of the server for diagnostics.
     *
     * @return string The public IP address or 'unavailable' if it cannot be determined.
     */
	private function resolve_public_ip_address(): string {
		try {
			$response = wp_remote_get('https://api.ipify.org?format=json', ['timeout' => 10, 'headers' => ['Accept' => 'application/json']]);
			if (!is_wp_error($response) && (int) wp_remote_retrieve_response_code($response) === 200) {
				$body = json_decode(wp_remote_retrieve_body($response), true);
				if (is_array($body) && !empty($body['ip'])) {
					return (string) $body['ip'];
				}
			}
		} catch (\Throwable $error) {
		}

		return $_SERVER['SERVER_ADDR'] ?? 'unavailable';
	}
}
