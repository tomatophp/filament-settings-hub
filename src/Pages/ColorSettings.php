<?php

namespace TomatoPHP\FilamentSettingsHub\Pages;

use BackedEnum;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\ColorPicker;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use TomatoPHP\FilamentSettingsHub\Settings\SiteColorsSettings;
use TomatoPHP\FilamentSettingsHub\Traits\UseShield;

class ColorSettings extends SettingsPage
{
    use UseShield;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-swatch';

    protected static string $settings = SiteColorsSettings::class;

    public function getTitle(): string
    {
        return trans('filament-settings-hub::messages.settings.color.title');
    }

    protected function getActions(): array
    {
        return [
            Action::make('back')
                // Resolved on click so building the page never depends on the current panel.
                ->action(fn () => redirect()->route(
                    'filament.' . filament()->getCurrentPanel()->getId() . '.pages.settings-hub',
                    Filament::getTenant() ?: [],
                ))
                ->color('danger')
                ->label(trans('filament-settings-hub::messages.back')),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(trans('filament-settings-hub::messages.settings.color.title'))
                    ->description(trans('filament-settings-hub::messages.settings.color.description'))
                    ->schema([
                        ColorPicker::make('site_primary_color')
                            ->label(trans('filament-settings-hub::messages.settings.color.form.primary_color'))
                            ->hint(config('filament-settings-hub.show_hint') ? 'setting("site_primary_color")' : null),
                        ColorPicker::make('site_secondary_color')
                            ->label(trans('filament-settings-hub::messages.settings.color.form.secondary_color'))
                            ->hint(config('filament-settings-hub.show_hint') ? 'setting("site_secondary_color")' : null),
                        ColorPicker::make('site_tertiary_color')
                            ->label(trans('filament-settings-hub::messages.settings.color.form.tertiary_color'))
                            ->hint(config('filament-settings-hub.show_hint') ? 'setting("site_tertiary_color")' : null),
                    ]),
            ])
            ->columns(1);
    }
}
