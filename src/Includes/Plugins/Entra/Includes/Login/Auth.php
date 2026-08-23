<?php

namespace MSPress\Includes\Plugins\Entra\Includes\Login;

use MSPress\Includes\MSGraph\GraphService;
use MSPress\Includes\MSGraph\OAuthService;
use MSPress\Includes\Functions\Helpers\LoggerHelper;

/**
 * Frontend Authentication class for Microsoft 365 integration
 */
class Auth {

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
     * Private constructor to prevent direct instantiation
     */
    private function __construct() {
        $this->init_hooks();
    }

    /**
     * Initialize hooks and shortcodes
     */
    private function init_hooks() {
        add_action('init', [$this, 'init']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
        add_shortcode('ms365_login', [$this, 'login_shortcode']);
        add_shortcode('ms365_logout', [$this, 'logout_shortcode']);
        add_shortcode('ms365_profile', [$this, 'profile_shortcode']);
        add_shortcode('ms365_register', [$this, 'register_shortcode']);
        add_shortcode('ms365_user_status', [$this, 'user_status_shortcode']);
    }

    /**
     * Initialize hooks and filters
     */
    public function init() {
        // Handle OAuth callback
        add_action('wp', [$this, 'handle_oauth_callback']);

        // Add login/logout links to menus
        add_filter('wp_nav_menu_items', [$this, 'add_login_logout_menu_items'], 10, 2);

        // Redirect after login
        add_action('wp_login', [$this, 'redirect_after_login'], 10, 2);

        // Handle logout
        add_action('wp_logout', [$this, 'handle_logout']);
    }

    /**
     * Enqueue frontend scripts and styles
     */
    public function enqueue_scripts() {
        if (!wp_script_is('jquery', 'enqueued')) {
            wp_enqueue_script('jquery');
        }

        wp_enqueue_style(
            'mspress-entra-auth',
            MSPRESS_URL . 'src/Includes/Plugins/Entra/Assets/dist/css/auth-styles.css',
            [],
            MSPRESS_VERSION
        );

        wp_enqueue_script(
            'mspress-entra-auth',
            MSPRESS_URL . 'src/Includes/Plugins/Entra/Assets/dist/js/auth.js',
            ['jquery'],
            MSPRESS_VERSION,
            true
        );

        wp_localize_script('mspress-entra-auth', 'mspress_entra_auth', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('mspress_entra_auth_nonce'),
            'login_url' => $this->get_login_url(),
            'logout_url' => wp_logout_url(home_url()),
            'is_logged_in' => is_user_logged_in(),
            'current_user' => is_user_logged_in() ? $this->get_current_user_data() : null,
        ]);
    }

    /**
     * Handle OAuth callback
     */
    public function handle_oauth_callback() {
        if (!isset($_GET['code']) || !isset($_GET['state'])) {
            return;
        }

        // The canonical OAuth controller owns state and PKCE validation.
        if (get_query_var('mspress_ms_oauth')) {
            try {
                $msgraph = GraphService::get_instance();
                $user_info = $msgraph->handle_oauth_callback($_GET['code'], $_GET['state']);

                if ($user_info) {
                    $this->login_or_register_user($user_info);
                }
            } catch (\Exception $e) {
                LoggerHelper::write_log('OAuth callback error: ' . $e->getMessage());
                wp_redirect(home_url('/login?error=oauth_failed'));
                exit;
            }
        }
    }

    /**
     * Login or register user with Microsoft data
     */
    private function login_or_register_user($user_info) {
        // Check if user exists by email
        $user = get_user_by('email', $user_info['email']);

        if (!$user) {
            // Create new user
            $username = $this->generate_username($user_info['email']);
            $user_id = wp_create_user($username, wp_generate_password(), $user_info['email']);

            if (is_wp_error($user_id)) {
                LoggerHelper::write_log('User creation failed: ' . $user_id->get_error_message());
                wp_redirect(home_url('/login?error=user_creation_failed'));
                exit;
            }

            $user = get_user_by('id', $user_id);

            // Update user meta with Microsoft data
            update_user_meta($user_id, 'ms365_user_id', $user_info['id']);
            update_user_meta($user_id, 'ms365_tenant_id', $user_info['tenant_id']);
            update_user_meta($user_id, 'ms365_display_name', $user_info['display_name']);
            update_user_meta($user_id, 'ms365_job_title', $user_info['job_title'] ?? '');
            update_user_meta($user_id, 'ms365_department', $user_info['department'] ?? '');
            update_user_meta($user_id, 'ms365_office_location', $user_info['office_location'] ?? '');

            // Set display name
            wp_update_user([
                'ID' => $user_id,
                'display_name' => $user_info['display_name'],
                'first_name' => $user_info['first_name'] ?? '',
                'last_name' => $user_info['last_name'] ?? '',
            ]);

            // Send welcome email
            $this->send_welcome_email($user);
        } else {
            // Update existing user meta
            update_user_meta($user->ID, 'ms365_user_id', $user_info['id']);
            update_user_meta($user->ID, 'ms365_tenant_id', $user_info['tenant_id']);
            update_user_meta($user->ID, 'ms365_display_name', $user_info['display_name']);
            update_user_meta($user->ID, 'ms365_job_title', $user_info['job_title'] ?? '');
            update_user_meta($user->ID, 'ms365_department', $user_info['department'] ?? '');
            update_user_meta($user->ID, 'ms365_office_location', $user_info['office_location'] ?? '');
        }

        // Log the user in
        wp_set_current_user($user->ID);
        wp_set_auth_cookie($user->ID, true);

        // Redirect to intended page or home
        $redirect_to = isset($_GET['redirect_to']) ? $_GET['redirect_to'] : home_url('/profile');
        wp_redirect($redirect_to);
        exit;
    }

    /**
     * Generate unique username from email
     */
    private function generate_username($email) {
        $base_username = sanitize_user(strstr($email, '@', true));
        $username = $base_username;
        $counter = 1;

        while (username_exists($username)) {
            $username = $base_username . $counter;
            $counter++;
        }

        return $username;
    }

    /**
     * Send welcome email to new users
     */
    private function send_welcome_email($user) {
        $subject = __('Welcome to ' . get_bloginfo('name'), 'mspress');
        $message = sprintf(
            __('Welcome %s! You have successfully registered using your Microsoft 365 account.', 'mspress'),
            $user->display_name
        );

        wp_mail($user->user_email, $subject, $message);
    }

    /**
     * Get login URL
     */
    public function get_login_url() {
        $oauth_service = GraphService::get_instance()->get_oauth_service();
        return $oauth_service instanceof OAuthService ? $oauth_service->get_authorization_url() : '';
    }

    /**
     * Get current user data for frontend
     */
    private function get_current_user_data() {
        $user = wp_get_current_user();
        return [
            'id' => $user->ID,
            'display_name' => $user->display_name,
            'email' => $user->user_email,
            'avatar' => get_avatar_url($user->ID),
            'ms365_data' => [
                'user_id' => get_user_meta($user->ID, 'ms365_user_id', true),
                'job_title' => get_user_meta($user->ID, 'ms365_job_title', true),
                'department' => get_user_meta($user->ID, 'ms365_department', true),
                'office_location' => get_user_meta($user->ID, 'ms365_office_location', true),
            ]
        ];
    }

    /**
     * Redirect after login
     */
    public function redirect_after_login($user_login, $user) {
        if (isset($_REQUEST['redirect_to'])) {
            wp_redirect($_REQUEST['redirect_to']);
            exit;
        }
    }

    /**
     * Handle logout
     */
    public function handle_logout() {
        // Clear any Microsoft session data if needed
        // Redirect to home page
        wp_redirect(home_url());
        exit;
    }

    /**
     * Add login/logout menu items
     */
    public function add_login_logout_menu_items($items, $args) {
        if (is_user_logged_in()) {
            $logout_url = wp_logout_url(home_url());
            $items .= '<li class="menu-item"><a href="' . esc_url($logout_url) . '">' . __('Logout', 'mspress') . '</a></li>';
        } else {
            $login_url = $this->get_login_url();
            $items .= '<li class="menu-item"><a href="' . esc_url($login_url) . '">' . __('Login with Microsoft', 'mspress') . '</a></li>';
        }
        return $items;
    }

    /**
     * Login shortcode
     */
    public function login_shortcode($atts = []) {
        if (is_user_logged_in()) {
            return $this->user_status_shortcode($atts);
        }

        $atts = shortcode_atts([
            'redirect' => home_url('/profile'),
            'class' => 'mspress-login-btn',
            'text' => __('Sign in with Microsoft 365', 'mspress')
        ], $atts);

        $login_url = add_query_arg('redirect_to', urlencode($atts['redirect']), $this->get_login_url());

        ob_start();
        ?>
        <div class="mspress-auth-container">
            <a href="<?php echo esc_url($login_url); ?>" class="<?php echo esc_attr($atts['class']); ?>">
                <i class="fab fa-microsoft"></i>
                <?php echo esc_html($atts['text']); ?>
            </a>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Logout shortcode
     */
    public function logout_shortcode($atts = []) {
        if (!is_user_logged_in()) {
            return '';
        }

        $atts = shortcode_atts([
            'redirect' => home_url(),
            'class' => 'mspress-logout-btn',
            'text' => __('Logout', 'mspress')
        ], $atts);

        $logout_url = wp_logout_url($atts['redirect']);

        ob_start();
        ?>
        <div class="mspress-auth-container">
            <a href="<?php echo esc_url($logout_url); ?>" class="<?php echo esc_attr($atts['class']); ?>">
                <i class="fas fa-sign-out-alt"></i>
                <?php echo esc_html($atts['text']); ?>
            </a>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Profile shortcode
     */
    public function profile_shortcode($atts = []) {
        if (!is_user_logged_in()) {
            return $this->login_shortcode($atts);
        }

        $user = wp_get_current_user();
        $ms365_data = [
            'user_id' => get_user_meta($user->ID, 'ms365_user_id', true),
            'job_title' => get_user_meta($user->ID, 'ms365_job_title', true),
            'department' => get_user_meta($user->ID, 'ms365_department', true),
            'office_location' => get_user_meta($user->ID, 'ms365_office_location', true),
        ];

        ob_start();
        ?>
        <div class="mspress-profile-container">
            <div class="mspress-profile-header">
                <div class="mspress-profile-avatar">
                    <?php echo get_avatar($user->ID, 96); ?>
                </div>
                <div class="mspress-profile-info">
                    <h3><?php echo esc_html($user->display_name); ?></h3>
                    <p><?php echo esc_html($user->user_email); ?></p>
                </div>
            </div>

            <div class="mspress-profile-details">
                <h4><?php _e('Account Information', 'mspress'); ?></h4>
                <dl class="mspress-profile-fields">
                    <dt><?php _e('Username', 'mspress'); ?></dt>
                    <dd><?php echo esc_html($user->user_login); ?></dd>

                    <dt><?php _e('Email', 'mspress'); ?></dt>
                    <dd><?php echo esc_html($user->user_email); ?></dd>

                    <dt><?php _e('First Name', 'mspress'); ?></dt>
                    <dd><?php echo esc_html($user->first_name); ?></dd>

                    <dt><?php _e('Last Name', 'mspress'); ?></dt>
                    <dd><?php echo esc_html($user->last_name); ?></dd>

                    <dt><?php _e('Display Name', 'mspress'); ?></dt>
                    <dd><?php echo esc_html($user->display_name); ?></dd>

                    <?php if (!empty($ms365_data['job_title'])): ?>
                    <dt><?php _e('Job Title', 'mspress'); ?></dt>
                    <dd><?php echo esc_html($ms365_data['job_title']); ?></dd>
                    <?php endif; ?>

                    <?php if (!empty($ms365_data['department'])): ?>
                    <dt><?php _e('Department', 'mspress'); ?></dt>
                    <dd><?php echo esc_html($ms365_data['department']); ?></dd>
                    <?php endif; ?>

                    <?php if (!empty($ms365_data['office_location'])): ?>
                    <dt><?php _e('Office Location', 'mspress'); ?></dt>
                    <dd><?php echo esc_html($ms365_data['office_location']); ?></dd>
                    <?php endif; ?>
                </dl>
            </div>

            <div class="mspress-profile-actions">
                <?php echo $this->logout_shortcode(); ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Register shortcode (for Microsoft 365, registration happens automatically)
     */
    public function register_shortcode($atts = []) {
        if (is_user_logged_in()) {
            return $this->user_status_shortcode($atts);
        }

        $atts = shortcode_atts([
            'redirect' => home_url('/profile'),
            'class' => 'mspress-register-btn',
            'text' => __('Register with Microsoft 365', 'mspress')
        ], $atts);

        // For Microsoft 365, registration and login are the same process
        return $this->login_shortcode($atts);
    }

    /**
     * User status shortcode
     */
    public function user_status_shortcode($atts = []) {
        if (!is_user_logged_in()) {
            return $this->login_shortcode($atts);
        }

        $user = wp_get_current_user();
        $atts = shortcode_atts([
            'show_avatar' => 'true',
            'show_name' => 'true',
            'show_logout' => 'true',
            'avatar_size' => '32'
        ], $atts);

        ob_start();
        ?>
        <div class="mspress-user-status">
            <?php if ($atts['show_avatar'] === 'true'): ?>
                <div class="mspress-user-avatar">
                    <?php echo get_avatar($user->ID, intval($atts['avatar_size'])); ?>
                </div>
            <?php endif; ?>

            <?php if ($atts['show_name'] === 'true'): ?>
                <div class="mspress-user-info">
                    <span class="mspress-user-name"><?php echo esc_html($user->display_name); ?></span>
                </div>
            <?php endif; ?>

            <?php if ($atts['show_logout'] === 'true'): ?>
                <div class="mspress-user-actions">
                    <?php echo $this->logout_shortcode(['text' => __('Logout', 'mspress')]); ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
        return ob_get_clean();
    }
}
