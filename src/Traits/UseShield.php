<?php

namespace TomatoPHP\FilamentSettingsHub\Traits;

use BezhanSalleh\FilamentShield\Support\Utils;
use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Illuminate\Support\Str;

trait UseShield
{
    public function booted(): void
    {
        if (filament('filament-settings-hub')->isShieldAllowed()) {
            $this->beforeBooted();

            if (! static::canAccess()) {

                Notification::make()
                    ->title(__('filament-shield::filament-shield.forbidden'))
                    ->warning()
                    ->send();

                $this->beforeShieldRedirects();

                redirect($this->getShieldRedirectPath());

                return;
            }

            if (method_exists(parent::class, 'booted')) {
                parent::booted();
            }

            $this->afterBooted();
        }
    }

    protected function beforeBooted(): void {}

    protected function afterBooted(): void {}

    protected function beforeShieldRedirects(): void {}

    protected function getShieldRedirectPath(): string
    {
        return Filament::getUrl();
    }

    protected static function getPermissionName(): string
    {
        if (class_exists('BezhanSalleh\FilamentShield\Support\Utils')) {
            return Str::of(class_basename(static::class))
                ->prepend(
                    Str::of(Utils::getPagePermissionPrefix())
                        ->append('_')
                        ->toString()
                )
                ->toString();
        } else {
            return '';
        }
    }

    public static function canAccess(): bool
    {
        if (filament('filament-settings-hub')->isShieldAllowed()) {
            return Filament::auth()->user()->can(static::getPermissionName());
        } else {
            return true;
        }
    }
}
