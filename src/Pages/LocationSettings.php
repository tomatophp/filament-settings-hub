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


class LocationSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = SitesSettings::class;

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    protected function getActions(): array
    {
        $tenant = \Filament\Facades\Filament::getTenant();
        if($tenant){
            return [
                Action::make('back')->action(fn()=> redirect()->route('filament.admin.pages.settings-hub', $tenant))->color('danger')->label(trans('filament-settings-hub::messages.back')),
            ];
        }

        return [
            Action::make('back')->action(fn()=> redirect()->route('filament.admin.pages.settings-hub'))->color('danger')->label(trans('filament-settings-hub::messages.back')),
        ];

    }

    public function getTitle(): string
    {
        return trans('filament-settings-hub::messages.settings.location.title');
    }

    protected function getFormSchema(): array
    {
        return [
            Grid::make(['default' => 1])->schema([
                TextArea::make('site_address')
                    ->label(trans('filament-settings-hub::messages.settings.location.form.site_address'))
                    ->hint(config('filament-settings-hub.show_hint') ?'setting("site_address")': null),
                TextInput::make('site_phone_code')
                    ->label(trans('filament-settings-hub::messages.settings.location.form.site_phone_code'))
                    ->hint(config('filament-settings-hub.show_hint') ?'setting("site_phone_code")': null),
                TextInput::make('site_location')
                    ->label(trans('filament-settings-hub::messages.settings.location.form.site_location'))
                    ->hint(config('filament-settings-hub.show_hint') ?'setting("site_location")': null),
                TextInput::make('site_currency')
                    ->label(trans('filament-settings-hub::messages.settings.location.form.site_currency'))
                    ->hint(config('filament-settings-hub.show_hint') ?'setting("site_currency")': null),
                TextInput::make('site_language')
                    ->label(trans('filament-settings-hub::messages.settings.location.form.site_language'))
                    ->hint(config('filament-settings-hub.show_hint') ?'setting("site_language")': null),
            ])

        ];
    }
}
