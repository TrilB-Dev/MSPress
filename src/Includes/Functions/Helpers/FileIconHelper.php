<?php
/**
 * File icon rendering helpers.
 *
 * @package MSPress
 */

namespace MSPress\Includes\Functions\Helpers;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class FileIconHelper {
    public static function render( string $extension = '', array $attributes = [] ): string {
        $is_empty_folder = '' === $extension;
        $defaults = [
            'class' => 'mspress-file-icon',
            'width' => $is_empty_folder ? '48' : '24',
            'height' => $is_empty_folder ? '48' : '24',
            'role' => 'img',
            'aria-label' => $is_empty_folder ? 'Folder icon' : $extension . ' file icon',
        ];
        $attributes = array_merge( $defaults, $attributes );
        $label = $attributes['aria-label'];
        unset( $attributes['src'], $attributes['alt'], $attributes['aria-label'] );

        $attribute_html = '';
        foreach ( $attributes as $key => $value ) {
            $attribute_html .= ' ' . esc_attr( (string) $key ) . '="' . esc_attr( (string) $value ) . '"';
        }

        if ( $is_empty_folder ) {
            $path = 'M3 7.5h6l2 2h10.5v10.75A1.75 1.75 0 0 1 19.75 22H4.25A1.75 1.75 0 0 1 2.5 20.25v-11A1.75 1.75 0 0 1 4.25 7.5Z';
            if ( false !== strpos( (string) ( $attributes['class'] ?? '' ), 'mb-3' ) ) {
                $path = 'M3 7.5h6l2 2h10.5v10.75A1.75 1.75 0 0 1 19.75 22H4.25A1.75 1.75 0 0 1 2.5 20.25v-11A1.75 1.75 0 0 1 4.25 7.5Z';
            }

            return '<svg' . $attribute_html . ' viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="' . esc_attr( $label ) . '"><path d="' . $path . '" fill="currentColor"/><path d="M3 11h18" stroke="white" stroke-width="1.5" opacity=".8"/></svg>';
        }

        return '<svg' . $attribute_html . ' viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="' . esc_attr( $label ) . '"><path d="M5 2.75h9l5 5v13.5H5V2.75Z" fill="currentColor" opacity=".9"/><path d="M14 2.75v5h5" stroke="white" stroke-width="1.5" opacity=".8"/><path d="M8 13h8M8 16h6" stroke="white" stroke-width="1.5" opacity=".8"/></svg>';
    }
}
