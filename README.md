# MSPress

MSPress is a standalone WordPress plugin for Microsoft 365 integrations and plugin-owned WordPress features.

## Requirements

- WordPress 6.4 or later
- PHP 8.1 or later
- Composer
- Node.js and npm for frontend asset development

## Development

Install dependencies:

```powershell
composer install
npm install
```

Build frontend assets:

```powershell
npm run build
```

Regenerate translations:

```powershell
npm run i18n:pot
npm run i18n:mo
```

## Structure

- `mspress.php`: WordPress plugin bootstrap and activation lifecycle
- `src/Plugin.php`: plugin hook registration
- `src/Includes/`: plugin settings, shortcodes, capabilities, and WordPress lifecycle modules
- `src/Assets/`: frontend asset registration and source files
- `src/Admin/`: admin-only functionality
- `src/Languages/`: translation catalogs

## Usage

Install the plugin in `wp-content/plugins/` and activate it from the WordPress admin. MSPress registers its own WordPress hooks and does not require another plugin to be installed or active.

The example status shortcode is available as `[ms_press_status]`.
