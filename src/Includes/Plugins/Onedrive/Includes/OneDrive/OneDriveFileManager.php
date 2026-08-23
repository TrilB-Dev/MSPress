<?php
/**
 * MSPress OneDrive File Manager
 *
 * Advanced file management system with WordPress media UI integration
 * for OneDrive file and folder navigation, upload, and management
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Onedrive
 * @since 1.0.0
 */

namespace MSPress\Includes\Plugins\Onedrive\Includes\OneDrive;

use MSPress\Includes\Functions\Helpers\FileIconHelper;
use MSPress\Includes\Functions\Helpers\LoggerHelper;
use MSPress\Includes\MSGraph\GraphService;
use MSPress\Includes\Settings\Settings;
use MSPress\Includes\Plugins\Onedrive\Includes\OneDrive\OneDriveItemService;

/**
 * OneDrive File Manager Class
 *
 * Provides a WordPress media library-style interface for managing OneDrive files
 */
class OneDriveFileManager {
    private OneDriveItemService $items;
    private OneDriveClientService $clients;

    /**
     * Constructor.
     */
    public function __construct() {
        $graph = GraphService::get_instance();
        $tokens = new OneDriveTokenService($graph);
        $this->clients = new OneDriveClientService($tokens);
        $this->items = new OneDriveItemService($graph, $tokens);
        LoggerHelper::write_log('OneDriveFileManager: Constructor called');

        add_action('wp_ajax_onedrive_file_manager_get_files', [$this, 'ajax_get_files']);
        add_action('wp_ajax_onedrive_file_manager_upload_file', [$this, 'ajax_upload_file']);
        add_action('wp_ajax_onedrive_file_manager_delete_file', [$this, 'ajax_delete_file']);
        add_action('wp_ajax_onedrive_file_manager_create_folder', [$this, 'ajax_create_folder']);
        add_action('wp_ajax_onedrive_file_manager_create_file', [$this, 'ajax_create_file']);
        add_action('wp_ajax_onedrive_file_manager_test_drive_access', [$this, 'ajax_test_drive_access']);
        add_action('wp_ajax_onedrive_setup_list_drives', [$this, 'ajax_list_drives']);
        add_action('wp_ajax_onedrive_file_manager_rename', [$this, 'ajax_rename']);
        add_action('wp_ajax_onedrive_file_manager_move', [$this, 'ajax_move']);

        LoggerHelper::write_log('OneDriveFileManager: AJAX handlers registered');
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

        // Return minimal content - UI is now handled by FileManager module
        ob_start();
        ?>
        <div class="onedrive-file-manager" data-context="<?php echo esc_attr($context); ?>" style="display: none;">
            <!-- Hidden file input for uploads -->
            <input type="file" id="onedrive-file-input" multiple style="display: none;"
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

    private function extract_one_drive_item_version($item) {
        $fields = $item['listItem']['fields'] ?? [];
        $version = null;

        if (!empty($fields)) {
            if (!empty($fields['FileVersion'])) {
                $version = $fields['FileVersion'];
            } elseif (!empty($fields['file_version'])) {
                $version = $fields['file_version'];
            } elseif (!empty($fields['Version'])) {
                $version = $fields['Version'];
            }
        }

        if (empty($version) && !empty($item['description'])) {
            $version = $item['description'];
        }

        return $version;
    }

    private function extract_one_drive_item_title($item) {
        $fields = $item['listItem']['fields'] ?? [];
        $title = $fields['Title'] ?? $fields['title'] ?? null;

        if (empty($title) && !empty($fields['FileDescription'])) {
            $title = $fields['FileDescription'];
        }

        return $title;
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
        LoggerHelper::write_log('OneDrive File Manager: ajax_get_files called');

        try {
            // Validate and sanitize input
            $nonce = $_POST['nonce'] ?? '';
            if (empty($nonce) || !wp_verify_nonce($nonce, 'onedrive_file_manager_nonce')) {
                LoggerHelper::write_log('OneDrive File Manager: Nonce verification failed');
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
                LoggerHelper::write_log('OneDrive File Manager: Invalid folder path: ' . $folder);
                wp_send_json_error([
                    'message' => 'Invalid folder path',
                    'code' => 'invalid_folder'
                ]);
                return;
            }
            $options = Settings::get_group('onedrive', []);
            if (empty($options['onedrive_drive_id'])) {
                LoggerHelper::write_log('OneDrive File Manager: OneDrive not configured');
                wp_send_json_error([
                    'message' => 'OneDrive not configured. Please set up OneDrive integration first.',
                    'code' => 'onedrive_not_configured'
                ]);
                return;
            }

            $httpClient = $this->get_http_client();
            if (!$httpClient) {
                LoggerHelper::write_log('OneDrive File Manager: Failed to get HTTP client');
                wp_send_json_error([
                    'message' => 'Failed to get authenticated HTTP client',
                    'code' => 'http_client_error'
                ]);
                return;
            }

            // Build the API path
            $drive_id = $options['onedrive_drive_id'];
            $api_path = "/drives/{$drive_id}/root";
            if (!empty($folder) && $folder !== '/') {
                $folder_path = trim($folder, '/');
                $api_path .= ":/{$folder_path}:";
            }

            LoggerHelper::write_log('OneDrive File Manager: API path: ' . $api_path);

            $expandQuery = '?$expand=listItem($expand=fields)';
            // Get folder contents using HTTP client
            if (empty($folder) || $folder === '/') {
                $url = "https://graph.microsoft.com/v1.0/drives/{$drive_id}/root/children" . $expandQuery;
            } else {
                $folder_path = trim($folder, '/');
                $url = "https://graph.microsoft.com/v1.0/drives/{$drive_id}/root:/{$folder_path}:/children" . $expandQuery;
            }
            $response = $httpClient->request('GET', $url);
            $items = json_decode($response->getBody()->getContents(), true)['value'];

            $files = [];
            $folders = [];

            foreach ($items as $item) {
                $item_data = [
                    'id' => $item['id'],
                    'name' => $item['name'],
                    'size' => $item['size'] ?? 0,
                    'lastModified' => isset($item['lastModifiedDateTime']) ? date('Y-m-d H:i:s', strtotime($item['lastModifiedDateTime'])) : null,
                    'webUrl' => $item['webUrl'],
                    'downloadUrl' => null,
                    'type' => 'file'
                ];

                // Get download URL for files
                if (!isset($item['folder'])) {
                    try {
                        $download_response = $httpClient->request('GET', "https://graph.microsoft.com/v1.0/drives/{$drive_id}/items/{$item['id']}");
                        $download_item = json_decode($download_response->getBody()->getContents(), true);
                        $item_data['downloadUrl'] = $download_item['@microsoft.graph.downloadUrl'] ?? null;
                    } catch (\Exception $e) {
                        LoggerHelper::write_log('OneDrive File Manager: Failed to get download URL for ' . $item['name'] . ': ' . $e->getMessage());
                    }
                } else {
                    $item_data['type'] = 'folder';
                }

                if (isset($item['folder'])) {
                    $folders[] = array_merge($item_data, [
                        'type' => 'folder',
                        'path' => ($folder ? $folder . '/' : '') . $item['name'],
                        'child_count' => $item['folder']['childCount'] ?? 0
                    ]);
                } else {
                    $version = $this->extract_one_drive_item_version($item);
                    $title = $this->extract_one_drive_item_title($item) ?: $item['name'];
                    $files[] = array_merge($item_data, [
                        'path' => ($folder ? $folder . '/' : '') . $item['name'],
                        'version' => $version,
                        'file_version' => $version,
                        'title' => $title
                    ]);
                }
            }

            // Sort folders first, then files alphabetically
            usort($folders, function($a, $b) {
                return strcmp($a['name'], $b['name']);
            });
            usort($files, function($a, $b) {
                return strcmp($a['name'], $b['name']);
            });

            $all_items = array_merge($folders, $files);

            LoggerHelper::write_log('OneDrive File Manager: Found ' . count($all_items) . ' items');

            // Generate HTML for the file grid
            $html = $this->render_file_grid_html($folders, $files, $folder);

            wp_send_json_success([
                'html' => $html,
                'files' => $files,
                'folders' => $folders,
                'current_folder' => $folder
            ]);

        } catch (\Exception $e) {
            LoggerHelper::write_log('OneDrive File Manager: ajax_get_files error: ' . $e->getMessage());
            wp_send_json_error([
                'message' => 'Failed to load files: ' . $e->getMessage(),
                'code' => 'api_error'
            ]);
        }
    }

    /**
     * AJAX handler for uploading files
     */
    public function ajax_upload_file() {
        LoggerHelper::write_log('OneDrive File Manager: ajax_upload_file called');

        try {
            // Validate and sanitize input
            $nonce = $_POST['nonce'] ?? '';
            if (empty($nonce) || !wp_verify_nonce($nonce, 'onedrive_file_manager_nonce')) {
                LoggerHelper::write_log('OneDrive File Manager: Nonce verification failed');
                wp_send_json_error([
                    'message' => 'Security check failed',
                    'code' => 'invalid_nonce'
                ]);
                return;
            }

            if (empty($_FILES['file'])) {
                LoggerHelper::write_log('OneDrive File Manager: No file uploaded');
                wp_send_json_error([
                    'message' => 'No file uploaded',
                    'code' => 'no_file'
                ]);
                return;
            }

            $folder = sanitize_text_field($_POST['folder'] ?? '/');
            $context = sanitize_text_field($_POST['context'] ?? 'default');

            // Get OneDrive configuration
            $options = Settings::get_group('onedrive', []);
            if (empty($options['onedrive_drive_id'])) {
                LoggerHelper::write_log('OneDrive File Manager: OneDrive not configured');
                wp_send_json_error([
                    'message' => 'OneDrive not configured. Please set up OneDrive integration first.',
                    'code' => 'onedrive_not_configured'
                ]);
                return;
            }

            $httpClient = $this->get_http_client();
            if (!$httpClient) {
                LoggerHelper::write_log('OneDrive File Manager: Failed to get HTTP client');
                wp_send_json_error([
                    'message' => 'Failed to get authenticated HTTP client',
                    'code' => 'http_client_error'
                ]);
                return;
            }

            $file = $_FILES['file'];
            $file_name = sanitize_file_name($file['name']);
            $file_path = $file['tmp_name'];

            // Validate file
            if ($file['error'] !== UPLOAD_ERR_OK) {
                LoggerHelper::write_log('OneDrive File Manager: File upload error: ' . $file['error']);
                wp_send_json_error([
                    'message' => 'File upload failed',
                    'code' => 'upload_error'
                ]);
                return;
            }

            // Build upload path
            $drive_id = $options['onedrive_drive_id'];
            $upload_path = "/drives/{$drive_id}/root";
            if (!empty($folder) && $folder !== '/') {
                $folder_path = trim($folder, '/');
                $upload_path .= ":/{$folder_path}:";
            }
            $upload_path .= "/{$file_name}:/content";

            LoggerHelper::write_log('OneDrive File Manager: Upload path: ' . $upload_path);

            // Upload file using HTTP client
            $file_content = file_get_contents($file_path);
            if (empty($folder) || $folder === '/') {
                $url = "https://graph.microsoft.com/v1.0/drives/{$drive_id}/root:/{$file_name}:/content";
            } else {
                $folder_path = trim($folder, '/');
                $full_path = $folder_path . '/' . $file_name;
                $url = "https://graph.microsoft.com/v1.0/drives/{$drive_id}/root:/{$full_path}:/content";
            }
            $response = $httpClient->request('PUT', $url, [
                'headers' => [
                    'Content-Type' => 'application/octet-stream',
                ],
                'body' => $file_content
            ]);
            $uploaded_item = json_decode($response->getBody()->getContents(), true);

            LoggerHelper::write_log('OneDrive File Manager: File uploaded successfully: ' . $file_name);

            wp_send_json_success([
                'message' => 'File uploaded successfully',
                'file' => [
                    'id' => $uploaded_item['id'],
                    'name' => $uploaded_item['name'],
                    'size' => $uploaded_item['size'],
                    'webUrl' => $uploaded_item['webUrl']
                ]
            ]);

        } catch (\Exception $e) {
            LoggerHelper::write_log('OneDrive File Manager: ajax_upload_file error: ' . $e->getMessage());
            wp_send_json_error([
                'message' => 'Failed to upload file: ' . $e->getMessage(),
                'code' => 'api_error'
            ]);
        }
    }

    /**
     * AJAX handler for deleting files
     */
    public function ajax_delete_file() {
        LoggerHelper::write_log('OneDrive File Manager: ajax_delete_file called');

        try {
            // Validate and sanitize input
            $nonce = $_POST['nonce'] ?? '';
            if (empty($nonce) || !wp_verify_nonce($nonce, 'onedrive_file_manager_nonce')) {
                LoggerHelper::write_log('OneDrive File Manager: Nonce verification failed');
                wp_send_json_error([
                    'message' => 'Security check failed',
                    'code' => 'invalid_nonce'
                ]);
                return;
            }

            $file_id = sanitize_text_field($_POST['file_id'] ?? '');
            if (empty($file_id)) {
                LoggerHelper::write_log('OneDrive File Manager: No file ID provided');
                wp_send_json_error([
                    'message' => 'No file ID provided',
                    'code' => 'no_file_id'
                ]);
                return;
            }

            // Get OneDrive configuration
            $options = Settings::get_group('onedrive', []);
            if (empty($options['onedrive_drive_id'])) {
                LoggerHelper::write_log('OneDrive File Manager: OneDrive not configured');
                wp_send_json_error([
                    'message' => 'OneDrive not configured. Please set up OneDrive integration first.',
                    'code' => 'onedrive_not_configured'
                ]);
                return;
            }

            // Initialize MS Graph client
            $msgraph = GraphService::get_instance();
            $graph_client = $this->clients->create_graph_client();
            if (!$graph_client) {
                LoggerHelper::write_log('OneDrive File Manager: Failed to initialize MS Graph client');
                wp_send_json_error([
                    'message' => 'Failed to connect to Microsoft Graph API',
                    'code' => 'graph_client_error'
                ]);
                return;
            }

            $drive_id = $options['onedrive_drive_id'];

            // Delete file using HTTP API
            $delete_url = "https://graph.microsoft.com/v1.0/drives/{$drive_id}/items/{$file_id}";
            $http_client = $this->get_http_client();
            $http_client->request('DELETE', $delete_url);

            LoggerHelper::write_log('OneDrive File Manager: File deleted successfully: ' . $file_id);

            wp_send_json_success([
                'message' => 'File deleted successfully'
            ]);

        } catch (\Exception $e) {
            LoggerHelper::write_log('OneDrive File Manager: ajax_delete_file error: ' . $e->getMessage());
            wp_send_json_error([
                'message' => 'Failed to delete file: ' . $e->getMessage(),
                'code' => 'api_error'
            ]);
        }
    }

    /**
     * AJAX handler for creating folders
     */
    public function ajax_create_folder() {
        LoggerHelper::write_log('OneDrive File Manager: ajax_create_folder called');

        try {
            // Validate and sanitize input
            $nonce = $_POST['nonce'] ?? '';
            if (empty($nonce) || !wp_verify_nonce($nonce, 'onedrive_file_manager_nonce')) {
                LoggerHelper::write_log('OneDrive File Manager: Nonce verification failed');
                wp_send_json_error([
                    'message' => 'Security check failed',
                    'code' => 'invalid_nonce'
                ]);
                return;
            }

            $folder_name = sanitize_text_field($_POST['folder_name'] ?? '');
            $parent_folder = sanitize_text_field($_POST['parent_path'] ?? $_POST['parent_folder'] ?? '/');

            if (empty($folder_name)) {
                LoggerHelper::write_log('OneDrive File Manager: No folder name provided');
                wp_send_json_error([
                    'message' => 'No folder name provided',
                    'code' => 'no_folder_name'
                ]);
                return;
            }

            // Get OneDrive configuration
            $options = Settings::get_group('onedrive', []);
            if (empty($options['onedrive_drive_id'])) {
                LoggerHelper::write_log('OneDrive File Manager: OneDrive not configured');
                wp_send_json_error([
                    'message' => 'OneDrive not configured. Please set up OneDrive integration first.',
                    'code' => 'onedrive_not_configured'
                ]);
                return;
            }

            // Initialize MS Graph client
            $msgraph = GraphService::get_instance();
            $graph_client = $this->clients->create_graph_client();
            if (!$graph_client) {
                LoggerHelper::write_log('OneDrive File Manager: Failed to initialize MS Graph client');
                wp_send_json_error([
                    'message' => 'Failed to connect to Microsoft Graph API',
                    'code' => 'graph_client_error'
                ]);
                return;
            }

            $httpClient = $this->get_http_client();
            if (!$httpClient) {
                LoggerHelper::write_log('OneDrive File Manager: Failed to get HTTP client');
                wp_send_json_error([
                    'message' => 'Failed to get authenticated HTTP client',
                    'code' => 'http_client_error'
                ]);
                return;
            }

            $drive_id = $options['onedrive_drive_id'];

            // Build parent path
            $parent_path = "/drives/{$drive_id}/root";
            if (!empty($parent_folder) && $parent_folder !== '/') {
                $folder_path = trim($parent_folder, '/');
                $parent_path .= ":/{$folder_path}:";
            }
            $parent_path .= '/children';

            LoggerHelper::write_log('OneDrive File Manager: Create folder parent path: ' . $parent_path);

            // Create folder using fluent API
            $folder_item = new \Microsoft\Graph\Generated\Models\DriveItem();
            $folder_item->setName($folder_name);
            $folder_item->setFolder(new \Microsoft\Graph\Generated\Models\Folder());

            // Create folder using HTTP client
            if (empty($parent_folder) || $parent_folder === '/') {
                $url = "https://graph.microsoft.com/v1.0/drives/{$drive_id}/root/children";
            } else {
                $parent_path_clean = trim($parent_folder, '/');
                $url = "https://graph.microsoft.com/v1.0/drives/{$drive_id}/root:/{$parent_path_clean}:/children";
            }
            $response = $httpClient->request('POST', $url, [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'name' => $folder_name,
                    'folder' => (object)[],
                    '@microsoft.graph.conflictBehavior' => 'rename'
                ]
            ]);
            $created_folder = json_decode($response->getBody()->getContents(), true);

            LoggerHelper::write_log('OneDrive File Manager: Folder created successfully: ' . $folder_name);

            wp_send_json_success([
                'message' => 'Folder created successfully',
                'folder' => [
                    'id' => $created_folder['id'],
                    'name' => $created_folder['name'],
                    'webUrl' => $created_folder['webUrl']
                ]
            ]);

        } catch (\Exception $e) {
            LoggerHelper::write_log('OneDrive File Manager: ajax_create_folder error: ' . $e->getMessage());
            wp_send_json_error([
                'message' => 'Failed to create folder: ' . $e->getMessage(),
                'code' => 'api_error'
            ]);
        }
    }

    /**
     * AJAX handler for creating a new file
     */
    public function ajax_create_file() {
        LoggerHelper::write_log('OneDrive File Manager: ajax_create_file called');

        try {
            // Validate and sanitize input
            $nonce = $_POST['nonce'] ?? '';
            if (empty($nonce) || !wp_verify_nonce($nonce, 'onedrive_file_manager_nonce')) {
                LoggerHelper::write_log('OneDrive File Manager: Nonce verification failed');
                wp_send_json_error([
                    'message' => 'Security check failed',
                    'code' => 'invalid_nonce'
                ]);
                return;
            }

            $file_name = sanitize_text_field($_POST['file_name'] ?? '');
            $parent_path = sanitize_text_field($_POST['parent_path'] ?? '/');
            $file_title = sanitize_text_field($_POST['file_title'] ?? '');
            $file_version = sanitize_text_field($_POST['file_version'] ?? '');

            if (empty($file_name)) {
                LoggerHelper::write_log('OneDrive File Manager: File name is required');
                wp_send_json_error([
                    'message' => 'File name is required',
                    'code' => 'missing_file_name'
                ]);
                return;
            }

            if (empty($file_title)) {
                LoggerHelper::write_log('OneDrive File Manager: File title is required');
                wp_send_json_error([
                    'message' => 'File title is required',
                    'code' => 'missing_file_title'
                ]);
                return;
            }

            // Check if file was uploaded
            if (!isset($_FILES['uploaded_file']) || $_FILES['uploaded_file']['error'] !== UPLOAD_ERR_OK) {
                LoggerHelper::write_log('OneDrive File Manager: File upload is required');
                wp_send_json_error([
                    'message' => 'File upload is required',
                    'code' => 'missing_file_upload'
                ]);
                return;
            }

            $uploaded_file = $_FILES['uploaded_file'];
            $temp_file_path = $uploaded_file['tmp_name'];

            // Get OneDrive configuration
            $options = Settings::get_group('onedrive', []);
            if (empty($options['onedrive_drive_id'])) {
                LoggerHelper::write_log('OneDrive File Manager: OneDrive not configured');
                wp_send_json_error([
                    'message' => 'OneDrive not configured. Please set up OneDrive integration first.',
                    'code' => 'onedrive_not_configured'
                ]);
                return;
            }

            $http_client = $this->get_http_client();

            $metadata = [];
            if (!empty($file_title)) {
                $metadata['title'] = $file_title;
            }
            if (!empty($file_version)) {
                $metadata['file_version'] = $file_version;
            }

            $folder_path = trim($parent_path, '/');
            $item_path = $folder_path === '' ? $file_name : $folder_path . '/' . $file_name;
            $upload_url = 'https://graph.microsoft.com/v1.0/drives/' . rawurlencode($options['onedrive_drive_id']) . '/root:/' . str_replace('%2F', '/', rawurlencode($item_path)) . ':/content';
            $response = $http_client->request('PUT', $upload_url, [
                'headers' => ['Content-Type' => 'application/octet-stream'],
                'body' => file_get_contents($temp_file_path),
            ]);
            $result = json_decode($response->getBody()->getContents(), true);

            // Store metadata if provided (you might want to store this in a custom field or database)
            if (!empty($file_title) || !empty($file_version)) {
                // For now, we'll just log the metadata - you can extend this to store in OneDrive metadata
                LoggerHelper::write_log('OneDrive File Manager: File uploaded with title: ' . $file_title . ', version: ' . $file_version);
            }

            LoggerHelper::write_log('OneDrive File Manager: File uploaded successfully; response fields: ' . (is_array($result) ? implode(', ', array_keys($result)) : 'invalid response'));
            wp_send_json_success([
                'message' => 'File uploaded successfully',
                'file' => $result,
                'title' => $file_title,
                'version' => $file_version
            ]);

        } catch (\Exception $e) {
            LoggerHelper::write_log('OneDrive File Manager: ajax_create_file error: ' . $e->getMessage());
            wp_send_json_error([
                'message' => 'Failed to upload file: ' . $e->getMessage(),
                'code' => 'api_error'
            ]);
        }
    }

    /**
     * AJAX handler for testing drive access
     */
    public function ajax_test_drive_access() {
        LoggerHelper::write_log('OneDrive File Manager: ajax_test_drive_access called');

        try {
            // Validate and sanitize input
            $nonce = $_POST['nonce'] ?? '';
            if (empty($nonce) || !wp_verify_nonce($nonce, 'onedrive_file_manager_nonce')) {
                LoggerHelper::write_log('OneDrive File Manager: Nonce verification failed');
                wp_send_json_error([
                    'message' => 'Security check failed',
                    'code' => 'invalid_nonce'
                ]);
                return;
            }

            // Get OneDrive configuration
            $options = Settings::get_group('onedrive', []);
            if (empty($options['onedrive_drive_id'])) {
                LoggerHelper::write_log('OneDrive File Manager: OneDrive not configured');
                wp_send_json_error([
                    'message' => 'OneDrive not configured. Please set up OneDrive integration first.',
                    'code' => 'onedrive_not_configured'
                ]);
                return;
            }

            // Initialize MS Graph client
            $graph_client = $this->clients->create_graph_client();
            if (!$graph_client) {
                LoggerHelper::write_log('OneDrive File Manager: Failed to initialize MS Graph client');
                wp_send_json_error([
                    'message' => 'Failed to connect to Microsoft Graph API',
                    'code' => 'graph_client_error'
                ]);
                return;
            }

            $drive_id = $options['onedrive_drive_id'];

            // Test access by getting drive info using fluent API
            $response = $graph_client->drives()->byDriveId($drive_id)->get()->wait();

            LoggerHelper::write_log('OneDrive File Manager: Drive access test successful');

            wp_send_json_success([
                'message' => 'OneDrive access verified successfully',
                'drive' => [
                    'id' => $response->getId(),
                    'name' => $response->getName(),
                    'description' => $response->getDescription()
                ]
            ]);

        } catch (\Exception $e) {
            LoggerHelper::write_log('OneDrive File Manager: ajax_test_drive_access error: ' . $e->getMessage());
            wp_send_json_error([
                'message' => 'Failed to verify OneDrive access: ' . $e->getMessage(),
                'code' => 'api_error'
            ]);
        }
    }

    /**
     * AJAX handler for listing drives (for setup)
     */
    public function ajax_list_drives() {
        LoggerHelper::write_log('OneDrive setup: ajax_list_drives called');

        try {
            // Validate nonce
            if (!wp_verify_nonce($_POST['nonce'] ?? '', 'onedrive_setup_nonce')) {
                LoggerHelper::write_log('OneDrive setup: Nonce verification failed');
                wp_send_json_error([
                    'message' => 'Security check failed',
                    'code' => 'invalid_nonce'
                ]);
                return;
            }

            // Initialize MS Graph client
            $graph_client = $this->clients->create_graph_client();
            if (!$graph_client) {
                LoggerHelper::write_log('OneDrive setup: Failed to initialize MS Graph client');
                wp_send_json_error([
                    'message' => 'Failed to connect to Microsoft Graph API',
                    'code' => 'graph_client_error'
                ]);
                return;
            }

            // Get user's drives using fluent API
            $response = $graph_client->me()->drives()->get()->wait();

            $drives = [];
            foreach ($response->getValue() as $drive) {
                $drives[] = [
                    'id' => $drive->getId(),
                    'name' => $drive->getName(),
                    'description' => $drive->getDescription(),
                    'driveType' => $drive->getDriveType()
                ];
            }

            LoggerHelper::write_log('OneDrive setup: Found ' . count($drives) . ' drives');

            wp_send_json_success([
                'drives' => $drives
            ]);

        } catch (\Exception $e) {
            LoggerHelper::write_log('OneDrive setup list drives error: ' . $e->getMessage());
            wp_send_json_error([
                'message' => 'Failed to load drives: ' . $e->getMessage(),
                'code' => 'api_error'
            ]);
        }
    }

    private function get_http_client(): \GuzzleHttp\Client {
        $client = $this->clients->create_http_client();
        if (!$client) {
            throw new \RuntimeException('Delegated OneDrive connection is not configured. Authorize the administrator account first.');
        }

        return $client;
    }

    /**
     * AJAX handler for renaming files/folders
     */
    public function ajax_rename() {
        try {
            LoggerHelper::write_log('OneDrive File Manager: ajax_rename called');

            // Validate and sanitize input
            $nonce = $_POST['nonce'] ?? '';
            if (empty($nonce) || !wp_verify_nonce($nonce, 'onedrive_file_manager_nonce')) {
                LoggerHelper::write_log('OneDrive File Manager: Nonce verification failed');
                wp_send_json_error(['message' => 'Security check failed']);
                return;
            }

            $path = sanitize_text_field($_POST['path'] ?? '');
            $new_name = sanitize_text_field($_POST['new_name'] ?? '');

            if (empty($path) || empty($new_name)) {
                wp_send_json_error(['message' => 'Path and new name are required']);
                return;
            }

            // Get MS Graph instance
            $msgraph = GraphService::get_instance();

            // Rename the item
            $result = $this->items->rename_onedrive_item($path, $new_name);

            wp_send_json_success(['message' => 'Item renamed successfully']);

        } catch (\Exception $e) {
            LoggerHelper::write_log('OneDrive File Manager: ajax_rename error: ' . $e->getMessage());
            wp_send_json_error(['message' => 'Failed to rename item: ' . $e->getMessage()]);
        }
    }

    /**
     * AJAX handler for moving files/folders
     */
    public function ajax_move() {
        try {
            LoggerHelper::write_log('OneDrive File Manager: ajax_move called');

            // Validate and sanitize input
            $nonce = $_POST['nonce'] ?? '';
            if (empty($nonce) || !wp_verify_nonce($nonce, 'onedrive_file_manager_nonce')) {
                wp_send_json_error(['message' => 'Security check failed']);
                return;
            }

            $source_path = sanitize_text_field($_POST['source_path'] ?? '');
            $target_path = sanitize_text_field($_POST['target_path'] ?? '');

            if (empty($source_path) || empty($target_path)) {
                wp_send_json_error(['message' => 'Source and target paths are required']);
                return;
            }

            // Get MS Graph instance
            $msgraph = GraphService::get_instance();

            // Move the item
            $result = $this->items->move_onedrive_item($source_path, $target_path);

            wp_send_json_success(['message' => 'Item moved successfully']);

        } catch (\Exception $e) {
            LoggerHelper::write_log('OneDrive File Manager: ajax_move error: ' . $e->getMessage());
            wp_send_json_error(['message' => 'Failed to move item: ' . $e->getMessage()]);
        }
    }

}
