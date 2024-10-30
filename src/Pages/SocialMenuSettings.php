<?php

namespace TomatoPHP\FilamentSettingsHub\Pages;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions\Action;
use Filament\Pages\SettingsPage;
use TomatoPHP\FilamentSettingsHub\Settings\SitesSettings;
use TomatoPHP\FilamentSettingsHub\Traits\UseShield;

class SocialMenuSettings extends SettingsPage
{
    use UseShield;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = SitesSettings::class;

    public function getTitle(): string
    {
        return trans('filament-settings-hub::messages.settings.social.title');
    }

    protected function getActions(): array
    {
        $tenant = \Filament\Facades\Filament::getTenant();
        if ($tenant) {
            return [
                Action::make('back')->action(fn () => redirect()->route('filament.' . filament()->getCurrentPanel()->getId() . '.pages.settings-hub', $tenant))->color('danger')->label(trans('filament-settings-hub::messages.back')),
            ];
        }

        return [
            Action::make('back')->action(fn () => redirect()->route('filament.' . filament()->getCurrentPanel()->getId() . '.pages.settings-hub'))->color('danger')->label(trans('filament-settings-hub::messages.back')),
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
                    ->required()
                    ->minItems(1)
                    ->label(trans('filament-settings-hub::messages.settings.social.form.site_social'))
                    ->schema([
                        TextInput::make('vendor')->label(trans('filament-settings-hub::messages.settings.social.form.vendor')),
                        TextInput::make('link')->url()->label(trans('filament-settings-hub::messages.settings.social.form.link')),
                    ])
                    ->hint(config('filament-settings-hub.show_hint') ? 'setting("site_social")' : null),
            ]),

        ];
    }
}
