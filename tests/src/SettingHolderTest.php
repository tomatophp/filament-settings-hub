<?php

use TomatoPHP\FilamentSettingsHub\Pages\SocialMenuSettings;
use TomatoPHP\FilamentSettingsHub\Services\Contracts\SettingHold;

it('can attach new setting to setting holder', function () {
    \TomatoPHP\FilamentSettingsHub\Facades\FilamentSettingsHub::register([
        SettingHold::make()
            ->page(SocialMenuSettings::class)
            ->order(0)
            ->label('filament-settings-hub::messages.settings.social.title')
            ->icon('heroicon-s-bars-3')
            ->description('filament-settings-hub::messages.settings.social.description')
            ->group('filament-settings-hub::messages.group'),
    ]);

    \PHPUnit\Framework\assertEquals(1, \TomatoPHP\FilamentSettingsHub\Facades\FilamentSettingsHub::load()->count());
});
