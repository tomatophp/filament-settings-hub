<?php

namespace TomatoPHP\FilamentSettingsHub\Settings;

use Spatie\LaravelSettings\Settings;

class SitesSettings extends Settings
{
    public string $site_name;

    public ?string $site_description = null;

    public ?string $site_keywords = null;

    public mixed $site_profile = null;

    public mixed $site_logo = null;

    public ?string $site_author = null;

    public ?string $site_address = null;

    public ?string $site_email = null;

    public ?string $site_phone = null;

    public ?string $site_phone_code = null;

    public ?string $site_location = null;

    public ?string $site_currency = null;

    public ?string $site_language = null;

    public ?array $site_social = [];

    public static function group(): string
    {
        return 'sites';
    }
}
