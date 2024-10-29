<?php

// Test database connection
try {
    if (! function_exists('setting')) {
        function setting(string $key, mixed $default = null): mixed
        {
            $payload = \TomatoPHP\FilamentSettingsHub\Models\Setting::where('name', $key)->first('payload');

            return $payload ?: $default;
        }
    }
    if (! function_exists('dollar')) {
        function dollar(float | int $total): false | string
        {
            $getDollar = setting('site_currency');
            if ($getDollar) {
                return '<b>' . number_format($total, 2) . "</b><small>$getDollar</small>";
            } else {
                return false;
            }
        }
    }

} catch (\Exception $e) {
    if (! function_exists('setting')) {
        function setting($key)
        {
            return $key;
        }
    }
}
