# MSPress

MSPress is a reusable WordPress plugin template by TrilB.Dev. It provides a starting point for plugins with modular services, settings, REST routes, admin pages, frontend behavior, compiled assets, and optional internal or external extensions. Replace the placeholder names and remove the modules your plugin does not need.

## Requirements

- WordPress with REST API support
- PHP version supported by the current MSPress codebase and its Composer dependencies
- Node.js and npm only when rebuilding frontend assets

Install PHP dependencies with Composer and build the frontend assets with:

```bash
npm install
npm run build
```

The build writes compiled assets to `src/Assets/dist`.

## Included Architecture

- Optional custom post types, taxonomies, admin pages, and frontend features
- A namespaced REST API when the plugin exposes routes
- Database-backed settings grouped by feature
- Shared sanitization, request, permission, query, content, URL, AJAX, and form helpers
- Bootstrap-based admin assets compiled with Webpack and Sass
- Optional Font Awesome integration
- Internal extension discovery and registration
- Integration with separately installed WordPress plugins

## Documentation

- [REST API](Docs/API.md)
- [Helpers](Docs/HELPERS.md)
- [Settings](Docs/SETTINGS.md)
- [Internal plugins](Docs/INTERNAL_PLUGINS.md)
- [WordPress plugin integration](Docs/WORDPRESS_PLUGINS.md)

## Project Structure

```text
src/
|- API/                         REST API services, routes, schemas, responses
|- Admin/                       Admin pages and UI managers
|- Assets/                      Shared source and compiled assets
|- Includes/Functions/          Reusable helper classes and functions
|- Includes/Plugins/            Internal extension system
|- Includes/Settings/           Settings facade and database manager
|- Languages/                   Translation catalogs and compiled language files
`- Plugin.php                   Main bootstrap class
```

## Extension Model

A MSPress extension implements `PluginInterface`, returns a unique slug, and exposes metadata and an `init()` method. Optional capability interfaces add settings, assets, admin pages, REST routes, frontend behavior, database tables, shortcodes, or translations.

Internal extensions are discovered from the configured MSPress plugin directory. A normal WordPress plugin can register an extension by hooking `mspress_register_plugin` and calling `Plugins::register_plugin()`.

See [INTERNAL_PLUGINS.md](Docs/INTERNAL_PLUGINS.md) and [WORDPRESS_PLUGINS.md](Docs/WORDPRESS_PLUGINS.md) for complete examples.

## Development Checks

```bash
npm run build
php -l path/to/changed-file.php
git diff --check
```

Check the package scripts and PHPUnit configuration before relying on a test command. The template may contain placeholder scripts that must be replaced when a plugin adds automated tests.

## License

MSPress is distributed under the license declared by the project and its individual dependencies. Confirm the applicable license before redistributing a packaged build.


## Usage

Install the plugin in `wp-content/plugins/` and activate it from the WordPress admin. MSPress registers its own WordPress hooks and does not require another plugin to be installed or active.

MSPress uses a fresh installation. Settings are stored in the WordPress database table `{$wpdb->prefix}mspress_settings`.

Microsoft 365 credentials are encrypted with Defuse PHP Encryption. On activation, MSPress generates a key and adds it to `wp-config.php` when `MSPRESS_ENCRYPTION_KEY` is not already defined. If the file is not writable, add the key manually:

```php
define( 'MSPRESS_ENCRYPTION_KEY', 'your-defuse-key' );
```

Do not commit the key or store it in the WordPress database.

The example status shortcode is available as `[ms_press_status]`.
