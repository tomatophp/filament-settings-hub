<?php

namespace TomatoPHP\FilamentSettingsHub;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Illuminate\View\View;
use Kenepa\TranslationManager\Http\Middleware\SetLanguage;
use TomatoPHP\FilamentSettingsHub\Facades\FilamentSettingsHub;
use TomatoPHP\FilamentSettingsHub\Pages\LocationSettings;
use TomatoPHP\FilamentSettingsHub\Pages\SettingsHub;
use TomatoPHP\FilamentSettingsHub\Pages\SiteSettings;
use TomatoPHP\FilamentSettingsHub\Pages\SocialMenuSettings;
use TomatoPHP\FilamentSettingsHub\Services\Contracts\SettingHold;


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
        FilamentSettingsHub::register([
            SettingHold::make()
                ->label('filament-settings-hub::messages.settings.site.title')
                ->icon('heroicon-o-globe-alt')
                ->route('filament.'.filament()->getCurrentPanel()->getId().'.pages.site-settings')
                ->description('filament-settings-hub::messages.settings.site.description')
                ->group('filament-settings-hub::messages.group'),
            SettingHold::make()
                ->label('filament-settings-hub::messages.settings.social.title')
                ->icon('heroicon-s-bars-3')
                ->route('filament.'.filament()->getCurrentPanel()->getId().'.pages.social-menu-settings')
                ->description('filament-settings-hub::messages.settings.social.description')
                ->group('filament-settings-hub::messages.group'),
            SettingHold::make()
                ->label('filament-settings-hub::messages.settings.location.title')
                ->icon('heroicon-o-map')
                ->route('filament.'.filament()->getCurrentPanel()->getId().'.pages.location-settings')
                ->description('filament-settings-hub::messages.settings.location.description')
                ->group('filament-settings-hub::messages.group'),
        ]);
    }

    public static function make(): static
    {
        return new static();
    }
}
