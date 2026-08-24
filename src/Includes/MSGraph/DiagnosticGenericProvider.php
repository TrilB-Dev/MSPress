<?php
/**
 * Generic OAuth provider that retains the last authorization-server response.
 *
 * @package MSPress
 */
namespace MSPress\Includes\MSGraph;

use GuzzleHttp\Exception\BadResponseException;
use League\OAuth2\Client\Provider\GenericProvider;

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
            'status' => $response->getStatusCode(),
            'content_type' => implode(';', $response->getHeader('content-type')),
            'headers' => $response->getHeaders(),
            'body' => $body,
        ];

        $parsed = $this->parseResponse($response);
        $this->checkResponse($response, $parsed);

        return $parsed;
    }
}