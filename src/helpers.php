<?php

use TomatoPHP\FilamentSettingsHub\Models\Setting;

// Test database connection
try {
    if (! function_exists('setting')) {
        function setting(string $key, mixed $default = null): mixed
        {
            $payload = Setting::query()
                ->where('name', $key)
                ->first('payload');

            return $payload ? $payload->payload : $default;
        }
    }
} catch (Exception $e) {
    if (! function_exists('setting')) {
        function setting($key)
        {
            return $key;
        }
    }
}
