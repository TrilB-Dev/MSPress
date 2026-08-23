<?php

namespace MSPress\Includes\Plugins\Onedrive\Includes\OneDrive;

use Http\Promise\FulfilledPromise;
use Http\Promise\RejectedPromise;
use Microsoft\Graph\GraphServiceClient;
use Microsoft\Kiota\Abstractions\Authentication\AccessTokenProvider;
use Microsoft\Kiota\Abstractions\Authentication\AllowedHostsValidator;
use Microsoft\Kiota\Abstractions\Authentication\BaseBearerTokenAuthenticationProvider;
use MSPress\Includes\MSGraph\GraphService;

final class OneDriveClientService {
    public function __construct(private OneDriveTokenService $tokens) {
    }

    public function create_graph_client(): ?GraphServiceClient {
        $token_provider = new class($this->tokens) implements AccessTokenProvider {
            private AllowedHostsValidator $allowed_hosts_validator;

            public function __construct(private OneDriveTokenService $tokens) {
                $this->allowed_hosts_validator = new AllowedHostsValidator(['graph.microsoft.com']);
            }

            public function getAuthorizationTokenAsync(string $url, array $additionalAuthenticationContext = []): \Http\Promise\Promise {
                if (!$this->allowed_hosts_validator->isUrlHostValid($url)) {
                    return new RejectedPromise(new \InvalidArgumentException('Host not allowed for OneDrive token requests.'));
                }

                $token = $this->tokens->get_access_token();
                return $token ? new FulfilledPromise($token) : new RejectedPromise(new \RuntimeException('Unable to obtain delegated OneDrive access token.'));
            }

            public function getAllowedHostsValidator(): AllowedHostsValidator {
                return $this->allowed_hosts_validator;
            }
        };

        return GraphServiceClient::createWithAuthenticationProvider(
            new BaseBearerTokenAuthenticationProvider($token_provider)
        );
    }

    public function create_http_client(): ?\GuzzleHttp\Client {
        $token = $this->tokens->get_access_token();
        if (!$token) {
            return null;
        }

        return new \GuzzleHttp\Client([
            'base_uri' => 'https://graph.microsoft.com/v1.0/',
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json',
            ],
        ]);
    }
}
