<?php

namespace TomatoPHP\FilamentSettingsHub\Pages;

use Filament\Pages\Page;

class SettingsHub extends Page
{

    public static ?string $navigationIcon = 'heroicon-o-cog';

    public static string $view = 'filament-settings-hub::index';

    public static function getNavigationGroup(): ?string
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
