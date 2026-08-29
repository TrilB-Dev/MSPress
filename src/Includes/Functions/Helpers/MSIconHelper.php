<?php

namespace MSPress\Includes\Functions\Helpers;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class MSIconHelper {
    /**
     * Get a Microsoft product or service icon.
     *
     * @param string $name The icon name or friendly name.
     * @param string $filetype The file type to use: svg or png.
     * @return string The full URL of the icon, or an empty string when it is not found.
     */
    public static function get_icon( string $name, string $filetype = 'svg' ): string {
        $filetype = strtolower( trim( $filetype ) );
        if ( ! in_array( $filetype, [ 'svg', 'png' ], true ) ) {
            return '';
        }

        $lookup = self::normalize_name( $name );
        foreach ( self::icons() as $slug => $icon ) {
            if ( $lookup === self::normalize_name( $slug ) || $lookup === self::normalize_name( $icon['name'] ) ) {
                $file = pathinfo( $icon['file'], PATHINFO_FILENAME ) . '.' . $filetype;
                $location = trim( $icon['location'], '/' );
                $location = ( '' !== $location ? $location . '/' : '' ) . $file;
                return MSPRESS_ASSETS_URL . '/images/microsoft-icons/' . $location;
            }
        }

        return '';
    }

    /**
     * Get the Microsoft product and service icon catalog.
     *
     * @return array<string, array{name: string, file: string, location: string}> The icon registry.
     */
    private static function icons(): array {
        return [
            'copilot' => [ 'name' => 'Copilot', 'file' => 'copilot', 'location' => 'copilot' ],
            'copilot-365' => [ 'name' => 'Microsoft 365 Copilot', 'file' => 'copilot-365', 'location' => 'copilot' ],
            'business-central' => [ 'name' => 'Dynamics 365 Business Central', 'file' => 'business-central', 'location' => 'dynamics-365' ],
            'commerce' => [ 'name' => 'Dynamics 365 Commerce', 'file' => 'commerce', 'location' => 'dynamics-365' ],
            'contact-center' => [ 'name' => 'Dynamics 365 Contact Center', 'file' => 'contact-center', 'location' => 'dynamics-365' ],
            'customer-insights' => [ 'name' => 'Dynamics 365 Customer Insights', 'file' => 'customer-insights', 'location' => 'dynamics-365' ],
            'customer-service' => [ 'name' => 'Dynamics 365 Customer Service', 'file' => 'customer-service', 'location' => 'dynamics-365' ],
            'customer-voice' => [ 'name' => 'Dynamics 365 Customer Voice', 'file' => 'customer-voice', 'location' => 'dynamics-365' ],
            'dynamics-365' => [ 'name' => 'Dynamics 365', 'file' => 'dynamics-365', 'location' => 'dynamics-365' ],
            'field-service' => [ 'name' => 'Dynamics 365 Field Service', 'file' => 'field-service', 'location' => 'dynamics-365' ],
            'finance' => [ 'name' => 'Dynamics 365 Finance', 'file' => 'finance', 'location' => 'dynamics-365' ],
            'finance-operations' => [ 'name' => 'Dynamics 365 Finance and Operations', 'file' => 'finance-operations', 'location' => 'dynamics-365' ],
            'human-resources' => [ 'name' => 'Dynamics 365 Human Resources', 'file' => 'human-resources', 'location' => 'dynamics-365' ],
            'intelligent-order-management' => [ 'name' => 'Dynamics 365 Intelligent Order Management', 'file' => 'intelligent-order-management', 'location' => 'dynamics-365' ],
            'project-operations' => [ 'name' => 'Dynamics 365 Project Operations', 'file' => 'project-operations', 'location' => 'dynamics-365' ],
            'sales' => [ 'name' => 'Dynamics 365 Sales', 'file' => 'sales', 'location' => 'dynamics-365' ],
            'sales-insights' => [ 'name' => 'Dynamics 365 Sales Insights', 'file' => 'sales-insights', 'location' => 'dynamics-365' ],
            'supply-chain' => [ 'name' => 'Dynamics 365 Supply Chain Management', 'file' => 'supply-chain', 'location' => 'dynamics-365' ],
            'entra' => [ 'name' => 'Microsoft Entra', 'file' => 'entra', 'location' => 'entra' ],
            'entra-id' => [ 'name' => 'Microsoft Entra ID', 'file' => 'entra-id', 'location' => 'entra' ],
            'entra-id-governance' => [ 'name' => 'Microsoft Entra ID Governance', 'file' => 'entra-id-governance', 'location' => 'entra' ],
            'entra-verified-id' => [ 'name' => 'Microsoft Entra Verified ID', 'file' => 'entra-verified-id', 'location' => 'entra' ],
            'exchange' => [ 'name' => 'Microsoft Exchange', 'file' => 'microsoft-exchange', 'location' => 'microsoft-365' ],
            'fabric' => [ 'name' => 'Microsoft Fabric', 'file' => 'fabric', 'location' => 'fabric' ],
            'access' => [ 'name' => 'Microsoft Access', 'file' => 'access', 'location' => 'microsoft-365' ],
            'bookings' => [ 'name' => 'Microsoft Bookings', 'file' => 'bookings', 'location' => 'microsoft-365' ],
            'calendar' => [ 'name' => 'Microsoft Calendar', 'file' => 'calendar', 'location' => 'microsoft-365' ],
            'clipchamp' => [ 'name' => 'Microsoft Clipchamp', 'file' => 'clipchamp', 'location' => 'microsoft-365' ],
            'delve' => [ 'name' => 'Microsoft Delve', 'file' => 'delve', 'location' => 'microsoft-365' ],
            'excel' => [ 'name' => 'Microsoft Excel', 'file' => 'excel', 'location' => 'microsoft-365' ],
            'forms' => [ 'name' => 'Microsoft Forms', 'file' => 'forms', 'location' => 'microsoft-365' ],
            'lists' => [ 'name' => 'Microsoft Lists', 'file' => 'lists', 'location' => 'microsoft-365' ],
            'loop' => [ 'name' => 'Microsoft Loop', 'file' => 'loop', 'location' => 'microsoft-365' ],
            'microsoft-365' => [ 'name' => 'Microsoft 365', 'file' => 'microsoft-365', 'location' => 'microsoft-365' ],
            'onedrive' => [ 'name' => 'Microsoft OneDrive', 'file' => 'onedrive', 'location' => 'microsoft-365' ],
            'onenote' => [ 'name' => 'Microsoft OneNote', 'file' => 'onenote', 'location' => 'microsoft-365' ],
            'outlook' => [ 'name' => 'Microsoft Outlook', 'file' => 'outlook', 'location' => 'microsoft-365' ],
            'places' => [ 'name' => 'Microsoft Places', 'file' => 'places', 'location' => 'microsoft-365' ],
            'planner' => [ 'name' => 'Microsoft Planner', 'file' => 'planner', 'location' => 'microsoft-365' ],
            'powerpoint' => [ 'name' => 'Microsoft PowerPoint', 'file' => 'powerpoint', 'location' => 'microsoft-365' ],
            'project' => [ 'name' => 'Microsoft Project', 'file' => 'project', 'location' => 'microsoft-365' ],
            'publisher' => [ 'name' => 'Microsoft Publisher', 'file' => 'publisher', 'location' => 'microsoft-365' ],
            'sharepoint' => [ 'name' => 'Microsoft SharePoint', 'file' => 'sharepoint', 'location' => 'microsoft-365' ],
            'stream' => [ 'name' => 'Microsoft Stream', 'file' => 'stream', 'location' => 'microsoft-365' ],
            'sway' => [ 'name' => 'Microsoft Sway', 'file' => 'sway', 'location' => 'microsoft-365' ],
            'teams' => [ 'name' => 'Microsoft Teams', 'file' => 'teams', 'location' => 'microsoft-365' ],
            'todo' => [ 'name' => 'Microsoft To Do', 'file' => 'todo', 'location' => 'microsoft-365' ],
            'visio' => [ 'name' => 'Microsoft Visio', 'file' => 'visio', 'location' => 'microsoft-365' ],
            'whiteboard' => [ 'name' => 'Microsoft Whiteboard', 'file' => 'whiteboard', 'location' => 'microsoft-365' ],
            'word' => [ 'name' => 'Microsoft Word', 'file' => 'word', 'location' => 'microsoft-365' ],
            'admin' => [ 'name' => 'Microsoft 365 Admin', 'file' => 'admin', 'location' => 'other' ],
            'bing' => [ 'name' => 'Microsoft Bing', 'file' => 'bing', 'location' => 'other' ],
            'designer' => [ 'name' => 'Microsoft Designer', 'file' => 'designer', 'location' => 'other' ],
            'edge' => [ 'name' => 'Microsoft Edge', 'file' => 'edge', 'location' => 'other' ],
            'family-safety' => [ 'name' => 'Microsoft Family Safety', 'file' => 'family-safety', 'location' => 'other' ],
            'foundry' => [ 'name' => 'Microsoft Foundry', 'file' => 'foundry', 'location' => 'other' ],
            'office' => [ 'name' => 'Microsoft Office', 'file' => 'office', 'location' => 'other' ],
            'agent-365' => [ 'name' => 'Power Platform AI Agent', 'file' => 'agent-365', 'location' => 'power-platform' ],
            'agent-builder' => [ 'name' => 'Power Platform Agent Builder', 'file' => 'agent-builder', 'location' => 'power-platform' ],
            'ai-builder' => [ 'name' => 'AI Builder', 'file' => 'ai-builder', 'location' => 'power-platform' ],
            'connectors' => [ 'name' => 'Power Platform Connectors', 'file' => 'connectors', 'location' => 'power-platform' ],
            'copilot-studio' => [ 'name' => 'Microsoft Copilot Studio', 'file' => 'copilot-studio', 'location' => 'power-platform' ],
            'dataverse' => [ 'name' => 'Microsoft Dataverse', 'file' => 'dataverse', 'location' => 'power-platform' ],
            'power-apps' => [ 'name' => 'Power Apps', 'file' => 'power-apps', 'location' => 'power-platform' ],
            'power-automate' => [ 'name' => 'Power Automate', 'file' => 'power-automate', 'location' => 'power-platform' ],
            'power-bi' => [ 'name' => 'Power BI', 'file' => 'power-bi', 'location' => 'power-platform' ],
            'power-fx' => [ 'name' => 'Power Fx', 'file' => 'power-fx', 'location' => 'power-platform' ],
            'power-pages' => [ 'name' => 'Power Pages', 'file' => 'power-pages', 'location' => 'power-platform' ],
            'power-platform' => [ 'name' => 'Microsoft Power Platform', 'file' => 'power-platform', 'location' => 'power-platform' ],
            'defender' => [ 'name' => 'Microsoft Defender', 'file' => 'defender', 'location' => 'security' ],
            'purview' => [ 'name' => 'Microsoft Purview', 'file' => 'purview', 'location' => 'security' ],
            'viva-amplify' => [ 'name' => 'Viva Amplify', 'file' => 'viva-amplify', 'location' => 'viva' ],
            'viva-connections' => [ 'name' => 'Viva Connections', 'file' => 'viva-connections', 'location' => 'viva' ],
            'viva-engage' => [ 'name' => 'Viva Engage', 'file' => 'viva-engage', 'location' => 'viva' ],
            'viva-glint' => [ 'name' => 'Viva Glint', 'file' => 'viva-glint', 'location' => 'viva' ],
            'viva-home' => [ 'name' => 'Viva Home', 'file' => 'viva-home', 'location' => 'viva' ],
            'viva-insights' => [ 'name' => 'Viva Insights', 'file' => 'viva-insights', 'location' => 'viva' ],
            'viva-learning' => [ 'name' => 'Viva Learning', 'file' => 'viva-learning', 'location' => 'viva' ],
            'viva-pulse' => [ 'name' => 'Viva Pulse', 'file' => 'viva-pulse', 'location' => 'viva' ],
            'viva-suite' => [ 'name' => 'Microsoft Viva', 'file' => 'viva-suite', 'location' => 'viva' ],
        ];
    }

    private static function normalize_name( string $name ): string {
        return strtolower( trim( preg_replace( '/[^a-z0-9]+/', '-', $name ) ?? '', '-' ) );
    }
}