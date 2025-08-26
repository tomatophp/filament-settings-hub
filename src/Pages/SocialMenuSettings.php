<?php

namespace TomatoPHP\FilamentSettingsHub\Pages;

use BackedEnum;
use Filament\Actions\Action;
use Filament\Schemas\Schema;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use TomatoPHP\FilamentSettingsHub\Traits\UseShield;
use TomatoPHP\FilamentSettingsHub\Settings\SitesSettings;

class SocialMenuSettings extends SettingsPage
{
    use UseShield;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-cog';

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


    public function form(Schema $schema): Schema
    {
        return $schema
             ->schema([
               Section::make(trans('filament-settings-hub::messages.settings.social.title'))
                    ->description(trans('filament-settings-hub::messages.settings.social.description'))
                    ->schema([
                        Repeater::make('site_social')
                            ->required()
                            ->minItems(1)
                            ->columnSpan(2)
                            ->label(trans('filament-settings-hub::messages.settings.social.form.site_social'))
                            ->schema([
                                TextInput::make('vendor')->label(trans('filament-settings-hub::messages.settings.social.form.vendor')),
                                TextInput::make('link')->url()->label(trans('filament-settings-hub::messages.settings.social.form.link')),
                            ])
                            ->hint(config('filament-settings-hub.show_hint') ? 'setting("site_social")' : null),
                    ])
            ])->columns(1);
    }
}
