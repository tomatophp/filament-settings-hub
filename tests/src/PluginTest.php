<?php

use Filament\Facades\Filament;
use TomatoPHP\FilamentSettingsHub\FilamentSettingsHubPlugin;

it('registers plugin', function () {
    $panel = Filament::getCurrentPanel();

    $panel->plugins([
        FilamentSettingsHubPlugin::make(),
    ]);

    expect($panel->getPlugin('filament-settings-hub'))
        ->not()
        ->toThrow(Exception::class);
});
