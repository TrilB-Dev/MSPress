<?php
/**
 * OAuthService class for handling Microsoft OAuth in the MSPress plugin.
 *
 * @package MSPress
 */
namespace MSPress\Includes\MSGraph;

use Exception;
use Http\Promise\FulfilledPromise;
use Microsoft\Kiota\Abstractions\Authentication\AccessTokenProvider;
use Microsoft\Kiota\Abstractions\Authentication\AllowedHostsValidator;
use Microsoft\Kiota\Abstractions\Authentication\BaseBearerTokenAuthenticationProvider;
use Microsoft\Kiota\Http\GuzzleRequestAdapter;
use League\OAuth2\Client\Provider\GenericProvider;
use MSPress\Includes\MSGraph\Kiota\MSPressClient;
use MSPress\Includes\Functions\Helpers\LoggerHelper as utilities;

final class OAuthService {
    /**
     * Constructor for OAuthService.
     *
     * @param GenericProvider $oauthClient The OAuth client for Microsoft authentication.
     * @param callable $tenantIdResolver A callable to resolve the tenant ID.
     */
    public function __construct(
        private GenericProvider $oauthClient,
        private $tenantIdResolver
    ) {
    }
    /**
     * Get the authorization URL for Microsoft OAuth.
     *
     * @param string|null $state Optional state parameter for CSRF protection.
     * @return string The authorization URL.
     */
    public function get_authorization_url($state = null, array $context = [], string $scopes = 'openid profile email offline_access User.Read'): string {
        $state = $state ?: 'mspress_oauth_' . wp_generate_password(12, false);

        $authorizationUrl = $this->oauthClient->getAuthorizationUrl([
            'scope' => $scopes,
            'state' => $state,
        ]);

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['mspress_oauth_state'] = $state;
        $_SESSION['mspress_oauth_pkce_code'] = $this->oauthClient->getPkceCode();
        $_SESSION['mspress_oauth_context'] = $context;
        update_option('mspress_oauth_state', $state);
        update_option('mspress_oauth_context', $context);

        return $authorizationUrl;
    }
    /**
     * Handle the OAuth callback from Microsoft.
     *
     * @param string $code The authorization code received from Microsoft.
     * @param string $state The state parameter received from Microsoft.
     * @return array User data including email, display name, and tokens.
     * @throws Exception If the OAuth state is invalid or if there is an error during token retrieval.
     */
    public function handle_oauth_callback($code, $state) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $storedState = $_SESSION['mspress_oauth_state'] ?? get_option('mspress_oauth_state');
        $context = $_SESSION['mspress_oauth_context'] ?? get_option('mspress_oauth_context', []);
        utilities::write_log('MSGraph OAuth callback received: state_present=' . ( $state !== '' ? 'yes' : 'no' ) . ', stored_state_present=' . ( $storedState ? 'yes' : 'no' ) . ', context=' . ( is_array( $context ) ? sanitize_key( $context['purpose'] ?? 'generic' ) : 'invalid' ));
        if (!$storedState || $state !== $storedState) {
            unset($_SESSION['mspress_oauth_state'], $_SESSION['mspress_oauth_pkce_code'], $_SESSION['mspress_oauth_context']);
            throw new Exception('Invalid OAuth state');
        }

        $pkceCode = $_SESSION['mspress_oauth_pkce_code'] ?? null;
        if (is_string($pkceCode) && $pkceCode !== '') {
            $this->oauthClient->setPkceCode($pkceCode);
        }

        try {
            utilities::write_log('MSGraph OAuth callback: exchanging authorization code.');
            $token = $this->oauthClient->getAccessToken('authorization_code', [
                'code' => $code,
            ]);
            utilities::write_log('MSGraph OAuth callback: authorization code exchanged.');

            $authenticationProvider = new BaseBearerTokenAuthenticationProvider(
                new class($token->getToken()) implements AccessTokenProvider {
                    public function __construct(private string $token) {
                    }

                    public function getAuthorizationTokenAsync(string $url, array $additionalAuthenticationContext = []): \Http\Promise\Promise {
                        return new FulfilledPromise($this->token);
                    }

                    public function getAllowedHostsValidator(): AllowedHostsValidator {
                        return new AllowedHostsValidator(['graph.microsoft.com']);
                    }
                }
            );
            $requestAdapter = new GuzzleRequestAdapter(
                $authenticationProvider,
                null,
                null,
                new \GuzzleHttp\Client(TlsTransport::guzzle_options())
            );
            $graph = new MSPressClient($requestAdapter);

            $me = $graph->me()->get()->wait();
            utilities::write_log('MSGraph OAuth callback: Microsoft account retrieved.');

            unset($_SESSION['mspress_oauth_state'], $_SESSION['mspress_oauth_pkce_code'], $_SESSION['mspress_oauth_context']);
            delete_option('mspress_oauth_state');
            delete_option('mspress_oauth_context');

            return [
                'id' => $me->getId(),
                'email' => $me->getMail() ?: $me->getUserPrincipalName(),
                'display_name' => $me->getDisplayName(),
                'first_name' => $me->getGivenName(),
                'last_name' => $me->getSurname(),
                'job_title' => $me->getJobTitle(),
                'department' => $me->getDepartment(),
                'office_location' => $me->getOfficeLocation(),
                'tenant_id' => ($this->tenantIdResolver)(),
                'access_token' => $token->getToken(),
                'refresh_token' => $token->getRefreshToken(),
                'expires' => $token->getExpires(),
                'oauth_context' => is_array( $context ) ? $context : [],
            ];
        } catch (Exception $e) {
            $this->clear_oauth_transaction();
            utilities::write_log('MS Graph OAuth callback error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Clear the stored state for the current OAuth transaction.
     *
     * @return void
     */
    public function clear_oauth_transaction(): void {
        if ( session_status() === PHP_SESSION_ACTIVE ) {
            unset( $_SESSION['mspress_oauth_state'], $_SESSION['mspress_oauth_pkce_code'], $_SESSION['mspress_oauth_context'] );
        }
        delete_option( 'mspress_oauth_state' );
        delete_option( 'mspress_oauth_context' );
    }
    /**
     * Get the OAuth client instance.
     *
     * @return GenericProvider The OAuth client instance.
     */
    public function get_oauth_client(): GenericProvider {
        return $this->oauthClient;
    }

    /**
     * Get the last authorization-server response captured by the provider.
     *
     * @return array<string, mixed>|null Response diagnostics or null.
     */
    public function get_last_oauth_response(): ?array {
        if ( $this->oauthClient instanceof DiagnosticGenericProvider ) {
            return $this->oauthClient->get_last_response();
        }

        return null;
    }
}
