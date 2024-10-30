<?php

use function PHPUnit\Framework\assertEquals;

it('can get money format from dollar() helper', function () {
    $setting = dollar(2500);

    assertEquals('<b>' . number_format(2500, 2) . '</b><small>' . setting('site_currency') . '</small>', $setting);
});
