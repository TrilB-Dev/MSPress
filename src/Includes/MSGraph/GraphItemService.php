<?php
/** Typed OneDrive item operations. */
namespace MSPress\Includes\MSGraph;

use Exception;
use MSPress\Includes\Functions\Helpers\LoggerHelper as utilities;
use MSPress\Includes\MSGraph\Kiota\Models\DriveItem;
use MSPress\Includes\MSGraph\Kiota\Models\ItemReference;

/**
 * Provides typed OneDrive item mutations for the storage facade.
 */
final class GraphItemService {
    public function __construct(private GraphService $graph) {
    }

    /**
     * Rename an item addressed by its OneDrive path.
     *
     * @param string $item_path Existing item path.
     * @param string $new_name New item name.
     * @return array<string, mixed>
     * @throws Exception When the item cannot be resolved or updated.
     */
    public function rename_onedrive_item(string $item_path, string $new_name): array {
        try {
            $item_path = $this->normalize_path($item_path);
            $new_name = trim($new_name);

            if ($item_path === '' || $new_name === '') {
                throw new Exception('Item path and new name are required.');
            }

            $item = $this->get_item_by_path($item_path);
            $item_id = $item->getId();

            if ($item_id === null || $item_id === '') {
                throw new Exception('The item does not have an ID.');
            }

            $body = new DriveItem();
            $body->setName($new_name);
            $updated = $this->get_onedrive_client()
                ->drives()
                ->byDriveId('me')
                ->items()
                ->byDriveItemId($item_id)
                ->patch($body)
                ->wait();

            return $this->result($updated ?? $item, $item_id, $new_name);
        } catch (Exception $e) {
            utilities::write_log('MSGraph rename_onedrive_item error: ' . $e->getMessage());
            throw new Exception('Failed to rename item: ' . $e->getMessage(), 0, $e);
        }
    }

    /**
     * Move an item addressed by its source path to a destination path.
     *
     * @param string $source_path Existing item path.
     * @param string $target_path Destination path including the new name.
     * @return array<string, mixed>
     * @throws Exception When the item cannot be resolved or updated.
     */
    public function move_onedrive_item(string $source_path, string $target_path): array {
        try {
            $source_path = $this->normalize_path($source_path);
            $target_path = $this->normalize_path($target_path);

            if ($source_path === '' || $target_path === '') {
                throw new Exception('Source path and target path are required.');
            }

            $source = $this->get_item_by_path($source_path);
            $item_id = $source->getId();

            if ($item_id === null || $item_id === '') {
                throw new Exception('The item does not have an ID.');
            }

            $target_parts = explode('/', $target_path);
            $new_name = array_pop($target_parts);
            $parent_path = implode('/', $target_parts);

            if ($new_name === '') {
                throw new Exception('Target path must include a name.');
            }

            $parent = $parent_path === ''
                ? $this->get_item_by_path('')
                : $this->get_item_by_path($parent_path);
            $parent_id = $parent->getId();

            if ($parent_id === null || $parent_id === '') {
                throw new Exception('The target parent does not have an ID.');
            }

            $parent_reference = new ItemReference();
            $parent_reference->setId($parent_id);

            $body = new DriveItem();
            $body->setName($new_name);
            $body->setParentReference($parent_reference);
            $updated = $this->get_onedrive_client()
                ->drives()
                ->byDriveId('me')
                ->items()
                ->byDriveItemId($item_id)
                ->patch($body)
                ->wait();

            return $this->result($updated ?? $source, $item_id, $new_name);
        } catch (Exception $e) {
            utilities::write_log('MSGraph move_onedrive_item error: ' . $e->getMessage());
            throw new Exception('Failed to move item: ' . $e->getMessage(), 0, $e);
        }
    }

    private function get_item_by_path(string $path): DriveItem {
        $client = $this->get_onedrive_client();

        if ($client === null) {
            throw new Exception('OneDrive client is not initialized.');
        }

        $url = 'https://graph.microsoft.com/v1.0/drives/me/root:';
        if ($path !== '') {
            $url .= '/' . $this->encode_path($path);
        }
        $url .= ':';

        $item = $client->drives()->byDriveId('me')->root()->withUrl($url)->get()->wait();

        if (!$item instanceof DriveItem) {
            throw new Exception('The requested item was not found.');
        }

        return $item;
    }

    private function get_onedrive_client(): ?\MSPress\Includes\Plugins\Onedrive\Includes\Kiota\OneDrive {
        return $this->graph->get_onedrive_client();
    }

    private function normalize_path(string $path): string {
        return trim(trim($path), '/');
    }

    private function encode_path(string $path): string {
        return implode('/', array_map('rawurlencode', explode('/', $path)));
    }

    /**
     * @return array<string, mixed>
     */
    private function result(DriveItem $item, string $item_id, string $fallback_name): array {
        return [
            'success' => true,
            'item_id' => $item->getId() ?? $item_id,
            'name' => $item->getName() ?? $fallback_name,
            'web_url' => $item->getWebUrl(),
        ];
    }
}