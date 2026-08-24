<?php
/** TLS transport configuration for Microsoft Graph connections. */
namespace MSPress\Includes\MSGraph;

final class TlsTransport {
    private static bool $wordpressHookRegistered = false;

    public static function register_wordpress_hook(): void {
        if (self::$wordpressHookRegistered || ! function_exists('add_filter')) {
            return;
        }

        add_filter('http_api_curl', [self::class, 'configure_wordpress_curl'], 10, 3);
        self::$wordpressHookRegistered = true;
    }

    public static function configure_wordpress_curl($handle, array $request_args, string $url) {
        if (str_starts_with(strtolower($url), 'https://') && function_exists('curl_setopt')) {
            curl_setopt($handle, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2 | CURL_SSLVERSION_MAX_TLSv1_2);
        }

        return $handle;
    }

    public static function guzzle_options(): array {
        return [
            'curl' => [
                CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2 | CURL_SSLVERSION_MAX_TLSv1_2,
            ],
        ];
    }
}