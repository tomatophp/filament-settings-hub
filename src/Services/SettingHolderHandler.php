<?php

namespace TomatoPHP\FilamentSettingsHub\Services;

use Illuminate\Support\Collection;
use TomatoPHP\FilamentSettingsHub\Facades\FilamentSettingsHub;
use TomatoPHP\FilamentSettingsHub\Services\Contracts\SettingHold;

class SettingHolderHandler
{
    public ?Collection $settings;

    public function __construct()
    {
        $this->settings = collect([]);
    }

    public function register(array | SettingHold $item): void
    {
        if (is_array($item)) {
            foreach ($item as $settingItem) {
                $this->settings->push($settingItem);
            }
        } else {
            $this->settings->push($item);
        }
    }

    public function load(): Collection
    {
        return $this->settings;
    }

    public function get(): Collection
    {
        return FilamentSettingsHub::get();
    }
}
