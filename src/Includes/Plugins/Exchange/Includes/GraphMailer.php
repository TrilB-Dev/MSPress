<?php

namespace MSPress\Includes\Plugins\Email\Includes;

use MSPress\Includes\MSGraph\GraphService;
use MSPress\Includes\Functions\Helpers\EncryptionHelper;
use MSPress\Includes\Functions\Helpers\LoggerHelper;
use MSPress\Includes\Settings\Settings;

/**
 * Microsoft Graph Email integration for WordPress
 */
class GraphMailer {

    /**
     * Singleton instance
     */
    private static $instance = null;

    /**
     * Get singleton instance
     */
    public static function get_instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Private constructor
     */
    private function __construct() {
        add_action('phpmailer_init', [$this, 'configure_phpmailer']);
        add_filter('wp_mail_from', [$this, 'set_mail_from']);
        add_filter('wp_mail_from_name', [$this, 'set_mail_from_name']);
        add_action('admin_menu', [$this, 'add_admin_menu']);
        add_action('wp_ajax_mspress_test_email', [$this, 'ajax_test_email']);
    }

    /**
     * Configure PHPMailer to use Microsoft Graph
     */
    public function configure_phpmailer($phpmailer) {
        // Check if MS365 email is enabled
        $options = Settings::get_group('ms365', []);
        if (empty($options['enable_graph_mailer'])) {
            return;
        }

        $msgraph = GraphService::get_instance();
        if (!$msgraph) {
            return;
        }

        // Replace PHPMailer with our Graph Mailer
        $phpmailer = new GraphMailerTransport($phpmailer);
    }

    /**
     * Set mail from address
     */
    public function set_mail_from($from) {
        $options = Settings::get_group('ms365', []);
        if (!empty($options['enable_graph_mailer']) && !empty($options['mail_from'])) {
            try {
                return EncryptionHelper::decrypt((string) $options['mail_from']) ?? $from;
            } catch (\Exception $e) {
                LoggerHelper::write_log('Failed to decrypt mail_from: ' . $e->getMessage());
            }
        }
        return $from;
    }

    /**
     * Set mail from name
     */
    public function set_mail_from_name($from_name) {
        $options = Settings::get_group('ms365', []);
        if (!empty($options['enable_graph_mailer']) && !empty($options['mail_from_name'])) {
            return $options['mail_from_name'];
        }
        return $from_name;
    }

    /**
     * Add admin menu for email settings
     */
    public function add_admin_menu() {
        add_submenu_page(
            'mspress-ms365',
            __('Email Settings', 'mspress'),
            __('Email Settings', 'mspress'),
            'manage_options',
            'mspress-email',
            [$this, 'admin_page']
        );
    }

    /**
     * Admin page for email settings
     */
    public function admin_page() {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }

        $options = Settings::get_group('ms365', []);

        if (isset($_POST['submit'])) {
            check_admin_referer('mspress_email_settings');

            $options['enable_graph_mailer'] = isset($_POST['enable_graph_mailer']) ? 'on' : 'off';
            $options['mail_from'] = $this->encrypt_value($_POST['mail_from'] ?? '');
            $options['mail_from_name'] = sanitize_text_field($_POST['mail_from_name'] ?? '');
            $options['mail_reply_to'] = $this->encrypt_value($_POST['mail_reply_to'] ?? '');

            Settings::set_group('ms365', $options);
            echo '<div class="notice notice-success"><p>' . __('Settings saved successfully.', 'mspress') . '</p></div>';
        }

        // Decrypt values for display
        $mail_from = $this->decrypt_value($options['mail_from'] ?? '');
        $mail_reply_to = $this->decrypt_value($options['mail_reply_to'] ?? '');

        ?>
        <div class="wrap">
            <h1><?php _e('Microsoft Graph Email Settings', 'mspress'); ?></h1>

            <form method="post" action="">
                <?php wp_nonce_field('mspress_email_settings'); ?>

                <table class="form-table">
                    <tr>
                        <th scope="row"><?php _e('Enable Graph Mailer', 'mspress'); ?></th>
                        <td>
                            <label>
                                <input type="checkbox" name="enable_graph_mailer" <?php checked($options['enable_graph_mailer'] ?? 'off', 'on'); ?> />
                                <?php _e('Use Microsoft Graph API for sending emails', 'mspress'); ?>
                            </label>
                            <p class="description"><?php _e('When enabled, all WordPress emails will be sent through Microsoft Graph API instead of SMTP.', 'mspress'); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><?php _e('From Email Address', 'mspress'); ?></th>
                        <td>
                            <input type="email" name="mail_from" value="<?php echo esc_attr($mail_from); ?>" class="regular-text" />
                            <p class="description"><?php _e('The email address that will appear as the sender. Must be a valid Microsoft 365 email address.', 'mspress'); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><?php _e('From Name', 'mspress'); ?></th>
                        <td>
                            <input type="text" name="mail_from_name" value="<?php echo esc_attr($options['mail_from_name'] ?? ''); ?>" class="regular-text" />
                            <p class="description"><?php _e('The name that will appear as the sender.', 'mspress'); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><?php _e('Reply-To Email', 'mspress'); ?></th>
                        <td>
                            <input type="email" name="mail_reply_to" value="<?php echo esc_attr($mail_reply_to); ?>" class="regular-text" />
                            <p class="description"><?php _e('Optional reply-to email address.', 'mspress'); ?></p>
                        </td>
                    </tr>
                </table>

                <p class="submit">
                    <input type="submit" name="submit" class="btn btn-primary" value="<?php _e('Save Changes', 'mspress'); ?>" />
                    <button type="button" id="test-email" class="btn btn-secondary"><?php _e('Send Test Email', 'mspress'); ?></button>
                </p>
            </form>

            <div id="test-email-result" style="display: none;"></div>
        </div>

        <script>
        jQuery(document).ready(function($) {
            $('#test-email').on('click', function() {
                var $button = $(this);
                var $result = $('#test-email-result');

                $button.prop('disabled', true).text('<?php _e('Sending...', 'mspress'); ?>');

                $.post(ajaxurl, {
                    action: 'mspress_test_email',
                    nonce: '<?php echo wp_create_nonce('mspress_test_email'); ?>'
                }, function(response) {
                    $button.prop('disabled', false).text('<?php _e('Send Test Email', 'mspress'); ?>');

                    if (response.success) {
                        $result.html('<div class="notice notice-success"><p>' + response.data.message + '</p></div>').show();
                    } else {
                        $result.html('<div class="notice notice-error"><p>' + response.data.message + '</p></div>').show();
                    }
                });
            });
        });
        </script>
        <?php
    }

    /**
     * AJAX handler for testing email
     */
    public function ajax_test_email() {
        check_ajax_referer('mspress_test_email', 'nonce');

        if (!current_user_can('manage_options')) {
            wp_send_json_error(['message' => __('Insufficient permissions', 'mspress')]);
        }

        $to = get_option('admin_email');
        $subject = __('MSPress Email Test', 'mspress');
        $message = __('This is a test email sent through Microsoft Graph API.', 'mspress');

        $result = wp_mail($to, $subject, $message);

        if ($result) {
            wp_send_json_success(['message' => __('Test email sent successfully!', 'mspress')]);
        } else {
            wp_send_json_error(['message' => __('Failed to send test email. Check the error logs.', 'mspress')]);
        }
    }

    /**
     * Encrypt a value
     */
    private function encrypt_value($value) {
        if (empty($value)) {
            return '';
        }

        try {
            return EncryptionHelper::encrypt((string) $value) ?? '';
        } catch (\Exception $e) {
            LoggerHelper::write_log('Failed to encrypt email value: ' . $e->getMessage());
            return '';
        }
    }

    /**
     * Decrypt a value
     */
    private function decrypt_value($value) {
        if (empty($value)) {
            return '';
        }

        try {
            return EncryptionHelper::decrypt((string) $value) ?? '';
        } catch (\Exception $e) {
            LoggerHelper::write_log('Failed to decrypt email value: ' . $e->getMessage());
            return '';
        }
    }
}

/**
 * PHPMailer transport class for Microsoft Graph
 */
class GraphMailerTransport {

    private $phpmailer;
    private $msgraph;

    public function __construct($phpmailer) {
        $this->phpmailer = $phpmailer;
        $this->msgraph = GraphService::get_instance();

        // Override the send method
        $this->phpmailer->Mailer = 'graph';
        $this->phpmailer->Sendmail = false;
        $this->phpmailer->UseSendmailOptions = false;
        $this->phpmailer->mail = null;
        $this->phpmailer->smtp = null;
    }

    /**
     * Send email via Microsoft Graph
     */
    public function send() {
        if (!$this->msgraph) {
            throw new \Exception(__('MS365 integration not configured', 'mspress'));
        }

        try {
            $graph = $this->msgraph->get_graph();
            if (!$graph) {
                throw new \Exception(__('MS365 connection failed', 'mspress'));
            }

            // Prepare email message
            $message = [
                'message' => [
                    'subject' => $this->phpmailer->Subject,
                    'body' => [
                        'contentType' => $this->phpmailer->ContentType === 'text/html' ? 'html' : 'text',
                        'content' => $this->phpmailer->Body
                    ],
                    'toRecipients' => $this->format_recipients($this->phpmailer->getToAddresses()),
                ]
            ];

            // Add CC if present
            if (!empty($this->phpmailer->getCcAddresses())) {
                $message['message']['ccRecipients'] = $this->format_recipients($this->phpmailer->getCcAddresses());
            }

            // Add BCC if present
            if (!empty($this->phpmailer->getBccAddresses())) {
                $message['message']['bccRecipients'] = $this->format_recipients($this->phpmailer->getBccAddresses());
            }

            // Add reply-to if present
            if (!empty($this->phpmailer->getReplyToAddresses())) {
                $replyTo = $this->phpmailer->getReplyToAddresses();
                $message['message']['replyTo'] = [
                    [
                        'emailAddress' => [
                            'address' => $replyTo[0][0],
                            'name' => $replyTo[0][1] ?? ''
                        ]
                    ]
                ];
            }

            // Send the message
            $graph->me()->sendMail()->post($message);

            return true;

        } catch (\Exception $e) {
            LoggerHelper::write_log('Graph Mailer error: ' . $e->getMessage());
            throw new \Exception(__('Failed to send email via Microsoft Graph: ', 'mspress') . $e->getMessage());
        }
    }

    /**
     * Format email recipients for Graph API
     */
    private function format_recipients($recipients) {
        $formatted = [];
        foreach ($recipients as $recipient) {
            $formatted[] = [
                'emailAddress' => [
                    'address' => $recipient[0],
                    'name' => $recipient[1] ?? ''
                ]
            ];
        }
        return $formatted;
    }
}
