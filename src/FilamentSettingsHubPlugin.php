<?php

namespace TomatoPHP\FilamentSettingsHub;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;
use TomatoPHP\FilamentSettingsHub\Facades\FilamentSettingsHub;
use TomatoPHP\FilamentSettingsHub\Pages\SettingsHub;
use TomatoPHP\FilamentSettingsHub\Pages\SiteSettings;
use TomatoPHP\FilamentSettingsHub\Pages\SocialMenuSettings;
use TomatoPHP\FilamentSettingsHub\Services\Contracts\SettingHold;

class FilamentSettingsHubPlugin implements Plugin
{
    use EvaluatesClosures;

    public static bool | \Closure $allowSiteSettings = true;

    public static bool | \Closure $allowSocialMenuSettings = true;

    public static bool | \Closure $allowShield = false;

    private bool $isActive = false;

    public function getId(): string
    {
        return 'filament-settings-hub';
    }

    public function allowShield(bool | \Closure $allow = true): static
    {
        self::$allowShield = $allow;

        return $this;
    }

    public function allowSiteSettings(bool | \Closure $allow = true): static
    {
        self::$allowSiteSettings = $allow;

        return $this;
    }

    public function allowSocialMenuSettings(bool | \Closure $allow = true): static
    {
        self::$allowSocialMenuSettings = $allow;

        return $this;
    }

    public function isSiteSettingAllowed(): bool
    {
        return $this->evaluate(self::$allowSiteSettings);
    }

    public function isSocialMenuSettingAllowed(): bool
    {
        return $this->evaluate(self::$allowSocialMenuSettings);
    }

    public function isShieldAllowed(): bool
    {
        return $this->evaluate(self::$allowShield);
    }

    public function register(Panel $panel): void
    {
        $pages = [];

        if ($this->isSiteSettingAllowed()) {
            $pages[] = SiteSettings::class;
        }

        if ($this->isSocialMenuSettingAllowed()) {
            $pages[] = SocialMenuSettings::class;
        }

        $pages[] = SettingsHub::class;

        $panel->pages($pages);
    }

    public function boot(Panel $panel): void
    {
        $settings = [];

        if ($this->isSiteSettingAllowed()) {
            $settings[] = SettingHold::make()
                ->page(SiteSettings::class)
                ->order(0)
                ->label('filament-settings-hub::messages.settings.site.title')
                ->icon('heroicon-o-globe-alt')
                ->description('filament-settings-hub::messages.settings.site.description')
                ->group('filament-settings-hub::messages.group');
        }

        if ($this->isSocialMenuSettingAllowed()) {
            $settings[] = SettingHold::make()
                ->page(SocialMenuSettings::class)
                ->order(0)
                ->label('filament-settings-hub::messages.settings.social.title')
                ->icon('heroicon-s-bars-3')
                ->description('filament-settings-hub::messages.settings.social.description')
                ->group('filament-settings-hub::messages.group');
        }

        FilamentSettingsHub::register($settings);
    }

    public static function make(): FilamentSettingsHubPlugin
    {
        return new FilamentSettingsHubPlugin;
    }
}
