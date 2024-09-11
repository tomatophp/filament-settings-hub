![Screenshot](https://raw.githubusercontent.com/tomatophp/filament-settings-hub/master/arts/3x1io-tomato-settings-hub.jpg)

# Filament Settings Hub

[![Latest Stable Version](https://poser.pugx.org/tomatophp/filament-settings-hub/version.svg)](https://packagist.org/packages/tomatophp/filament-settings-hub)
[![License](https://poser.pugx.org/tomatophp/filament-settings-hub/license.svg)](https://packagist.org/packages/tomatophp/filament-settings-hub)
[![Downloads](https://poser.pugx.org/tomatophp/filament-settings-hub/d/total.svg)](https://packagist.org/packages/tomatophp/filament-settings-hub)

Manage your Filament app settings with GUI and helpers

## Screenshots

![Screenshot](https://raw.githubusercontent.com/tomatophp/filament-settings-hub/master/arts/settings-hub.png)
![Screenshot](https://raw.githubusercontent.com/tomatophp/filament-settings-hub/master/arts/setting-page.png)


## Installation

```bash
composer require tomatophp/filament-settings-hub
```

now you need to publish and migrate settings table

```bash
php artisan vendor:publish --provider="Spatie\LaravelSettings\LaravelSettingsServiceProvider" --tag="migrations"
```

after publish and migrate settings table please run this command

```bash
php artisan filament-settings-hub:install
```

finally reigster the plugin on `/app/Providers/Filament/AdminPanelProvider.php`

```php
->plugin(
    \TomatoPHP\FilamentSettingsHub\FilamentSettingsHubPlugin::make()
        ->allowLocationSettings()
        ->allowSiteSettings()
        ->allowSocialMenuSettings()
)
```

## Usage

you can use this package by use this helper function

```php
settings($key);
```

to register new setting to the hub page you can use Facade class on your provider like this

```php
use TomatoPHP\FilamentSettingsHub\Facades\FilamentSettingsHub;
use TomatoPHP\FilamentSettingsHub\Services\Contracts\SettingHold;

FilamentSettingsHub::register([
    SettingHold::make()
        ->order(2)
        ->label('Site Settings') // to translate label just use direct translation path like `messages.text.name`
        ->icon('heroicon-o-globe-alt')
        ->route('filament.admin.pages.site-settings') // use page / route
        ->page(\TomatoPHP\FilamentSettingsHub\Pages\SiteSettings::class) // use page / route 
        ->description('Name, Logo, Site Profile') // to translate label just use direct translation path like `messages.text.name`
        ->group('General') // to translate label just use direct translation path like `messages.text.name`,
]);

```

and now you can see your settings on the setting hub page.

we have a ready to use helper for currency settings

```php
dollar($amount)
```

it will return the money amount with the currency symbol

## Allow Shield 

to allow [filament-shield](https://github.com/bezhanSalleh/filament-shield) for the settings please install it and config it first then you can use this method

```php
->plugin(
    \TomatoPHP\FilamentSettingsHub\FilamentSettingsHubPlugin::make()
        ->allowShield()
)
```

to make a secure setting page just use this trait 

```php
use TomatoPHP\FilamentSettingsHub\Traits\UseShield;
```

## Publish Assets

you can publish config file by use this command

```bash
php artisan vendor:publish --tag="filament-settings-hub-config"
```

you can publish views file by use this command

```bash
php artisan vendor:publish --tag="filament-settings-hub-views"
```

you can publish languages file by use this command

```bash
php artisan vendor:publish --tag="filament-settings-hub-lang"
```

you can publish migrations file by use this command

```bash
php artisan vendor:publish --tag="filament-settings-hub-migrations"
```

## Other Filament Packages

- [Filament Users Resource](https://www.github.com/tomatophp/filament-users)
- [Filament Translations](https://www.github.com/tomatophp/filament-translations)
- [Filament Menus Generator](https://www.github.com/tomatophp/filament-menus)
- [Filament Alerts Sender](https://www.github.com/tomatophp/filament-alerts)
- [Filament Accounts Builder](https://www.github.com/tomatophp/filament-accounts)
- [Filament Wallet Manager](https://www.github.com/tomatophp/filament-wallet)
- [Filament Artisan Runner](https://www.github.com/tomatophp/filament-artisan)
- [Filament File Browser](https://www.github.com/tomatophp/filament-browser)
- [Filament Developer Gate](https://www.github.com/tomatophp/filament-developer-gate)
- [Filament Locations Seeder](https://www.github.com/tomatophp/filament-locations)
- [Filament Plugins Manager](https://www.github.com/tomatophp/filament-plugins)
- [Filament Splade Integration](https://www.github.com/tomatophp/filament-splade)
- [Filament Types Manager](https://www.github.com/tomatophp/filament-types)
- [Filament Icons Picker](https://www.github.com/tomatophp/filament-icons)
- [Filament Helpers Classes](https://www.github.com/tomatophp/filament-helpers)

## Support

you can join our discord server to get support [TomatoPHP](https://discord.gg/Xqmt35Uh)

## Docs

you can check docs of this package on [Docs](https://docs.tomatophp.com/plugins/laravel-package-generator)

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security

Please see [SECURITY](SECURITY.md) for more information about security.

## Credits

- [Fady Mondy](mailto:info@3x1.io)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
