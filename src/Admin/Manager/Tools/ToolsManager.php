<?php
/**
 * ToolsManager class for MSPress plugin.
 *
 * @package MSPress
 */
namespace MSPress\Admin\Manager\Tools;

use MSPress\Admin\Manager\Manager;
use MSPress\Admin\Manager\Tools\DebugManager;
use MSPress\Admin\Manager\Tools\MSPressReset;
use MSPress\Admin\Manager\Tools\ImportManager;
use MSPress\Admin\Manager\Tools\ExportManager;
use MSPress\Assets\Assets;
use MSPress\Includes\Functions\Helpers\SanitizationHelper;
use MSPress\Includes\Functions\Helpers\PermissionHelper;


final class ToolsManager extends Manager {
    /**
     * The Page variable.
     *
     * @since 1.0.0
     * @access protected
     * @var string $page The page variable.
     */
    protected $page;
    /**
     * DebugManager instance for managing the debug tool.
     *
     * @since 1.0.0
     * @var DebugManager $debug_manager The debug manager instance.
     */
    private DebugManager $debug_manager;
    /**
     * MSPressReset instance for managing the plugin reset tool.
     *
     * @since 1.0.0
     * @var MSPressReset $reset_manager The reset manager instance.
     */
    private MSPressReset $reset_manager;
    /**
     * ImportManager instance for managing the import tool.
     *
     * @since 1.0.0
     * @var ImportManager $import_manager The import manager instance.
     */
    private ImportManager $import_manager;
    /**
     * ExportManager instance for managing the export tool.
     *
     * @since 1.0.0
     * @var ExportManager $export_manager The export manager instance.
     */
    private ExportManager $export_manager;

    /**
     * `Constructor` method for the `ToolsManager` class.
     *
     * @since 1.0.0
     * @return void
     */
    public function __construct() {
        /**
         * Set the page variable to 'tools'.
         *
         * @since 1.0.0
         */
        $this->page = 'tools';
        /**
         * Initialize the Debug Manager page.
         *
         * @since 1.0.0
         */
        $this->debug_manager = new DebugManager();
        /**
         * Initialize the Plugin Reset page.
         *
         * @since 1.0.0
         */
        $this->reset_manager = new MSPressReset();
        /**
         * Initialize the Import Manager page.
         *
         * @since 1.0.0
         */
        $this->import_manager = new ImportManager();
        /**
         * Initialize the Export Manager page.
         *
         * @since 1.0.0
         */
        $this->export_manager = new ExportManager();
    }
    /**
     * Renders the tools page.
     *
     * @since 1.0.0
     * @return void
     */
    public function render(): void {
        $tool = SanitizationHelper::key( $_GET['tool'] ?? 'debug', 'debug' );
        if ( ! in_array( $tool, [ 'debug', 'reset', 'import', 'export' ], true ) ) {
            $tool = 'debug';
        }
        $capabilities = [
            'debug' => 'mspress_tools_debug',
            'reset' => 'mspress_tools_reset',
            'import' => 'mspress_tools_import',
            'export' => 'mspress_tools_export',
        ];
        if ( ! PermissionHelper::can( $capabilities[ $tool ] ) ) {
            wp_die( esc_html__( 'You are not authorized to access this MSPress tool.', 'mspress' ) );
        }
        $this->header( $this->title( $tool ) );
        if ( 'reset' === $tool ) {
            $this->reset_manager->render_page_content();
        } elseif ( 'debug' === $tool ) {
            $this->debug_manager->render_page_content();
        } elseif ( 'import' === $tool ) {
            $this->import_manager->render();
        } else {
            $this->export_manager->render_page_content();
        }
        $this->footer();
    }
    /**
     * Registers the assets for the tools page.
     *
     * @since 1.0.0
     * @param Assets $assets The Assets instance.
     * @return void
     */
    public function register_assets( Assets $assets ): void {
        $this->register_page_assets( $assets, [ 'mspress-tools' ], 'debug' );
    }
    /**
     * Returns the title for the given tool.
     *
     * @since 1.0.0
     * @param string $tool The tool name.
     * @return string The title for the tool.
     */
    private function title( string $tool ): string {
        return [
            'debug' => __( 'Debug', 'mspress' ),
            'reset' => __( 'Reset', 'mspress' ),
            'import' => __( 'Import', 'mspress' ),
            'export' => __( 'Export', 'mspress' ),
        ][ $tool ];
    }
}
