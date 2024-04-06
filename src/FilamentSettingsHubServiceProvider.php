<?php

namespace TomatoPHP\FilamentSettingsHub;

use Illuminate\Support\ServiceProvider;
use TomatoPHP\FilamentSettingsHub\Facades\FilamentSettingsHub;
use TomatoPHP\FilamentSettingsHub\Services\Contracts\SettingHold;
use TomatoPHP\FilamentSettingsHub\Services\SettingHolderHandler;

require_once __DIR__.'/helpers.php';

class FilamentSettingsHubServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Register generate command
        $this->commands([
           \TomatoPHP\FilamentSettingsHub\Console\FilamentSettingsHubInstall::class,
        ]);

        //Register Config file
        $this->mergeConfigFrom(__DIR__.'/../config/filament-settings-hub.php', 'filament-settings-hub');

        //Publish Config
        $this->publishes([
           __DIR__.'/../config/filament-settings-hub.php' => config_path('filament-settings-hub.php'),
        ], 'filament-settings-hub-config');

        //Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        //Publish Migrations
        $this->publishes([
           __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'filament-settings-hub-migrations');
        //Register views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'filament-settings-hub');

        //Publish Views
        $this->publishes([
           __DIR__.'/../resources/views' => resource_path('views/vendor/filament-settings-hub'),
        ], 'filament-settings-hub-views');

        //Register Langs
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'filament-settings-hub');

        //Publish Lang
        $this->publishes([
           __DIR__.'/../resources/lang' => base_path('lang/vendor/filament-settings-hub'),
        ], 'filament-settings-hub-lang');


        $this->app->bind('filament-settings-hub', function () {
            return new SettingHolderHandler();
        });
    }

    public function boot(): void
    {
        FilamentSettingsHub::register([
            SettingHold::make()
                ->label('filament-settings-hub::messages.settings.site.title')
                ->icon('heroicon-o-globe-alt')
                ->route('filament.admin.pages.site-settings')
                ->description('filament-settings-hub::messages.settings.site.description')
                ->group('filament-settings-hub::messages.group'),
            SettingHold::make()
                ->label('filament-settings-hub::messages.settings.social.title')
                ->icon('heroicon-s-bars-3')
                ->route('filament.admin.pages.social-menu-settings')
                ->description('filament-settings-hub::messages.settings.social.description')
                ->group('filament-settings-hub::messages.group'),
            SettingHold::make()
                ->label('filament-settings-hub::messages.settings.location.title')
                ->icon('heroicon-o-map')
                ->route('filament.admin.pages.location-settings')
                ->description('filament-settings-hub::messages.settings.location.description')
                ->group('filament-settings-hub::messages.group'),
        ]);
    }
}
