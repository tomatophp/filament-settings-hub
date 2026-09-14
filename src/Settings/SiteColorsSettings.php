<?php

namespace TomatoPHP\FilamentSettingsHub\Settings;

use Spatie\LaravelSettings\Settings;

/**
 * Kept in its own group so apps that never enable color settings need no new settings migration.
 */
class SiteColorsSettings extends Settings
{
    public ?string $site_primary_color = null;

    public ?string $site_secondary_color = null;

    public ?string $site_tertiary_color = null;

    public static function group(): string
    {
        return 'site_colors';
    }
}
