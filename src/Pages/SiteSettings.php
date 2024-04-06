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


class SiteSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = SitesSettings::class;

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    protected function getActions(): array
    {
        return [
            Action::make('sitemap')
                ->requiresConfirmation()
                ->action(fn() => $this->generateSitemap())
                ->label(__('Generate Sitemap')),
            Action::make('back')->action(fn()=> redirect()->route('filament.admin.pages.settings-hub'))->color('danger')->label(__('Back')),
        ];
    }


    public function generateSitemap()
    {
        SitemapGenerator::create(config('app.url'))->writeToFile(public_path('sitemap.xml'));

        Notification::make()
            ->title( __("Sitemap Generated Success"))
            ->icon('heroicon-o-check-circle')
            ->iconColor('success')
            ->send();
    }

    protected function getFormSchema(): array
    {
        return [
            Grid::make(['default' => 2])->schema([
                TextInput::make('site_name')
                    ->columnSpan(2)
                    ->hint(config('filament-settings-hub.show_hint') ? 'setting("site_name")' : null),
                TextArea::make('site_description')
                    ->columnSpan(2)
                    ->hint(config('filament-settings-hub.show_hint') ?'setting("site_description")': null),
                TextArea::make('site_keywords')
                    ->columnSpan(2)
                    ->hint(config('filament-settings-hub.show_hint') ?'setting("site_keywords")': null),
                TextInput::make('site_phone')
                    ->columnSpan(2)
                    ->hint(config('filament-settings-hub.show_hint') ?'setting("site_phone")': null),
                FileUpload::make('site_profile')
                    ->columnSpan(2)
                    ->hint(config('filament-settings-hub.show_hint') ?'setting("site_profile")': null),
                FileUpload::make('site_logo')
                    ->columnSpan(2)
                    ->hint(config('filament-settings-hub.show_hint') ?'setting("site_logo")': null),
                TextInput::make('site_author')
                    ->hint(config('filament-settings-hub.show_hint') ?'setting("site_author")': null),
                TextInput::make('site_email')
                    ->hint(config('filament-settings-hub.show_hint') ?'setting("site_email")': null),
            ])
        ];
    }
}
