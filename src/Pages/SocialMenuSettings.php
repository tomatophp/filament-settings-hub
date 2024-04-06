<?php

namespace TomatoPHP\FilamentSettingsHub\Pages;

use Filament\Notifications\Notification;
use Filament\Pages\Actions\Action;
use Filament\Pages\SettingsPage;
use Filament\Forms\Components\Grid;
use Spatie\Sitemap\SitemapGenerator;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions\ButtonAction;
use Filament\Forms\Components\FileUpload;
use TomatoPHP\FilamentSettingsHub\Settings\SitesSettings;


class SocialMenuSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = SitesSettings::class;

    public function getTitle(): string
    {
        return "Social Menu";
    }

    protected function getActions(): array
    {
        return [
            Action::make('back')->action(fn()=> redirect()->route('filament.admin.pages.settings-hub'))->color('danger')->label(__('Back')),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    protected function getFormSchema(): array
    {
        return [
            Grid::make(['default' => 1])->schema([
                Repeater::make('site_social')
                    ->schema([
                        TextInput::make('vendor'),
                        TextInput::make('link')->url(),
                    ])
                    ->hint(config('filament-settings-hub.show_hint') ?'setting("site_social")': null),
            ])

        ];
    }
}
