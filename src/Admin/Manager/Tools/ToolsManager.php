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
    }
    /**
     * Renders the tools page.
     *
     * @since 1.0.0
     * @return void
     */
    public function render(): void {
        $tool = SanitizationHelper::key( $_GET['tool'] ?? 'debug', 'debug' );
        if ( ! in_array( $tool, [ 'debug', 'reset' ], true ) ) {
            $tool = 'debug';
        }
        $capability = 'reset' === $tool ? 'mspress_tools_reset' : 'mspress_tools_debug';
        if ( ! PermissionHelper::can( $capability ) ) {
            wp_die( esc_html__( 'You are not authorized to access this MSPress tool.', 'mspress' ) );
        }
        $this->header( 'reset' === $tool ? __( 'Plugin Reset', 'mspress' ) : __( 'Debug', 'mspress' ) );
        if ( 'reset' === $tool ) {
            $this->reset_manager->render_page_content();
        } else {
            $this->debug_manager->render_page_content();
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
}
