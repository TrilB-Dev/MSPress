<?php

namespace MSPress\Includes\Plugins\Entra\Includes\User;

use MSPress\Includes\MSGraph\GraphService;
use MSPress\Includes\Functions\Helpers\LoggerHelper;
use MSPress\Includes\Settings\Settings;

/**
 * Role-based access control using Microsoft 365 groups
 */
class RoleManager {

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
        add_action('admin_menu', [$this, 'add_admin_menu']);
        add_action('wp_ajax_mspress_sync_roles', [$this, 'ajax_sync_roles']);
        add_action('wp_ajax_mspress_get_ms365_groups', [$this, 'ajax_get_ms365_groups']);
        add_action('mspress_sync_user_roles', [$this, 'sync_user_roles_cron']);
        add_filter('user_has_cap', [$this, 'filter_user_capabilities'], 10, 4);
    }

    /**
     * Initialize role management
     */
    public function init() {
        // Schedule cron job for role sync
        if (!wp_next_scheduled('mspress_sync_user_roles')) {
            wp_schedule_event(time(), 'hourly', 'mspress_sync_user_roles');
        }

        // Add custom capabilities for MS365 group management
        $this->add_custom_capabilities();
    }

    /**
     * Add custom capabilities
     */
    private function add_custom_capabilities() {
        $roles = wp_roles();
        $capabilities = [
            'manage_ms365_groups' => __('Manage Microsoft 365 Groups', 'trilbdev'),
            'sync_ms365_roles' => __('Sync Microsoft 365 Roles', 'trilbdev'),
        ];

        foreach ($roles->roles as $role_name => $role_info) {
            $role = get_role($role_name);
            if ($role) {
                foreach ($capabilities as $cap => $label) {
                    if (!$role->has_cap($cap)) {
                        $role->add_cap($cap);
                    }
                }
            }
        }
    }

    /**
     * Add admin menu for role management
     */
    public function add_admin_menu() {
        add_submenu_page(
            'mspress-ms365',
            __('Role Management', 'trilbdev'),
            __('Role Management', 'trilbdev'),
            'manage_options',
            'mspress-roles',
            [$this, 'admin_page']
        );
    }

    /**
     * Admin page for role management
     */
    public function admin_page() {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }

        $group_mappings = Settings::get('group_mappings', []);
        $ms365_groups = $this->get_ms365_groups();

        ?>
        <div class="wrap">
            <h1><?php _e('Microsoft 365 Role Management', 'trilbdev'); ?></h1>

            <div class="trilbdev-role-notice">
                <p><?php _e('Map Microsoft 365 groups to WordPress roles. Users will automatically be assigned the corresponding WordPress role based on their group membership.', 'trilbdev'); ?></p>
            </div>

            <div class="trilbdev-role-actions">
                <button id="sync-roles" class="btn btn-primary">
                    <?php _e('Sync All User Roles', 'trilbdev'); ?>
                </button>
                <button id="refresh-groups" class="btn btn-secondary">
                    <?php _e('Refresh MS365 Groups', 'trilbdev'); ?>
                </button>
            </div>

            <div id="sync-progress" style="display: none;">
                <div class="trilbdev-progress-bar">
                    <div class="trilbdev-progress-fill" style="width: 0%"></div>
                </div>
                <p id="sync-status"><?php _e('Syncing roles...', 'trilbdev'); ?></p>
            </div>

            <form id="group-mappings-form" method="post" action="">
                <?php wp_nonce_field('mspress_save_group_mappings'); ?>

                <div class="trilbdev-group-mappings">
                    <h3><?php _e('Group to Role Mappings', 'trilbdev'); ?></h3>

                    <table class="wp-list-table widefat fixed striped">
                        <thead>
                            <tr>
                                <th><?php _e('Microsoft 365 Group', 'trilbdev'); ?></th>
                                <th><?php _e('WordPress Role', 'trilbdev'); ?></th>
                                <th><?php _e('Actions', 'trilbdev'); ?></th>
                            </tr>
                        </thead>
                        <tbody id="mappings-tbody">
                            <?php foreach ($group_mappings as $group_id => $role): ?>
                            <tr data-group-id="<?php echo esc_attr($group_id); ?>">
                                <td><?php echo esc_html($this->get_group_name($group_id, $ms365_groups)); ?></td>
                                <td>
                                    <select name="group_mappings[<?php echo esc_attr($group_id); ?>]" class="role-select">
                                        <option value=""><?php _e('No role', 'trilbdev'); ?></option>
                                        <?php wp_dropdown_roles($role); ?>
                                    </select>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-secondary remove-mapping">
                                        <?php _e('Remove', 'trilbdev'); ?>
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div class="trilbdev-add-mapping">
                        <select id="new-group-select">
                            <option value=""><?php _e('Select a group...', 'trilbdev'); ?></option>
                            <?php foreach ($ms365_groups as $group): ?>
                                <?php if (!isset($group_mappings[$group['id']])): ?>
                                <option value="<?php echo esc_attr($group['id']); ?>" data-name="<?php echo esc_attr($group['displayName']); ?>">
                                    <?php echo esc_html($group['displayName']); ?>
                                </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <button type="button" id="add-mapping" class="btn btn-secondary">
                            <?php _e('Add Mapping', 'trilbdev'); ?>
                        </button>
                    </div>
                </div>

                <p class="submit">
                    <input type="submit" name="submit" class="btn btn-primary" value="<?php _e('Save Mappings', 'trilbdev'); ?>" />
                </p>
            </form>

            <div id="ajax-results"></div>
        </div>

        <script>
        jQuery(document).ready(function($) {
            // Save mappings
            $('#group-mappings-form').on('submit', function(e) {
                e.preventDefault();

                $.post(ajaxurl, {
                    action: 'mspress_save_group_mappings',
                    data: $(this).serialize(),
                    nonce: '<?php echo wp_create_nonce('mspress_save_group_mappings'); ?>'
                }, function(response) {
                    if (response.success) {
                        $('#ajax-results').html('<div class="notice notice-success"><p>' + response.data.message + '</p></div>');
                    } else {
                        $('#ajax-results').html('<div class="notice notice-error"><p>' + response.data.message + '</p></div>');
                    }
                });
            });

            // Add new mapping
            $('#add-mapping').on('click', function() {
                var $select = $('#new-group-select');
                var groupId = $select.val();
                var groupName = $select.find('option:selected').data('name');

                if (!groupId) return;

                var $tbody = $('#mappings-tbody');
                var $row = $('<tr data-group-id="' + groupId + '"></tr>');
                $row.append('<td>' + groupName + '</td>');
                $row.append('<td><select name="group_mappings[' + groupId + ']" class="role-select"><option value="">No role</option><?php wp_dropdown_roles(); ?></select></td>');
                $row.append('<td><button type="button" class="btn btn-sm btn-outline-secondary remove-mapping">Remove</button></td>');

                $tbody.append($row);
                $select.find('option:selected').remove();
                $select.val('');
            });

            // Remove mapping
            $(document).on('click', '.remove-mapping', function() {
                var $row = $(this).closest('tr');
                var groupId = $row.data('group-id');
                var groupName = $row.find('td:first').text();

                $row.remove();

                // Add back to select
                var $option = $('<option value="' + groupId + '" data-name="' + groupName + '">' + groupName + '</option>');
                $('#new-group-select').append($option);
            });

            // Sync roles
            $('#sync-roles').on('click', function() {
                if (!confirm('<?php _e('This will sync roles for all MS365 users. Continue?', 'trilbdev'); ?>')) return;

                $('#sync-progress').show();
                $('#sync-roles').prop('disabled', true);

                $.post(ajaxurl, {
                    action: 'mspress_sync_roles',
                    nonce: '<?php echo wp_create_nonce('mspress_sync_roles'); ?>'
                }, function(response) {
                    $('#sync-roles').prop('disabled', false);

                    if (response.success) {
                        $('#sync-status').text('<?php _e('Role sync completed!', 'trilbdev'); ?>');
                        $('#ajax-results').html('<div class="notice notice-success"><p>' + response.data.message + '</p></div>');
                        setTimeout(function() { location.reload(); }, 2000);
                    } else {
                        $('#sync-status').text('<?php _e('Role sync failed!', 'trilbdev'); ?>');
                        $('#ajax-results').html('<div class="notice notice-error"><p>' + response.data.message + '</p></div>');
                    }
                });
            });

            // Refresh groups
            $('#refresh-groups').on('click', function() {
                $(this).prop('disabled', true).text('<?php _e('Refreshing...', 'trilbdev'); ?>');

                $.post(ajaxurl, {
                    action: 'mspress_get_ms365_groups',
                    nonce: '<?php echo wp_create_nonce('mspress_get_ms365_groups'); ?>'
                }, function(response) {
                    $('#refresh-groups').prop('disabled', false).text('<?php _e('Refresh MS365 Groups', 'trilbdev'); ?>');

                    if (response.success) {
                        location.reload();
                    } else {
                        alert('<?php _e('Failed to refresh groups:', 'trilbdev'); ?> ' + response.data.message);
                    }
                });
            });
        });
        </script>
        <?php
    }

    /**
     * Get Microsoft 365 groups
     */
    private function get_ms365_groups() {
        $cached_groups = get_transient('mspress_ms365_groups');
        if ($cached_groups !== false) {
            return $cached_groups;
        }

        $msgraph = GraphService::get_instance();
        if (!$msgraph) {
            return [];
        }

        try {
            $graph = $msgraph->get_graph();
            if (!$graph) {
                return [];
            }

            $groups_request = $graph->groups()->get();
            $groups = [];

            do {
                $page = $groups_request->wait();
                foreach ($page->getValue() as $group) {
                    $groups[] = [
                        'id' => $group->getId(),
                        'displayName' => $group->getDisplayName(),
                        'description' => $group->getDescription(),
                        'mail' => $group->getMail()
                    ];
                }
                $groups_request = $page->getOdataNextLink() ? $graph->groups()->withUrl($page->getOdataNextLink())->get() : null;
            } while ($groups_request);

            set_transient('mspress_ms365_groups', $groups, HOUR_IN_SECONDS);
            return $groups;

        } catch (\Exception $e) {
            LoggerHelper::write_log('Failed to get MS365 groups: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Get group name by ID
     */
    private function get_group_name($group_id, $groups) {
        foreach ($groups as $group) {
            if ($group['id'] === $group_id) {
                return $group['displayName'];
            }
        }
        return $group_id; // Fallback to ID if name not found
    }

    /**
     * AJAX handler for syncing roles
     */
    public function ajax_sync_roles() {
        check_ajax_referer('mspress_sync_roles', 'nonce');

        if (!current_user_can('manage_options')) {
            wp_send_json_error(['message' => __('Insufficient permissions', 'trilbdev')]);
        }

        $result = $this->sync_all_user_roles();

        if ($result['success']) {
            wp_send_json_success(['message' => $result['message']]);
        } else {
            wp_send_json_error(['message' => $result['message']]);
        }
    }

    /**
     * AJAX handler for getting MS365 groups
     */
    public function ajax_get_ms365_groups() {
        check_ajax_referer('mspress_get_ms365_groups', 'nonce');

        if (!current_user_can('manage_options')) {
            wp_send_json_error(['message' => __('Insufficient permissions', 'trilbdev')]);
        }

        // Clear cache and refresh groups
        delete_transient('mspress_ms365_groups');
        $groups = $this->get_ms365_groups();

        wp_send_json_success(['groups' => $groups]);
    }

    /**
     * AJAX handler for saving group mappings
     */
    public function ajax_save_group_mappings() {
        check_ajax_referer('mspress_save_group_mappings', 'nonce');

        if (!current_user_can('manage_options')) {
            wp_send_json_error(['message' => __('Insufficient permissions', 'trilbdev')]);
        }

        $mappings = isset($_POST['group_mappings']) ? $_POST['group_mappings'] : [];
        Settings::set('group_mappings', $mappings);

        wp_send_json_success(['message' => __('Group mappings saved successfully!', 'trilbdev')]);
    }

    /**
     * Cron job for syncing user roles
     */
    public function sync_user_roles_cron() {
        $this->sync_all_user_roles();
    }

    /**
     * Sync roles for all MS365 users
     */
    public function sync_all_user_roles() {
        global $wpdb;

        $msgraph = GraphService::get_instance();
        if (!$msgraph) {
            return ['success' => false, 'message' => __('MS365 integration not configured', 'trilbdev')];
        }

        $group_mappings = Settings::get('group_mappings', []);
        if (empty($group_mappings)) {
            return ['success' => false, 'message' => __('No group mappings configured', 'trilbdev')];
        }

        // Get all MS365 users
        $ms365_users = $wpdb->get_results("
            SELECT u.ID, u.user_login, um.meta_value as ms365_user_id
            FROM {$wpdb->users} u
            LEFT JOIN {$wpdb->usermeta} um ON u.ID = um.user_id AND um.meta_key = 'ms365_user_id'
            WHERE um.meta_value IS NOT NULL
        ");

        $updated = 0;
        $errors = 0;

        foreach ($ms365_users as $user) {
            try {
                $this->sync_user_role($user->ID, $user->ms365_user_id, $group_mappings);
                $updated++;
            } catch (\Exception $e) {
                LoggerHelper::write_log('Failed to sync role for user ' . $user->user_login . ': ' . $e->getMessage());
                $errors++;
            }
        }

        return [
            'success' => true,
            'message' => sprintf(
                __('Role sync completed: %d users updated, %d errors', 'trilbdev'),
                $updated, $errors
            )
        ];
    }

    /**
     * Sync role for a single user
     */
    private function sync_user_role($user_id, $ms365_user_id, $group_mappings) {
        $msgraph = GraphService::get_instance();
        $graph = $msgraph->get_graph();

        // Get user's group memberships
        $memberOf = $graph->users($ms365_user_id)->memberOf()->get();
        $user_groups = [];

        foreach ($memberOf->getValue() as $group) {
            if ($group->getOdataType() === '#microsoft.graph.group') {
                $user_groups[] = $group->getId();
            }
        }

        // Determine the highest priority role for the user
        $assigned_role = $this->determine_user_role($user_groups, $group_mappings);

        if ($assigned_role) {
            // Remove all existing roles and assign the new one
            $user = new \WP_User($user_id);
            $user->set_role($assigned_role);
        }
    }

    /**
     * Determine the appropriate role based on group memberships
     */
    private function determine_user_role($user_groups, $group_mappings) {
        $role_hierarchy = [
            'administrator' => 6,
            'editor' => 5,
            'author' => 4,
            'contributor' => 3,
            'subscriber' => 2,
            'ms365_user' => 1
        ];

        $highest_role = null;
        $highest_priority = 0;

        foreach ($user_groups as $group_id) {
            if (isset($group_mappings[$group_id]) && !empty($group_mappings[$group_id])) {
                $role = $group_mappings[$group_id];
                $priority = isset($role_hierarchy[$role]) ? $role_hierarchy[$role] : 0;

                if ($priority > $highest_priority) {
                    $highest_priority = $priority;
                    $highest_role = $role;
                }
            }
        }

        return $highest_role;
    }

    /**
     * Filter user capabilities based on MS365 groups
     */
    public function filter_user_capabilities($allcaps, $caps, $args, $user) {
        // Only apply to MS365 users
        if (!get_user_meta($user->ID, 'ms365_user_id', true)) {
            return $allcaps;
        }

        // Add custom capabilities for MS365 group management
        $group_mappings = Settings::get('group_mappings', []);

        if (!empty($group_mappings)) {
            // Check if user has manage_ms365_groups capability through their groups
            $ms365_user_id = get_user_meta($user->ID, 'ms365_user_id', true);
            if ($ms365_user_id && $this->user_in_managed_groups($ms365_user_id, array_keys($group_mappings))) {
                $allcaps['manage_ms365_groups'] = true;
                $allcaps['sync_ms365_roles'] = true;
            }
        }

        return $allcaps;
    }

    /**
     * Check if user is in any of the managed groups
     */
    private function user_in_managed_groups($ms365_user_id, $managed_groups) {
        if (empty($managed_groups)) {
            return false;
        }

        $msgraph = GraphService::get_instance();
        $graph = $msgraph->get_graph();

        try {
            $memberOf = $graph->users($ms365_user_id)->memberOf()->get();

            foreach ($memberOf->getValue() as $group) {
                if (in_array($group->getId(), $managed_groups)) {
                    return true;
                }
            }
        } catch (\Exception $e) {
            LoggerHelper::write_log('Failed to check user group membership: ' . $e->getMessage());
        }

        return false;
    }
}
