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
                $location = dirname( $icon['location'] ) . '/' . $file;
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
            'copilot' => [ 'name' => 'Copilot', 'file' => 'copilot.svg', 'location' => 'copilot/copilot.svg' ],
            'copilot-365' => [ 'name' => 'Microsoft 365 Copilot', 'file' => 'copilot-365.svg', 'location' => 'copilot/copilot-365.svg' ],
            'business-central' => [ 'name' => 'Dynamics 365 Business Central', 'file' => 'business-central.svg', 'location' => 'dynamics-365/business-central.svg' ],
            'commerce' => [ 'name' => 'Dynamics 365 Commerce', 'file' => 'commerce.svg', 'location' => 'dynamics-365/commerce.svg' ],
            'contact-center' => [ 'name' => 'Dynamics 365 Contact Center', 'file' => 'contact-center.svg', 'location' => 'dynamics-365/contact-center.svg' ],
            'customer-insights' => [ 'name' => 'Dynamics 365 Customer Insights', 'file' => 'customer-insights.svg', 'location' => 'dynamics-365/customer-insights.svg' ],
            'customer-service' => [ 'name' => 'Dynamics 365 Customer Service', 'file' => 'customer-service.svg', 'location' => 'dynamics-365/customer-service.svg' ],
            'customer-voice' => [ 'name' => 'Dynamics 365 Customer Voice', 'file' => 'customer-voice.svg', 'location' => 'dynamics-365/customer-voice.svg' ],
            'dynamics-365' => [ 'name' => 'Dynamics 365', 'file' => 'dynamics-365.svg', 'location' => 'dynamics-365/dynamics-365.svg' ],
            'field-service' => [ 'name' => 'Dynamics 365 Field Service', 'file' => 'field-service.svg', 'location' => 'dynamics-365/field-service.svg' ],
            'finance' => [ 'name' => 'Dynamics 365 Finance', 'file' => 'finance.svg', 'location' => 'dynamics-365/finance.svg' ],
            'finance-operations' => [ 'name' => 'Dynamics 365 Finance and Operations', 'file' => 'finance-operations.svg', 'location' => 'dynamics-365/finance-operations.svg' ],
            'human-resources' => [ 'name' => 'Dynamics 365 Human Resources', 'file' => 'human-resources.svg', 'location' => 'dynamics-365/human-resources.svg' ],
            'intelligent-order-management' => [ 'name' => 'Dynamics 365 Intelligent Order Management', 'file' => 'intelligent-order-management.svg', 'location' => 'dynamics-365/intelligent-order-management.svg' ],
            'project-operations' => [ 'name' => 'Dynamics 365 Project Operations', 'file' => 'project-operations.svg', 'location' => 'dynamics-365/project-operations.svg' ],
            'sales' => [ 'name' => 'Dynamics 365 Sales', 'file' => 'sales.svg', 'location' => 'dynamics-365/sales.svg' ],
            'sales-insights' => [ 'name' => 'Dynamics 365 Sales Insights', 'file' => 'sales-insights.svg', 'location' => 'dynamics-365/sales-insights.svg' ],
            'supply-chain' => [ 'name' => 'Dynamics 365 Supply Chain Management', 'file' => 'supply-chain.svg', 'location' => 'dynamics-365/supply-chain.svg' ],
            'entra' => [ 'name' => 'Microsoft Entra', 'file' => 'entra.svg', 'location' => 'entra/entra.svg' ],
            'entra-id' => [ 'name' => 'Microsoft Entra ID', 'file' => 'entra-id.svg', 'location' => 'entra/entra-id.svg' ],
            'entra-id-governance' => [ 'name' => 'Microsoft Entra ID Governance', 'file' => 'entra-id-governance.svg', 'location' => 'entra/entra-id-governance.svg' ],
            'entra-verified-id' => [ 'name' => 'Microsoft Entra Verified ID', 'file' => 'entra-verified-id.svg', 'location' => 'entra/entra-verified-id.svg' ],
            'fabric' => [ 'name' => 'Microsoft Fabric', 'file' => 'fabric.svg', 'location' => 'fabric/fabric.svg' ],
            'access' => [ 'name' => 'Microsoft Access', 'file' => 'access.svg', 'location' => 'microsoft-365/access.svg' ],
            'bookings' => [ 'name' => 'Microsoft Bookings', 'file' => 'bookings.svg', 'location' => 'microsoft-365/bookings.svg' ],
            'calendar' => [ 'name' => 'Microsoft Calendar', 'file' => 'calendar.svg', 'location' => 'microsoft-365/calendar.svg' ],
            'clipchamp' => [ 'name' => 'Microsoft Clipchamp', 'file' => 'clipchamp.svg', 'location' => 'microsoft-365/clipchamp.svg' ],
            'delve' => [ 'name' => 'Microsoft Delve', 'file' => 'delve.svg', 'location' => 'microsoft-365/delve.svg' ],
            'excel' => [ 'name' => 'Microsoft Excel', 'file' => 'excel.svg', 'location' => 'microsoft-365/excel.svg' ],
            'forms' => [ 'name' => 'Microsoft Forms', 'file' => 'forms.svg', 'location' => 'microsoft-365/forms.svg' ],
            'lists' => [ 'name' => 'Microsoft Lists', 'file' => 'lists.svg', 'location' => 'microsoft-365/lists.svg' ],
            'loop' => [ 'name' => 'Microsoft Loop', 'file' => 'loop.svg', 'location' => 'microsoft-365/loop.svg' ],
            'microsoft-365' => [ 'name' => 'Microsoft 365', 'file' => 'microsoft-365.svg', 'location' => 'microsoft-365/microsoft-365.svg' ],
            'microsoft-exchange' => [ 'name' => 'Microsoft Exchange', 'file' => 'microsoft-exchange.svg', 'location' => 'microsoft-365/microsoft-exchange.svg' ],
            'onedrive' => [ 'name' => 'Microsoft OneDrive', 'file' => 'onedrive.svg', 'location' => 'microsoft-365/onedrive.svg' ],
            'onenote' => [ 'name' => 'Microsoft OneNote', 'file' => 'onenote.svg', 'location' => 'microsoft-365/onenote.svg' ],
            'outlook' => [ 'name' => 'Microsoft Outlook', 'file' => 'outlook.svg', 'location' => 'microsoft-365/outlook.svg' ],
            'places' => [ 'name' => 'Microsoft Places', 'file' => 'places.svg', 'location' => 'microsoft-365/places.svg' ],
            'planner' => [ 'name' => 'Microsoft Planner', 'file' => 'planner.svg', 'location' => 'microsoft-365/planner.svg' ],
            'powerpoint' => [ 'name' => 'Microsoft PowerPoint', 'file' => 'powerpoint.svg', 'location' => 'microsoft-365/powerpoint.svg' ],
            'project' => [ 'name' => 'Microsoft Project', 'file' => 'project.svg', 'location' => 'microsoft-365/project.svg' ],
            'publisher' => [ 'name' => 'Microsoft Publisher', 'file' => 'publisher.svg', 'location' => 'microsoft-365/publisher.svg' ],
            'sharepoint' => [ 'name' => 'Microsoft SharePoint', 'file' => 'sharepoint.svg', 'location' => 'microsoft-365/sharepoint.svg' ],
            'stream' => [ 'name' => 'Microsoft Stream', 'file' => 'stream.svg', 'location' => 'microsoft-365/stream.svg' ],
            'sway' => [ 'name' => 'Microsoft Sway', 'file' => 'sway.svg', 'location' => 'microsoft-365/sway.svg' ],
            'teams' => [ 'name' => 'Microsoft Teams', 'file' => 'teams.svg', 'location' => 'microsoft-365/teams.svg' ],
            'todo' => [ 'name' => 'Microsoft To Do', 'file' => 'todo.svg', 'location' => 'microsoft-365/todo.svg' ],
            'visio' => [ 'name' => 'Microsoft Visio', 'file' => 'visio.svg', 'location' => 'microsoft-365/visio.svg' ],
            'whiteboard' => [ 'name' => 'Microsoft Whiteboard', 'file' => 'whiteboard.svg', 'location' => 'microsoft-365/whiteboard.svg' ],
            'word' => [ 'name' => 'Microsoft Word', 'file' => 'word.svg', 'location' => 'microsoft-365/word.svg' ],
            'admin' => [ 'name' => 'Microsoft 365 Admin', 'file' => 'admin.svg', 'location' => 'other/admin.svg' ],
            'bing' => [ 'name' => 'Microsoft Bing', 'file' => 'bing.svg', 'location' => 'other/bing.svg' ],
            'designer' => [ 'name' => 'Microsoft Designer', 'file' => 'designer.svg', 'location' => 'other/designer.svg' ],
            'edge' => [ 'name' => 'Microsoft Edge', 'file' => 'edge.svg', 'location' => 'other/edge.svg' ],
            'family-safety' => [ 'name' => 'Microsoft Family Safety', 'file' => 'family-safety.svg', 'location' => 'other/family-safety.svg' ],
            'foundry' => [ 'name' => 'Microsoft Foundry', 'file' => 'foundry.svg', 'location' => 'other/foundry.svg' ],
            'office' => [ 'name' => 'Microsoft Office', 'file' => 'office.svg', 'location' => 'other/office.svg' ],
            'agent-365' => [ 'name' => 'Power Platform AI Agent', 'file' => 'agent-365.svg', 'location' => 'power-platform/agent-365.svg' ],
            'agent-builder' => [ 'name' => 'Power Platform Agent Builder', 'file' => 'agent-builder.svg', 'location' => 'power-platform/agent-builder.svg' ],
            'ai-builder' => [ 'name' => 'AI Builder', 'file' => 'ai-builder.svg', 'location' => 'power-platform/ai-builder.svg' ],
            'connectors' => [ 'name' => 'Power Platform Connectors', 'file' => 'connectors.svg', 'location' => 'power-platform/connectors.svg' ],
            'copilot-studio' => [ 'name' => 'Microsoft Copilot Studio', 'file' => 'copilot-studio.svg', 'location' => 'power-platform/copilot-studio.svg' ],
            'dataverse' => [ 'name' => 'Microsoft Dataverse', 'file' => 'dataverse.svg', 'location' => 'power-platform/dataverse.svg' ],
            'power-apps' => [ 'name' => 'Power Apps', 'file' => 'power-apps.svg', 'location' => 'power-platform/power-apps.svg' ],
            'power-automate' => [ 'name' => 'Power Automate', 'file' => 'power-automate.svg', 'location' => 'power-platform/power-automate.svg' ],
            'power-bi' => [ 'name' => 'Power BI', 'file' => 'power-bi.svg', 'location' => 'power-platform/power-bi.svg' ],
            'power-fx' => [ 'name' => 'Power Fx', 'file' => 'power-fx.svg', 'location' => 'power-platform/power-fx.svg' ],
            'power-pages' => [ 'name' => 'Power Pages', 'file' => 'power-pages.svg', 'location' => 'power-platform/power-pages.svg' ],
            'power-platform' => [ 'name' => 'Microsoft Power Platform', 'file' => 'power-platform.svg', 'location' => 'power-platform/power-platform.svg' ],
            'defender' => [ 'name' => 'Microsoft Defender', 'file' => 'defender.svg', 'location' => 'security/defender.svg' ],
            'purview' => [ 'name' => 'Microsoft Purview', 'file' => 'purview.svg', 'location' => 'security/purview.svg' ],
            'viva-amplify' => [ 'name' => 'Viva Amplify', 'file' => 'viva-amplify.svg', 'location' => 'viva/viva-amplify.svg' ],
            'viva-connections' => [ 'name' => 'Viva Connections', 'file' => 'viva-connections.svg', 'location' => 'viva/viva-connections.svg' ],
            'viva-engage' => [ 'name' => 'Viva Engage', 'file' => 'viva-engage.svg', 'location' => 'viva/viva-engage.svg' ],
            'viva-glint' => [ 'name' => 'Viva Glint', 'file' => 'viva-glint.svg', 'location' => 'viva/viva-glint.svg' ],
            'viva-home' => [ 'name' => 'Viva Home', 'file' => 'viva-home.svg', 'location' => 'viva/viva-home.svg' ],
            'viva-insights' => [ 'name' => 'Viva Insights', 'file' => 'viva-insights.svg', 'location' => 'viva/viva-insights.svg' ],
            'viva-learning' => [ 'name' => 'Viva Learning', 'file' => 'viva-learning.svg', 'location' => 'viva/viva-learning.svg' ],
            'viva-pulse' => [ 'name' => 'Viva Pulse', 'file' => 'viva-pulse.svg', 'location' => 'viva/viva-pulse.svg' ],
            'viva-suite' => [ 'name' => 'Microsoft Viva', 'file' => 'viva-suite.svg', 'location' => 'viva/viva-suite.svg' ],
        ];
    }

    private static function normalize_name( string $name ): string {
        return strtolower( trim( preg_replace( '/[^a-z0-9]+/', '-', $name ) ?? '', '-' ) );
    }
}