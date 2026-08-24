<?php

namespace MSPress\Includes\Plugins\Exchange\Includes;

use MSPress\Includes\Functions\Helpers\LoggerHelper;
use MSPress\Includes\Functions\Helpers\EncryptionHelper;
use MSPress\Includes\MSGraph\GraphService;
use MSPress\Includes\Settings\Settings;

/** Sends WordPress email through Microsoft Graph when Exchange is enabled. */
final class ExchangeMailer {
    private static ?self $instance = null;

    public static function get_instance(): self {
        return self::$instance ??= new self();
    }

    private function __construct() {}

    public function register(): void {
        add_filter( 'pre_wp_mail', [ $this, 'send' ], 10, 2 );
    }

    /** @param null|bool|\WP_Error $pre @param array<string,mixed> $atts */
    public function send( $pre, array $atts ) {
        $options = Settings::get_group( 'exchange', [] );
        if ( empty( $options['enabled'] ) ) {
            return $pre;
        }

        $sender = $this->sender( $options );
        if ( $sender === null ) {
            return new \WP_Error( 'mspress_exchange_sender', __( 'No enabled Microsoft 365 sender profile is configured.', 'mspress' ) );
        }

        $graph = GraphService::get_instance()->get_graph();
        if ( $graph === null ) {
            return new \WP_Error( 'mspress_exchange_graph', __( 'Microsoft Graph is not available. Check the MS365 connection settings.', 'mspress' ) );
        }

        try {
            $template = $this->template( $atts['headers'] ?? [], $atts );
            $subject = $template['subject'] ?? (string) ( $atts['subject'] ?? '' );
            $content = $template['content'] ?? (string) ( $atts['message'] ?? '' );
            $content_type = $template['content_type'] ?? $this->content_type( $atts['headers'] ?? [] );
            $payload = [
                'message' => [
                    'subject' => $subject,
                    'body' => [
                        'contentType' => $content_type,
                        'content' => $content,
                    ],
                    'from' => [ 'emailAddress' => $sender ],
                    'toRecipients' => $this->recipients( $atts['to'] ?? [] ),
                ],
                'saveToSentItems' => true,
            ];
            $headers = $this->headers( $atts['headers'] ?? [] );
            foreach ( [ 'ccRecipients', 'bccRecipients', 'replyTo' ] as $key ) {
                if ( ! empty( $headers[ $key ] ) ) {
                    $payload['message'][ $key ] = $headers[ $key ];
                }
            }
            $attachments = $this->attachments( $atts['attachments'] ?? [] );
            if ( $attachments ) {
                $payload['message']['attachments'] = $attachments;
            }

            $graph->users()->byUserId( $sender['address'] )->sendMail()->post( $payload )->wait();
            return true;
        } catch ( \Throwable $exception ) {
            LoggerHelper::write_log( 'MSPress Exchange mail error: ' . $exception->getMessage() );
            return new \WP_Error( 'mspress_exchange_send', __( 'Microsoft Graph could not send the email.', 'mspress' ) );
        }
    }

    private function sender( array $options ): ?array {
        $default = sanitize_email( $options['default_sender'] ?? '' );
        foreach ( (array) ( $options['sender_profiles'] ?? [] ) as $profile ) {
            if ( ! is_array( $profile ) || empty( $profile['enabled'] ) ) {
                continue;
            }
            $address = EncryptionHelper::decrypt( (string) ( $profile['address'] ?? '' ) );
            if ( null === $address ) {
                $address = sanitize_email( $profile['email'] ?? '' );
            }
            if ( is_email( $address ) && ( $default === '' || $default === $address ) ) {
                return [ 'address' => $address, 'name' => $profile['name'] ?? '' ];
            }
        }
        return null;
    }

    private function recipients( $value ): array {
        $values = is_array( $value ) ? $value : preg_split( '/[,;]+/', (string) $value );
        $result = [];
        foreach ( $values ?: [] as $recipient ) {
            $email = is_array( $recipient ) ? ( $recipient['address'] ?? $recipient[0] ?? '' ) : $recipient;
            $email = sanitize_email( trim( (string) $email ) );
            if ( is_email( $email ) ) {
                $result[] = [ 'emailAddress' => [ 'address' => $email ] ];
            }
        }
        return $result;
    }

    private function headers( $value ): array {
        $headers = is_array( $value ) ? $value : preg_split( '/\r?\n/', (string) $value );
        $result = [];
        foreach ( $headers ?: [] as $header ) {
            if ( ! is_string( $header ) || strpos( $header, ':' ) === false ) {
                continue;
            }
            [ $name, $addresses ] = array_map( 'trim', explode( ':', $header, 2 ) );
            $key = match ( strtolower( $name ) ) {
                'cc' => 'ccRecipients', 'bcc' => 'bccRecipients', 'reply-to' => 'replyTo', default => null,
            };
            if ( $key !== null ) {
                $result[ $key ] = $this->recipients( $addresses );
            }
        }
        return $result;
    }

    private function content_type( $headers ): string {
        foreach ( (array) $headers as $header ) {
            if ( is_string( $header ) && stripos( $header, 'content-type:' ) === 0 ) {
                return stripos( $header, 'text/html' ) !== false ? 'HTML' : 'Text';
            }
        }
        return 'Text';
    }

    private function template( $headers, array $atts ): array {
        $slug = '';
        foreach ( (array) $headers as $header ) {
            if ( is_string( $header ) && stripos( $header, 'x-mspress-template:' ) === 0 ) {
                $slug = sanitize_title( trim( substr( $header, strlen( 'x-mspress-template:' ) ) ) );
                break;
            }
        }
        if ( '' === $slug ) {
            return [];
        }

        $post = get_page_by_path( $slug, OBJECT, 'mspress_email_template' );
        if ( ! $post instanceof \WP_Post ) {
            return [];
        }
        $context = apply_filters( 'mspress_exchange_template_context', [], $atts, $post );
        $replace = [];
        foreach ( is_array( $context ) ? $context : [] as $key => $value ) {
            if ( is_scalar( $value ) ) {
                $replace[ '{' . sanitize_key( (string) $key ) . '}' ] = (string) $value;
            }
        }
        $subject = (string) get_post_meta( $post->ID, '_mspress_email_subject', true );
        $html = (string) get_post_meta( $post->ID, '_mspress_email_html', true );
        $plain = (string) get_post_meta( $post->ID, '_mspress_email_plain', true );
        $is_html = '' !== $html;
        return [
            'subject' => strtr( $subject ?: (string) ( $atts['subject'] ?? '' ), $replace ),
            'content' => strtr( $is_html ? $html : $plain, $replace ),
            'content_type' => $is_html ? 'HTML' : 'Text',
        ];
    }

    private function attachments( $value ): array {
        $result = [];
        foreach ( (array) $value as $attachment ) {
            if ( ! is_string( $attachment ) || ! is_readable( $attachment ) ) {
                continue;
            }
            $content = file_get_contents( $attachment );
            if ( false === $content ) {
                continue;
            }
            $result[] = [
                '@odata.type' => '#microsoft.graph.fileAttachment',
                'name' => wp_basename( $attachment ),
                'contentType' => function_exists( 'mime_content_type' ) ? (string) mime_content_type( $attachment ) : 'application/octet-stream',
                'contentBytes' => base64_encode( $content ),
            ];
        }
        return $result;
    }
}