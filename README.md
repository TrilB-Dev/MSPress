# MSPress

MSPress is a standalone WordPress plugin for Microsoft 365 integrations and
plugin-owned WordPress features. It provides a modular foundation for settings,
admin pages, shared helpers, compiled assets, and extensions that integrate with
Microsoft services.

## Requirements

- WordPress 6.4 or newer
- PHP 8.1 or newer
- Composer for installing PHP dependencies
- Node.js and npm when rebuilding frontend assets

Install the plugin dependencies from the project root:

```bash
composer install
npm install
npm run build
```

The Webpack build writes shared compiled assets to `src/Assets/dist`. Internal
plugins keep their source and compiled assets within their own plugin directory
and register them through the central `MSPress\Assets\Assets` service.

## Features

- Microsoft Graph connection infrastructure and Microsoft 365 integrations
- Exchange email integration with its own settings, email templates, route trace,
  and sent log admin pages
- Database-backed, feature-grouped settings with typed accessors
- Capability, nonce, sanitization, request, query, URL, AJAX, menu, and form helpers
- Provider-owned admin menus, sidebars, shortcodes, translations, and assets
- Internal extension discovery and registration
- Integration with separately installed WordPress plugins
- Optional REST routes, custom post types, taxonomies, and frontend features

The Exchange pages are grouped below the **Exchange** admin menu. The Exchange
settings page uses the `mspress-exchange-settings` page slug.

## Installation

1. Copy the MSPress directory to `wp-content/plugins/`.
2. From the plugin directory, run `composer install` when installing from source.
3. Activate MSPress from the WordPress Plugins screen.

MSPress registers its own WordPress hooks and does not require another plugin to
be active. Microsoft Graph features may require Microsoft 365 application
credentials and the permissions documented by the feature that uses them.

## Configuration and Data

MSPress stores settings in the WordPress database table
`{$wpdb->prefix}mspress_settings`. Read and write settings through the
`MSPress\Includes\Settings\Settings` facade rather than querying the table
directly.

Microsoft 365 credentials are encrypted with Defuse PHP Encryption. On
activation, MSPress generates an encryption key and adds it to `wp-config.php`
when `MSPRESS_ENCRYPTION_KEY` is not already defined. If `wp-config.php` is not
writable, add the key manually:

```php
define( 'MSPRESS_ENCRYPTION_KEY', 'your-defuse-key' );
```

Never commit the key or store it in the WordPress database.

The built-in example status shortcode is `[ms_press_status]`.

## Project Structure

```text
src/
|- Admin/                         Core admin pages and UI managers
|- Assets/                        Shared source and compiled assets
|- Includes/Core/                 Shared WordPress infrastructure
|- Includes/Functions/            Reusable helpers and admin functions
|- Includes/MSGraph/              Generic Microsoft Graph and OAuth services
|- Includes/Plugins/              Internal extensions, including Exchange
|- Includes/Settings/             Settings facade and database manager
|- Languages/                     Core translation catalogs and compiled files
`- Plugin.php                     Main plugin controller
```

## Extension Model

An MSPress extension implements `PluginInterface`, provides a unique slug and
metadata, and exposes an `init()` method. Optional provider interfaces add only
the capabilities an extension needs, including settings, database tables,
shortcodes, assets, admin pages and menus, sidebars, REST routes, frontend
behavior, and translations.

Internal extensions are discovered and initialized by the MSPress plugin loader.
An independently installed WordPress plugin can register an extension through
the `mspress_register_plugin` action and
`MSPress\Includes\Plugins\Plugins::register_plugin_instance()`.

Keep feature behavior inside the owning extension. Shared MSPress services
provide generic contracts and infrastructure, while an extension owns its
settings, capabilities, callbacks, page conditions, translations, and business
rules.

See [Internal plugins](Docs/INTERNAL_PLUGINS.md) and
[WordPress plugin integration](Docs/WORDPRESS_PLUGINS.md) for examples.

## Development

Documentation for the main extension points is available here:

- [REST API](Docs/API.md)
- [Helpers](Docs/HELPERS.md)
- [Settings](Docs/SETTINGS.md)
- [Internal plugins](Docs/INTERNAL_PLUGINS.md)
- [WordPress plugin integration](Docs/WORDPRESS_PLUGINS.md)

Run the focused checks appropriate to the files you change:

```bash
php -l path/to/changed-file.php
composer test
npm run build
git diff --check
```

When changing translatable strings, regenerate the translation catalogs:

```bash
npm run i18n:pot
npm run i18n:mo
```

## License

MSPress is licensed under [GPL-2.0-or-later](https://www.gnu.org/licenses/gpl-2.0.html).
Dependencies retain their own licenses and notices.
