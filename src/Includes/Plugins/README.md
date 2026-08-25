# MSPress Plugin Template

Every discovered MSPress plugin should use this structure:

```text
PluginName/
|- Assets/
|  |- dist/
|  |  |- css/
|  |  `- js/
|  |- js/
|  |- scss/
|  `- Assets.php
|- Includes/
|  |- Core/
|  |  `- Database.php (optional for new tables)
|  |  `- Capabilities.php (Optional for new Capabilities)
|  |  `- I18n.php
|  |  `- Shortcodes.php (Optional for new Shortcodes)
|  |- Settings/
|  |  `- Settings.php
|  `- Includes.php
|- Language/
|  `- PluginName.pot
`- PluginName.php
```

`PluginName.php` must implement `PluginInterface`. The loader discovers direct PHP bootstrap files in each plugin directory and validates that contract at runtime; the `Assets`, `Includes`, settings, and language directories are optional. It calls optional capability methods when the plugin implements their corresponding interfaces, then calls `init()`.

A plugin should use composition for its `Assets`, `Includes`, and `Settings` classes. MSPress core service classes are final and must not be extended.

The required plugin contract is:

- `get_slug()` returns a unique machine-readable identifier.
- `get_name()` returns the display name.
- `get_version()` returns the plugin version.
- `get_author()` returns the author name.
- `get_author_uri()` returns the author's website.
- `get_description()` returns the plugin description.
- `get_uri()` returns the plugin homepage.
- `get_license()` returns the plugin license identifier.
- `is_active()` controls whether the plugin initializes.
- `init()` performs the plugin's main setup.

Optional capabilities are defined in `PluginsInterface.php`:

- `SettingsProviderInterface::register_settings()`
- `CapabilitiesProviderInterface::register_capabilities()`
- `DatabaseProviderInterface::register_tables()`
- `AssetsProviderInterface::register_assets()`
- `AdminPageProviderInterface::register_admin_pages()`
- `RestRouteProviderInterface::register_rest_routes()`
- `FrontendProviderInterface::register_frontend()`
- `I18nProviderInterface::load_textdomain()`
- `DashboardProviderInterface::get_dashboard_statuses()` and
	`DashboardProviderInterface::get_dashboard_cards()`

Dashboard providers contribute operational information to the MSPress
dashboard. A status definition should include `label`, `state`, and
`message`; a card definition should include `title` and `description`.
Both may also provide `value`, `icon`, `url`, `priority`, and `capability`.
The `mspress_dashboard_statuses` and `mspress_dashboard_cards` filters are
available for extensions that do not use the discovered plugin interface.

Plugins that define their own permissions should place them in
`Includes/Core/Capabilities.php` and expose them through
`CapabilitiesProviderInterface::register_capabilities()`. The provider should
call the core `Capabilities::extend()` method with its definitions. Provider
capability classes use composition because the core registry is final. The
core registry merges these definitions with core capabilities and installs
missing capabilities on the administrator role.

Plugins that provide translations should implement `I18nProviderInterface`, keep
their text-domain loader in `Includes/Core/I18n.php` or `Includes/I18n.php`, and
store translation templates and language files in `Language/`. The loader must
use `MSPRESS_FILE` and a path relative to the plugin directory.
