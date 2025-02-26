<?php

use TomatoPHP\FilamentSettingsHub\Tests\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

beforeEach(function () {
    actingAs(User::factory()->create());
});

it('can render setting hub page resource', function () {
get(\TomatoPHP\FilamentSettingsHub\Pages\SettingsHub::getUrl())->assertSuccessful();
    });
