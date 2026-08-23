<?php
/**
 * ToolsManager class for MSPress plugin.
 *
 * @package MSPress
 * @subpackage Admin\Manager\Tools
 * @since 1.0.0
 */
namespace MSPress\Admin\Manager\Tools;

use MSPress\Admin\Manager\Manager;
use MSPress\Admin\Manager\Tools\DebugManager;
use MSPress\Assets\Assets;
use MSPress\Includes\Functions\Helpers\SanitizationHelper;


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
     * `Constructor` method for the `ToolsManager` class.
     *
     * @since 1.0.0
     * @return void
     */
    private DebugManager $debug_manager;

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
    }
    /**
     * Renders the tools page.
     *
     * @since 1.0.0
     * @return void
     */
    public function render(): void {
        $tool = SanitizationHelper::key( $_GET['tool'] ?? 'debug', 'debug' );
        $tool = 'debug' === $tool ? $tool : 'debug';
        $capabilities = [
            'debug' => 'mspress_tools_debug',
        ];
        if ( ! current_user_can( $capabilities[ $tool ] ) ) {
            wp_die( esc_html__( 'You are not authorized to access this MSPress tool.', 'mspress' ) );
        }
        $this->header( $this->title( $tool ) );
        $this->debug_manager->render_page_content();
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
        return __( 'Debug', 'mspress' );
    }
}