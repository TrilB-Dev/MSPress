<?php
/**
 * GraphStorageService class for the MSPress plugin.
 *
 * @package MSPress
 */
namespace MSPress\Includes\MSGraph;

use Exception;
use MSPress\Includes\Functions\Helpers\LoggerHelper as utilities;

/**
 * Storage-focused Graph API boundary.
 *
 * This adapter owns the public site, drive, upload, and item-operation
 * contract while callers migrate to a narrower service.
 */
final class GraphStorageService {
    /**
     * The singleton instance of the GraphStorageService class.
     *
     * @var ?GraphStorageService
     */
    private static ?self $instance = null;
    /**
     * The GraphService instance.
     *
     * @var GraphService
     */
    private GraphItemService $items;
    /**
     * Private constructor to prevent direct instantiation.
     *
     * @param GraphService $graph The GraphService instance to use for API calls.
     */
    public function __construct(private GraphService $graph) {
        $this->items = new GraphItemService($graph);
    }

    public static function get_instance(): self {
        if (self::$instance === null) {
            self::$instance = new self(GraphService::get_instance());
        }

        return self::$instance;
    }

    public function test_drive_access($site_id) {
        return $this->graph->test_drive_access($site_id);
    }

    public function get_sharepoint_site($site_identifier) {
        return $this->graph->get_sharepoint_site($site_identifier);
    }

    public function getSharePointSite($site_identifier) {
        return $this->graph->getSharePointSite($site_identifier);
    }

    public function get_drive_items($site_id, $drive_id = null, $folder_path = '', $drive_name = null) {
        return $this->graph->get_drive_items($site_id, $drive_id, $folder_path, $drive_name);
    }

    public function getDriveItems($site_id, $drive_id = null, $folder_path = '') {
        return $this->graph->getDriveItems($site_id, $drive_id, $folder_path);
    }

    public function upload_file($site_id, $drive_id, $folder_path, $file_path, $file_name, $drive_name = null, $metadata = []) {
        return $this->graph->upload_file($site_id, $drive_id, $folder_path, $file_path, $file_name, $drive_name, $metadata);
    }

    public function uploadFileToSharePoint($site_id, $drive_id, $folder_path, $file_path, $file_name) {
        return $this->graph->uploadFileToSharePoint($site_id, $drive_id, $folder_path, $file_path, $file_name);
    }

    public function delete_file($site_id, $drive_id, $item_id, $drive_name = null) {
        return $this->graph->delete_file($site_id, $drive_id, $item_id, $drive_name);
    }

    public function deleteFileFromSharePoint($site_id, $drive_id, $file_id) {
        return $this->graph->deleteFileFromSharePoint($site_id, $drive_id, $file_id);
    }

    public function create_folder($site_id, $drive_id, $parent_path, $folder_name, $drive_name = null) {
        return $this->graph->create_folder($site_id, $drive_id, $parent_path, $folder_name, $drive_name);
    }

    public function createSharePointFolder($site_id, $drive_id, $parent_path, $folder_name) {
        return $this->graph->createSharePointFolder($site_id, $drive_id, $parent_path, $folder_name);
    }

    public function list_sharepoint_sites() {
        $graph = $this->graph->get_graph();
        if (!$graph) {
            throw new Exception('Graph client not initialized');
        }
        $sharepoint = $this->graph->get_sharepoint_client();

        try {
            $site_list = [];

            try {
                $sites_response = $sharepoint->sites()->get()->wait();
                $sites = $sites_response->getValue();
            } catch (Exception $siteException) {
                utilities::write_log('MS Graph list_sharepoint_sites SDK retrieval failed: ' . $siteException->getMessage());
                $sites = [];
            }

            if (empty($sites)) {
                utilities::write_log('MS Graph list_sharepoint_sites falling back to direct HTTP site search');
                $httpClient = $this->graph->getHttpClient();
                if (!$httpClient) {
                    throw new Exception('Unable to create authenticated Graph HTTP client for site listing.');
                }

                try {
                    $response = $httpClient->request('GET', 'sites?search=*', [
                        'headers' => ['Accept' => 'application/json']
                    ]);
                } catch (\GuzzleHttp\Exception\ClientException $clientException) {
                    $statusCode = $clientException->getResponse() ? $clientException->getResponse()->getStatusCode() : null;
                    $body = $clientException->getResponse() ? (string) $clientException->getResponse()->getBody() : '';
                    utilities::write_log('MS Graph list_sharepoint_sites fallback HTTP error: ' . $statusCode);

                    if ($statusCode === 403 || stripos($body, 'accessDenied') !== false) {
                        throw new Exception('Access denied listing SharePoint sites. Confirm the app has Sites.Read.All application permission and admin consent.');
                    }

                    throw new Exception('Unable to list SharePoint sites via Graph HTTP fallback: ' . $clientException->getMessage());
                }

                $siteBody = json_decode($response->getBody()->getContents(), true);
                if (empty($siteBody['value']) || !is_array($siteBody['value'])) {
                    utilities::write_log('MS Graph list_sharepoint_sites fallback response invalid; fields: ' . (is_array($siteBody) ? implode(', ', array_keys($siteBody)) : 'invalid JSON'));
                    throw new Exception('No SharePoint sites were returned by Graph.');
                }

                $sites = $siteBody['value'];
            }

            foreach ($sites as $site) {
                if (is_object($site)) {
                    $site_id = method_exists($site, 'getId') ? $site->getId() : null;
                    $site_name = method_exists($site, 'getDisplayName') ? $site->getDisplayName() : null;
                    if (empty($site_name) && method_exists($site, 'getName')) {
                        $site_name = $site->getName();
                    }
                    $site_url = method_exists($site, 'getWebUrl') ? $site->getWebUrl() : null;
                    $site_description = method_exists($site, 'getDescription') ? $site->getDescription() : null;
                    $site_collection = method_exists($site, 'getSiteCollection') ? $site->getSiteCollection() : null;
                    $hostname = '';
                    if (is_object($site_collection) && method_exists($site_collection, 'getHostname')) {
                        $hostname = $site_collection->getHostname();
                    } elseif (is_array($site_collection)) {
                        $hostname = $site_collection['hostname'] ?? '';
                    }
                } elseif (is_array($site)) {
                    $site_id = $site['id'] ?? '';
                    $site_name = $site['displayName'] ?? $site['name'] ?? '';
                    $site_url = $site['webUrl'] ?? '';
                    $site_description = $site['description'] ?? '';
                    $hostname = $site['siteCollection']['hostname'] ?? '';
                } else {
                    continue;
                }

                $site_list[] = [
                    'id' => $site_id ?? '',
                    'name' => $site_name ?? '',
                    'url' => $site_url ?? '',
                    'description' => $site_description ?? '',
                    'site_collection' => ['hostname' => $hostname]
                ];
            }

            return $site_list;
        } catch (Exception $e) {
            utilities::write_log('MS Graph list_sharepoint_sites error: ' . $e->getMessage());
            throw new Exception('Unable to list SharePoint sites. Please check your Sites.Read.All permission: ' . $e->getMessage());
        }
    }

    public function list_site_drives($site_id) {
        $graph = $this->graph->get_graph();
        if (!$graph) {
            throw new Exception('Graph client not initialized');
        }
        $sharepoint = $this->graph->get_sharepoint_client();

        try {
            $drive_list = [];

            try {
                $drives_response = $sharepoint->sites()->bySiteId($site_id)->drives()->get()->wait();
                $drives = $drives_response->getValue();
            } catch (Exception $driveException) {
                utilities::write_log('MS Graph list_site_drives drive retrieval failed: ' . $driveException->getMessage());
                $drives = [];
            }

            if (empty($drives)) {
                utilities::write_log('MS Graph list_site_drives falling back to lists() for site ' . $site_id);
                $lists_response = $sharepoint->sites()->bySiteId($site_id)->lists()->get()->wait();
                $drives = $lists_response->getValue();

                foreach ($drives as $list) {
                    $drive_list[] = [
                        'id' => $list->getId(),
                        'name' => $list->getName(),
                        'description' => $list->getDescription() ?? '',
                        'drive_type' => 'list',
                        'web_url' => $list->getWebUrl() ?? '',
                        'created_date_time' => $list->getCreatedDateTime()?->format('Y-m-d H:i:s'),
                        'last_modified_date_time' => $list->getLastModifiedDateTime()?->format('Y-m-d H:i:s'),
                    ];
                }

                return $drive_list;
            }

            foreach ($drives as $drive) {
                $drive_list[] = [
                    'id' => $drive->getId(),
                    'name' => $drive->getName(),
                    'description' => $drive->getDescription() ?? '',
                    'drive_type' => $drive->getDriveType(),
                    'web_url' => $drive->getWebUrl(),
                    'created_date_time' => $drive->getCreatedDateTime()?->format('Y-m-d H:i:s'),
                    'last_modified_date_time' => $drive->getLastModifiedDateTime()?->format('Y-m-d H:i:s'),
                ];
            }

            return $drive_list;
        } catch (Exception $e) {
            utilities::write_log('MS Graph list_site_drives error: ' . $e->getMessage());
            throw new Exception('Unable to list drives for this SharePoint site. Please check your Files.ReadWrite.All permission: ' . $e->getMessage());
        }
    }

    public function rename_drive_item($site_id, $drive_id, $item_path, $new_name, $drive_name = '') {
        return $this->graph->rename_drive_item($site_id, $drive_id, $item_path, $new_name, $drive_name);
    }

    public function delete_drive_item($site_id, $drive_id, $item_path, $drive_name = '') {
        return $this->graph->delete_drive_item($site_id, $drive_id, $item_path, $drive_name);
    }

    public function move_drive_item($site_id, $drive_id, $source_path, $target_path, $drive_name = '') {
        return $this->graph->move_drive_item($site_id, $drive_id, $source_path, $target_path, $drive_name);
    }

    public function rename_onedrive_item($item_path, $new_name) {
        return $this->items->rename_onedrive_item($item_path, $new_name);
    }

    public function move_onedrive_item($source_path, $target_path) {
        return $this->items->move_onedrive_item($source_path, $target_path);
    }
}
