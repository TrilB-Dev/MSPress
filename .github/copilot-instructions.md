# MSPress Architecture

## Repository layout

MSPress is a modular WordPress plugin. The `src/` directory contains the core
application and its internal extensions:

- `src/Admin/` contains the MSPress admin UI and admin managers.
- `src/Assets/` is the single asset pipeline. `src/Assets/Assets.php` owns
  registration and enqueueing of styles and scripts.
- `src/Includes/` contains the application services and working code.
- `src/Includes/Core/` contains WordPress-specific infrastructure and shared
  registries, including activation, deactivation, language, database, loaders,
  queries, capabilities, editor, and shortcode support.
- `src/Includes/Functions/` contains reusable admin functions and helpers.
- `src/Includes/MSGraph/` contains the generic Microsoft Graph connection and
  transport code. It must not contain feature-specific plugin behavior.
- `src/Includes/Settings/` contains the core settings storage and management
  services. It provides extension points for internal and WordPress plugins.
- `src/Languages/` contains MSPress translations.
- `src/Plugin.php` is the application entry point that wires the core services.

Do not place feature implementation in core when it belongs to an internal
plugin. Core should provide generic services, registries, interfaces, hooks,
and extension points. When a core service, registry, interface, hook, or
extension point is needed, design it generically so it can be reused by other
plugins and future features, not only by the feature that introduced it.

## Internal plugins

Each directory under `src/Includes/Plugins/` is a self-contained extension of
MSPress. Treat it as a miniature MSPress application with its own bootstrap,
assets, includes, settings, translations, capabilities, and shortcodes where
needed.

The plugin root bootstrap file must implement the contracts in
`src/Includes/Plugins/PluginsInterface.php`. `Plugins.php` discovers and
initializes active plugins through those interfaces. Do not bypass the plugin
loader with direct feature requires from `Plugin.php` or core bootstrap code.

Use this structure for internal plugins:

```text
PluginName/
|- Admin/
|  `- AdminFileName.php (optional for admin-only features)
|- Assets/
|  |- dist/css/
|  |- dist/js/
|  |- js/
|  |- scss/
|  `- Assets.php
|- Includes/
|  |- Core/
|  |  |- I18n.php
|  |  |- Capabilities.php       (optional)
|  |  |- Shortcodes.php          (optional)
|  |  `- Database.php            (optional)
|  |- Functions/                 (optional)
|  |- Settings/
|  |  `- Settings.php
|  `- Includes.php
|- Language/ or Languages/
`- PluginName.php
```

Prefer composition for plugin `Includes`, `Settings`, and other service
classes. Do not extend final MSPress services. Keep plugin behavior inside its
plugin directory: for example, Exchange behavior belongs under
`src/Includes/Plugins/Exchange/`, not in core settings, sidebar, or Graph
classes.

## Assets

All assets must flow through `src/Assets/Assets.php`.

- Plugin asset classes may define asset lists and page conditions, but must
  register them through the central `MSPress\Assets\Assets` service.
- In JavaScript, use arrow functions (`() =>`) instead of `function ()` syntax.
- Use the central page registry and its enqueue pipeline; do not call
  `wp_enqueue_style()` or `wp_enqueue_script()` directly from plugin code.
- Do not add provider-specific `mspress_frontend_assets` or
  `mspress_admin_assets` filters when central page registration can express the
  requirement.
- Keep source JavaScript and SCSS in the plugin's `Assets/js` and `Assets/scss`
  directories, and generated files in `Assets/dist`.
- Preserve page-specific loading conditions so plugin assets do not load on
  unrelated admin pages.

## Extension boundaries

- Put WordPress registration and shared infrastructure in core; put business
  behavior in the owning internal plugin.
- Keep feature-specific conditions, selectors, settings keys, labels,
  capabilities, and business rules out of shared core classes.
- Before changing core, use this decision gate:
  1. Can the behavior live entirely in the owning plugin? If yes, keep it
     there.
  2. If not, does the same need exist in at least two plugins? If no, do not
     add a core-specific solution.
  3. If yes, add a generic, backward-compatible extension point and let the
     plugin provide the feature-specific data or behavior.
- If functionality belongs in core because it is a service, registry,
  interface, hook, or extension point, keep its API feature-neutral and make it
  useful to multiple plugins or future integrations.
- Put Graph connection, token, transport, and generic OAuth mechanics in
  `Includes/MSGraph`; let the owning plugin consume generic Graph hooks and
  handle feature-specific redirects, persistence, and behavior.
- Register plugin settings from the plugin's `Includes/Settings/Settings.php`
  through the core settings extension points.
- Put plugin permissions in its `Includes/Core/Capabilities.php` and register
  them through the plugin initializer.
- Put plugin translations in its language directory and load them through the
  plugin's i18n provider.
- Use provider-owned admin pages, sidebar entries, AJAX handlers, REST routes,
  and shortcodes instead of hard-coding a plugin name in core.

## Reusable APIs

- Before adding local logic, check the existing APIs and helpers in
  `src/Includes/Core/`, `src/Includes/Functions/`, `src/Includes/Settings/`,
  and `src/Includes/Plugins/PluginsInterface.php`.
- Prefer the existing settings, sanitization, permission, form-field, AJAX,
  and response helpers over duplicating their behavior.
- Any and all form elements must be rendered through `src/Includes/Functions/Helpers/FormFieldHelper.php`; no exceptions.
- Use hooks, filters, provider interfaces, and generic metadata when extending
  core. Do not make shared services identify a provider by slug or class name.

## Security and quality

- Check capabilities before privileged admin, AJAX, REST, settings, import,
  export, or file operations.
- Verify nonces for state-changing admin and AJAX requests, validate REST
  permissions, and sanitize request input with the appropriate WordPress or
  project helper.
- Escape output for its context and validate URLs, IDs, file paths, and upload
  types before use.
- Never hard-code credentials, tokens, salts, or environment-specific paths.
  Do not log secrets or sensitive request data.
- Keep admin-only code out of frontend execution paths and avoid loading
  feature assets globally.

## Localization

- Keep provider translations in the owning plugin's `Language/` or
  `Languages/` directory and use the provider's text domain. Keep MSPress core
  translations under `src/Languages/`.
- When adding or changing translatable strings, run `npm run i18n:pot` and
  `npm run i18n:mo` when those scripts are available in the repository.
- Do not move provider strings into the core catalog or hard-code translated
  text in shared core code.

## Change guidance

Before editing, identify the owning layer and keep the change within that
boundary. Read the relevant README and documentation before changing
architecture, then inspect the nearest implementation, provider interface,
and test or call site. Preserve existing public interfaces unless a contract
change is required, and update every internal implementation when a provider
interface changes.

Validate focused PHP with `php -l`, changed JavaScript with `node --check`, and
run focused tests before broader checks. Run `npm run build` when JavaScript,
SCSS, webpack entries, or asset registration changes. Review generated assets
for stale bundles, run `git diff --check`, and inspect deleted, generated, and
unrelated worktree changes before finishing.