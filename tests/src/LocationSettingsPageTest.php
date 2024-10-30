<?php

use TomatoPHP\FilamentSettingsHub\Tests\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

beforeEach(function () {
    actingAs(User::factory()->create());
});

function checkLocationSettingExists($setting, $name): void
{
    assertDatabaseHas(\TomatoPHP\FilamentSettingsHub\Models\Setting::class, [
        'name' => $name,
        'group' => 'sites',
        'payload' => is_null($setting->{$name}) ? json_encode(null) : json_encode($setting->{$name}),
    ]);
}

it('has site site_address exists', function () {
    $siteSettings = new \TomatoPHP\FilamentSettingsHub\Settings\SitesSettings;
    checkLocationSettingExists($siteSettings, 'site_address');
});

it('has site site_phone_code exists', function () {
    $siteSettings = new \TomatoPHP\FilamentSettingsHub\Settings\SitesSettings;
    checkLocationSettingExists($siteSettings, 'site_phone_code');
});

it('has site site_location exists', function () {
    $siteSettings = new \TomatoPHP\FilamentSettingsHub\Settings\SitesSettings;
    checkLocationSettingExists($siteSettings, 'site_location');
});

it('has site site_currency exists', function () {
    $siteSettings = new \TomatoPHP\FilamentSettingsHub\Settings\SitesSettings;
    checkLocationSettingExists($siteSettings, 'site_currency');
});

it('has site site_language exists', function () {
    $siteSettings = new \TomatoPHP\FilamentSettingsHub\Settings\SitesSettings;
    checkLocationSettingExists($siteSettings, 'site_language');
});

it('can render location settings page resource', function () {
    get(\TomatoPHP\FilamentSettingsHub\Pages\LocationSettings::getUrl())->assertSuccessful();
});

it('can validate location settings before save', function () {

    livewire(\TomatoPHP\FilamentSettingsHub\Pages\LocationSettings::class)
        ->fillForm([
            'site_currency' => null,
        ])
        ->call('save')
        ->assertHasFormErrors([
            'site_currency' => 'required',
        ]);
});

it('can save site settings', function () {
    $siteSettings = new \TomatoPHP\FilamentSettingsHub\Settings\SitesSettings;
    $data = $siteSettings->toArray();
    $data['site_currency'] = 'USD';

    livewire(\TomatoPHP\FilamentSettingsHub\Pages\LocationSettings::class)
        ->fillForm($data)
        ->call('save');

    assertDatabaseHas(\TomatoPHP\FilamentSettingsHub\Models\Setting::class, [
        'name' => 'site_currency',
        'group' => 'sites',
        'payload' => json_encode('USD'),
    ]);
});
