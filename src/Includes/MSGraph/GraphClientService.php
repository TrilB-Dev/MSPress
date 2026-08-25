<?php
/**
 * GraphClientService class for the MSPress plugin.
 *
 * @package MSPress
 */
namespace MSPress\Includes\MSGraph;

use Microsoft\Graph\GraphServiceClient;
use Microsoft\Graph\GraphRequestAdapter;
use Microsoft\Kiota\Abstractions\Authentication\AllowedHostsValidator;
use Http\Promise\FulfilledPromise;
use Http\Promise\RejectedPromise;

final class GraphClientService {
    /**
     * Constructor for GraphClientService.
     *
     * @param TokenService $tokenService The token service used for authentication.
     */
    public function __construct(private TokenService $tokenService) {
    }
    /**
    * Create a GraphServiceClient instance with authentication.
     *
     * @return GraphServiceClient|null The GraphServiceClient instance or null if token retrieval fails.
     */
    public function create_graph_client(): ?GraphServiceClient {
        $tokenProvider = new class($this->tokenService) implements \Microsoft\Kiota\Abstractions\Authentication\AccessTokenProvider {
            private AllowedHostsValidator $allowedHostsValidator;

            public function __construct(private TokenService $tokenService) {
                $this->allowedHostsValidator = new AllowedHostsValidator(['graph.microsoft.com']);
            }

            public function getAuthorizationTokenAsync(string $url, array $additionalAuthenticationContext = []): \Http\Promise\Promise {
                if (!$this->allowedHostsValidator->isUrlHostValid($url)) {
                    return new RejectedPromise(new \InvalidArgumentException('Host not allowed for Graph token requests.'));
                }

                $token = $this->tokenService->getAccessToken();
                if (empty($token)) {
                    return new RejectedPromise(new \RuntimeException('Unable to obtain Graph access token.'));
                }

                return new FulfilledPromise($token);
            }

            public function getAllowedHostsValidator(): AllowedHostsValidator {
                return $this->allowedHostsValidator;
            }
        };

        $authenticationProvider = new \Microsoft\Kiota\Abstractions\Authentication\BaseBearerTokenAuthenticationProvider($tokenProvider);
        $requestAdapter = new GraphRequestAdapter(
            $authenticationProvider,
            null,
            null,
            new \GuzzleHttp\Client(TlsTransport::guzzle_options())
        );

        return GraphServiceClient::createWithRequestAdapter($requestAdapter);
    }
    /**
     * Create a Guzzle HTTP client for Microsoft Graph API requests.
     *
     * @return \GuzzleHttp\Client The Guzzle HTTP client instance.
     */
    public function create_http_client(): \GuzzleHttp\Client {
        return new \GuzzleHttp\Client([
            'base_uri' => 'https://graph.microsoft.com/v1.0/',
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            ...TlsTransport::guzzle_options(),
        ]);
    }
}
