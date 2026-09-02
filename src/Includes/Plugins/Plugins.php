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
    public function init(): void {
        LoggerHelper::write_log( 'MSPress Plugins::init() START' );

        if ( $this->initialized ) {
            LoggerHelper::write_log( 'MSPress Plugins::init() RESULT: skipped because plugin loader is already initialized.' );
            return;
        }

        $this->initialized = true;
        $this->auto_activate = $this->should_auto_activate();

        LoggerHelper::write_log( sprintf( 'MSPress Plugins::init() auto_activate=%s', $this->auto_activate ? 'yes' : 'no' ) );
        LoggerHelper::write_log( sprintf( 'MSPress Plugins::init() startup_root=%s', MSPRESS_ROOT ) );

        $directory = $this->resolve_plugin_directory();
        LoggerHelper::write_log( sprintf( 'MSPress Plugins::init() directory=%s', $directory ) );

        $files = $this->discover_plugin_files( $directory );
        LoggerHelper::write_log( sprintf( 'MSPress Plugins::init() discovered_files=%d', count( $files ) ) );

        if ( empty( $files ) ) {
            LoggerHelper::write_log( 'MSPress Plugins::init() RESULT: no plugin files discovered; plugin system stopped here.' );
            return;
        }

        foreach ( $files as $file ) {
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::load_file() file=%s', $file ) );
            $this->load_plugin_file( $file );
        }

        LoggerHelper::write_log( sprintf( 'MSPress Plugins::init() loaded_plugins=%d registered_plugins=%d', count( $this->loaded_plugins ), count( $this->registered_plugins ) ) );

        /**
         * Allow WordPress plugins to register MSPress extensions.
         *
         * Plugins installed via the normal WordPress plugin system can hook
         * into this action and call MSPress\Plugins::register_plugin().
         */
        do_action( 'mspress_register_plugin', $this );
        LoggerHelper::write_log( 'MSPress Plugins::init() finished registering external plugin hooks.' );
        LoggerHelper::write_log( 'MSPress Plugins::init() END: plugin discovery workflow completed.' );
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

        LoggerHelper::write_log( sprintf( 'MSPress Plugins::resolve_plugin_directory() START configured=%s candidates=%s', $configured, wp_json_encode( $candidates ) ) );

        foreach ( $candidates as $candidate ) {
            $resolved = $this->resolve_existing_directory( $candidate );
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::resolve_plugin_directory() candidate=%s resolved=%s result=%s', $candidate, $resolved !== '' ? $resolved : 'missing', $resolved !== '' ? 'WORKING' : 'FAILED' ) );

            if ( $resolved !== '' ) {
                LoggerHelper::write_log( sprintf( 'MSPress Plugins::resolve_plugin_directory() RESULT: success using=%s', $resolved ) );
                return $resolved;
            }
        }

        LoggerHelper::write_log( sprintf( 'MSPress Plugins::resolve_plugin_directory() RESULT: failed for=%s', MSPRESS_PLUGINS ) );
        return MSPRESS_PLUGINS;
    }
    /**
     * Discovers plugin files in the specified directory and its subdirectories.
     *
     * @param string $directory The directory to search for plugin files.
     * @return array List of discovered plugin file paths.
     */
    private function discover_plugin_files( string $directory ): array {
        LoggerHelper::write_log( sprintf( 'MSPress Plugins::discover_plugin_files() START directory=%s', $directory ) );

        if ( ! is_dir( $directory ) ) {
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::discover_plugin_files() RESULT: failed directory_missing=%s', $directory ) );
            return [];
        }

        LoggerHelper::write_log( sprintf( 'MSPress Plugins::discover_plugin_files() scanning_directory=%s', $directory ) );

        $files = glob( $directory . '/*.php' ) ?: [];
        $subdirs = glob( $directory . '/*', GLOB_ONLYDIR ) ?: [];
        LoggerHelper::write_log( sprintf( 'MSPress Plugins::discover_plugin_files() top_level_php=%d subdirs=%d', count( $files ), count( $subdirs ) ) );

        foreach ( $subdirs as $subdir ) {
            $subfiles = glob( $subdir . '/*.php' ) ?: [];
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::discover_plugin_files() checking_subdir=%s files=%d', $subdir, count( $subfiles ) ) );
            $files = array_merge( $files, array_filter( $subfiles, function ( string $file ): bool {
                $contents = file_get_contents( $file );
                $has_class = is_string( $contents ) && $this->extract_class_name( $contents ) !== '';
                LoggerHelper::write_log( sprintf( 'MSPress Plugins::discover_plugin_files() subdir_candidate=%s has_php_class=%s', $file, $has_class ? 'yes' : 'no' ) );
                return $has_class;
            } ) );
        }

        $files = array_filter( array_unique( $files ), 'is_file' );
        $filtered = array_values( array_filter( $files, function ( string $file ): bool {
            if ( in_array( basename( $file ), [
                'Plugins.php',
                'PluginsInterface.php',
            ], true ) ) {
                LoggerHelper::write_log( sprintf( 'MSPress Plugins::discover_plugin_files() skipped_core_file=%s', $file ) );
                return false;
            }

            $contents = file_get_contents( $file );
            $namespace_match = is_string( $contents ) && preg_match( '/^namespace\s+MSPress\\\\/mi', $contents ) === 1;
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::discover_plugin_files() candidate_file=%s namespace_match=%s', $file, $namespace_match ? 'yes' : 'no' ) );
            return $namespace_match;
        } ) );

        LoggerHelper::write_log( sprintf( 'MSPress Plugins::discover_plugin_files() raw_files=%d filtered_files=%d', count( $files ), count( $filtered ) ) );
        foreach ( $filtered as $file ) {
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::discover_plugin_files() final_candidate=%s', $file ) );
        }

        if ( empty( $filtered ) ) {
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::discover_plugin_files() RESULT: failed no plugin files passed namespace filter in %s', $directory ) );
            return [];
        }

        LoggerHelper::write_log( sprintf( 'MSPress Plugins::discover_plugin_files() RESULT: success count=%d', count( $filtered ) ) );
        return $filtered;
    }
    /**
     * Loads a plugin file, extracts its namespace and class name, and initializes the plugin if applicable.
     *
     * @param string $file The path to the plugin file.
     */
    private function load_plugin_file( string $file ): void {
        LoggerHelper::write_log( sprintf( 'MSPress Plugins::load_plugin_file() START file=%s', $file ) );

        $contents = file_get_contents( $file );
        if ( ! is_string( $contents ) ) {
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::load_plugin_file() RESULT: failed unreadable_file=%s', $file ) );
            return;
        }

        $namespace = $this->extract_namespace( $contents );
        $class_name = $this->extract_class_name( $contents );
        $expected_class = $namespace !== '' && $class_name !== ''
            ? sprintf( '%s\\%s', trim( $namespace, '\\' ), $class_name )
            : $class_name;

        LoggerHelper::write_log( sprintf( 'MSPress Plugins::load_plugin_file() file=%s namespace=%s class=%s expected=%s', $file, $namespace, $class_name, $expected_class ) );

        $declared_before = get_declared_classes();
        LoggerHelper::write_log( sprintf( 'MSPress Plugins::load_plugin_file() before_require_declared=%d file=%s', count( $declared_before ), basename( $file ) ) );

        try {
            $this->load_plugin_includes( dirname( $file ) );
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::load_plugin_file() include_scan_complete=%s', $file ) );
            require_once $file;
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::load_plugin_file() require_complete=%s', $file ) );

            $new_classes = array_diff( get_declared_classes(), $declared_before );
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::load_plugin_file() new_classes_after_require=%d', count( $new_classes ) ) );

            $plugin_classes = array_filter(
                $new_classes,
                static fn ( string $class ): bool => is_subclass_of( $class, PluginInterface::class )
            );

            $fqcn = ! empty( $plugin_classes )
                ? (string) reset( $plugin_classes )
                : $expected_class;

            LoggerHelper::write_log( sprintf( 'MSPress Plugins::load_plugin_file() fqcn=%s plugin_match_count=%d expected_exists=%s', $fqcn, count( $plugin_classes ), class_exists( $fqcn ) ? 'yes' : 'no' ) );

            if ( ! class_exists( $fqcn ) || ! is_a( $fqcn, PluginInterface::class, true ) ) {
                LoggerHelper::write_log( sprintf( 'MSPress Plugins::load_plugin_file() RESULT: failed file_does_not_implement_plugin_interface file=%s expected=%s', $file, $expected_class ) );
                return;
            }

            $instance = is_callable( [ $fqcn, 'get_instance' ] )
                ? $fqcn::get_instance()
                : new $fqcn();

            LoggerHelper::write_log( sprintf( 'MSPress Plugins::load_plugin_file() created_instance=%s instance_type=%s', $fqcn, get_class( $instance ) ) );

            if ( ! $instance instanceof PluginInterface ) {
                LoggerHelper::write_log( sprintf( 'MSPress Plugins::load_plugin_file() RESULT: failed object_does_not_implement_plugin_interface fqcn=%s', $fqcn ) );
                return;
            }

            $this->register_plugin_instance( $instance );
            $this->loaded_plugins[] = $fqcn;
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::load_plugin_file() RESULT: success registered_plugin=%s', $fqcn ) );
        } catch ( \Throwable $e ) {
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::load_plugin_file() RESULT: failed exception file=%s message=%s', $file, $e->getMessage() ) );
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

        LoggerHelper::write_log( sprintf( 'MSPress Plugins::load_plugin_includes() START plugin_directory=%s candidates=%s', $plugin_directory, wp_json_encode( array_values( array_unique( array_filter( $directory_candidates ) ) ) ) ) );

        $included_any = false;

        foreach ( array_unique( array_filter( $directory_candidates ) ) as $directory ) {
            foreach ( [ 'Includes/Includes.php', 'includes/Includes.php', 'Includes/I18n.php', 'includes/I18n.php', 'Includes/Shortcodes.php', 'includes/Shortcodes.php' ] as $includes_file ) {
                $includes_path = trailingslashit( $directory ) . $includes_file;
                $resolved_include = $this->resolve_existing_file( $includes_path );
                LoggerHelper::write_log( sprintf( 'MSPress Plugins::load_plugin_includes() directory=%s include_file=%s resolved=%s status=%s', $directory, $includes_file, $resolved_include !== '' ? $resolved_include : 'missing', $resolved_include !== '' ? 'WORKING' : 'NOT_FOUND' ) );
                if ( $resolved_include !== '' ) {
                    require_once $resolved_include;
                    LoggerHelper::write_log( sprintf( 'MSPress Plugins::load_plugin_includes() required=%s', $resolved_include ) );
                    $included_any = true;
                }
            }
        }

        if ( ! $included_any ) {
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::load_plugin_includes() RESULT: no related include files found in %s', $plugin_directory ) );
            return;
        }

        LoggerHelper::write_log( sprintf( 'MSPress Plugins::load_plugin_includes() RESULT: success included_from=%s', $plugin_directory ) );
    }
    /**
     * Extracts the namespace from the given PHP file content.
     *
     * @param string $content The content of the PHP file.
     * @return string The extracted namespace, or an empty string if not found.
     */
    private function extract_namespace( string $content ): string {
        if ( preg_match( '/namespace\s+([^;]+);/i', $content, $matches ) ) {
            $namespace = trim( $matches[1] );
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::extract_namespace() RESULT: success namespace=%s', $namespace ) );
            return $namespace;
        }

        LoggerHelper::write_log( 'MSPress Plugins::extract_namespace() RESULT: failed namespace_not_found' );
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
                    $class_name = $tokens[ $index ][1];
                    LoggerHelper::write_log( sprintf( 'MSPress Plugins::extract_class_name() RESULT: success class=%s', $class_name ) );
                    return $class_name;
                }
            }
        }

        LoggerHelper::write_log( 'MSPress Plugins::extract_class_name() RESULT: failed class_not_found' );
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
    private function initialize_plugin( PluginInterface $plugin ): void {
        $slug = $plugin->get_slug();
        LoggerHelper::write_log( sprintf( 'MSPress Plugins::initialize_plugin() START slug=%s active=%s enabled=%s', $slug, $plugin->is_active() ? 'yes' : 'no', $this->is_plugin_enabled( $slug ) ? 'yes' : 'no' ) );

        if ( ! $plugin->is_active() || ! $this->is_plugin_enabled( $plugin->get_slug() ) ) {
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::initialize_plugin() RESULT: skipped_slug=%s reason=inactive_or_disabled', $slug ) );
            return;
        }

        try {
            if ( $plugin instanceof SettingsProviderInterface ) {
                LoggerHelper::write_log( sprintf( 'MSPress Plugins::initialize_plugin() step=settings slug=%s', $slug ) );
                $plugin->register_settings();
            }

            if ( $plugin instanceof CapabilitiesProviderInterface ) {
                LoggerHelper::write_log( sprintf( 'MSPress Plugins::initialize_plugin() step=capabilities slug=%s', $slug ) );
                $plugin->register_capabilities();
            }

            if ( $plugin instanceof DatabaseProviderInterface ) {
                LoggerHelper::write_log( sprintf( 'MSPress Plugins::initialize_plugin() step=database slug=%s', $slug ) );
                $plugin->register_tables();
            }

            if ( $plugin instanceof ShortcodeProviderInterface ) {
                LoggerHelper::write_log( sprintf( 'MSPress Plugins::initialize_plugin() step=shortcodes slug=%s', $slug ) );
                \MSPress\Includes\Functions\Helpers\ShortcodeHelper::register_many( $plugin->get_shortcodes() );
            }

            if ( $plugin instanceof AssetsProviderInterface ) {
                LoggerHelper::write_log( sprintf( 'MSPress Plugins::initialize_plugin() step=assets slug=%s', $slug ) );
                $plugin->register_assets();
            }

            if ( $plugin instanceof AdminPageProviderInterface ) {
                LoggerHelper::write_log( sprintf( 'MSPress Plugins::initialize_plugin() step=admin_pages slug=%s', $slug ) );
                $plugin->register_admin_pages();
            }

            if ( $plugin instanceof RestRouteProviderInterface ) {
                LoggerHelper::write_log( sprintf( 'MSPress Plugins::initialize_plugin() step=rest_routes slug=%s', $slug ) );
                $plugin->register_rest_routes();
            }

            if ( $plugin instanceof FrontendProviderInterface ) {
                LoggerHelper::write_log( sprintf( 'MSPress Plugins::initialize_plugin() step=frontend slug=%s', $slug ) );
                $plugin->register_frontend();
            }

            if ( $plugin instanceof I18nProviderInterface ) {
                LoggerHelper::write_log( sprintf( 'MSPress Plugins::initialize_plugin() step=i18n slug=%s', $slug ) );
                $plugin->load_textdomain();
            }

            LoggerHelper::write_log( sprintf( 'MSPress Plugins::initialize_plugin() step=plugin_init slug=%s', $slug ) );
            $plugin->init();
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::initialize_plugin() RESULT: success slug=%s', $slug ) );
        } catch ( \Throwable $e ) {
            LoggerHelper::write_log( sprintf( 'MSPress Plugins::initialize_plugin() RESULT: failed slug=%s message=%s', $plugin->get_slug(), $e->getMessage() ) );
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
    /**
     * Resolves the first existing file from a list of candidate paths.
     *
     * @param string $path The path to check.
     * @return string The resolved existing file path, or an empty string if none found.
     */
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
    /**
     * Checks if the given path is an absolute path.
     *
     * @param string $path The path to check.
     * @return bool True if the path is absolute, false otherwise.
     */
    private function is_absolute_path( string $path ): bool {
        return preg_match( '/^(?:[A-Za-z]:[\\\\\/]|[\\\\\\/])/', $path ) === 1;
    }
}