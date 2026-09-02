<?php

/**
 * The file that defines the core MSPress class
 *
 * A class definition that Includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://https://trilb.dev/MrTrilB
 * @since      1.0.0
 *
 * @package    MSPress
 * @subpackage MSPress/Includes
 */
namespace MSPress;
use MSPress\Admin\Admin;
use MSPress\Assets\Assets;
use MSPress\Includes\Includes;
use MSPress\Includes\Core\WP\I18n;
use MSPress\Includes\Functions\Helpers\LoaderHelper;
use MSPress\Includes\Functions\Admin\FunctionsExport;
use MSPress\Includes\Functions\Admin\FunctionsImport;
use MSPress\Includes\Functions\Admin\FunctionsPlugins;
use MSPress\Includes\Functions\Admin\FunctionsSettings;
use MSPress\API\Routes;
use MSPress\Includes\Analytics\Analytics;
use MSPress\Includes\Plugins\Plugins;

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    MSPress
 * @subpackage MSPress/src
 * @author     MrTrilB <mrtrilb@trilb.dev>
 */
class MSPress {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected LoaderHelper $loader;

	/**
	 * The file path to the main plugin file.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $mspress_file    The file path to the main plugin file.
	 */
	protected string $mspress_file;
	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $mspress_name    The string used to uniquely identify this plugin.
	 */
	protected $mspress_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;
	/**
	 * The instance of the Includes class that handles the plugin's Includes.
	 *
	 * @var Includes
	 * @since 1.0.0
	 * @access protected
	 */
	protected Includes $includes;

	/**
	 * The instance of the Assets class that handles the plugin's assets.
	 *
	 * @var Assets
	 * @since 1.0.0
	 * @access protected
	 */
	protected Assets $assets;

	/**
	 * The instance of the Admin class that handles the plugin's admin functionality.
	 *
	 * @var Admin
	 * @since 1.0.0
	 * @access protected
	 */
	protected Admin $admin;

	/**
	 * The MSPress plugin registry and discovery service.
	 *
	 * @var Plugins
	 * @since 1.0.0
	 * @access protected
	 */
	protected Plugins $plugins;
	/**
	 * The instance of the FunctionsExport class that handles the plugin's export functionality.
	 *
	 * @var FunctionsExport
	 * @since 1.0.0
	 * @access protected
	 */
	protected FunctionsExport $export_functions;
	/**
	 * The instance of the FunctionsImport class that handles the plugin's import functionality.
	 *
	 * @var FunctionsImport
	 * @since 1.0.0
	 * @access protected
	 */
	protected FunctionsImport $import_functions;
	/**
	 * The instance of the FunctionsSettings class that handles the plugin's settings functionality.
	 *
	 * @var FunctionsSettings
	 * @since 1.0.0
	 * @access protected
	 */
	protected FunctionsSettings $settings_functions;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct( string $mspress_file = MSPRESS_FILE, string $mspress_name = MSPRESS_NAME, string $version = MSPRESS_VERSION ) {
		$this->mspress_file = $mspress_file;
		$this->mspress_name = sanitize_key( $mspress_name );
		$this->version = $version;

		$this->load_dependencies();
		$this->set_locale();
		$this->define_core_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - MSPress_Loader. Orchestrates the hooks of the plugin.
	 * - MSPress_i18n. Defines internationalization functionality.
	 * - MSPress_Admin. Defines all hooks for the admin area.
	 * - MSPress_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {
		$this->loader = new LoaderHelper();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the MSPress_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$mspress_i18n = new I18n( $this->mspress_name, null, $this->mspress_file );

		$this->loader->add_action( 'plugins_loaded', $mspress_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_core_hooks() {
		/**
		 * The instance of the Includes class that handles the plugin's includes.
		 *
		 * @var Includes
		 * @since 1.0.0
		 * @access protected
		 */
		$this->includes = Includes::get_instance();
		/**
		 * The instance of the Assets class that handles the plugin's assets.
		 *
		 * @var Assets
		 * @since 1.0.0
		 * @access protected
		 */
		$this->assets = new Assets();
		/**
		 * The instance of the Admin class that handles the plugin's admin functionality.
		 *
		 * @var Admin
		 * @since 1.0.0
		 * @access protected
		 */
		$this->assets->register();
		/**
		 * The instance of the Admin class that handles the plugin's Admin functionality.
		 *
		 * @var Admin
		 * @since 1.0.0
		 * @access protected
		 */
		$this->admin = new Admin( $this->assets );
		/**
		 * The ModPress plugin registry and discovery service.
		 *
		 * @var Plugins
		 * @since 1.0.0
		 * @access protected
		 */
		$this->plugins = Plugins::get_instance();
		/**
		 * The instance of the FunctionsExport class that handles the plugin's export functionality.
		 *
		 * @var FunctionsExport
		 * @since 1.0.0
		 * @access protected
		 */
		$this->export_functions = new FunctionsExport();
		/**
		 * The instance of the FunctionsImport class that handles the plugin's import functionality.
		 *
		 * @var FunctionsImport
		 * @since 1.0.0
		 * @access protected
		 */
		$this->import_functions = new FunctionsImport();
		/**
		 * The instance of the FunctionsSettings class that handles the plugin's settings functionality.
		 *
		 * @var FunctionsSettings
		 * @since 1.0.0
		 * @access protected
		 */
		$this->settings_functions = new FunctionsSettings( new FunctionsPlugins() );

		$this->loader->add_action( 'init', $this->includes, 'init' );
		$this->loader->add_action( 'init', $this->plugins, 'init', -10 );
		$this->loader->add_action( 'admin_menu', $this->admin, 'register_admin_menu' );
		$this->loader->add_action( 'admin_init', $this->settings_functions, 'register_settings' );
		$this->loader->add_action( 'admin_post_modpress_export', $this->export_functions, 'export_data' );
		$this->loader->add_action( 'admin_post_modpress_import', $this->import_functions, 'import_data' );
		$this->loader->add_action( 'admin_enqueue_scripts', $this->assets, 'enqueue_admin' );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->mspress_name;
	}
	/**
	 * Retrieve the main MSPress file path.
	 *
	 * @since     1.0.0
	 * @return    string    The main MSPress file path.
	 */
	public function get_mspress_file(): string {
		return $this->mspress_file;
	}
	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_includes(): Includes {
		return $this->includes;
	}
	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_assets(): Assets {
		return $this->assets;
	}
	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_admin(): Admin {
		return $this->admin;
	}
	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_plugins(): Plugins {
		return $this->plugins;
	}
	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function register_extension( callable $extension ): self {
		$this->includes->register_extension( $extension );

		return $this;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
