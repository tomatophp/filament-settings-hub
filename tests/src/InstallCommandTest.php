<?php

use Illuminate\Support\Facades\File;
use TomatoPHP\FilamentSettingsHub\Console\FilamentSettingsHubInstall;

use function Pest\Laravel\artisan;

afterEach(function () {
    File::delete(File::glob(database_path('migrations/*_sites_settings.php')));
});

it('runs the install command and publishes the settings migration', function () {
    // The real command shells out to `php artisan migrate`; skip that sub-process in tests.
    app()->bind(FilamentSettingsHubInstall::class, fn () => new class extends FilamentSettingsHubInstall
    {
        public function artisanCommand(array $command, ?bool $withOutput = false): void {}
    });

    artisan('filament-settings-hub:install')->assertSuccessful();

    expect(File::glob(database_path('migrations/*_sites_settings.php')))->not->toBeEmpty();
});
