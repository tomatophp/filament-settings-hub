<?php

use Filament\Facades\Filament;
use TomatoPHP\FilamentSettingsHub\FilamentSettingsHubPlugin;
use TomatoPHP\FilamentSettingsHub\Models\Setting;
use TomatoPHP\FilamentSettingsHub\Pages\ColorSettings;
use TomatoPHP\FilamentSettingsHub\Settings\SiteColorsSettings;
use TomatoPHP\FilamentSettingsHub\Settings\SitesSettings;
use TomatoPHP\FilamentSettingsHub\Tests\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Livewire\livewire;

beforeEach(function () {
    actingAs(User::factory()->create());

    Filament::setCurrentPanel(Filament::getPanel('admin'));
});

it('keeps color settings opt-in', function () {
    // The test panel enables it; the declared default must stay off for existing apps.
    $default = (new ReflectionProperty(FilamentSettingsHubPlugin::class, 'allowColorSettings'))->getDefaultValue();

    expect($default)->toBeFalse()
        ->and(FilamentSettingsHubPlugin::make()->allowColorSettings()->isColorSettingAllowed())->toBeTrue();
});

it('does not add color properties to the shared site settings', function () {
    // Existing apps load SitesSettings without a new settings migration.
    expect(property_exists(SitesSettings::class, 'site_primary_color'))->toBeFalse()
        ->and(app(SitesSettings::class)->site_name)->not->toBeNull();
});

it('can render the color settings page', function () {
    livewire(ColorSettings::class)->assertSuccessful();
});

it('saves the site colors in their own settings group', function () {
    livewire(ColorSettings::class)
        ->fillForm([
            'site_primary_color' => '#d64524',
            'site_secondary_color' => '#4e9a3e',
            'site_tertiary_color' => null,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    assertDatabaseHas(Setting::class, [
        'group' => 'site_colors',
        'name' => 'site_primary_color',
        'payload' => json_encode('#d64524'),
    ]);

    expect(app(SiteColorsSettings::class)->site_secondary_color)->toBe('#4e9a3e');
});
