<?php
/**
 * MSPress SharePoint File Manager
 *
 * Advanced file management system with WordPress media UI integration
 * for SharePoint file and folder navigation, upload, and management
 *
 * @package MSPress
 * @subpackage Admin\FileManager
 * @since 1.0.0
 */

namespace MSPress\Includes\Plugins\Sharepoint\Includes\Sharepoint;

use Exception;
use MSPress\Includes\Functions\Helpers\FileIconHelper;
use MSPress\Includes\Functions\Helpers\LoggerHelper;
use MSPress\Includes\MSGraph\GraphService;
use MSPress\Includes\Settings\Settings;

/**
 * SharePoint File Manager Class
 *
 * Provides a WordPress media library-style interface for managing SharePoint files
 */
class SharePointFileManager {
    private SharePointStorageService $storage;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->storage = new SharePointStorageService(GraphService::get_instance());
        LoggerHelper::write_log('SharePointFileManager: Constructor called');

        add_action('wp_ajax_sharepoint_file_manager_get_files', [$this, 'ajax_get_files']);
        add_action('wp_ajax_sharepoint_file_manager_upload_file', [$this, 'ajax_upload_file']);
        add_action('wp_ajax_sharepoint_file_manager_delete_file', [$this, 'ajax_delete_file']);
        add_action('wp_ajax_sharepoint_file_manager_create_folder', [$this, 'ajax_create_folder']);
        add_action('wp_ajax_sharepoint_file_manager_create_file', [$this, 'ajax_create_file']);
        add_action('wp_ajax_sharepoint_file_manager_rename', [$this, 'ajax_rename']);
        add_action('wp_ajax_sharepoint_file_manager_move', [$this, 'ajax_move']);
        add_action('wp_ajax_sharepoint_file_manager_test_drive_access', [$this, 'ajax_test_drive_access']);
        add_action('wp_ajax_sharepoint_setup_list_sites', [$this, 'ajax_list_sites']);
        add_action('wp_ajax_sharepoint_setup_list_drives', [$this, 'ajax_list_drives']);

        LoggerHelper::write_log('SharePointFileManager: AJAX handlers registered');
    }

    /**
     * Render file manager interface
     *
     * @param string $context Context identifier for different sections
     * @param array $config Configuration options
     */
    public function render_file_manager($context = 'default', $config = []) {
        $defaults = [
            'multiple' => true,
            'folder' => '',
            'allowed_types' => ['zip', 'rar', '7z', 'exe', 'msi', 'dmg', 'pkg', 'deb', 'tar.gz', 'pdf', 'txt'],
            'max_file_size' => 50 * 1024 * 1024, // 50MB
        ];

        $config = wp_parse_args($config, $defaults);

        ob_start();
        ?>
        <div class="sharepoint-file-manager" data-context="<?php echo esc_attr($context); ?>" style="display: none;">
            <div class="file-manager-toolbar">
                <div class="view-toggle">
                    <button type="button" class="btn btn-sm active" data-view="grid">
                        <i class="fas fa-th"></i>
                    </button>
                    <button type="button" class="btn btn-sm" data-view="list">
                        <i class="fas fa-list"></i>
                    </button>
                </div>
                <div class="file-search">
                    <input type="text" class="form-control form-control-sm file-search-input" placeholder="Search files...">
                </div>
                <div class="toolbar-actions">
                    <button type="button" class="btn btn-sm btn-outline-secondary file-manager-upload">
                        <i class="fas fa-upload"></i> Upload
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-secondary file-manager-create-folder">
                        <i class="fas fa-folder-plus"></i> New Folder
                    </button>
                </div>
            </div>
            <div class="file-manager-content" style="min-height: 340px;">
                <div class="file-grid-loading">
                    <i class="fas fa-spinner fa-spin"></i> Loading files...
                </div>
                <div class="file-list-loading">
                    <i class="fas fa-spinner fa-spin"></i> Loading list...
                </div>
                <div class="file-grid" id="sharepoint-file-grid"></div>
                <div class="file-list" id="sharepoint-file-list"></div>
            </div>
            <input type="file" id="sharepoint-file-input" multiple style="display: none;"
                   accept="<?php echo esc_attr('.' . implode(',.', $config['allowed_types'])); ?>">
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Render file grid HTML for folders and files
     *
     * @param array $folders Array of folder data
     * @param array $files Array of file data
     * @return string HTML content
     */
    private function render_file_grid_html($folders = [], $files = [], $current_path = '/') {
        ob_start();

        // Render folders first
        foreach ($folders as $folder) {
            $folder_name = $folder['name'] ?? 'Unnamed Folder';
            $folder_path = $folder['path'] ?? '/';
            ?>
            <div class="file-item folder" data-type="folder" data-path="<?php echo esc_attr($folder_path); ?>" data-name="<?php echo esc_attr($folder_name); ?>" data-file-id="<?php echo esc_attr($folder['id'] ?? ''); ?>">
                <div class="file-icon">
                    <?php echo FileIconHelper::render('', ['width' => '32', 'height' => '32']); ?>
                </div>
                <div class="file-name"><?php echo esc_html($folder_name); ?></div>
                <div class="file-size">Folder</div>
            </div>
            <?php
        }

        // Render files
        foreach ($files as $file) {
            $file_name = $file['name'] ?? 'Unnamed File';
            $file_title = $file['title'] ?? $file_name;
            $file_version = $file['version'] ?? $file['file_version'] ?? '';
            $file_path = $file['path'] ?? ($current_path === '/' ? $file_name : $current_path . '/' . $file_name);
            $file_size = $this->format_file_size($file['size'] ?? 0);
            $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $file_icon = $this->get_file_icon($file_type);
            $download_url = $file['download_url'] ?? '#';
            ?>
            <div class="file-item file" data-type="file" data-path="<?php echo esc_attr($file_path); ?>" data-name="<?php echo esc_attr($file_title); ?>" data-size="<?php echo esc_attr($file['size'] ?? 0); ?>" data-file-name="<?php echo esc_attr($file_name); ?>" data-file-id="<?php echo esc_attr($file['id'] ?? ''); ?>">
                <div class="file-icon">
                    <?php echo FileIconHelper::render($file_type, ['width' => '32', 'height' => '32']); ?>
                </div>
                <div class="file-name"><?php echo esc_html($file_title); ?></div>
                <?php if (!empty($file_version)): ?>
                <div class="file-version">Version <?php echo esc_html($file_version); ?></div>
                <?php endif; ?>
                <div class="file-size"><?php echo esc_html($file_size); ?></div>
            </div>
            <?php
        }

        // Show message if no files or folders
        if (empty($folders) && empty($files)) {
            ?>
            <div class="text-center text-muted py-5">
                <?php echo FileIconHelper::render('', ['width' => '48', 'height' => '48', 'class' => 'mb-3', 'aria-label' => 'Empty folder icon']); ?>
                <p>This folder is empty</p>
            </div>
            <?php
        }

        return ob_get_clean();
    }

    /**
     * Get appropriate icon for file type
     *
     * @param string $extension File extension
     * @return string FontAwesome icon name
     */
    private function get_file_icon($extension) {
        $icon_map = [
            // Documents
            'pdf' => 'file-pdf',
            'doc' => 'file-word',
            'docx' => 'file-word',
            'xls' => 'file-excel',
            'xlsx' => 'file-excel',
            'ppt' => 'file-powerpoint',
            'pptx' => 'file-powerpoint',
            'txt' => 'file-alt',
            'rtf' => 'file-alt',

            // Images
            'jpg' => 'file-image',
            'jpeg' => 'file-image',
            'png' => 'file-image',
            'gif' => 'file-image',
            'bmp' => 'file-image',
            'svg' => 'file-image',

            // Archives
            'zip' => 'file-archive',
            'rar' => 'file-archive',
            '7z' => 'file-archive',
            'tar' => 'file-archive',
            'gz' => 'file-archive',

            // Code
            'php' => 'file-code',
            'js' => 'file-code',
            'css' => 'file-code',
            'html' => 'file-code',
            'xml' => 'file-code',
            'json' => 'file-code',
        ];

        return $icon_map[$extension] ?? 'file';
    }

    /**
     * Format file size for display
     *
     * @param int $bytes File size in bytes
     * @return string Formatted file size
     */
    private function format_file_size($bytes) {
        $bytes = (float) $bytes; // Ensure it's a number

        if ($bytes == 0) {
            return '0 B';
        }

        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $i = floor(log($bytes, 1024));

        return round($bytes / pow(1024, $i), 2) . ' ' . $units[$i];
    }

    /**
     * AJAX handler for getting files
     */
    public function ajax_get_files() {
        try {
            utilities::write_log('SharePoint File Manager: ajax_get_files called');

            try {
                // Validate and sanitize input
                $nonce = $_POST['nonce'] ?? '';
                if (empty($nonce) || !wp_verify_nonce($nonce, 'sharepoint_file_manager_nonce')) {
                    utilities::write_log('SharePoint File Manager: Nonce verification failed');
                    wp_send_json_error([
                        'message' => 'Security check failed',
                        'code' => 'invalid_nonce'
                    ]);
                    return;
                }

            $folder = sanitize_text_field($_POST['folder'] ?? '/');
            $context = sanitize_text_field($_POST['context'] ?? 'default');

            // Validate folder path
            if (!is_string($folder) || strlen($folder) > 500) {
                utilities::write_log('SharePoint File Manager: Invalid folder path: ' . $folder);
                wp_send_json_error([
                    'message' => 'Invalid folder path',
                    'code' => 'invalid_folder'
                ]);
                return;
            }

            // Validate context
            if (!is_string($context) || strlen($context) > 100) {
                utilities::write_log('SharePoint File Manager: Invalid context: ' . $context);
                wp_send_json_error([
                    'message' => 'Invalid context',
                    'code' => 'invalid_context'
                ]);
                return;
            }

            utilities::write_log('SharePoint File Manager: Getting files for folder: ' . $folder . ', context: ' . $context);

            // Get MS Graph instance
            try {
                $msgraph = GraphService::get_instance();
            } catch (\Exception $e) {
                utilities::write_log('SharePoint File Manager: Failed to get MS Graph instance: ' . $e->getMessage());
                wp_send_json_error([
                    'message' => 'Failed to initialize Microsoft Graph connection. Please check your MS365 settings.',
                    'code' => 'graph_init_failed',
                    'details' => $e->getMessage()
                ]);
                return;
            }

            if (!$msgraph->get_graph()) {
                $error = $msgraph->get_connection_error() ?: 'MS Graph not configured';
                utilities::write_log('SharePoint File Manager: MS Graph not available: ' . $error);
                wp_send_json_error([
                    'message' => 'Microsoft Graph connection not available. Please check your MS365 settings.',
                    'code' => 'graph_unavailable',
                    'details' => $error
                ]);
                return;
            }

                $msgraph = GraphService::get_instance();
            $site_config = $this->get_sharepoint_site_config($context);
            utilities::write_log('SharePoint File Manager: Site config fields: ' . implode(', ', array_keys($site_config)));
            if (!$site_config) {
                utilities::write_log('SharePoint File Manager: SharePoint not configured or not enabled');
                wp_send_json_error([
                    'message' => 'SharePoint integration is not enabled or configured. Please check your MS365 settings.',
                    'code' => 'sharepoint_not_configured'
                ]);
                return;
            }

            // Validate site configuration
            if (empty($site_config['site_id']) || !is_string($site_config['site_id'])) {
                utilities::write_log('SharePoint File Manager: Invalid site ID in configuration');
                wp_send_json_error([
                    'message' => 'Invalid SharePoint site configuration',
                    'code' => 'invalid_site_config'
                ]);
                return;
            }

            // Validate SharePoint site exists and is accessible
            try {
                $site_info = $this->storage->get_sharepoint_site($site_config['site_id']);
                utilities::write_log('SharePoint File Manager: Site validation successful: ' . $site_info->getDisplayName());
            } catch (\Exception $e) {
                utilities::write_log('SharePoint File Manager: Site validation failed: ' . $e->getMessage());
                wp_send_json_error([
                    'message' => 'Unable to access SharePoint site. Please check your site configuration and permissions.',
                    'code' => 'site_access_denied',
                    'details' => $e->getMessage()
                ]);
                return;
            }

            // Get files and folders from SharePoint
            utilities::write_log('SharePoint File Manager: About to call get_drive_items');
            utilities::write_log('SharePoint File Manager: Parameters - site_id: ' . $site_config['site_id'] . ', drive_id: ' . ($site_config['drive_id'] ?? 'null') . ', drive_name: ' . ($site_config['drive_name'] ?? 'null') . ', folder: ' . $folder);

            try {
                $result = $this->storage->get_drive_items($site_config['site_id'], $site_config['drive_id'] ?? null, $folder, $site_config['drive_name'] ?? null);
                utilities::write_log('SharePoint File Manager: get_drive_items returned successfully');
            } catch (\Exception $e) {
                utilities::write_log('SharePoint File Manager: get_drive_items threw exception: ' . $e->getMessage());
                throw $e; // Re-throw to be caught by outer catch block
            }

            if (!is_array($result) || !isset($result['files']) || !isset($result['folders'])) {
                utilities::write_log('SharePoint File Manager: Invalid response from get_drive_items; fields: ' . (is_array($result) ? implode(', ', array_keys($result)) : 'invalid response'));
                wp_send_json_error([
                    'message' => 'Invalid response from SharePoint API',
                    'code' => 'invalid_api_response'
                ]);
                return;
            }

            utilities::write_log('SharePoint File Manager: Retrieved ' . count($result['files']) . ' files and ' . count($result['folders']) . ' folders');

            // Generate HTML for the file grid
            $html = $this->render_file_grid_html($result['folders'], $result['files'], $folder);

            wp_send_json_success([
                'html' => $html,
                'files' => $result['files'],
                'folders' => $result['folders'],
                'current_folder' => $folder,
                'drive_id' => $result['drive_id'] ?? null
            ]);

        } catch (\Microsoft\Kiota\Abstractions\ApiException $e) {
            utilities::write_log('SharePoint File Manager: Microsoft Graph API error: ' . $e->getMessage());
            $error_code = $e->getResponseStatusCode() ?? 'unknown';
            $error_message = $this->get_user_friendly_error_message($error_code, $e->getMessage());

            wp_send_json_error([
                'message' => $error_message,
                'code' => 'api_error',
                'api_code' => $error_code
            ]);

        } catch (\Exception $e) {
            utilities::write_log('SharePoint File Manager: Unexpected error getting files: ' . $e->getMessage());
            utilities::write_log('SharePoint File Manager: Stack trace: ' . $e->getTraceAsString());

            // Check for specific permission-related errors
            $error_message = $e->getMessage();
            $error_code = 'unexpected_error';

            if (strpos($error_message, 'Files.ReadWrite.All') !== false) {
                $error_code = 'permission_error';
                $user_message = 'Unable to access SharePoint drives. Please ensure your Azure app registration has the Files.ReadWrite.All permission granted.';
            } elseif (strpos($error_message, 'Sites.Read.All') !== false) {
                $error_code = 'permission_error';
                $user_message = 'Unable to access SharePoint sites. Please ensure your Azure app registration has the Sites.Read.All permission granted.';
            } elseif (strpos($error_message, '403') !== false || strpos($error_message, 'Forbidden') !== false) {
                $error_code = 'permission_error';
                $user_message = 'Access denied. Please ensure your Azure app registration has the required permissions and admin consent has been granted.';
            } elseif (strpos($error_message, '401') !== false || strpos($error_message, 'Unauthorized') !== false) {
                $error_code = 'auth_error';
                $user_message = 'Authentication failed. Please check your Azure app credentials and ensure the app is properly configured.';
            } elseif (strpos($error_message, '404') !== false || strpos($error_message, 'Not Found') !== false) {
                $error_code = 'not_found_error';
                $user_message = 'SharePoint site or resource not found. Please verify your site URL and configuration.';
            } elseif (strpos($error_message, 'Could not find SharePoint site') !== false) {
                $error_code = 'site_config_error';
                $user_message = 'SharePoint site configuration error. The site URL format may be incorrect. Expected format: hostname:/sites/sitename';
            } else {
                $user_message = 'An unexpected error occurred while retrieving files. Please check the error details below.';
            }

            wp_send_json_error([
                'message' => $user_message,
                'code' => $error_code,
                'details' => $error_message,
                'debug_info' => [
                    'site_config' => $site_config ?? null,
                    'folder' => $folder ?? null,
                    'context' => $context ?? null
                ]
            ]);
            } catch (\Exception $e) {
                utilities::write_log('SharePoint File Manager: Unexpected error in ajax_get_files: ' . $e->getMessage());
                utilities::write_log('SharePoint File Manager: Stack trace: ' . $e->getTraceAsString());
                wp_send_json_error([
                    'message' => 'An unexpected error occurred. Please check the server logs for details.',
                    'code' => 'unexpected_error',
                    'details' => $e->getMessage()
                ]);
            }
        } catch (\Throwable $e) {
            utilities::write_log('SharePoint File Manager: Fatal error in ajax_get_files: ' . $e->getMessage());
            utilities::write_log('SharePoint File Manager: Stack trace: ' . $e->getTraceAsString());
            wp_send_json_error([
                'message' => 'A critical error occurred. Please contact support.',
                'code' => 'fatal_error',
                'details' => $e->getMessage()
            ]);
        }
    }

    /**
     * AJAX handler for uploading files
     */
    public function ajax_upload_file() {
        // Verify nonce
        if (!wp_verify_nonce($_POST['nonce'] ?? '', 'sharepoint_file_manager_nonce')) {
            utilities::write_log('SharePoint File Manager: Invalid nonce');
            wp_send_json_error('Security check failed');
        }

        $folder = sanitize_text_field($_POST['folder'] ?? '/');
        $context = sanitize_text_field($_POST['context'] ?? 'default');

        utilities::write_log('SharePoint File Manager: ajax_get_files called with folder: ' . $folder . ', context: ' . $context);

        try {
            // Get MS Graph instance
            $msgraph = GraphService::get_instance();

            if (!$msgraph->get_graph()) {
                $error = $msgraph->get_connection_error() ?: 'MS Graph not configured';
                wp_send_json_error('MS Graph connection not available: ' . $error);
                return;
            }

            // Get SharePoint site configuration
            $site_config = $this->get_sharepoint_site_config($context);
            if (!$site_config) {
                wp_send_json_error('SharePoint site not configured for this context');
                return;
            }

            // Handle file uploads
            if (empty($_FILES['files'])) {
                wp_send_json_error('No files uploaded');
                return;
            }

            $uploaded_files = [];
            $errors = [];

            foreach ($_FILES['files']['tmp_name'] as $index => $tmp_name) {
                $file_name = sanitize_file_name($_FILES['files']['name'][$index]);
                $file_size = $_FILES['files']['size'][$index];
                $file_error = $_FILES['files']['error'][$index];

                // Check for upload errors
                if ($file_error !== UPLOAD_ERR_OK) {
                    $errors[] = "Upload error for {$file_name}: " . $this->get_upload_error_message($file_error);
                    continue;
                }

                // Validate file size (50MB limit)
                if ($file_size > 50 * 1024 * 1024) {
                    $errors[] = "File {$file_name} is too large (max 50MB)";
                    continue;
                }

                try {
                    // Upload to SharePoint
                    $result = $this->storage->upload_file(
                        $site_config['site_id'],
                        $site_config['drive_id'] ?? null,
                        $folder,
                        $tmp_name,
                        $file_name,
                        $site_config['drive_name'] ?? null
                    );

                    $uploaded_files[] = $result;

                } catch (\Exception $e) {
                    $error_message = $e->getMessage();
                    if (strpos($error_message, 'Files.ReadWrite.All') !== false) {
                        $errors[] = "Failed to upload {$file_name}: Unable to access SharePoint drives. Please ensure your Azure app registration has the Files.ReadWrite.All permission granted.";
                    } elseif (strpos($error_message, 'Sites.Read.All') !== false) {
                        $errors[] = "Failed to upload {$file_name}: Unable to access SharePoint sites. Please ensure your Azure app registration has the Sites.Read.All permission granted.";
                    } else {
                        $errors[] = "Failed to upload {$file_name}: " . $error_message;
                    }
                }
            }

            if (!empty($errors)) {
                wp_send_json_error([
                    'message' => 'Some files failed to upload',
                    'errors' => $errors,
                    'uploaded' => $uploaded_files
                ]);
            } else {
                wp_send_json_success([
                    'message' => count($uploaded_files) . ' file(s) uploaded successfully',
                    'uploaded' => $uploaded_files
                ]);
            }

        } catch (\Exception $e) {
            utilities::write_log('SharePoint File Manager: Upload error: ' . $e->getMessage());
            $error_message = $e->getMessage();
            if (strpos($error_message, 'Files.ReadWrite.All') !== false) {
                wp_send_json_error('Upload failed: Unable to access SharePoint drives. Please ensure your Azure app registration has the Files.ReadWrite.All permission granted.');
            } elseif (strpos($error_message, 'Sites.Read.All') !== false) {
                wp_send_json_error('Upload failed: Unable to access SharePoint sites. Please ensure your Azure app registration has the Sites.Read.All permission granted.');
            } else {
                wp_send_json_error('Upload failed: ' . $error_message);
            }
        }
    }

    /**
     * AJAX handler for deleting files
     */
    public function ajax_delete_file() {
        // Verify nonce
        if (!wp_verify_nonce($_POST['nonce'] ?? '', 'sharepoint_file_manager_nonce')) {
            wp_send_json_error('Security check failed');
        }

        $file_id = sanitize_text_field($_POST['file_id'] ?? '');
        $context = sanitize_text_field($_POST['context'] ?? 'default');

        if (empty($file_id)) {
            wp_send_json_error('File ID is required');
            return;
        }

        try {
            // Get MS Graph instance
            $msgraph = GraphService::get_instance();

            if (!$msgraph->get_graph()) {
                $error = $msgraph->get_connection_error() ?: 'MS Graph not configured';
                wp_send_json_error('MS Graph connection not available: ' . $error);
                return;
            }

            // Get SharePoint site configuration
            $site_config = $this->get_sharepoint_site_config($context);
            if (!$site_config) {
                wp_send_json_error('SharePoint site not configured for this context');
                return;
            }

            // Delete from SharePoint
            $this->storage->delete_file($site_config['site_id'], $site_config['drive_id'] ?? null, $file_id, $site_config['drive_name'] ?? null);

            wp_send_json_success([
                'message' => 'File deleted successfully'
            ]);

        } catch (\Exception $e) {
            utilities::write_log('SharePoint File Manager: Delete error: ' . $e->getMessage());
            $error_message = $e->getMessage();
            if (strpos($error_message, 'Files.ReadWrite.All') !== false) {
                wp_send_json_error('Failed to delete file: Unable to access SharePoint drives. Please ensure your Azure app registration has the Files.ReadWrite.All permission granted.');
            } elseif (strpos($error_message, 'Sites.Read.All') !== false) {
                wp_send_json_error('Failed to delete file: Unable to access SharePoint sites. Please ensure your Azure app registration has the Sites.Read.All permission granted.');
            } else {
                wp_send_json_error('Failed to delete file: ' . $error_message);
            }
        }
    }

    /**
     * AJAX handler for creating folders
     */
    public function ajax_create_folder() {
        // Verify nonce
        if (!wp_verify_nonce($_POST['nonce'] ?? '', 'sharepoint_file_manager_nonce')) {
            wp_send_json_error('Security check failed');
        }

        $folder_name = sanitize_text_field($_POST['folder_name'] ?? '');
        $parent_folder = sanitize_text_field($_POST['parent_path'] ?? $_POST['parent_folder'] ?? '/');
        $context = sanitize_text_field($_POST['context'] ?? 'default');

        if (empty($folder_name)) {
            wp_send_json_error('Folder name is required');
            return;
        }

        try {
            // Get MS Graph instance
            $msgraph = GraphService::get_instance();

            if (!$msgraph->get_graph()) {
                $error = $msgraph->get_connection_error() ?: 'MS Graph not configured';
                wp_send_json_error('MS Graph connection not available: ' . $error);
                return;
            }

            // Get SharePoint site configuration
            $site_config = $this->get_sharepoint_site_config($context);
            if (!$site_config) {
                wp_send_json_error('SharePoint site not configured for this context');
                return;
            }

            // Create folder in SharePoint
            $result = $this->storage->create_folder(
                $site_config['site_id'],
                $site_config['drive_id'] ?? null,
                $parent_folder,
                $folder_name,
                $site_config['drive_name'] ?? null
            );

            wp_send_json_success([
                'message' => 'Folder created successfully',
                'folder' => $result
            ]);

        } catch (\Exception $e) {
            utilities::write_log('SharePoint File Manager: Create folder error: ' . $e->getMessage());
            $error_message = $e->getMessage();
            if (strpos($error_message, 'Files.ReadWrite.All') !== false) {
                wp_send_json_error('Failed to create folder: Unable to access SharePoint drives. Please ensure your Azure app registration has the Files.ReadWrite.All permission granted.');
            } elseif (strpos($error_message, 'Sites.Read.All') !== false) {
                wp_send_json_error('Failed to create folder: Unable to access SharePoint sites. Please ensure your Azure app registration has the Sites.Read.All permission granted.');
            } else {
                wp_send_json_error('Failed to create folder: ' . $error_message);
            }
        }
    }

    /**
     * AJAX handler for creating a new file
     */
    public function ajax_create_file() {
        // Verify nonce
        if (!wp_verify_nonce($_POST['nonce'] ?? '', 'sharepoint_file_manager_nonce')) {
            wp_send_json_error('Security check failed');
        }

        $file_name = sanitize_text_field($_POST['file_name'] ?? '');
        $parent_path = sanitize_text_field($_POST['parent_path'] ?? '/');
        $file_title = sanitize_text_field($_POST['file_title'] ?? '');
        $file_version = sanitize_text_field($_POST['file_version'] ?? '');

        if (empty($file_name)) {
            wp_send_json_error('File name is required');
            return;
        }

        if (empty($file_title)) {
            wp_send_json_error('File title is required');
            return;
        }

        // Check if file was uploaded
        if (!isset($_FILES['uploaded_file']) || $_FILES['uploaded_file']['error'] !== UPLOAD_ERR_OK) {
            wp_send_json_error('File upload is required');
            return;
        }

        $uploaded_file = $_FILES['uploaded_file'];
        $temp_file_path = $uploaded_file['tmp_name'];

        try {
            // Get MS Graph instance
            $msgraph = GraphService::get_instance();

            if (!$msgraph->get_graph()) {
                $error = $msgraph->get_connection_error() ?: 'MS Graph not configured';
                wp_send_json_error('MS Graph connection not available: ' . $error);
                return;
            }

            // Get SharePoint site configuration
            $site_config = $this->get_sharepoint_site_config('admin');
            if (!$site_config) {
                wp_send_json_error('SharePoint site not configured');
                return;
            }

            // Upload the file using upload_file method
            $metadata = [];
            if (!empty($file_title)) {
                $metadata['title'] = $file_title;
            }
            if (!empty($file_version)) {
                $metadata['file_version'] = $file_version;
            }

            $result = $this->storage->upload_file(
                $site_config['site_id'],
                $site_config['drive_id'] ?? null,
                $parent_path,
                $temp_file_path,
                $file_name,
                $site_config['drive_name'] ?? null,
                $metadata
            );

            wp_send_json_success([
                'message' => 'File uploaded successfully',
                'file' => $result,
                'title' => $file_title,
                'version' => $file_version
            ]);

        } catch (\Exception $e) {
            utilities::write_log('SharePoint File Manager: Create file error: ' . $e->getMessage());
            $error_message = $e->getMessage();
            if (strpos($error_message, 'Files.ReadWrite.All') !== false) {
                wp_send_json_error('Failed to upload file: Unable to access SharePoint drives. Please ensure your Azure app registration has the Files.ReadWrite.All permission granted.');
            } elseif (strpos($error_message, 'Sites.Read.All') !== false) {
                wp_send_json_error('Failed to upload file: Unable to access SharePoint sites. Please ensure your Azure app registration has the Sites.Read.All permission granted.');
            } else {
                wp_send_json_error('Failed to upload file: ' . $error_message);
            }
        }
    }

    /**
     * AJAX handler for testing drive access
     */
    public function ajax_test_drive_access() {
        // Verify nonce
        if (!wp_verify_nonce($_POST['nonce'] ?? '', 'sharepoint_file_manager_nonce')) {
            wp_send_json_error('Security check failed');
        }

        $context = sanitize_text_field($_POST['context'] ?? 'default');

        try {
            // Get MS Graph instance
            $msgraph = GraphService::get_instance();

            if (!$msgraph->get_graph()) {
                $error = $msgraph->get_connection_error() ?: 'MS Graph not configured';
                wp_send_json_error('MS Graph connection not available: ' . $error);
                return;
            }

            // Get SharePoint site configuration
            $site_config = $this->get_sharepoint_site_config($context);
            if (!$site_config) {
                wp_send_json_error('SharePoint site not configured for this context');
                return;
            }

            // Test drive access
            $result = $this->storage->test_drive_access($site_config['site_id']);

            if ($result['success']) {
                wp_send_json_success([
                    'message' => 'Drive access test successful',
                    'site_name' => $result['site_name'],
                    'drive_count' => $result['drive_count'],
                    'drives' => $result['drives']
                ]);
            } else {
                wp_send_json_error([
                    'message' => 'Drive access test failed',
                    'error' => $result['error']
                ]);
            }

        } catch (\Exception $e) {
            utilities::write_log('SharePoint File Manager: Test drive access error: ' . $e->getMessage());
            wp_send_json_error('Test failed: ' . $e->getMessage());
        }
    }

    /**
     * Get SharePoint site configuration for a context
     */
    private function get_sharepoint_site_config($context) {
        $options = Settings::get_group('ms365', []);

        // Check if SharePoint is enabled
        if (empty($options['enable_sharepoint']) || $options['enable_sharepoint'] !== 'on') {
            utilities::write_log('SharePoint File Manager: SharePoint is not enabled in settings');
            return false;
        }

        // For now, use a default site configuration
        // In a real implementation, this could be configured per context
        if (!empty($options['sharepoint_site_id'])) {
            return [
                'site_id' => $options['sharepoint_site_id'],
                'drive_id' => $options['sharepoint_drive_id'] ?? null
            ];
        }

        // If no site_id is configured, try to get it from the site URL
        if (!empty($options['sharepoint_site_url'])) {
            utilities::write_log('SharePoint File Manager: Parsing site URL: ' . $options['sharepoint_site_url']);
            // Extract site identifier from URL - handle both full URLs and simplified format
            $url = $options['sharepoint_site_url'];

            $hostname = '';
            $site_path = '';
            $drive_name = null;

            // Check if it's a simplified format (tenant.sharepoint.com:/sites/sitename)
            if (strpos($url, ':/') !== false) {
                $parts = explode(':/', $url, 2);
                if (count($parts) === 2) {
                    $hostname = $parts[0];
                    $remaining = $parts[1];
                    // Remove leading slash if present
                    $remaining = ltrim($remaining, '/');
                    $path_parts = explode('/', $remaining);
                } else {
                    utilities::write_log('SharePoint File Manager: Invalid simplified URL format');
                    return false;
                }
            } else {
                // Full URL format
                $url_parts = parse_url($url);
                if ($url_parts && isset($url_parts['host']) && isset($url_parts['path'])) {
                    $hostname = $url_parts['host'];
                    $path = trim($url_parts['path'], '/');
                    $path_parts = explode('/', $path);
                } else {
                    utilities::write_log('SharePoint File Manager: Could not parse URL parts');
                    return false;
                }
            }

            utilities::write_log('SharePoint File Manager: URL parts parsed; hostname: ' . $hostname . ', path segment count: ' . count($path_parts));

            if (count($path_parts) >= 2 && $path_parts[0] === 'sites') {
                $site_path = '/' . implode('/', array_slice($path_parts, 0, 2)); // /sites/sitename
                $site_id = $hostname . ':' . $site_path;
                if (count($path_parts) > 2) {
                    // Third part might be the drive/library name
                    $drive_name = urldecode($path_parts[2]);
                    utilities::write_log('SharePoint File Manager: Found drive name in URL: ' . $drive_name);
                }
                utilities::write_log('SharePoint File Manager: Using site ID from URL: ' . $site_id . ', drive_name: ' . ($drive_name ?? 'null'));
                return [
                    'site_id' => $site_id,
                    'drive_id' => $options['sharepoint_drive_id'] ?? null,
                    'drive_name' => $drive_name
                ];
            } else {
                utilities::write_log('SharePoint File Manager: URL does not follow expected /sites/sitename pattern');
            }
        }

        utilities::write_log('SharePoint File Manager: No valid SharePoint site configuration found');
        return false;
    }

    /**
     * Convert API error codes to user-friendly messages
     */
    private function get_user_friendly_error_message($error_code, $original_message) {
        $error_messages = [
            'accessDenied' => 'Access denied. Please check your permissions for this SharePoint site.',
            'itemNotFound' => 'The requested resource was not found. This may be due to insufficient permissions or an invalid configuration.',
            'invalidRequest' => 'Invalid request. Please check the folder path.',
            'unauthenticated' => 'Authentication failed. Please re-authenticate with Microsoft 365.',
            'forbidden' => 'You do not have permission to access this SharePoint site.',
            'notFound' => 'SharePoint site or drive not found. Please check your configuration.',
            'throttled' => 'Too many requests. Please wait a moment and try again.',
            'serviceUnavailable' => 'SharePoint service is temporarily unavailable. Please try again later.',
        ];

        return $error_messages[$error_code] ?? 'An error occurred while accessing SharePoint: ' . $original_message;
    }

    /**
     * Get upload error message
     */
    private function get_upload_error_message($error_code) {
        $messages = [
            UPLOAD_ERR_INI_SIZE => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
            UPLOAD_ERR_FORM_SIZE => 'The uploaded file exceeds the MAX_FILE_SIZE directive in the HTML form',
            UPLOAD_ERR_PARTIAL => 'The uploaded file was only partially uploaded',
            UPLOAD_ERR_NO_FILE => 'No file was uploaded',
            UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder',
            UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk',
            UPLOAD_ERR_EXTENSION => 'A PHP extension stopped the file upload'
        ];

        return $messages[$error_code] ?? 'Unknown upload error';
    }

    /**
     * AJAX handler to list SharePoint sites
     */
    public function ajax_list_sites() {
        try {
            // Check permissions
            if (!current_user_can('manage_options')) {
                throw new Exception('Insufficient permissions');
            }

            // Verify nonce
            if (!wp_verify_nonce($_POST['nonce'] ?? '', 'sharepoint_setup_nonce')) {
                throw new Exception('Security check failed');
            }

            $msgraph = GraphService::get_instance();
            $sites = $this->storage->list_sharepoint_sites();
            $site_count = is_array($sites) ? count($sites) : 0;
            utilities::write_log('SharePoint setup list sites: returned ' . $site_count . ' site(s)');
            if ($site_count === 0) {
                utilities::write_log('SharePoint setup list sites: empty site list returned from Graph');
            }

            wp_send_json_success([
                'sites' => $sites
            ]);

        } catch (\Exception $e) {
            utilities::write_log('SharePoint setup list sites error: ' . $e->getMessage());
            wp_send_json_error([
                'message' => $this->get_user_friendly_error_message('general', $e->getMessage()),
                'details' => $e->getMessage()
            ]);
        }
    }

    /**
     * AJAX handler to list drives for a SharePoint site
     */
    public function ajax_list_drives() {
        try {
            // Check permissions
            if (!current_user_can('manage_options')) {
                throw new \Exception('Insufficient permissions');
            }

            // Verify nonce
            if (!wp_verify_nonce($_POST['nonce'] ?? '', 'sharepoint_setup_nonce')) {
                throw new \Exception('Security check failed');
            }

            $site_id = sanitize_text_field($_POST['site_id'] ?? '');
            if (empty($site_id)) {
                throw new \Exception('Site ID is required');
            }

            $drives = $this->storage->list_site_drives($site_id);
            $drive_count = is_array($drives) ? count($drives) : 0;
            utilities::write_log('SharePoint setup list drives: site_id=' . $site_id . ' returned ' . $drive_count . ' drive(s)');
            if ($drive_count === 0) {
                utilities::write_log('SharePoint setup list drives: empty drive list returned from Graph for site ' . $site_id);
            }

            wp_send_json_success([
                'drives' => $drives
            ]);

        } catch (\Exception $e) {
            utilities::write_log('SharePoint setup list drives error: ' . $e->getMessage());
            wp_send_json_error([
                'message' => $this->get_user_friendly_error_message('general', $e->getMessage()),
                'details' => $e->getMessage()
            ]);
        }
    }

    /**
     * AJAX handler for renaming files/folders
     */
    public function ajax_rename() {
        try {
            utilities::write_log('SharePoint File Manager: ajax_rename called');

            // Validate and sanitize input
            $nonce = $_POST['nonce'] ?? '';
            if (empty($nonce) || !wp_verify_nonce($nonce, 'sharepoint_file_manager_nonce')) {
                utilities::write_log('SharePoint File Manager: Nonce verification failed');
                wp_send_json_error(['message' => 'Security check failed']);
                return;
            }

            $path = sanitize_text_field($_POST['path'] ?? '');
            $new_name = sanitize_text_field($_POST['new_name'] ?? '');

            if (empty($path) || empty($new_name)) {
                wp_send_json_error(['message' => 'Path and new name are required']);
                return;
            }

            // Get MS Graph instance and site config
            $msgraph = GraphService::get_instance();
            $site_config = $this->get_sharepoint_site_config('admin');

            if (!$site_config) {
                wp_send_json_error(['message' => 'SharePoint not configured']);
                return;
            }

            // Rename the item
            $result = $this->storage->rename_drive_item($site_config['site_id'], $site_config['drive_id'], $path, $new_name, $site_config['drive_name']);

            wp_send_json_success(['message' => 'Item renamed successfully']);

        } catch (\Exception $e) {
            utilities::write_log('SharePoint File Manager: ajax_rename error: ' . $e->getMessage());
            wp_send_json_error(['message' => 'Failed to rename item: ' . $e->getMessage()]);
        }
    }

    /**
     * AJAX handler for deleting files/folders
     */
    public function ajax_delete() {
        try {
            utilities::write_log('SharePoint File Manager: ajax_delete called');

            // Validate and sanitize input
            $nonce = $_POST['nonce'] ?? '';
            if (empty($nonce) || !wp_verify_nonce($nonce, 'sharepoint_file_manager_nonce')) {
                wp_send_json_error(['message' => 'Security check failed']);
                return;
            }

            $path = sanitize_text_field($_POST['path'] ?? '');

            if (empty($path)) {
                wp_send_json_error(['message' => 'Path is required']);
                return;
            }

            // Get MS Graph instance and site config
            $msgraph = GraphService::get_instance();
            $site_config = $this->get_sharepoint_site_config('admin');

            if (!$site_config) {
                wp_send_json_error(['message' => 'SharePoint not configured']);
                return;
            }

            // Delete the item
            $result = $this->storage->delete_drive_item($site_config['site_id'], $site_config['drive_id'], $path, $site_config['drive_name']);

            wp_send_json_success(['message' => 'Item deleted successfully']);

        } catch (\Exception $e) {
            utilities::write_log('SharePoint File Manager: ajax_delete error: ' . $e->getMessage());
            wp_send_json_error(['message' => 'Failed to delete item: ' . $e->getMessage()]);
        }
    }

    /**
     * AJAX handler for moving files/folders
     */
    public function ajax_move() {
        try {
            utilities::write_log('SharePoint File Manager: ajax_move called');

            // Validate and sanitize input
            $nonce = $_POST['nonce'] ?? '';
            if (empty($nonce) || !wp_verify_nonce($nonce, 'sharepoint_file_manager_nonce')) {
                wp_send_json_error(['message' => 'Security check failed']);
                return;
            }

            $source_path = sanitize_text_field($_POST['source_path'] ?? '');
            $target_path = sanitize_text_field($_POST['target_path'] ?? '');

            if (empty($source_path) || empty($target_path)) {
                wp_send_json_error(['message' => 'Source and target paths are required']);
                return;
            }

            // Get MS Graph instance and site config
            $msgraph = GraphService::get_instance();
            $site_config = $this->get_sharepoint_site_config('admin');

            if (!$site_config) {
                wp_send_json_error(['message' => 'SharePoint not configured']);
                return;
            }

            // Move the item
            $result = $this->storage->move_drive_item($site_config['site_id'], $site_config['drive_id'], $source_path, $target_path, $site_config['drive_name']);

            wp_send_json_success(['message' => 'Item moved successfully']);

        } catch (\Exception $e) {
            utilities::write_log('SharePoint File Manager: ajax_move error: ' . $e->getMessage());
            wp_send_json_error(['message' => 'Failed to move item: ' . $e->getMessage()]);
        }
    }
}