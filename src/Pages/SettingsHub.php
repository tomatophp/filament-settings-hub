<?php

namespace TomatoPHP\FilamentSettingsHub\Pages;

use BackedEnum;
use Filament\Pages\Page;
use TomatoPHP\FilamentSettingsHub\Traits\UseShield;

class SettingsHub extends Page
{
    use UseShield;

    public static string | BackedEnum | null $navigationIcon = 'heroicon-o-cog';

    public string $view = 'filament-settings-hub::index';

    public static function getNavigationGroup(): string | BackedEnum | null
    {
        return trans('filament-settings-hub::messages.group');
    }

    public function getTitle(): string
    {
        return trans('filament-settings-hub::messages.title');
    }

    public static function getNavigationLabel(): string
    {
        return trans('filament-settings-hub::messages.title');
    }
}
