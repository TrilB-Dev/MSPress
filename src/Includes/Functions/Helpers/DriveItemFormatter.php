<?php

namespace MSPress\Includes\Functions\Helpers;

final class DriveItemFormatter {
    public static function format_sdk_item($drive_item): array {
        $file_name = $drive_item->getName();
        $file_size = $drive_item->getSize() ?? 0;
        $file_info = self::get_file_type_info($file_name);

        return [
            'type' => $file_info['type'],
            'icon' => $file_info['icon'],
            'size' => self::format_file_size($file_size),
            'size_bytes' => $file_size,
            'url' => $drive_item->getWebUrl(),
            'download_url' => $drive_item->getAdditionalData()['@microsoft.graph.downloadUrl'] ?? $drive_item->getWebUrl(),
        ];
    }

    public static function format_array_item(array $item): array {
        $file_name = $item['name'];
        $file_size = $item['size'] ?? 0;
        $file_info = self::get_file_type_info($file_name);
        $version = self::extract_file_version($item);
        $title = self::extract_file_title($item);

        return [
            'type' => $file_info['type'],
            'icon' => $file_info['icon'],
            'size' => self::format_file_size($file_size),
            'size_bytes' => $file_size,
            'url' => $item['webUrl'],
            'download_url' => $item['@microsoft.graph.downloadUrl'] ?? $item['webUrl'],
            'version' => $version,
            'file_version' => $version,
            'title' => $title ?: $file_name,
        ];
    }

    private static function extract_file_version(array $item) {
        $fields = $item['listItem']['fields'] ?? [];
        $fieldVersion = $fields['FileVersion'] ?? $fields['file_version'] ?? $fields['Version'] ?? null;

        return $fieldVersion ?: ($item['description'] ?? null);
    }

    private static function extract_file_title(array $item) {
        $fields = $item['listItem']['fields'] ?? [];
        $title = $fields['Title'] ?? $fields['title'] ?? null;

        return $title ?: ($fields['FileDescription'] ?? null);
    }

    private static function get_file_type_info(string $filename): array {
        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $type_map = [
            'zip' => ['type' => 'zip', 'icon' => 'fas fa-file-archive'],
            'rar' => ['type' => 'rar', 'icon' => 'fas fa-file-archive'],
            '7z' => ['type' => '7z', 'icon' => 'fas fa-file-archive'],
            'tar' => ['type' => 'tar', 'icon' => 'fas fa-file-archive'],
            'gz' => ['type' => 'gz', 'icon' => 'fas fa-file-archive'],
            'exe' => ['type' => 'exe', 'icon' => 'fas fa-cogs'],
            'msi' => ['type' => 'msi', 'icon' => 'fas fa-cogs'],
            'dmg' => ['type' => 'dmg', 'icon' => 'fas fa-cogs'],
            'pkg' => ['type' => 'pkg', 'icon' => 'fas fa-cogs'],
            'deb' => ['type' => 'deb', 'icon' => 'fas fa-cogs'],
            'pdf' => ['type' => 'pdf', 'icon' => 'fas fa-file-pdf'],
            'doc' => ['type' => 'doc', 'icon' => 'fas fa-file-word'],
            'docx' => ['type' => 'docx', 'icon' => 'fas fa-file-word'],
            'txt' => ['type' => 'txt', 'icon' => 'fas fa-file-alt'],
            'jpg' => ['type' => 'jpg', 'icon' => 'fas fa-file-image'],
            'jpeg' => ['type' => 'jpeg', 'icon' => 'fas fa-file-image'],
            'png' => ['type' => 'png', 'icon' => 'fas fa-file-image'],
            'gif' => ['type' => 'gif', 'icon' => 'fas fa-file-image'],
            'bmp' => ['type' => 'bmp', 'icon' => 'fas fa-file-image'],
        ];

        return $type_map[$extension] ?? ['type' => 'file', 'icon' => 'fas fa-file'];
    }

    public static function format_file_size($bytes): string {
        if ($bytes == 0) {
            return '0 B';
        }

        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $i = (int) floor(log($bytes, 1024));

        return round($bytes / pow(1024, $i), 1) . ' ' . $units[$i];
    }
}
