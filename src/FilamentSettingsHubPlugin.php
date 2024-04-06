<?php

namespace TomatoPHP\FilamentSettingsHub;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Illuminate\View\View;
use Kenepa\TranslationManager\Http\Middleware\SetLanguage;
use TomatoPHP\FilamentSettingsHub\Pages\LocationSettings;
use TomatoPHP\FilamentSettingsHub\Pages\SettingsHub;
use TomatoPHP\FilamentSettingsHub\Pages\SiteSettings;
use TomatoPHP\FilamentSettingsHub\Pages\SocialMenuSettings;



class FilamentSettingsHubPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-settings-hub';
    }

    public function register(Panel $panel): void
    {
        $panel->pages([
                SettingsHub::class,
                SiteSettings::class,
                SocialMenuSettings::class,
                LocationSettings::class
            ]);

    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return new static();
    }
}
