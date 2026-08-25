<?php
/**
 * Generic OAuth provider that retains the last authorization-server response.
 *
 * @package MSPress
 */
namespace MSPress\Includes\MSGraph;

use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Psr7\Response;
use League\OAuth2\Client\Provider\GenericProvider;
use Psr\Http\Message\RequestInterface;

final class DiagnosticGenericProvider extends GenericProvider {
    /** @var array<string, mixed>|null */
    private ?array $last_response = null;

    /**
     * Return the last OAuth response received by the provider.
     *
     * @return array<string, mixed>|null Response diagnostics or null.
     */
    public function get_last_response(): ?array {
        return $this->last_response;
    }

    /**
     * Send OAuth requests through native cURL instead of the configured HTTP client.
     *
     * @param RequestInterface $request OAuth request.
     * @return Response PSR-7 response for the provider's normal parsing pipeline.
     */
    public function getResponse(RequestInterface $request): Response {
        if (!function_exists('curl_init')) {
            throw new \RuntimeException('The PHP cURL extension is required for Microsoft OAuth login.');
        }

        $handle = curl_init((string) $request->getUri());
        if ($handle === false) {
            throw new \RuntimeException('Unable to initialize cURL for Microsoft OAuth login.');
        }

        $headers = [];
        foreach ($request->getHeaders() as $name => $values) {
            foreach ($values as $value) {
                $headers[] = $name . ': ' . $value;
            }
        }

        curl_setopt_array($handle, [
            CURLOPT_CUSTOMREQUEST => $request->getMethod(),
            CURLOPT_POSTFIELDS => (string) $request->getBody(),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
            CURLOPT_USERAGENT => 'MSPress/1.0',
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2 | CURL_SSLVERSION_MAX_TLSv1_2,
        ]);

        $rawResponse = curl_exec($handle);
        $curlError = curl_error($handle);
        $headerSize = (int) curl_getinfo($handle, CURLINFO_HEADER_SIZE);
        $statusCode = (int) curl_getinfo($handle, CURLINFO_HTTP_CODE);
        curl_close($handle);

        if ($rawResponse === false) {
            throw new \RuntimeException('Microsoft OAuth cURL request failed: ' . $curlError);
        }

        $rawHeaders = substr($rawResponse, 0, $headerSize);
        $body = substr($rawResponse, $headerSize);

        return new Response($statusCode, $this->parse_curl_headers($rawHeaders), $body);
    }

    /**
     * Parse an OAuth response while retaining its raw contents for diagnostics.
     *
     * @param \Psr\Http\Message\RequestInterface $request OAuth request.
     * @return mixed Parsed response.
     */
    public function getParsedResponse(\Psr\Http\Message\RequestInterface $request) {
        try {
            $response = $this->getResponse($request);
        } catch (BadResponseException $exception) {
            $response = $exception->getResponse();
        }

        $body = (string) $response->getBody();
        $this->last_response = [
            'request_method' => $request->getMethod(),
            'request_url' => (string) $request->getUri(),
            'request_headers' => $this->safe_request_headers($request->getHeaders()),
            'status' => $response->getStatusCode(),
            'content_type' => implode(';', $response->getHeader('content-type')),
            'headers' => $response->getHeaders(),
            'body' => $body,
        ];

        $parsed = $this->parseResponse($response);
        $this->checkResponse($response, $parsed);

        return $parsed;
    }

    /**
     * Remove credentials and authorization values from request headers.
     *
     * @param array<string, array<int, string>> $headers Request headers.
     * @return array<string, array<int, string>> Safe request headers.
     */
    private function safe_request_headers(array $headers): array {
        foreach ($headers as $name => $values) {
            if (in_array(strtolower($name), ['authorization', 'cookie', 'proxy-authorization'], true)) {
                $headers[$name] = ['[redacted]'];
            }
        }

        return $headers;
    }

    /**
     * Convert cURL's raw response headers to PSR-7 header values.
     *
     * @param string $rawHeaders Raw cURL response headers.
     * @return array<string, array<int, string>>
     */
    private function parse_curl_headers(string $rawHeaders): array {
        $headers = [];
        foreach (preg_split('/\r\n|\r|\n/', $rawHeaders) ?: [] as $line) {
            $separator = strpos($line, ':');
            if ($separator === false) {
                continue;
            }

            $name = trim(substr($line, 0, $separator));
            $value = trim(substr($line, $separator + 1));
            if ($name !== '') {
                $headers[$name][] = $value;
            }
        }

        return $headers;
    }
}