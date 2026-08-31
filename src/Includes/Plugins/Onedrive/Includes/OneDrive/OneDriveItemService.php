<?php

namespace MSPress\Includes\Plugins\Onedrive\Includes\OneDrive;

use Exception;
use MSPress\Includes\Functions\Helpers\LoggerHelper as utilities;
use MSPress\Includes\MSGraph\GraphService;
use MSPress\Includes\MSGraph\Kiota\Models\DriveItem;
use MSPress\Includes\MSGraph\Kiota\Models\ItemReference;

final class OneDriveItemService {
    private OneDriveClientService $clients;

    public function __construct(private GraphService $graph, ?OneDriveTokenService $tokens = null) {
        $this->clients = new OneDriveClientService($tokens ?? new OneDriveTokenService($graph));
    }

    public function rename_onedrive_item(string $item_path, string $new_name): array {
        try {
            $item = $this->get_item($this->build_root_item_url($item_path));
            $drive_item = new DriveItem();
            $drive_item->setName($new_name);
            $updated_item = $this->clients->create_graph_client()
                ?->me()
                ->drive()
                ->items()
                ->byDriveItemId($item['id'])
                ->patch($drive_item)
                ->wait();

            return [
                'success' => true,
                'item_id' => $item['id'],
                'name' => $new_name,
                'web_url' => $updated_item?->getWebUrl() ?? ($item['webUrl'] ?? ''),
            ];
        } catch (Exception $error) {
            utilities::write_log("MS Graph rename_onedrive_item error for {$item_path}: " . $error->getMessage());
            throw new Exception('Failed to rename item: ' . $error->getMessage(), 0, $error);
        }
    }

    private function build_root_item_url(string $item_path): string {
        $path = trim($item_path, '/');
        $encoded_path = implode('/', array_map('rawurlencode', explode('/', $path)));

        return 'https://graph.microsoft.com/v1.0/me/drive/root:/' . $encoded_path;
    }

    public function move_onedrive_item(string $source_path, string $target_path): array {
        $source_path = trim($source_path, '/');
        $target_path = trim($target_path, '/');

        if ($source_path === '') {
            throw new Exception('Source path cannot be empty');
        }

        if ($target_path === '') {
            throw new Exception('Target path cannot be empty');
        }

        try {
            $source_item = $this->get_item($this->build_root_item_url($source_path));
            $target_parent_path = dirname($target_path);
            $target_name = basename($target_path);
            $target_parent_url = ($target_parent_path === '.' || $target_parent_path === '/')
                ? 'https://graph.microsoft.com/v1.0/me/drive/root'
                : $this->build_root_item_url($target_parent_path);
            $target_parent = $this->get_item($target_parent_url);
            $parent_reference = new ItemReference();
            $parent_reference->setId($target_parent['id']);

            $drive_item = new DriveItem();
            $drive_item->setParentReference($parent_reference);
            $drive_item->setName($target_name);
            $moved_item = $this->clients->create_graph_client()
                ?->me()
                ->drive()
                ->items()
                ->byDriveItemId($source_item['id'])
                ->patch($drive_item)
                ->wait();

            return [
                'success' => true,
                'item_id' => $moved_item?->getId() ?? $source_item['id'],
                'name' => $moved_item?->getName() ?? $target_name,
                'web_url' => $moved_item?->getWebUrl() ?? ($source_item['webUrl'] ?? ''),
            ];
        } catch (Exception $error) {
            utilities::write_log("MS Graph move_onedrive_item error for {$source_path} -> {$target_path}: " . $error->getMessage());
            throw new Exception('Failed to move item: ' . $error->getMessage(), 0, $error);
        }
    }

    private function get_item(string $url): array {
        $item = $this->clients->create_graph_client()
            ?->me()
            ->drive()
            ->root()
            ->withUrl($url)
            ->get()
            ->wait();

        if (!$item || !$item->getId()) {
            throw new Exception('Item not found or invalid response');
        }

        return [
            'id' => $item->getId(),
            'name' => $item->getName(),
            'webUrl' => $item->getWebUrl(),
        ];
    }

    private function get_http_client(): \GuzzleHttp\Client {
        $http_client = $this->clients->create_http_client();
        if (!$http_client) {
            throw new Exception('Delegated OneDrive connection is not configured. Authorize the administrator account first.');
        }

        return $http_client;
    }
}