<?php

use TomatoPHP\FilamentSettingsHub\Models\Setting;

it('can get setting from setting() helper', function () {
    $setting = setting('site_name');

    \Pest\Laravel\assertDatabaseHas(Setting::class, [
        'name' => 'site_name',
        'group' => 'sites',
        'payload' => json_encode($setting),
    ]);
});

it('can get default value  from setting() helper', function () {
    $setting = setting('site_name_2', '3x1');

    \PHPUnit\Framework\assertEquals('3x1', $setting);
});
