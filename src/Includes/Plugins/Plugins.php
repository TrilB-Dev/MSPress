<?php
/**
 * MSPress - Plugins
 *
 * Handles discovery and loading of MSPress plugin modules.
 *
 * @package MSPress
 * @subpackage Includes\MSPress\Plugins
 * @since 1.0.0
 */

namespace MSPress\Includes\Plugins;

use MSPress\Includes\Functions\Helpers\LoggerHelper;
use MSPress\Includes\Settings\Settings;
use MSPress\Includes\Plugins\PluginInterface;
use MSPress\Assets\Assets;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Class Plugins
 *
 * Manages the discovery, loading, and initialization of MSPress plugin modules.
 */
class Plugins {
    /**
     * Singleton instance of the Plugins class.
     *
     * @var Plugins|null
     */
    private static ?Plugins $instance = null;
    /**
     * Array of loaded plugin class names.
     *
     * @var array
     */
    private array $loaded_plugins = [];
    /**
     * Array of registered plugin instances.
     *
     * @var array
     */
    private array $registered_plugins = [];
    /**
     * Indicates whether plugins should be auto-activated upon registration.
     *
     * @var bool
     */
    private bool $auto_activate = true;
    /**
     * Indicates whether the plugin system has been initialized.
     *
     * @var bool
     */
    private bool $initialized = false;
    /**
     * The central MSPress asset manager.
     *
     * @var Assets|null
     */
    private ?Assets $assets = null;
    /**
     * Get the singleton instance of the Plugins class.
     *
     * @return Plugins The singleton instance.
     */
    public static function get_instance(): Plugins {
        if ( self::$instance === null ) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    /**
     * Initializes the plugin system by discovering and loading plugin files.
     */
    public function init( Assets $assets ): void {
        if ( $this->initialized ) {
            LoggerHelper::write_log( 'MSPress Plugins::init() skipped because plugin loader is already initialized.' );
            return;
        }

        $this->initialized = true;
        $this->assets = $assets;
        $this->auto_activate = $this->should_auto_activate();

        LoggerHelper::write_log( sprintf( 'MSPress Plugins::init() auto_activate=%s', $this->auto_activate ? 'yes' : 'no' ) );

        $directory = $this->resolve_plugin_directory();
        LoggerHelper::write_log( sprintf( 'MSPress Plugins::init() directory=%s', $directory ) );

        $files = $this->discover_plugin_files( $directory );
        LoggerHelper::write_log( sprintf( 'MSPress Plugins::init() discovered_files=%d', count( $files ) ) );

        foreach ( $files as $file ) {
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::load_file() file=%s', $file ) );
            $this->load_plugin_file( $file );
        }

        /**
         * Allow WordPress plugins to register MSPress extensions.
         *
         * Plugins installed via the normal WordPress plugin system can hook
         * into this action and call MSPress\Plugins::register_plugin().
         */
        do_action( 'mspress_register_plugin', $this );
        LoggerHelper::write_log( 'MSPress Plugins::init() finished registering external plugin hooks.' );
    }
    /**
     * Retrieves the list of loaded plugin class names.
     *
     * @return array List of loaded plugin class names.
     */
    public function get_loaded_plugins(): array {
        return $this->loaded_plugins;
    }
    /**
     * Retrieves the list of registered plugin instances.
     *
     * @return array List of registered plugin instances.
     */
    public function get_registered_plugins(): array {
        return $this->registered_plugins;
    }

    /**
     * Determines whether a plugin is enabled.
     *
     * Plugins without a saved state remain enabled for backwards compatibility.
     *
     * @param string $slug Plugin slug.
     * @return bool True when the plugin is enabled.
     */
    public function is_plugin_enabled( string $slug ): bool {
        $states = Settings::get_group( 'plugins', [] );
        if ( ! is_array( $states ) || ! array_key_exists( $slug, $states ) ) {
            return true;
        }

        return (bool) $states[ $slug ];
    }

    /**
     * Persists a plugin's enabled state.
     *
     * @param string $slug Plugin slug.
     * @param bool   $enabled Whether the plugin should be enabled.
     * @return bool True when the state is saved.
     */
    public function set_plugin_enabled( string $slug, bool $enabled ): bool {
        $slug = sanitize_key( $slug );
        if ( '' === $slug || ! isset( $this->registered_plugins[ $slug ] ) ) {
            return false;
        }

        $states = Settings::get_group( 'plugins', [] );
        $states = is_array( $states ) ? $states : [];
        $states[ $slug ] = $enabled;

        return Settings::set_group( 'plugins', $states );
    }
    /**
     * Registers a plugin instance with the plugin system.
     *
     * @param PluginInterface $plugin The plugin instance to register.
     */
    public static function register_plugin( PluginInterface $plugin ): void {
        self::get_instance()->register_plugin_instance( $plugin );
    }
    /**
     * Registers a plugin instance with the plugin system.
     *
     * @param PluginInterface $plugin The plugin instance to register.
     */
    public function register_plugin_instance( PluginInterface $plugin ): void {
        $slug = trim( $plugin->get_slug() );
        if ( $slug === '' ) {
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::register_plugin_instance() rejected_plugin_without_slug=%s', get_class( $plugin ) ) );
            return;
        }

        if ( isset( $this->registered_plugins[ $slug ] ) ) {
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::register_plugin_instance() already_registered=%s', $slug ) );
            return;
        }

        $this->registered_plugins[ $slug ] = $plugin;
        LoggerHelper::write_log( sprintf( 'MSPress Plugins::register_plugin_instance() registered=%s auto_activate=%s enabled=%s', $slug, $this->auto_activate ? 'yes' : 'no', $this->is_plugin_enabled( $slug ) ? 'yes' : 'no' ) );

        if ( $this->initialized && $this->auto_activate && $this->is_plugin_enabled( $slug ) ) {
            $this->initialize_plugin( $plugin, $this->assets );
        }
    }
    /**
     * Resolves the plugin directory path based on settings or defaults.
     *
     * @return string The resolved plugin directory path.
     */
    private function resolve_plugin_directory(): string {
        $configured = trim( (string) Settings::get( 'mspress_plugin_directory', MSPRESS_PLUGINS ) );
        $candidates = [
            $configured,
            MSPRESS_PLUGINS,
            str_replace( '/Includes/', '/includes/', MSPRESS_PLUGINS ),
            str_replace( '/includes/', '/Includes/', MSPRESS_PLUGINS ),
        ];

        LoggerHelper::write_log( sprintf( 'MSPress Plugins::resolve_plugin_directory() configured=%s candidates=%s', $configured, wp_json_encode( $candidates ) ) );

        foreach ( $candidates as $candidate ) {
            $resolved = $this->resolve_existing_directory( $candidate );
            if ( $resolved !== '' ) {
                LoggerHelper::write_log( sprintf( 'MSPress Plugins::resolve_plugin_directory() resolved=%s from=%s', $resolved, $candidate ) );
                return $resolved;
            }
        }

        LoggerHelper::write_log( sprintf( 'MSPress Plugins::resolve_plugin_directory() directory_missing=%s', MSPRESS_PLUGINS ) );
        return MSPRESS_PLUGINS;
    }
    /**
     * Discovers plugin files in the specified directory and its subdirectories.
     *
     * @param string $directory The directory to search for plugin files.
     * @return array List of discovered plugin file paths.
     */
    private function discover_plugin_files( string $directory ): array {
        if ( ! is_dir( $directory ) ) {
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::discover_plugin_files() directory_missing=%s', $directory ) );
            return [];
        }

        LoggerHelper::write_log( sprintf( 'MSPress Plugins::discover_plugin_files() scanning_directory=%s', $directory ) );

        $files = glob( $directory . '/*.php' ) ?: [];
        $subdirs = glob( $directory . '/*', GLOB_ONLYDIR ) ?: [];

        foreach ( $subdirs as $subdir ) {
            $subfiles = glob( $subdir . '/*.php' ) ?: [];
            $files = array_merge( $files, array_filter( $subfiles, function ( string $file ): bool {
                $contents = file_get_contents( $file );
                return is_string( $contents ) && $this->extract_class_name( $contents ) !== '';
            } ) );
        }

        $files = array_filter( array_unique( $files ), 'is_file' );
        $filtered = array_values( array_filter( $files, static function ( string $file ): bool {
            if ( in_array( basename( $file ), [
                'Plugins.php',
                'PluginsInterface.php',
            ], true ) ) {
                return false;
            }

            $contents = file_get_contents( $file );
            return is_string( $contents ) && preg_match( '/^namespace\s+MSPress\\\\/mi', $contents ) === 1;
        } ) );

        LoggerHelper::write_log( sprintf( 'MSPress Plugins::discover_plugin_files() raw_files=%d filtered_files=%d', count( $files ), count( $filtered ) ) );
        foreach ( $filtered as $file ) {
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::discover_plugin_files() candidate_file=%s', $file ) );
        }

        return $filtered;
    }
    /**
     * Loads a plugin file, extracts its namespace and class name, and initializes the plugin if applicable.
     *
     * @param string $file The path to the plugin file.
     */
    private function load_plugin_file( string $file ): void {
        $contents = file_get_contents( $file );
        if ( ! is_string( $contents ) ) {
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::load_plugin_file() unreadable_file=%s', $file ) );
            return;
        }

        $namespace = $this->extract_namespace( $contents );
        $class_name = $this->extract_class_name( $contents );
        $expected_class = $namespace !== '' && $class_name !== ''
            ? sprintf( '%s\\%s', trim( $namespace, '\\' ), $class_name )
            : $class_name;

        LoggerHelper::write_log( sprintf( 'MSPress Plugins::load_plugin_file() file=%s namespace=%s class=%s expected=%s', $file, $namespace, $class_name, $expected_class ) );

        $declared_before = get_declared_classes();

        try {
            $this->load_plugin_includes( dirname( $file ) );
            require_once $file;

            $plugin_classes = array_filter(
                array_diff( get_declared_classes(), $declared_before ),
                static fn ( string $class ): bool => is_subclass_of( $class, PluginInterface::class )
            );

            $fqcn = ! empty( $plugin_classes )
                ? (string) reset( $plugin_classes )
                : $expected_class;

            LoggerHelper::write_log( sprintf( 'MSPress Plugins::load_plugin_file() fqcn=%s new_classes=%d', $fqcn, count( $plugin_classes ) ) );

            if ( ! class_exists( $fqcn ) || ! is_a( $fqcn, PluginInterface::class, true ) ) {
                LoggerHelper::write_log( sprintf( 'MSPress plugin file %s does not declare a PluginInterface implementation.', $file ) );
                return;
            }

            $instance = is_callable( [ $fqcn, 'get_instance' ] )
                ? $fqcn::get_instance()
                : new $fqcn();

            if ( ! $instance instanceof PluginInterface ) {
                LoggerHelper::write_log( sprintf( 'MSPress plugin %s does not implement PluginInterface.', $fqcn ) );
                return;
            }

            $this->register_plugin_instance( $instance );
            $this->loaded_plugins[] = $fqcn;
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::load_plugin_file() registered_plugin=%s', $fqcn ) );
        } catch ( \Throwable $e ) {
            LoggerHelper::write_log( sprintf( 'MSPress plugin loader failed to require file %s: %s', $file, $e->getMessage() ) );
        }
    }
    /**
     * Loads additional includes for a plugin if they exist.
     *
     * @param string $plugin_directory The directory of the plugin.
     */
    private function load_plugin_includes( string $plugin_directory ): void {
        $directory_candidates = [
            untrailingslashit( $plugin_directory ),
            $this->resolve_existing_directory( $plugin_directory ),
            str_replace( '/Includes/', '/includes/', $plugin_directory ),
            str_replace( '/includes/', '/Includes/', $plugin_directory ),
        ];

        foreach ( array_unique( array_filter( $directory_candidates ) ) as $directory ) {
            foreach ( [ 'Includes/Includes.php', 'includes/Includes.php', 'Includes/I18n.php', 'includes/I18n.php', 'Includes/Shortcodes.php', 'includes/Shortcodes.php' ] as $includes_file ) {
                $includes_path = trailingslashit( $directory ) . $includes_file;
                $resolved_include = $this->resolve_existing_file( $includes_path );
                if ( $resolved_include !== '' ) {
                    require_once $resolved_include;
                }
            }
        }
    }
    /**
     * Extracts the namespace from the given PHP file content.
     *
     * @param string $content The content of the PHP file.
     * @return string The extracted namespace, or an empty string if not found.
     */
    private function extract_namespace( string $content ): string {
        if ( preg_match( '/namespace\s+([^;]+);/i', $content, $matches ) ) {
            return trim( $matches[1] );
        }

        return '';
    }
    /**
     * Extracts the class name from the given PHP file content.
     *
     * @param string $content The content of the PHP file.
     * @return string The extracted class name, or an empty string if not found.
     */
    private function extract_class_name( string $content ): string {
        $tokens = token_get_all( $content );
        $token_count = count( $tokens );

        for ( $index = 0; $index < $token_count; $index++ ) {
            if ( ! is_array( $tokens[ $index ] ) || T_CLASS !== $tokens[ $index ][0] ) {
                continue;
            }

            for ( $index++; $index < $token_count; $index++ ) {
                if ( is_array( $tokens[ $index ] ) && T_STRING === $tokens[ $index ][0] ) {
                    return $tokens[ $index ][1];
                }
            }
        }

        return '';
    }
    /**
     * Determines whether plugins should be auto-activated upon registration.
     *
     * @return bool True if plugins should be auto-activated, false otherwise.
     */
    private function should_auto_activate(): bool {
        return Settings::get( 'mspress_plugin_auto_activate', 'on' ) === 'on';
    }
    /**
     * Initializes a registered plugin instance if it is active.
     *
     * @param PluginInterface $plugin The plugin instance to initialize.
     */
    private function initialize_plugin( PluginInterface $plugin, Assets $assets ): void {
        $slug = $plugin->get_slug();
        LoggerHelper::write_log( sprintf( 'MSPress Plugins::initialize_plugin() slug=%s active=%s enabled=%s', $slug, $plugin->is_active() ? 'yes' : 'no', $this->is_plugin_enabled( $slug ) ? 'yes' : 'no' ) );

        if ( ! $plugin->is_active() || ! $this->is_plugin_enabled( $plugin->get_slug() ) ) {
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::initialize_plugin() skipped_slug=%s reason=inactive_or_disabled', $slug ) );
            return;
        }

        try {
            if ( $plugin instanceof SettingsProviderInterface ) {
                $plugin->register_settings();
            }

            if ( $plugin instanceof CapabilitiesProviderInterface ) {
                $plugin->register_capabilities();
            }

            if ( $plugin instanceof DatabaseProviderInterface ) {
                $plugin->register_tables();
            }

            if ( $plugin instanceof ShortcodeProviderInterface ) {
                \MSPress\Includes\Functions\Helpers\ShortcodeHelper::register_many( $plugin->get_shortcodes() );
            }

            if ( $plugin instanceof AssetsProviderInterface ) {
                $plugin->register_assets();
            }

            if ( $plugin instanceof AdminPageProviderInterface ) {
                $plugin->register_admin_pages();
            }

            if ( $plugin instanceof RestRouteProviderInterface ) {
                $plugin->register_rest_routes();
            }

            if ( $plugin instanceof FrontendProviderInterface ) {
                $plugin->register_frontend();
            }

            if ( $plugin instanceof I18nProviderInterface ) {
                $plugin->load_textdomain();
            }

            $plugin->init();
        } catch ( \Throwable $e ) {
            LoggerHelper::write_log( sprintf( 'MSPress plugin %s failed to initialize: %s', $plugin->get_slug(), $e->getMessage() ) );
        }
    }
    /**
     * Checks if the given path is an absolute path.
     *
     * @param string $path The path to check.
     * @return bool True if the path is absolute, false otherwise.
     */    private function resolve_existing_directory( string $path ): string {
        $path = trim( (string) $path );
        if ( $path === '' ) {
            return '';
        }

        $normalized = str_replace( '\\', '/', $path );
        $candidates = [ untrailingslashit( $normalized ) ];

        if ( ! $this->is_absolute_path( $normalized ) ) {
            $candidates[] = untrailingslashit( MSPRESS_ROOT ) . '/' . ltrim( $normalized, '/' );
        }

        $candidates[] = str_replace( '/Includes/', '/includes/', $normalized );
        $candidates[] = str_replace( '/includes/', '/Includes/', $normalized );

        foreach ( array_unique( array_filter( $candidates ) ) as $candidate ) {
            if ( is_dir( $candidate ) ) {
                return untrailingslashit( $candidate );
            }

            $realpath = realpath( $candidate );
            if ( is_string( $realpath ) && $realpath !== '' && is_dir( $realpath ) ) {
                return untrailingslashit( $realpath );
            }

            $parent = dirname( $candidate );
            $name = basename( $candidate );
            if ( $parent !== '.' && $parent !== $candidate && is_dir( $parent ) ) {
                $entries = scandir( $parent ) ?: [];
                foreach ( $entries as $entry ) {
                    if ( '.' === $entry || '..' === $entry ) {
                        continue;
                    }

                    if ( strcasecmp( $entry, $name ) === 0 ) {
                        return untrailingslashit( $parent . '/' . $entry );
                    }
                }
            }
        }

        return '';
    }

    private function resolve_existing_file( string $path ): string {
        $path = trim( (string) $path );
        if ( $path === '' ) {
            return '';
        }

        $normalized = str_replace( '\\', '/', $path );
        $candidates = [ $normalized ];

        if ( ! $this->is_absolute_path( $normalized ) ) {
            $candidates[] = MSPRESS_ROOT . '/' . ltrim( $normalized, '/' );
        }

        $candidates[] = str_replace( '/Includes/', '/includes/', $normalized );
        $candidates[] = str_replace( '/includes/', '/Includes/', $normalized );

        foreach ( array_unique( array_filter( $candidates ) ) as $candidate ) {
            if ( is_readable( $candidate ) ) {
                return $candidate;
            }

            $realpath = realpath( $candidate );
            if ( is_string( $realpath ) && $realpath !== '' && is_readable( $realpath ) ) {
                return $realpath;
            }

            $directory = dirname( $candidate );
            $name = basename( $candidate );
            if ( is_dir( $directory ) ) {
                $entries = scandir( $directory ) ?: [];
                foreach ( $entries as $entry ) {
                    if ( '.' === $entry || '..' === $entry ) {
                        continue;
                    }

                    if ( strcasecmp( $entry, $name ) === 0 ) {
                        return $directory . '/' . $entry;
                    }
                }
            }
        }

        return '';
    }
    private function is_absolute_path( string $path ): bool {
        return preg_match( '/^(?:[A-Za-z]:[\\\\\/]|[\\\\\\/])/', $path ) === 1;
    }
}