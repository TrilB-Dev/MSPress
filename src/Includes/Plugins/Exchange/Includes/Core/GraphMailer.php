<?php
/**
 * Microsoft Graph Mailer for WordPress
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Includes\Core
 * @since 1.0.0
 */
namespace MSPress\Includes\Plugins\Exchange\Includes\Core;

use MSPress\Includes\MSGraph\GraphService;
use MSPress\Includes\Functions\Helpers\EncryptionHelper;
use MSPress\Includes\Functions\Helpers\LoggerHelper;
use MSPress\Includes\Settings\Settings;

/**
 * Microsoft Graph Exchange integration for WordPress
 */
class GraphMailer {
    /**
     * Singleton instance
     * 
     * @var GraphMailer|null
     * @since 1.0.0
     */
    private static $instance = null;
    /**
     * Get singleton instance
     * 
     * @return GraphMailer The singleton instance.
     * @since 1.0.0
     */
    public static function get_instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    /**
     * Private constructor
     * 
     * @since 1.0.0
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
     * 
     * @param \PHPMailer\PHPMailer\PHPMailer $phpmailer The PHPMailer instance.
     * @return void
     * @since 1.0.0
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
     * 
     * @param string $from The default from address.
     * @return string The from address to use.
     * @since 1.0.0
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
     * 
     * @param string $from_name The default from name.
     * @return string The from name to use.
     * @since 1.0.0
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
     * 
     * @since 1.0.0
     * @return void
     */
    public function add_admin_menu() {
        add_submenu_page(
            'mspress-ms365',
            __('Exchange Settings', 'mspress'),
            __('Exchange Settings', 'mspress'),
            'manage_options',
            'mspress-email',
            [$this, 'admin_page']
        );
    }
    /**
     * Admin page for email settings
     * 
     * @since 1.0.0
     * @return void
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
            <h1><?php _e('Microsoft Graph Exchange Settings', 'mspress'); ?></h1>

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
                        <th scope="row"><?php _e('From Exchange Address', 'mspress'); ?></th>
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
     * 
     * @since 1.0.0
     * @return void
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
     * 
     * @param string $value The value to encrypt.
     * @return string The encrypted value.
     * @throws \Exception If encryption fails.
     * @since 1.0.0
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
     *
     * @param string $value The value to decrypt.
     * @return string The decrypted value.
     * @throws \Exception If decryption fails.
     * @since 1.0.0
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
 * 
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Includes\Core
 * @since 1.0.0
 */
class GraphMailerTransport {
    /**
     * PHPMailer instance
     * 
     * @var \PHPMailer\PHPMailer\PHPMailer
     * @since 1.0.0
     */
    private $phpmailer;
    /**
     * Microsoft Graph service instance
     * 
     * @var GraphService
     * @since 1.0.0
     */
    private $msgraph;
    /**
     * Constructor
     *
     * @param \PHPMailer\PHPMailer\PHPMailer $phpmailer The PHPMailer instance.
     * @throws \Exception If Microsoft Graph service is not available.
     * @since 1.0.0
     */
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
     * 
     * @return bool True on success, false on failure.
     * @throws \Exception If sending fails.
     * @since 1.0.0
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
     * 
     * @param array $recipients Array of recipients from PHPMailer.
     * @return array Formatted recipients for Graph API.
     * @throws \Exception If recipient formatting fails.
     * @since 1.0.0
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
