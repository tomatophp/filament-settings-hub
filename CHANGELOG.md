### V5.0.1

- optional site color settings page (primary, secondary, tertiary) in its own `site_colors` settings group, enabled with `->allowColorSettings()` (thanks @gkid-693, #23)
- `filament-settings-hub:install` publishes each settings migration once, running it again no longer duplicates them

# Changelog

## v5.0.0

- Support Filament v5 and Laravel 12 / 13
- Remove a leftover debug call from the settings hub view
- Tests: install command coverage, CI matrix for Laravel 12 / 13 and PHP 8.3 / 8.4
