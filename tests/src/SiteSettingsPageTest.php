<?php

use TomatoPHP\FilamentSettingsHub\Tests\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

beforeEach(function () {
    actingAs(User::factory()->create());
});

function checkSiteSettingExists($setting, $name): void
{
    assertDatabaseHas(\TomatoPHP\FilamentSettingsHub\Models\Setting::class, [
        'name' => $name,
        'group' => 'sites',
        'payload' => is_null($setting->{$name}) ? json_encode(null) : json_encode($setting->{$name}),
    ]);
}

it('has site site_name exists', function () {
    $siteSettings = new \TomatoPHP\FilamentSettingsHub\Settings\SitesSettings;
    checkSiteSettingExists($siteSettings, 'site_name');
});

it('has site_description exists', function () {
    $siteSettings = new \TomatoPHP\FilamentSettingsHub\Settings\SitesSettings;
    checkSiteSettingExists($siteSettings, 'site_description');

});

it('has site_keywords exists', function () {
    $siteSettings = new \TomatoPHP\FilamentSettingsHub\Settings\SitesSettings;
    checkSiteSettingExists($siteSettings, 'site_keywords');
});

it('has site_phone exists', function () {
    $siteSettings = new \TomatoPHP\FilamentSettingsHub\Settings\SitesSettings;
    checkSiteSettingExists($siteSettings, 'site_phone');
});

it('has site_profile exists', function () {
    $siteSettings = new \TomatoPHP\FilamentSettingsHub\Settings\SitesSettings;
    checkSiteSettingExists($siteSettings, 'site_profile');
});

it('has site_author exists', function () {
    $siteSettings = new \TomatoPHP\FilamentSettingsHub\Settings\SitesSettings;
    checkSiteSettingExists($siteSettings, 'site_author');
});

it('has site_email exists', function () {
    $siteSettings = new \TomatoPHP\FilamentSettingsHub\Settings\SitesSettings;
    checkSiteSettingExists($siteSettings, 'site_email');
});

it('can render site settings page resource', function () {
get(\TomatoPHP\FilamentSettingsHub\Pages\SiteSettings::getUrl())->assertSuccessful();
    });

it('can validate site settings before save', function () {
    livewire(\TomatoPHP\FilamentSettingsHub\Pages\SiteSettings::class)
        ->fillForm([
            'site_name' => null,
        ])
        ->call('save')
        ->assertHasFormErrors([
            'site_name' => 'required',
        ]);
});

it('can save site settings', function () {
    $siteSettings = new \TomatoPHP\FilamentSettingsHub\Settings\SitesSettings;
    $data = $siteSettings->toArray();
    $data['site_name'] = 'new';

    livewire(\TomatoPHP\FilamentSettingsHub\Pages\SiteSettings::class)
        ->fillForm($data)
        ->call('save');

    assertDatabaseHas(\TomatoPHP\FilamentSettingsHub\Models\Setting::class, [
        'name' => 'site_name',
        'group' => 'sites',
        'payload' => json_encode('new'),
    ]);
});
