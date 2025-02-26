<?php

namespace TomatoPHP\FilamentSettingsHub;

use Illuminate\Support\ServiceProvider;
use TomatoPHP\FilamentSettingsHub\Services\SettingHolderHandler;

require_once __DIR__ . '/helpers.php';

class FilamentSettingsHubServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Register generate command
        $this->commands([
            \TomatoPHP\FilamentSettingsHub\Console\FilamentSettingsHubInstall::class,
        ]);

        // Register Config file
        $this->mergeConfigFrom(__DIR__ . '/../config/filament-settings-hub.php', 'filament-settings-hub');

        // Publish Config
        $this->publishes([
            __DIR__ . '/../config/filament-settings-hub.php' => config_path('filament-settings-hub.php'),
        ], 'filament-settings-hub-config');

        // Register Migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Publish Migrations
        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations'),
        ], 'filament-settings-hub-migrations');
        // Register views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'filament-settings-hub');

        // Publish Views
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/filament-settings-hub'),
        ], 'filament-settings-hub-views');

        // Register Langs
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'filament-settings-hub');

        // Publish Lang
        $this->publishes([
            __DIR__ . '/../resources/lang' => base_path('lang/vendor/filament-settings-hub'),
        ], 'filament-settings-hub-lang');

        $this->app->bind('filament-settings-hub', function () {
            return new SettingHolderHandler;
        });
    }

    public function boot(): void
    {
        //
    }
}
