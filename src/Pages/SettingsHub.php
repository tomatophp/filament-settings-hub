<?php

namespace TomatoPHP\FilamentSettingsHub\Pages;

use Filament\Pages\Page;

class SettingsHub extends Page
{
    public static ?string $title = 'Settings';

    public static ?string $navigationIcon = 'heroicon-o-cog';

    public static string $view = 'filament-settings-hub::index';

    public static function getNavigationGroup(): ?string
    {
        return 'Settings';
    }

    public function getTitle(): string
    {
        return "Settings";
    }


}
