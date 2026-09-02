<?php

namespace MSPress\Includes\Plugins\Entra\Includes\User;

use MSPress\Includes\MSGraph\GraphService;
use MSPress\Includes\Functions\Helpers\EncryptionHelper;
use MSPress\Includes\Functions\Helpers\LoggerHelper;
use MSPress\Includes\Settings\Settings;

/**
 * User synchronization class for Microsoft 365 integration
 */
class Sync {

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
        add_action('init', [$this, 'init']);
        add_action('mspress_sync_users', [$this, 'sync_users_cron']);
        add_action('wp_ajax_mspress_sync_user', [$this, 'ajax_sync_single_user']);
        add_action('wp_ajax_mspress_sync_all_users', [$this, 'ajax_sync_all_users']);
    }

    /**
     * Initialize sync functionality
     */
    public function init() {
        // Schedule cron job if not already scheduled
        if (!wp_next_scheduled('mspress_sync_users')) {
            wp_schedule_event(time(), 'daily', 'mspress_sync_users');
        }

        // Add admin menu for sync management
        add_action('admin_menu', [$this, 'add_admin_menu']);
    }

    /**
     * Add admin menu for sync management
     */
    public function add_admin_menu() {
        add_submenu_page(
            'mspress-ms365',
            __('User Sync', 'mspress'),
            __('User Sync', 'mspress'),
            'manage_options',
            'mspress-sync',
            [$this, 'admin_page']
        );
    }

    /**
     * Admin page for user sync management
     */
    public function admin_page() {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }

        $sync_stats = $this->get_sync_stats();

        ?>
        <div class="wrap">
            <h1><?php _e('Microsoft 365 User Synchronization', 'mspress'); ?></h1>

            <div class="mspress-sync-stats">
                <div class="mspress-stat-card">
                    <h3><?php _e('Total Users', 'mspress'); ?></h3>
                    <span class="mspress-stat-number"><?php echo $sync_stats['total_users']; ?></span>
                </div>
                <div class="mspress-stat-card">
                    <h3><?php _e('MS365 Users', 'mspress'); ?></h3>
                    <span class="mspress-stat-number"><?php echo $sync_stats['ms365_users']; ?></span>
                </div>
                <div class="mspress-stat-card">
                    <h3><?php _e('Last Sync', 'mspress'); ?></h3>
                    <span class="mspress-stat-date"><?php echo $sync_stats['last_sync']; ?></span>
                </div>
            </div>

            <div class="mspress-sync-actions">
                <button id="mspress-sync-all" class="btn btn-primary">
                    <?php _e('Sync All Users', 'mspress'); ?>
                </button>
                <button id="mspress-sync-incremental" class="btn btn-secondary">
                    <?php _e('Incremental Sync', 'mspress'); ?>
                </button>
            </div>

            <div id="mspress-sync-progress" style="display: none;">
                <div class="mspress-progress-bar">
                    <div class="mspress-progress-fill" style="width: 0%"></div>
                </div>
                <p id="mspress-sync-status"><?php _e('Preparing sync...', 'mspress'); ?></p>
            </div>

            <div id="mspress-sync-results"></div>
        </div>

        <script>
        jQuery(document).ready(function($) {
            $('#mspress-sync-all').on('click', function() {
                if (confirm('<?php _e('This will sync all users from Microsoft 365. Continue?', 'mspress'); ?>')) {
                    mspressStartSync('full');
                }
            });

            $('#mspress-sync-incremental').on('click', function() {
                mspressStartSync('incremental');
            });

            function mspressStartSync(type) {
                $('#mspress-sync-progress').show();
                $('#mspress-sync-all, #mspress-sync-incremental').prop('disabled', true);

                $.post(ajaxurl, {
                    action: 'mspress_sync_all_users',
                    type: type,
                    nonce: '<?php echo wp_create_nonce('mspress_sync_nonce'); ?>'
                }, function(response) {
                    if (response.success) {
                        $('#mspress-sync-status').text('<?php _e('Sync completed successfully!', 'mspress'); ?>');
                        $('#mspress-sync-results').html(response.data.html);
                        location.reload();
                    } else {
                        $('#mspress-sync-status').text('<?php _e('Sync failed:', 'mspress'); ?> ' + response.data.message);
                    }
                    $('#mspress-sync-all, #mspress-sync-incremental').prop('disabled', false);
                });
            }
        });
        </script>
        <?php
    }

    /**
     * Get sync statistics
     */
    private function get_sync_stats() {
        $total_users = count_users()['total_users'];
        $ms365_users = count($this->get_ms365_users());

        $last_sync = Settings::get('last_sync');
        $last_sync_display = $last_sync ? date_i18n(get_option('date_format') . ' ' . get_option('time_format'), $last_sync) : __('Never', 'mspress');

        return [
            'total_users' => $total_users,
            'ms365_users' => $ms365_users,
            'last_sync' => $last_sync_display
        ];
    }

    /**
     * Get all MS365 users
     */
    private function get_ms365_users() {
        global $wpdb;
        return $wpdb->get_results("
            SELECT u.ID, u.user_email, u.display_name,
                   um1.meta_value as ms365_user_id,
                   um2.meta_value as ms365_tenant_id
            FROM {$wpdb->users} u
            LEFT JOIN {$wpdb->usermeta} um1 ON u.ID = um1.user_id AND um1.meta_key = 'ms365_user_id'
            LEFT JOIN {$wpdb->usermeta} um2 ON u.ID = um2.user_id AND um2.meta_key = 'ms365_tenant_id'
            WHERE um1.meta_value IS NOT NULL
        ");
    }

    /**
     * Cron job for user synchronization
     */
    public function sync_users_cron() {
        $this->sync_users('incremental');
    }

    /**
     * AJAX handler for syncing all users
     */
    public function ajax_sync_all_users() {
        check_ajax_referer('mspress_sync_nonce', 'nonce');

        if (!current_user_can('manage_options')) {
            wp_die(__('Insufficient permissions'));
        }

        $type = isset($_POST['type']) ? $_POST['type'] : 'incremental';
        $result = $this->sync_users($type);

        if ($result['success']) {
            wp_send_json_success(['message' => $result['message'], 'html' => $this->get_sync_results_html($result)]);
        } else {
            wp_send_json_error(['message' => $result['message']]);
        }
    }

    /**
     * Sync users from Microsoft 365
     */
    public function sync_users($type = 'incremental') {
        $msgraph = GraphService::get_instance();

        if (!$msgraph) {
            return ['success' => false, 'message' => __('MS365 integration not configured', 'mspress')];
        }

        try {
            $graph = $msgraph->get_graph();
            if (!$graph) {
                return ['success' => false, 'message' => __('MS365 connection failed', 'mspress')];
            }

            // Get users from Microsoft Graph
            $users_request = $graph->users()->get();
            $ms_users = [];

            // Handle pagination
            do {
                $page = $users_request->wait();
                foreach ($page->getValue() as $ms_user) {
                    $ms_users[] = [
                        'id' => $ms_user->getId(),
                        'email' => $ms_user->getMail() ?: $ms_user->getUserPrincipalName(),
                        'display_name' => $ms_user->getDisplayName(),
                        'first_name' => $ms_user->getGivenName(),
                        'last_name' => $ms_user->getSurname(),
                        'job_title' => $ms_user->getJobTitle(),
                        'department' => $ms_user->getDepartment(),
                        'office_location' => $ms_user->getOfficeLocation(),
                        'account_enabled' => $ms_user->getAccountEnabled()
                    ];
                }
                $users_request = $page->getOdataNextLink() ? $graph->users()->withUrl($page->getOdataNextLink())->get() : null;
            } while ($users_request);

            $synced = 0;
            $created = 0;
            $updated = 0;
            $deactivated = 0;

            foreach ($ms_users as $ms_user) {
                if (!$ms_user['account_enabled']) {
                    // Handle deactivated users
                    $wp_user = get_user_by('email', $ms_user['email']);
                    if ($wp_user) {
                        // Mark user as deactivated in WordPress
                        update_user_meta($wp_user->ID, 'ms365_account_enabled', false);
                        $deactivated++;
                    }
                    continue;
                }

                $result = $this->sync_single_user($ms_user, $type);
                $synced++;

                if ($result['action'] === 'created') {
                    $created++;
                } elseif ($result['action'] === 'updated') {
                    $updated++;
                }
            }

            Settings::set('last_sync', time());

            return [
                'success' => true,
                'message' => sprintf(
                    __('Sync completed: %d users processed, %d created, %d updated, %d deactivated', 'mspress'),
                    $synced, $created, $updated, $deactivated
                ),
                'stats' => [
                    'processed' => $synced,
                    'created' => $created,
                    'updated' => $updated,
                    'deactivated' => $deactivated
                ]
            ];

        } catch (\Exception $e) {
            LoggerHelper::write_log('User sync error: ' . $e->getMessage());
            return ['success' => false, 'message' => __('Sync failed: ', 'mspress') . $e->getMessage()];
        }
    }

    /**
     * Sync a single user
     */
    private function sync_single_user($ms_user, $sync_type = 'incremental') {
        // Check if user exists by MS365 ID or email
        $existing_user = $this->find_user_by_ms365_id($ms_user['id']);

        if (!$existing_user) {
            $existing_user = get_user_by('email', $ms_user['email']);
        }

        if ($existing_user) {
            // Update existing user
            $this->update_user_from_ms365($existing_user->ID, $ms_user);
            return ['action' => 'updated', 'user_id' => $existing_user->ID];
        } else {
            // Create new user (only for full sync or if user has logged in before)
            if ($sync_type === 'full') {
                $user_id = $this->create_user_from_ms365($ms_user);
                return ['action' => 'created', 'user_id' => $user_id];
            }
        }

        return ['action' => 'skipped'];
    }

    /**
     * Find user by MS365 ID
     */
    private function find_user_by_ms365_id($ms365_id) {
        global $wpdb;
        $user_id = $wpdb->get_var($wpdb->prepare(
            "SELECT user_id FROM {$wpdb->usermeta} WHERE meta_key = 'ms365_user_id' AND meta_value = %s",
            $ms365_id
        ));
        return $user_id ? get_user_by('id', $user_id) : null;
    }

    /**
     * Create user from MS365 data
     */
    private function create_user_from_ms365($ms_user) {
        $username = $this->generate_username($ms_user['email']);
        $user_id = wp_create_user($username, wp_generate_password(), $ms_user['email']);

        if (!is_wp_error($user_id)) {
            $this->update_user_from_ms365($user_id, $ms_user);
        }

        return $user_id;
    }

    /**
     * Update user from MS365 data
     */
    private function update_user_from_ms365($user_id, $ms_user) {
        // Update user meta
        update_user_meta($user_id, 'ms365_user_id', $ms_user['id']);
        update_user_meta($user_id, 'ms365_tenant_id', $this->get_tenant_id());
        update_user_meta($user_id, 'ms365_display_name', $ms_user['display_name']);
        update_user_meta($user_id, 'ms365_job_title', $ms_user['job_title']);
        update_user_meta($user_id, 'ms365_department', $ms_user['department']);
        update_user_meta($user_id, 'ms365_office_location', $ms_user['office_location']);
        update_user_meta($user_id, 'ms365_account_enabled', $ms_user['account_enabled']);

        // Update WordPress user data
        wp_update_user([
            'ID' => $user_id,
            'display_name' => $ms_user['display_name'],
            'first_name' => $ms_user['first_name'],
            'last_name' => $ms_user['last_name'],
        ]);
    }

    /**
     * Generate unique username
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
     * Get tenant ID
     */
    private function get_tenant_id() {
        $options = Settings::get_group('ms365', []);
        if (empty($options['tenant_id'])) {
            return null;
        }

        try {
            return EncryptionHelper::decrypt((string) $options['tenant_id']) ?? null;
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * Get sync results HTML
     */
    private function get_sync_results_html($result) {
        if (!$result['success'] || !isset($result['stats'])) {
            return '';
        }

        $stats = $result['stats'];
        ob_start();
        ?>
        <div class="mspress-sync-results">
            <h3><?php _e('Sync Results', 'mspress'); ?></h3>
            <ul>
                <li><?php printf(__('%d users processed', 'mspress'), $stats['processed']); ?></li>
                <li><?php printf(__('%d users created', 'mspress'), $stats['created']); ?></li>
                <li><?php printf(__('%d users updated', 'mspress'), $stats['updated']); ?></li>
                <li><?php printf(__('%d users deactivated', 'mspress'), $stats['deactivated']); ?></li>
            </ul>
        </div>
        <?php
        return ob_get_clean();
    }
}
