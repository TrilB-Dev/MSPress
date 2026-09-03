<?php
/**
 * GraphClientService class for the MSPress plugin.
 *
 * @package MSPress
 */
namespace MSPress\Includes\MSGraph;

use Http\Promise\FulfilledPromise;
use Http\Promise\RejectedPromise;
use Microsoft\Kiota\Abstractions\ApiClientBuilder;
use Microsoft\Kiota\Abstractions\Authentication\AllowedHostsValidator;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use Microsoft\Kiota\Http\GuzzleRequestAdapter;
use Microsoft\Kiota\Serialization\Json\JsonParseNodeFactory;
use Microsoft\Kiota\Serialization\Json\JsonSerializationWriterFactory;
use MSPress\Includes\MSGraph\Kiota\MSPressClient;

final class GraphClientService {
    private static bool $kiota_json_factories_registered = false;
    private ?RequestAdapter $requestAdapter = null;

    private static function ensure_kiota_json_factories(): void {
        if (self::$kiota_json_factories_registered) {
            return;
        }

        ApiClientBuilder::registerDefaultSerializer(JsonSerializationWriterFactory::class);
        ApiClientBuilder::registerDefaultDeserializer(JsonParseNodeFactory::class);
        self::$kiota_json_factories_registered = true;
    }

    /**
     * Constructor for GraphClientService.
     *
     * @param TokenService $tokenService The token service used for authentication.
     */
    public function __construct(private TokenService $tokenService) {
    }
    /**
    * Create the generated Graph client with authentication.
     *
    * @return MSPressClient|null The Kiota Graph client instance.
     */
    public function create_graph_client(): ?MSPressClient {
        return $this->create_mspress_client();
    }

    /**
     * Create the generated client for app-level Graph endpoints.
     *
     * @return MSPressClient|null The Kiota Graph client instance.
     */
    public function create_mspress_client(): ?MSPressClient {
        $requestAdapter = $this->create_request_adapter();

        return $requestAdapter === null ? null : new MSPressClient($requestAdapter);
    }

    /**
     * Create the authenticated Kiota request adapter shared by generated clients.
     *
     * @return RequestAdapter|null The request adapter or null if token retrieval fails.
     */
    public function create_request_adapter(): ?RequestAdapter {
        self::ensure_kiota_json_factories();

        if ($this->requestAdapter !== null) {
            return $this->requestAdapter;
        }

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
        $this->requestAdapter = new GuzzleRequestAdapter(
            $authenticationProvider,
            null,
            null,
            new \GuzzleHttp\Client(TlsTransport::guzzle_options())
        );

        return $this->requestAdapter;
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
