<?php

use TomatoPHP\FilamentSettingsHub\Tests\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

beforeEach(function () {
    actingAs(User::factory()->create());
});

it('has site site_social exists', function () {
    $siteSettings = new \TomatoPHP\FilamentSettingsHub\Settings\SitesSettings;
    assertDatabaseHas(\TomatoPHP\FilamentSettingsHub\Models\Setting::class, [
        'name' => 'site_social',
        'group' => 'sites',
        'payload' => is_null($siteSettings->site_social) ? json_encode(null) : json_encode($siteSettings->site_social),
    ]);
});

it('can render social menu settings page resource', function () {
get(\TomatoPHP\FilamentSettingsHub\Pages\SocialMenuSettings::getUrl())->assertSuccessful();
    });

it('can validate social menu settings before save', function () {

    livewire(\TomatoPHP\FilamentSettingsHub\Pages\SocialMenuSettings::class)
        ->fillForm([
            'site_social' => null,
        ])
        ->call('save')
        ->assertHasFormErrors([
            'site_social' => 'required',
        ]);
});

it('can save social menu settings', function () {
    $siteSettings = new \TomatoPHP\FilamentSettingsHub\Settings\SitesSettings;
    $data = $siteSettings->toArray();
    $data['site_social'] = [
        [
            'vendor' => 'facebook',
            'link' => 'https://facebook.com',
        ],
    ];

    livewire(\TomatoPHP\FilamentSettingsHub\Pages\SocialMenuSettings::class)
        ->fillForm($data)
        ->callAction('save')
        ->assertHasNoFormErrors();

    assertDatabaseHas(\TomatoPHP\FilamentSettingsHub\Models\Setting::class, [
        'name' => 'site_social',
        'group' => 'sites',
        'payload' => json_encode($siteSettings->site_social),
    ]);
});
