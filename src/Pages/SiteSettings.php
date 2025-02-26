<?php

namespace TomatoPHP\FilamentSettingsHub\Pages;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Actions\Action;
use Filament\Pages\SettingsPage;
use Spatie\Sitemap\SitemapGenerator;
use TomatoPHP\FilamentSettingsHub\Settings\SitesSettings;
use TomatoPHP\FilamentSettingsHub\Traits\UseShield;

class SiteSettings extends SettingsPage
{
    use UseShield;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = SitesSettings::class;

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public function getTitle(): string
    {
        return trans('filament-settings-hub::messages.settings.site.title');
    }

    protected function getActions(): array
    {
        $tenant = \Filament\Facades\Filament::getTenant();
        if ($tenant) {
            return [
                Action::make('sitemap')
                    ->requiresConfirmation()
                    ->action(fn () => $this->generateSitemap())
                    ->label(trans('filament-settings-hub::messages.settings.site.site-map')),
                Action::make('back')->action(fn () => redirect()->route('filament.' . filament()->getCurrentPanel()->getId() . '.pages.settings-hub', $tenant))->color('danger')->label(trans('filament-settings-hub::messages.back')),
            ];
        }

        return [
            Action::make('sitemap')
                ->requiresConfirmation()
                ->action(fn () => $this->generateSitemap())
                ->label(trans('filament-settings-hub::messages.settings.site.site-map')),
            Action::make('back')->action(fn () => redirect()->route('filament.' . filament()->getCurrentPanel()->getId() . '.pages.settings-hub'))->color('danger')->label(trans('filament-settings-hub::messages.back')),
        ];
    }

    public function generateSitemap()
    {
        SitemapGenerator::create(config('app.url'))->writeToFile(public_path('sitemap.xml'));

        Notification::make()
            ->title(trans('filament-settings-hub::messages.settings.site.site-map-notification'))
            ->icon('heroicon-o-check-circle')
            ->iconColor('success')
            ->send();
    }

    protected function getFormSchema(): array
    {
        return [
            Grid::make(['default' => 2])->schema([
                TextInput::make('site_name')
                    ->required()
                    ->label(trans('filament-settings-hub::messages.settings.site.form.site_name'))
                    ->columnSpan(2)
                    ->hint(config('filament-settings-hub.show_hint') ? 'setting("site_name")' : null),
                TextArea::make('site_description')
                    ->label(trans('filament-settings-hub::messages.settings.site.form.site_description'))
                    ->columnSpan(2)
                    ->hint(config('filament-settings-hub.show_hint') ? 'setting("site_description")' : null),
                TextArea::make('site_keywords')
                    ->label(trans('filament-settings-hub::messages.settings.site.form.site_keywords'))
                    ->columnSpan(2)
                    ->hint(config('filament-settings-hub.show_hint') ? 'setting("site_keywords")' : null),
                TextInput::make('site_phone')
                    ->label(trans('filament-settings-hub::messages.settings.site.form.site_phone'))
                    ->columnSpan(2)
                    ->hint(config('filament-settings-hub.show_hint') ? 'setting("site_phone")' : null),
                FileUpload::make('site_profile')
                    ->disk(config('filament-settings-hub.upload.disk'))
                    ->directory(config('filament-settings-hub.upload.directory'))
                    ->label(trans('filament-settings-hub::messages.settings.site.form.site_profile'))
                    ->columnSpan(2)
                    ->hint(config('filament-settings-hub.show_hint') ? 'setting("site_profile")' : null),
                FileUpload::make('site_logo')
                    ->disk(config('filament-settings-hub.upload.disk'))
                    ->directory(config('filament-settings-hub.upload.directory'))
                    ->label(trans('filament-settings-hub::messages.settings.site.form.site_logo'))
                    ->columnSpan(2)
                    ->hint(config('filament-settings-hub.show_hint') ? 'setting("site_logo")' : null),
                TextInput::make('site_author')
                    ->label(trans('filament-settings-hub::messages.settings.site.form.site_author'))
                    ->hint(config('filament-settings-hub.show_hint') ? 'setting("site_author")' : null),
                TextInput::make('site_email')
                    ->label(trans('filament-settings-hub::messages.settings.site.form.site_email'))
                    ->hint(config('filament-settings-hub.show_hint') ? 'setting("site_email")' : null),
            ]),
        ];
    }
}
