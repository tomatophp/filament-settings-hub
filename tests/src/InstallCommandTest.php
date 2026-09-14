<?php

use Illuminate\Support\Facades\File;
use TomatoPHP\FilamentSettingsHub\Console\FilamentSettingsHubInstall;

use function Pest\Laravel\artisan;

beforeEach(function () {
    // The real command shells out to `php artisan migrate`; skip that sub-process in tests.
    app()->bind(FilamentSettingsHubInstall::class, fn () => new class extends FilamentSettingsHubInstall
    {
        public function artisanCommand(array $command, ?bool $withOutput = false): void {}
    });
});

afterEach(function () {
    File::delete(File::glob(database_path('migrations/*_sites_settings.php')));
    File::delete(File::glob(database_path('migrations/*_site_colors_settings.php')));
});

it('runs the install command and publishes the settings migrations', function () {
    artisan('filament-settings-hub:install')->assertSuccessful();

    expect(File::glob(database_path('migrations/*_sites_settings.php')))->toHaveCount(1)
        ->and(File::glob(database_path('migrations/*_site_colors_settings.php')))->toHaveCount(1);
});

it('does not publish a settings migration twice when install runs again', function () {
    artisan('filament-settings-hub:install')->assertSuccessful();
    artisan('filament-settings-hub:install')->assertSuccessful();

    expect(File::glob(database_path('migrations/*_sites_settings.php')))->toHaveCount(1)
        ->and(File::glob(database_path('migrations/*_site_colors_settings.php')))->toHaveCount(1);
});
