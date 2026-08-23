<?php

namespace MSPress\Includes\Plugins\Onedrive\Includes\OneDrive;

use Exception;
use MSPress\Includes\Functions\Helpers\LoggerHelper as utilities;
use MSPress\Includes\MSGraph\GraphService;

final class OneDriveItemService {
    private OneDriveClientService $clients;

    public function __construct(private GraphService $graph, ?OneDriveTokenService $tokens = null) {
        $this->clients = new OneDriveClientService($tokens ?? new OneDriveTokenService($graph));
    }

    public function rename_onedrive_item(string $item_path, string $new_name): array {
        try {
            $item = $this->get_item("https://graph.microsoft.com/v1.0/me/drive/root:/" . ltrim($item_path, '/'));
            $this->request_item_update("https://graph.microsoft.com/v1.0/me/drive/items/{$item['id']}", ['name' => $new_name]);

            return [
                'success' => true,
                'item_id' => $item['id'],
                'name' => $new_name,
                'web_url' => $item['webUrl'] ?? '',
            ];
        } catch (Exception $error) {
            utilities::write_log("MS Graph rename_onedrive_item error for {$item_path}: " . $error->getMessage());
            throw new Exception('Failed to rename item: ' . $error->getMessage(), 0, $error);
        }
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
            $source_item = $this->get_item('https://graph.microsoft.com/v1.0/me/drive/root:/' . rawurlencode($source_path));
            $target_parent_path = dirname($target_path);
            $target_name = basename($target_path);
            $target_parent_url = ($target_parent_path === '.' || $target_parent_path === '/')
                ? 'https://graph.microsoft.com/v1.0/me/drive/root'
                : 'https://graph.microsoft.com/v1.0/me/drive/root:/' . rawurlencode(ltrim($target_parent_path, '/'));
            $target_parent = $this->get_item($target_parent_url);
            $moved_item = $this->request_item_update(
                "https://graph.microsoft.com/v1.0/me/drive/items/{$source_item['id']}",
                [
                    'parentReference' => ['id' => $target_parent['id']],
                    'name' => $target_name,
                ]
            );

            return [
                'success' => true,
                'item_id' => $moved_item['id'] ?? $source_item['id'],
                'name' => $moved_item['name'] ?? $target_name,
                'web_url' => $moved_item['webUrl'] ?? ($source_item['webUrl'] ?? ''),
            ];
        } catch (Exception $error) {
            utilities::write_log("MS Graph move_onedrive_item error for {$source_path} -> {$target_path}: " . $error->getMessage());
            throw new Exception('Failed to move item: ' . $error->getMessage(), 0, $error);
        }
    }

    private function get_item(string $url): array {
        $response = $this->get_http_client()->request('GET', $url);
        $item = json_decode($response->getBody()->getContents(), true);

        if (!is_array($item) || empty($item['id'])) {
            throw new Exception('Item not found or invalid response');
        }

        return $item;
    }

    private function request_item_update(string $url, array $body): array {
        $response = $this->get_http_client()->request('PATCH', $url, [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode($body),
        ]);
        $response_body = json_decode($response->getBody()->getContents(), true);

        return is_array($response_body) ? $response_body : [];
    }

    private function get_http_client(): \GuzzleHttp\Client {
        $http_client = $this->clients->create_http_client();
        if (!$http_client) {
            throw new Exception('Delegated OneDrive connection is not configured. Authorize the administrator account first.');
        }

        return $http_client;
    }
}