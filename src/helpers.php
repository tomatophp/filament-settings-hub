<?php

// Test database connection
try {
    if (!function_exists('setting')) {
        function setting($key)
        {
            return \TomatoPHP\FilamentSettingsHub\Models\Setting::where('name', $key)->first('payload') ? \TomatoPHP\FilamentSettingsHub\Models\Setting::where('name', $key)->first('payload')->payload : false;
        }
    }
    if (!function_exists('dollar')) {
        function dollar($total)
        {
            $getDollar = setting('site_currency');
            if ($getDollar) {
                return "<b>" . number_format($total, 2) . "</b><small>$getDollar</small>";
            } else {
                return false;
            }
        }
    }

} catch (\Exception $e) {
    if (!function_exists('setting')) {
        function setting($key)
        {
            return $key;
        }
    }
}
