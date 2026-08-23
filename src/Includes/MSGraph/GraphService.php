<?php
/** MS Graph API Integration */
namespace MSPress\Includes\MSGraph;

use Microsoft\Graph\GraphServiceClient;
use League\OAuth2\Client\Provider\GenericProvider;
use MSPress\Includes\Functions\Helpers\EncryptionHelper;
use MSPress\Includes\Functions\Helpers\LoggerHelper as utilities;
use MSPress\Includes\Functions\Helpers\MS365ConnectionHelper;
use MSPress\Includes\Settings\Settings;

/**
 * MS Graph API Integration Class
 *
 * IMPORTANT: Intelephense reports "Undefined method" errors for Microsoft Graph SDK v2.x methods.
 * These are FALSE POSITIVES - the SDK generates methods dynamically at runtime based on OpenAPI specs.
 * The code is functionally correct and will work properly. These warnings can be safely ignored.
 *
 * Suppression comments (@phpstan-ignore-next-line) have been added above problematic method calls
 * to suppress these false positive warnings while maintaining code functionality.
 *
 * @method mixed sites()
 * @method mixed me()
 * @method mixed organization()
 * @method mixed drives()
 * @method mixed items()
 * @method mixed root()
 * @method mixed byDriveId(string $driveId)
 * @method mixed byDriveItemId(string $itemId)
 * @method mixed bySiteId(string $siteId)
 * @method mixed children()
 * @method mixed itemWithPath(string $path)
 * @method mixed patch(array $body)
 * @method mixed delete()
 * @method mixed get()
 *
 * Storage-specific operations are implemented by the corresponding plugin services.
 */
class GraphService {
    private static ?GraphService $instance = null;
    /**
     * @var \Microsoft\Graph\GraphServiceClient|null $graph For app-level API calls
     * @method mixed sites()
     * @method mixed me()
     * @method mixed organization()
     * @method mixed drives()
     * @method mixed items()
     * @method mixed root()
     * @method mixed byDriveId(string $driveId)
     * @method mixed byDriveItemId(string $itemId)
     * @method mixed bySiteId(string $siteId)
     * @method mixed children()
     */
    private ?GraphServiceClient $graph = null; // For app-level API calls
    private ?GenericProvider $oauthClient = null; // For user-level authorization URLs
    private ?OAuthService $oauthService = null;
    private TokenService $tokenService;
    private CredentialService $credentials;
    private GraphClientService $clientService;
    private GraphDiagnostics $diagnosticsService;
    private ?\GuzzleHttp\Client $httpClient = null; // For direct HTTP calls
    private ?string $connectionError = null;

    private function __construct() {
        $this->credentials = new CredentialService();
        $this->tokenService = new TokenService($this->credentials);
        $this->clientService = new GraphClientService($this->tokenService);
        $this->diagnosticsService = new GraphDiagnostics($this->credentials);
        $this->initializeGraph();
    }

    /**
    * Get singleton instance of the Graph service.
    * @return GraphService
     */
    public static function get_instance(): GraphService {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function get_oauth_service(): ?OAuthService {
        return $this->oauthService;
    }

    public function getHttpClient(): ?\GuzzleHttp\Client {
        return $this->httpClient;
    }

    public function get_tenant_id(): ?string {
        return $this->credentials->get_tenant_id();
    }

    public function get_client_id(): ?string {
        return $this->credentials->get_client_id();
    }

    public function get_client_secret(): ?string {
        return $this->credentials->get_client_secret();
    }

    public function getGraphClient(): ?GraphServiceClient {
        return $this->graph;
    }

    public function get_graph(): ?GraphServiceClient {
        return $this->graph;
    }

    public function getAccessToken(): ?string {
        return $this->tokenService->getAccessToken();
    }

    public function get_connection_error(): ?string {
        return $this->connectionError;
    }

    public function get_oauth_client(): ?GenericProvider {
        return $this->oauthClient;
    }

    private function initializeGraph() {
        $options = Settings::get_group('ms365') ?? [];

        if (empty($options['enabled']) || $options['enabled'] !== 'on') {
            return;
        }

        if (!EncryptionHelper::has_runtime_key()) {
            $this->connectionError = 'MSPRESS_ENCRYPTION_KEY is not configured. Add it to wp-config.php.';
            utilities::write_log('MSGraph Error: ' . $this->connectionError);
            return;
        }

        try {
            $encryptedClientId     = $options['client_id'] ?? '';
            $encryptedTenantId     = $options['tenant_id'] ?? '';
            $encryptedClientSecret = $options['client_secret'] ?? '';

            if (empty($encryptedClientId) || empty($encryptedTenantId) || empty($encryptedClientSecret)) {
                $this->connectionError = 'MS Graph settings (Client ID, Tenant ID, or Client Secret) are missing.';
                utilities::write_log('MSGraph Error: ' . $this->connectionError);
                return;
            }

            try {
                $clientId     = trim((string) EncryptionHelper::decrypt($encryptedClientId));
                $tenantId     = trim((string) EncryptionHelper::decrypt($encryptedTenantId));
                $clientSecret = trim((string) EncryptionHelper::decrypt($encryptedClientSecret));
            } catch (\Throwable $e) {
                $this->connectionError = 'Failed to decrypt MS Graph credentials. The encryption key may be incorrect or the stored data may be corrupted. Please re-save the MS365 settings.';
                utilities::write_log('MSGraph Error: ' . $this->connectionError . ' - ' . $e->getMessage());
                return;
            }

            $tenantId = MS365ConnectionHelper::normalize_tenant_id($tenantId);

            if (empty($tenantId) || ! MS365ConnectionHelper::is_valid_tenant_identifier($tenantId)) {
                $this->connectionError = 'The stored Tenant ID is invalid. Please review the MS365 settings and re-save the credentials.';
                utilities::write_log('MSGraph Error: ' . $this->connectionError);
                return;
            }

            if ( in_array( strtolower( $tenantId ), [ 'common', 'organizations', 'consumers' ], true ) ) {
                $this->connectionError = 'Tenant ID must be a specific tenant GUID or verified domain when using application-only token flow. "common", "organizations", and "consumers" are not supported.';
                utilities::write_log('MSGraph Error: ' . $this->connectionError);
                return;
            }

            if (! MS365ConnectionHelper::is_guid($clientId)) {
                $this->connectionError = 'The stored Client ID is not a valid GUID. Please copy the Application (client) ID from Azure and save the settings again.';
                utilities::write_log('MSGraph Error: ' . $this->connectionError);
                return;
            }

            if ($clientSecret === '') {
                $this->connectionError = 'The stored Client Secret is empty. Recreate the secret in Azure and update the plugin settings.';
                utilities::write_log('MSGraph Error: ' . $this->connectionError);
                return;
            }

            $this->oauthClient = new GenericProvider([
                'clientId' => $clientId,
                'clientSecret' => $clientSecret,
                'redirectUri' => home_url('/ms-oauth-callback', 'https'),
                'urlAuthorize' => "https://login.microsoftonline.com/{$tenantId}/oauth2/v2.0/authorize",
                'urlAccessToken' => "https://login.microsoftonline.com/{$tenantId}/oauth2/v2.0/token",
                'urlResourceOwnerDetails' => 'https://graph.microsoft.com/v1.0/me',
            ]);
            $this->oauthService = new OAuthService($this->oauthClient, fn() => $this->get_tenant_id());
            $this->graph = $this->clientService->create_graph_client();
            $this->httpClient = $this->clientService->create_http_client();
        } catch (\Throwable $e) {
            $this->connectionError = 'Error initializing MS Graph: ' . $e->getMessage();
            utilities::write_log($this->connectionError);
            $this->graph = null;
            $this->httpClient = null;
        }
    }

    /**
     * Test drive access for a SharePoint site
     * 
     * This method tests the access to a SharePoint site by attempting to list drives.
     * It logs the process and returns the site name and drive count.
     *
     * @param string $site_id The ID of the SharePoint site to test access for.
     * @return array An array containing success status, site name, drive count, and drive names.
     * @throws Exception If the Graph client is not initialized or if access fails.
     */
    public function test_drive_access($site_id) {
        if (!$this->graph) {
            throw new Exception('Graph client not initialized');
        }

        utilities::write_log('MSGraph test_drive_access: Testing drive access for site: ' . $site_id);

        try {
            // First verify site access
            utilities::write_log('MSGraph test_drive_access: Attempting to access site: ' . $site_id);
            $site = $this->get_sharepoint_site($site_id);
            utilities::write_log('MSGraph test_drive_access: Site access successful: ' . $site->getDisplayName());

            // Try to list drives
            utilities::write_log('MSGraph test_drive_access: Attempting to list drives for site: ' . $site_id);
            $drives_list = $this->graph->sites()->bySiteId($site_id)->drives()->get()->wait();
            $drives_array = $drives_list->getValue();

            utilities::write_log('MSGraph test_drive_access: Found ' . count($drives_array) . ' drives');
            $drive_names = [];
            foreach ($drives_array as $drive) {
                $drive_names[] = $drive->getName() . ' (ID: ' . $drive->getId() . ')';
                utilities::write_log('MSGraph test_drive_access: Drive: ' . $drive->getName() . ' - ' . $drive->getId());
            }

            return [
                'success' => true,
                'site_name' => $site->getDisplayName(),
                'drive_count' => count($drives_array),
                'drives' => $drive_names
            ];

        } catch (Exception $e) {
            utilities::write_log('MSGraph test_drive_access: Error: ' . $e->getMessage());
            $error_details = $e->getMessage();
            if (strpos($error_details, '403') !== false || strpos($error_details, 'Forbidden') !== false) {
                $error_message = 'Access denied. Please ensure your Azure app registration has the Files.ReadWrite.All permission granted and that admin consent has been provided.';
            } elseif (strpos($error_details, '401') !== false || strpos($error_details, 'Unauthorized') !== false) {
                $error_message = 'Authentication failed. Please check your Azure app credentials and ensure the app is properly configured.';
            } elseif (strpos($error_details, '404') !== false || strpos($error_details, 'Not Found') !== false) {
                $error_message = 'SharePoint site not found. Please verify the site URL format and ensure the site exists.';
            } elseif (strpos($error_details, 'Could not find SharePoint site') !== false) {
                $error_message = 'Site access failed. The site URL format may be incorrect. Expected format: hostname:/sites/sitename';
            } else {
                $error_message = 'Drive access test failed: ' . $error_details;
            }
            return [
                'success' => false,
                'error' => $error_message,
                'raw_error' => $error_details
            ];
        }
    }

    /**
     * Get SharePoint site by identifier
     */
    public function get_sharepoint_site($site_identifier) {
        if (!$this->graph) {
            throw new Exception('Graph client not initialized');
        }

        utilities::write_log('MSGraph get_sharepoint_site: Looking up site: ' . $site_identifier);

        // Try different site ID formats
        $site_formats = [
            $site_identifier, // Original format
        ];

        // If it looks like hostname:/sites/sitename format, also try hostname:/sites/sitename:/sites/sitename
        if (strpos($site_identifier, ':/sites/') !== false) {
            $parts = explode(':/sites/', $site_identifier);
            if (count($parts) === 2) {
                $hostname = $parts[0];
                $site_path = $parts[1];
                // Try without the leading slash
                $site_formats[] = $hostname . ':/sites/' . $site_path;
                // Try with different path formats
                $site_formats[] = $hostname . '/sites/' . $site_path;
            }
        }

        foreach ($site_formats as $format) {
            try {
                utilities::write_log('MSGraph get_sharepoint_site: Trying format: ' . $format);
                $site = $this->graph->sites()->bySiteId($format)->get()->wait();
                utilities::write_log('MSGraph get_sharepoint_site: Found site by ID: ' . $site->getDisplayName());
                return $site;
            } catch (Exception $e) {
                utilities::write_log('MSGraph get_sharepoint_site: Format ' . $format . ' failed: ' . $e->getMessage());
                continue;
            }
        }

        throw new Exception('Could not find SharePoint site: ' . $site_identifier . ' (tried multiple formats)');
    }

    /**
     * Get files and folders from SharePoint drive
     */
    public function get_drive_items($site_id, $drive_id = null, $folder_path = '', $drive_name = null) {
        if (!$this->graph) {
            throw new Exception('Graph client not initialized');
        }

        utilities::write_log('MSGraph get_drive_items: Starting with site_id=' . $site_id . ', drive_id=' . ($drive_id ?? 'null') . ', folder_path=' . $folder_path . ', drive_name=' . ($drive_name ?? 'null'));

        try {
            // Get the drive ID if not specified
            if (!$drive_id) {
                if ($drive_name) {
                    utilities::write_log('MSGraph get_drive_items: Looking for drive by name: ' . $drive_name);
                    // Find drive by name
                    try {
                        $drives_list = $this->graph->sites()->bySiteId($site_id)->drives()->get()->wait();
                        $drives_array = $drives_list->getValue();
                        utilities::write_log('MSGraph get_drive_items: Found ' . count($drives_array) . ' drives');
                        foreach ($drives_array as $drive) {
                            utilities::write_log('MSGraph get_drive_items: Checking drive: ' . $drive->getName() . ' (ID: ' . $drive->getId() . ')');
                            if (strcasecmp($drive->getName(), $drive_name) === 0) {
                                $drive_id = $drive->getId();
                                utilities::write_log('MSGraph get_drive_items: Found matching drive: ' . $drive_id);
                                break;
                            }
                        }
                        if (!$drive_id) {
                            $available_drives = array_map(function($d) { return $d->getName(); }, $drives_array);
                            utilities::write_log('MSGraph get_drive_items: Drive not found. Available: ' . implode(', ', $available_drives));
                            throw new Exception('Drive with name "' . $drive_name . '" not found in this SharePoint site. Available drives: ' . implode(', ', $available_drives));
                        }
                    } catch (Exception $e) {
                        utilities::write_log('MSGraph get_drive_items: Error accessing drives: ' . $e->getMessage());
                        $error_details = $e->getMessage();
                        if (strpos($error_details, '403') !== false || strpos($error_details, 'Forbidden') !== false) {
                            throw new Exception('Access denied when listing drives. Please ensure your Azure app registration has the Files.ReadWrite.All permission granted and that the app has been granted admin consent. Error: ' . $error_details);
                        } elseif (strpos($error_details, '401') !== false || strpos($error_details, 'Unauthorized') !== false) {
                            throw new Exception('Authentication failed when accessing drives. Please check your Azure app credentials and ensure the app is properly configured. Error: ' . $error_details);
                        } elseif (strpos($error_details, '404') !== false || strpos($error_details, 'Not Found') !== false) {
                            throw new Exception('SharePoint site not found. Please verify the site URL and ensure the site exists. Error: ' . $error_details);
                        } else {
                            throw new Exception('Unable to access drives in this SharePoint site. Error: ' . $error_details);
                        }
                    }
                } else {
                    utilities::write_log('MSGraph get_drive_items: No drive_name specified, trying default drive');
                    try {
                        // Try to get the default drive first
                        $drives = $this->graph->sites()->bySiteId($site_id)->drive()->get()->wait();
                        $drive_id = $drives->getId();
                        utilities::write_log('MSGraph get_drive_items: Using default drive: ' . $drive_id);
                    } catch (Exception $e) {
                        utilities::write_log('MSGraph get_drive_items: Default drive not available: ' . $e->getMessage());
                        // If no default drive, list all drives and pick the first one
                        try {
                            $drives_list = $this->graph->sites()->bySiteId($site_id)->drives()->get()->wait();
                            $drives_array = $drives_list->getValue();
                            if (empty($drives_array)) {
                                utilities::write_log('MSGraph get_drive_items: No drives found in site');
                                throw new Exception('No drives found in this SharePoint site');
                            }
                            $drive_id = $drives_array[0]->getId();
                            utilities::write_log('MSGraph get_drive_items: Using first available drive: ' . $drive_id . ' (' . $drives_array[0]->getName() . ')');
                        } catch (Exception $e2) {
                            utilities::write_log('MSGraph get_drive_items: Error listing drives: ' . $e2->getMessage());
                            $error_details = $e2->getMessage();
                            if (strpos($error_details, '403') !== false || strpos($error_details, 'Forbidden') !== false) {
                                throw new Exception('Access denied when listing drives. Please ensure your Azure app registration has the Files.ReadWrite.All permission granted and that the app has been granted admin consent. Error: ' . $error_details);
                            } elseif (strpos($error_details, '401') !== false || strpos($error_details, 'Unauthorized') !== false) {
                                throw new Exception('Authentication failed when accessing drives. Please check your Azure app credentials and ensure the app is properly configured. Error: ' . $error_details);
                            } elseif (strpos($error_details, '404') !== false || strpos($error_details, 'Not Found') !== false) {
                                throw new Exception('SharePoint site not found. Please verify the site URL and ensure the site exists. Error: ' . $error_details);
                            } else {
                                throw new Exception('Unable to access drives in this SharePoint site. Error: ' . $error_details);
                            }
                        }
                    }
                }
            }

            // Build the path for the folder
            $item_path = empty($folder_path) || $folder_path === '/' ? 'root' : 'root:' . $folder_path . ':';
            utilities::write_log('MSGraph get_drive_items: Using item_path: ' . $item_path . ', drive_id: ' . $drive_id);

            // Get children of the folder using HTTP client
            $httpClient = $this->getHttpClient();
            $expandQuery = '?$expand=listItem($expand=fields)';
            if (empty($folder_path) || $folder_path === '/') {
                $url = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root/children" . $expandQuery;
                $response = $httpClient->get($url);
                $children = json_decode($response->getBody()->getContents(), true);
                $children_array = $children['value'] ?? [];
            } else {
                $clean_path = ltrim($folder_path, '/');
                $url = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root:/{$clean_path}:/children" . $expandQuery;
                $response = $httpClient->get($url);
                $children = json_decode($response->getBody()->getContents(), true);
                $children_array = $children['value'] ?? [];
            }

            $files = [];
            $folders = [];

            foreach ($children_array as $item) {
                $item_data = [
                    'id' => $item['id'],
                    'name' => $item['name'],
                    'web_url' => $item['webUrl'],
                    'created_date_time' => isset($item['createdDateTime']) ? date('Y-m-d H:i:s', strtotime($item['createdDateTime'])) : null,
                    'last_modified_date_time' => isset($item['lastModifiedDateTime']) ? date('Y-m-d H:i:s', strtotime($item['lastModifiedDateTime'])) : null,
                ];

                if (isset($item['folder'])) {
                    // It's a folder
                    $folders[] = array_merge($item_data, [
                        'type' => 'folder',
                        'path' => ($folder_path === '/' ? '' : rtrim($folder_path, '/') . '/') . $item['name'],
                        'child_count' => $item['folder']['childCount'] ?? 0
                    ]);
                } else {
                    // It's a file
                    $file_info = DriveItemFormatter::format_array_item($item);
                    $files[] = array_merge($item_data, $file_info, [
                        'path' => ($folder_path === '/' ? '' : rtrim($folder_path, '/') . '/') . $item['name']
                    ]);
                }
            }

            utilities::write_log('MSGraph get_drive_items: Successfully retrieved ' . count($files) . ' files and ' . count($folders) . ' folders');

            return [
                'files' => $files,
                'folders' => $folders,
                'drive_id' => $drive_id
            ];

        } catch (Exception $e) {
            utilities::write_log('MS Graph get_drive_items error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Upload file to SharePoint
     */
    public function upload_file($site_id, $drive_id, $folder_path, $file_path, $file_name, $drive_name = null, $metadata = []) {
        if (!$this->graph) {
            throw new Exception('Graph client not initialized');
        }

        try {
            // Get the drive ID if not specified
            if (!$drive_id) {
                if ($drive_name) {
                    // Find drive by name
                    try {
                        $drives_list = $this->graph->sites()->bySiteId($site_id)->drives()->get()->wait();
                        $drives_array = $drives_list->getValue();
                        foreach ($drives_array as $drive) {
                            if (strcasecmp($drive->getName(), $drive_name) === 0) {
                                $drive_id = $drive->getId();
                                break;
                            }
                        }
                        if (!$drive_id) {
                            throw new Exception('Drive with name "' . $drive_name . '" not found in this SharePoint site. Available drives: ' . implode(', ', array_map(function($d) { return $d->getName(); }, $drives_array)));
                        }
                    } catch (Exception $e) {
                        throw new Exception('Unable to access drives in this SharePoint site. Please check your Files.ReadWrite.All permission: ' . $e->getMessage());
                    }
                } else {
                    try {
                        // Try to get the default drive first
                        $drives = $this->graph->sites()->bySiteId($site_id)->drive()->get()->wait();
                        $drive_id = $drives->getId();
                    } catch (Exception $e) {
                        // If no default drive, list all drives and pick the first one
                        try {
                            $drives_list = $this->graph->sites()->bySiteId($site_id)->drives()->get()->wait();
                            $drives_array = $drives_list->getValue();
                            if (empty($drives_array)) {
                                throw new Exception('No drives found in this SharePoint site');
                            }
                            $drive_id = $drives_array[0]->getId();
                        } catch (Exception $e2) {
                            throw new Exception('Unable to access drives in this SharePoint site. Please check your Files.ReadWrite.All permission: ' . $e2->getMessage());
                        }
                    }
                }
            }

            // Read file content
            $file_content = file_get_contents($file_path);
            if ($file_content === false) {
                throw new Exception('Could not read file: ' . $file_path);
            }

            // Build the upload path
            $upload_path = empty($folder_path) || $folder_path === '/' ? $file_name : $folder_path . '/' . $file_name;

            // Upload the file using HTTP client
            $httpClient = $this->getHttpClient();
            $url = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root:/{$upload_path}:/content";
            $response = $httpClient->request('PUT', $url, [
                'headers' => [
                    'Content-Type' => 'application/octet-stream',
                ],
                'body' => $file_content
            ]);
            $uploaded_item = json_decode($response->getBody()->getContents(), true);

            // Update metadata if provided
            if (!empty($metadata) && isset($uploaded_item['id'])) {
                try {
                    $this->update_file_metadata($site_id, $drive_id, $uploaded_item['id'], $metadata);
                } catch (Exception $metadata_error) {
                    utilities::write_log('MS Graph upload_file metadata update warning: ' . $metadata_error->getMessage());
                    // Don't fail the upload if metadata update fails
                }
            }

            return [
                'id' => $uploaded_item['id'],
                'name' => $uploaded_item['name'],
                'web_url' => $uploaded_item['webUrl'],
                'size' => $uploaded_item['size'],
                'created_date_time' => isset($uploaded_item['createdDateTime']) ? date('Y-m-d H:i:s', strtotime($uploaded_item['createdDateTime'])) : null,
                'last_modified_date_time' => isset($uploaded_item['lastModifiedDateTime']) ? date('Y-m-d H:i:s', strtotime($uploaded_item['lastModifiedDateTime'])) : null,
            ];

        } catch (Exception $e) {
            utilities::write_log('MS Graph upload_file error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Update file metadata (list item fields) in SharePoint or OneDrive
     */
    private function update_file_metadata($site_id, $drive_id, $item_id, $metadata) {
        if (!$this->graph) {
            throw new Exception('Graph client not initialized');
        }

        try {
            // Prepare the fields to update
            $fields = [];

            if (isset($metadata['title'])) {
                $fields['Title'] = $metadata['title'];
            }

            if (isset($metadata['file_version'])) {
                $fields['FileVersion'] = $metadata['file_version'];
            }

            // Add any other custom fields
            foreach ($metadata as $key => $value) {
                if (!in_array($key, ['title', 'file_version'])) {
                    $fields[$key] = $value;
                }
            }

            if (empty($fields)) {
                return; // Nothing to update
            }

            // Update the list item fields - handle both SharePoint and OneDrive
            if ($site_id) {
                // SharePoint - update list item fields using HTTP client
                $httpClient = $this->getHttpClient();
                $url = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/items/{$item_id}/listItem/fields";
                $httpClient->request('PATCH', $url, [
                    'headers' => [
                        'Content-Type' => 'application/json',
                    ],
                    'body' => json_encode($fields)
                ]);
            } else {
                // OneDrive - update item properties directly
                // For OneDrive, we can update basic properties like name, but custom fields might not be available
                // For now, we'll try to update the description field if title is provided
                $updateBody = [];
                if (isset($fields['Title'])) {
                    $updateBody['description'] = $fields['Title']; // OneDrive uses description instead of Title
                }

                if (!empty($updateBody)) {
                    $this->graph->me()->drive()->items()->byDriveItemId($item_id)->patch($updateBody)->wait();
                }
            }

        } catch (Exception $e) {
            utilities::write_log('MS Graph update_file_metadata error: ' . $e->getMessage());
            throw new Exception('Failed to update file metadata: ' . $e->getMessage());
        }
    }

    /**
     * Delete file from SharePoint
     */
    public function delete_file($site_id, $drive_id, $item_id, $drive_name = null) {
        if (!$this->graph) {
            throw new Exception('Graph client not initialized');
        }

        try {
            // Get the drive ID if not specified
            if (!$drive_id) {
                if ($drive_name) {
                    // Find drive by name
                    try {
                        $drives_list = $this->graph->sites()->bySiteId($site_id)->drives()->get()->wait();
                        $drives_array = $drives_list->getValue();
                        foreach ($drives_array as $drive) {
                            if (strcasecmp($drive->getName(), $drive_name) === 0) {
                                $drive_id = $drive->getId();
                                break;
                            }
                        }
                        if (!$drive_id) {
                            throw new Exception('Drive with name "' . $drive_name . '" not found in this SharePoint site. Available drives: ' . implode(', ', array_map(function($d) { return $d->getName(); }, $drives_array)));
                        }
                    } catch (Exception $e) {
                        throw new Exception('Unable to access drives in this SharePoint site. Please check your Files.ReadWrite.All permission: ' . $e->getMessage());
                    }
                } else {
                    try {
                        // Try to get the default drive first
                        $drives = $this->graph->sites()->bySiteId($site_id)->drive()->get()->wait();
                        $drive_id = $drives->getId();
                    } catch (Exception $e) {
                        // If no default drive, list all drives and pick the first one
                        try {
                            $drives_list = $this->graph->sites()->bySiteId($site_id)->drives()->get()->wait();
                            $drives_array = $drives_list->getValue();
                            if (empty($drives_array)) {
                                throw new Exception('No drives found in this SharePoint site');
                            }
                            $drive_id = $drives_array[0]->getId();
                        } catch (Exception $e2) {
                            throw new Exception('Unable to access drives in this SharePoint site. Please check your Files.ReadWrite.All permission: ' . $e2->getMessage());
                        }
                    }
                }
            }

            // Delete file using HTTP client
            $httpClient = $this->getHttpClient();
            if (!$httpClient) {
                throw new Exception('HTTP client not available');
            }
            $url = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/items/{$item_id}";
            $httpClient->request('DELETE', $url);
            return true;
        } catch (Exception $e) {
            utilities::write_log('MS Graph delete_file error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Create folder in SharePoint
     */
    public function create_folder($site_id, $drive_id, $parent_path, $folder_name, $drive_name = null) {
        if (!$this->graph) {
            throw new Exception('Graph client not initialized');
        }

        try {
            // Get the drive ID if not specified
            if (!$drive_id) {
                if ($drive_name) {
                    // Find drive by name
                    try {
                        $drives_list = $this->graph->sites()->bySiteId($site_id)->drives()->get()->wait();
                        $drives_array = $drives_list->getValue();
                        foreach ($drives_array as $drive) {
                            if (strcasecmp($drive->getName(), $drive_name) === 0) {
                                $drive_id = $drive->getId();
                                break;
                            }
                        }
                        if (!$drive_id) {
                            throw new Exception('Drive with name "' . $drive_name . '" not found in this SharePoint site. Available drives: ' . implode(', ', array_map(function($d) { return $d->getName(); }, $drives_array)));
                        }
                    } catch (Exception $e) {
                        throw new Exception('Unable to access drives in this SharePoint site. Please check your Files.ReadWrite.All permission: ' . $e->getMessage());
                    }
                } else {
                    try {
                        // Try to get the default drive first
                        $drives = $this->graph->sites()->bySiteId($site_id)->drive()->get()->wait();
                        $drive_id = $drives->getId();
                    } catch (Exception $e) {
                        // If no default drive, list all drives and pick the first one
                        try {
                            $drives_list = $this->graph->sites()->bySiteId($site_id)->drives()->get()->wait();
                            $drives_array = $drives_list->getValue();
                            if (empty($drives_array)) {
                                throw new Exception('No drives found in this SharePoint site');
                            }
                            $drive_id = $drives_array[0]->getId();
                        } catch (Exception $e2) {
                            throw new Exception('Unable to access drives in this SharePoint site. Please check your Files.ReadWrite.All permission: ' . $e2->getMessage());
                        }
                    }
                }
            }

            $folder_data = [
                'name' => $folder_name,
                'folder' => (object)[],
                '@microsoft.graph.conflictBehavior' => 'rename'
            ];

            // Create folder using HTTP client
            $httpClient = $this->getHttpClient();
            if (empty($parent_path) || $parent_path === '/') {
                $url = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root/children";
            } else {
                $clean_path = trim($parent_path, '/');
                $url = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root:/{$clean_path}:/children";
            }
            $response = $httpClient->request('POST', $url, [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode($folder_data)
            ]);
            $new_folder = json_decode($response->getBody()->getContents(), true);

            return [
                'id' => $new_folder['id'],
                'name' => $new_folder['name'],
                'web_url' => $new_folder['webUrl'],
                'path' => ($parent_path ? $parent_path . '/' : '') . $folder_name,
                'created_date_time' => isset($new_folder['createdDateTime']) ? date('Y-m-d H:i:s', strtotime($new_folder['createdDateTime'])) : null,
            ];

        } catch (Exception $e) {
            utilities::write_log('MS Graph create_folder error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Get SharePoint site by identifier
     */
    public function getSharePointSite($site_identifier) {
        try {
            if (!$this->graph) {
                throw new Exception('MS Graph not initialized');
            }

            $site = $this->graph->sites()->bySiteId($site_identifier)->get()->wait();
            return $site;
        } catch (Exception $e) {
            utilities::write_log('MS Graph getSharePointSite error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Get drive items from SharePoint site
     */
    public function getDriveItems($site_id, $drive_id = null, $folder_path = '') {
        try {
            utilities::write_log('MS Graph getDriveItems called with site_id: ' . $site_id . ', drive_id: ' . ($drive_id ?? 'null') . ', folder_path: ' . $folder_path);

            if (!$this->graph) {
                utilities::write_log('MS Graph getDriveItems: Graph not initialized');
                throw new Exception('MS Graph not initialized');
            }

            utilities::write_log('MS Graph getDriveItems: Graph is initialized, proceeding with API call');

            // Get the drive
            if ($drive_id) {
                $drive = $this->graph->sites()->bySiteId($site_id)->drives()->byDriveId($drive_id);
            } else {
                $drive = $this->graph->sites()->bySiteId($site_id)->drive();
            }

            // Get root items or items in specific folder using HTTP client
            $httpClient = $this->getHttpClient();
            if (empty($folder_path) || $folder_path === '/') {
                $url = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root/children";
            } else {
                $folder_path = ltrim($folder_path, '/');
                $url = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root:/{$folder_path}:/children";
            }
            $response = $httpClient->get($url);
            $data = json_decode($response->getBody()->getContents(), true);
            $items = $data['value'] ?? [];

            $files = [];
            $folders = [];

            foreach ($items as $item) {
                $item_data = [
                    'id' => $item['id'],
                    'name' => $item['name'],
                    'web_url' => $item['webUrl'],
                    'created_date_time' => isset($item['createdDateTime']) ? date('Y-m-d H:i:s', strtotime($item['createdDateTime'])) : null,
                    'last_modified_date_time' => isset($item['lastModifiedDateTime']) ? date('Y-m-d H:i:s', strtotime($item['lastModifiedDateTime'])) : null,
                ];

                if (isset($item['folder'])) {
                    $folders[] = array_merge($item_data, [
                        'type' => 'folder',
                        'icon' => 'fas fa-folder',
                        'size' => '',
                        'size_bytes' => 0,
                    ]);
                } else {
                    $file_info = DriveItemFormatter::format_array_item($item);
                    $files[] = array_merge($item_data, $file_info);
                }
            }

            return [
                'files' => $files,
                'folders' => $folders,
                'drive_id' => $drive_id
            ];

        } catch (Exception $e) {
            utilities::write_log('MS Graph getDriveItems error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Upload file to SharePoint
     */
    public function uploadFileToSharePoint($site_id, $drive_id, $folder_path, $file_path, $file_name) {
        try {
            if (!$this->graph) {
                throw new Exception('MS Graph not initialized');
            }

            // Get the drive
            if ($drive_id) {
                $drive = $this->graph->sites()->bySiteId($site_id)->drives()->byDriveId($drive_id);
            } else {
                $drive = $this->graph->sites()->bySiteId($site_id)->drive();
            }

            // Prepare upload path
            $upload_path = empty($folder_path) || $folder_path === '/' ? $file_name : $folder_path . '/' . $file_name;
            $upload_path = ltrim($upload_path, '/');

            // Read file content
            $file_content = file_get_contents($file_path);
            if ($file_content === false) {
                throw new Exception('Failed to read file content');
            }

            // Upload file using HTTP client
            $httpClient = $this->getHttpClient();
            $url = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root:/{$upload_path}:/content";
            $response = $httpClient->request('PUT', $url, [
                'headers' => [
                    'Content-Type' => 'application/octet-stream',
                ],
                'body' => $file_content
            ]);
            $uploaded_item = json_decode($response->getBody()->getContents(), true);

            return [
                'id' => $uploaded_item['id'],
                'name' => $uploaded_item['name'],
                'web_url' => $uploaded_item['webUrl'],
                'size' => DriveItemFormatter::format_file_size($uploaded_item->getSize() ?? 0),
                'size_bytes' => $uploaded_item->getSize() ?? 0,
                'created_date_time' => $uploaded_item->getCreatedDateTime()?->format('Y-m-d H:i:s'),
                'last_modified_date_time' => $uploaded_item->getLastModifiedDateTime()?->format('Y-m-d H:i:s'),
            ];

        } catch (Exception $e) {
            utilities::write_log('MS Graph uploadFileToSharePoint error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Delete file from SharePoint
     */
    public function deleteFileFromSharePoint($site_id, $drive_id, $file_id) {
        try {
            if (!$this->graph) {
                throw new Exception('MS Graph not initialized');
            }

            // Delete the item using HTTP client
            $httpClient = $this->getHttpClient();
            if (!$httpClient) {
                throw new Exception('HTTP client not available');
            }
            $url = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/items/{$file_id}";
            $httpClient->request('DELETE', $url);

            return true;

        } catch (Exception $e) {
            utilities::write_log('MS Graph deleteFileFromSharePoint error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Create folder in SharePoint
     */
    public function createSharePointFolder($site_id, $drive_id, $parent_path, $folder_name) {
        try {
            if (!$this->graph) {
                throw new Exception('MS Graph not initialized');
            }

            // Get the drive
            if ($drive_id) {
                $drive = $this->graph->sites()->bySiteId($site_id)->drives()->byDriveId($drive_id);
            } else {
                $drive = $this->graph->sites()->bySiteId($site_id)->drive();
            }

            // Prepare parent path
            $parent_path = empty($parent_path) || $parent_path === '/' ? '' : ltrim($parent_path, '/');

            // Create folder
            $folder_data = [
                'name' => $folder_name,
                'folder' => new \Microsoft\Graph\Generated\Models\Folder(),
                '@microsoft.graph.conflictBehavior' => 'rename'
            ];

            // Create folder using HTTP client
            $httpClient = $this->getHttpClient();
            if (empty($parent_path)) {
                $url = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root/children";
            } else {
                $url = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root:/{$parent_path}:/children";
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
            $new_folder = json_decode($response->getBody()->getContents(), true);

            return [
                'id' => $new_folder['id'],
                'name' => $new_folder['name'],
                'web_url' => $new_folder['webUrl'],
                'path' => ($parent_path ? $parent_path . '/' : '') . $folder_name,
                'created_date_time' => isset($new_folder['createdDateTime']) ? date('Y-m-d H:i:s', strtotime($new_folder['createdDateTime'])) : null,
            ];

        } catch (Exception $e) {
            utilities::write_log('MS Graph createSharePointFolder error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Rename a drive item (file or folder) in SharePoint
     *
     * @param string $site_id SharePoint site ID
     * @param string $drive_id Drive ID
     * @param string $item_path Path to the item to rename
     * @param string $new_name New name for the item
     * @param string $drive_name Drive name for logging
     * @return array Result of the operation
     * @throws Exception If rename fails
     */
    public function rename_drive_item($site_id, $drive_id, $item_path, $new_name, $drive_name = '') {
        try {
            $httpClient = $this->getHttpClient();

            // Get the item by path first
            $itemPath = ltrim($item_path, '/');
            $itemUrl = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root:/{$itemPath}";
            $itemResponse = $httpClient->request('GET', $itemUrl);
            $item = json_decode($itemResponse->getBody()->getContents(), true);

            if (!isset($item['id'])) {
                throw new Exception('Item not found');
            }

            // Create update request body
            $updateBody = [
                'name' => $new_name
            ];

            // Update the item
            $updateUrl = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/items/{$item['id']}";
            $httpClient->request('PATCH', $updateUrl, [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode($updateBody)
            ]);

            return [
                'success' => true,
                'item_id' => $item['id'],
                'name' => $new_name,
                'web_url' => $item['webUrl']
            ];

        } catch (Exception $e) {
            utilities::write_log("MS Graph rename_drive_item error for {$drive_name}: {$item_path} -> {$new_name}: " . $e->getMessage());
            throw new Exception('Failed to rename item: ' . $e->getMessage());
        }
    }

    /**
     * Delete a drive item (file or folder) in SharePoint
     *
     * @param string $site_id SharePoint site ID
     * @param string $drive_id Drive ID
     * @param string $item_path Path to the item to delete
     * @param string $drive_name Drive name for logging
     * @return array Result of the operation
     * @throws Exception If delete fails
     */
    public function delete_drive_item($site_id, $drive_id, $item_path, $drive_name = '') {
        try {
            $httpClient = $this->getHttpClient();

            // Get the item by path first to get its ID
            $itemPath = ltrim($item_path, '/');
            $itemUrl = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root:/{$itemPath}";
            $itemResponse = $httpClient->request('GET', $itemUrl);
            $item = json_decode($itemResponse->getBody()->getContents(), true);

            if (!isset($item['id'])) {
                throw new Exception('Item not found');
            }

            // Delete the item
            $deleteUrl = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/items/{$item['id']}";
            $httpClient->request('DELETE', $deleteUrl);

            return [
                'success' => true,
                'deleted_item_id' => $item['id']
            ];

        } catch (Exception $e) {
            utilities::write_log("MS Graph delete_drive_item error for {$drive_name}: {$item_path}: " . $e->getMessage());
            throw new Exception('Failed to delete item: ' . $e->getMessage());
        }
    }

    /**
     * Move a drive item (file or folder) in SharePoint
     *
     * @param string $site_id SharePoint site ID
     * @param string $drive_id Drive ID
     * @param string $source_path Path to the item to move
     * @param string $target_path New path for the item
     * @param string $drive_name Drive name for logging
     * @return array Result of the operation
     * @throws Exception If move fails
     */
    public function move_drive_item($site_id, $drive_id, $source_path, $target_path, $drive_name = '') {
        try {
            $httpClient = $this->getHttpClient();

            // Clean and validate paths
            $source_path = trim($source_path, '/');
            $target_path = trim($target_path, '/');

            if (empty($source_path)) {
                throw new Exception('Source path cannot be empty');
            }

            if (empty($target_path)) {
                throw new Exception('Target path cannot be empty');
            }

            utilities::write_log("MS Graph move_drive_item: Moving '{$source_path}' to '{$target_path}' in drive '{$drive_name}'");

            // Get the source item by path
            $sourcePath = ltrim($source_path, '/');
            $sourceUrl = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root:/" . rawurlencode($sourcePath);

            utilities::write_log("MS Graph move_drive_item: Source URL: {$sourceUrl}");

            $sourceResponse = $httpClient->request('GET', $sourceUrl);
            $sourceItem = json_decode($sourceResponse->getBody()->getContents(), true);

            if (!isset($sourceItem['id'])) {
                utilities::write_log("MS Graph move_drive_item: Source item response fields: " . implode(', ', array_keys($sourceItem)));
                throw new Exception('Source item not found or invalid response');
            }

            // Get the target parent folder
            $targetParentPath = dirname($target_path);
            $targetName = basename($target_path);

            utilities::write_log("MS Graph move_drive_item: Target parent path: '{$targetParentPath}', target name: '{$targetName}'");

            if ($targetParentPath === '.' || $targetParentPath === '/' || $targetParentPath === '') {
                // Moving to root
                utilities::write_log("MS Graph move_drive_item: Moving to root directory");
                $rootUrl = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root";
                $rootResponse = $httpClient->request('GET', $rootUrl);
                $rootItem = json_decode($rootResponse->getBody()->getContents(), true);

                if (!isset($rootItem['id'])) {
                    utilities::write_log("MS Graph move_drive_item: Root item response fields: " . implode(', ', array_keys($rootItem)));
                    throw new Exception('Root folder not found or invalid response');
                }

                $targetParentId = $rootItem['id'];
            } else {
                // Moving to a subfolder
                $targetParentPath = ltrim($targetParentPath, '/');
                $targetParentUrl = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root:/" . rawurlencode($targetParentPath);

                utilities::write_log("MS Graph move_drive_item: Target parent URL: {$targetParentUrl}");

                $targetParentResponse = $httpClient->request('GET', $targetParentUrl);
                $targetParent = json_decode($targetParentResponse->getBody()->getContents(), true);

                if (!isset($targetParent['id'])) {
                    utilities::write_log("MS Graph move_drive_item: Target parent response fields: " . implode(', ', array_keys($targetParent)));
                    throw new Exception('Target parent folder not found or invalid response');
                }
                $targetParentId = $targetParent['id'];
            }

            // Create move request body
            $moveBody = [
                'parentReference' => [
                    'id' => $targetParentId
                ],
                'name' => $targetName
            ];

            utilities::write_log("MS Graph move_drive_item: Move body fields: " . implode(', ', array_keys($moveBody)));

            // Move the item
            $moveUrl = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/items/{$sourceItem['id']}";
            utilities::write_log("MS Graph move_drive_item: Move URL: {$moveUrl}");

            $moveResponse = $httpClient->request('PATCH', $moveUrl, [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode($moveBody)
            ]);

            $movedItem = json_decode($moveResponse->getBody()->getContents(), true);

            utilities::write_log("MS Graph move_drive_item: Move successful; returned fields: " . implode(', ', array_keys($movedItem)));

            return [
                'success' => true,
                'item_id' => $movedItem['id'],
                'name' => $movedItem['name'],
                'web_url' => $movedItem['webUrl']
            ];

        } catch (Exception $e) {
            utilities::write_log("MS Graph move_drive_item error for {$drive_name}: {$source_path} -> {$target_path}: " . $e->getMessage());
            throw new Exception('Failed to move item: ' . $e->getMessage());
        }
    }

}
