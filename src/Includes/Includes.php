<?php
/**
 * The Core Includes class for the MSPress plugin.
 * 
 * @package MSPress
 * @since 1.0.0
 * @subpackage MSPress/Includes
 */
namespace MSPress\Includes;

use MSPress\Includes\Core\Core;
use MSPress\Includes\Core\WP\WPLoader;
use MSPress\Includes\Functions\Helpers\LoggerHelper;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class Includes {
    /**
     * The singleton instance of the Includes class.
     *
     * @var self|null
     */
    private static ?self $instance = null;
    /**
     * The Core instance for the plugin.
     *
     * @var Core
     */
    private Core $core;
    /**
     * Extensions registered for the Includes lifecycle.
     *
     * @var array<int, callable>
     */
    private array $extensions = [];
    /**
     * Indicates whether the Includes class has been initialized.
     *
     * @var bool
     */
    private bool $initialized = false;
    /**
     * Private constructor to prevent direct instantiation.
     */
    private function __construct() {
        $this->core = new Core();
        LoggerHelper::write_log( 'MSPress core includes initialized.' );
    }
    /**
     * Returns the singleton instance of the Includes class.
     *
     * @return self The singleton instance.
     */
    public static function get_instance(): self {
        return self::$instance ??= new self();
    }
    /**
     * Initializes the Includes class and its extensions.
     *
     * This method ensures that the core and any registered extensions are initialized.
     * It should be called once during the plugin's execution lifecycle.
     *
     * @return void
     */
    public function init(): void {
        if ( $this->initialized ) {
            return;
        }

        $this->core->register();
        foreach ( $this->extensions as $extension ) {
            call_user_func( $extension, $this );
        }
        $this->initialized = true;
    }
    /**
     * Get the Core instance for the plugin.
     *
     * @return Core The Core instance.
     */
    public function core(): Core {
        return $this->core;
    }

    /**
     * Queue an extension initializer for the shared Includes lifecycle.
     *
     * Extensions registered after initialization are invoked immediately.
     *
     * @param callable $extension Callback receiving this Includes instance.
     * @return self
     */
    public function register_extension( callable $extension ): self {
        if ( $this->initialized ) {
            call_user_func( $extension, $this );
        } else {
            $this->extensions[] = $extension;
        }

        return $this;
    }

    /**
     * Attach Core registration to an external MSPress loader.
     *
     * @param WPLoader $loader Loader owned by the main runtime or an extension.
     * @param string $hook WordPress action name.
     * @param int $priority Hook priority.
     * @return self
     */
    public function register_hooks( WPLoader $loader, string $hook = 'init', int $priority = 10 ): self {
        $this->core->register_hooks( $loader, $hook, $priority );
        return $this;
    }
    /**
     * Get the registered extensions for the Includes lifecycle.
     *
     * @return array<int, callable> The registered extensions.
     */
    public function is_initialized(): bool {
        return $this->initialized;
    }
}
