# Laravel Backpack Base Extended
[![Travis](https://img.shields.io/travis/novius/laravel-backpack-base-extended.svg?maxAge=1800&style=flat-square)](https://travis-ci.org/novius/laravel-backpack-base-extended)
[![Packagist Release](https://img.shields.io/packagist/v/novius/laravel-backpack-base-extended.svg?maxAge=1800&style=flat-square)](https://packagist.org/packages/novius/laravel-backpack-base-extended)
[![Licence](https://img.shields.io/packagist/l/novius/laravel-backpack-base-extended.svg?maxAge=1800&style=flat-square)](https://github.com/novius/laravel-backpack-base-extended#licence)

This package extends [Backpack/Base](https://github.com/Laravel-Backpack/Base). See all features added bellow.


## Installation

In your terminal:

```sh
composer require novius/laravel-backpack-base-extended
```

Then, if you are on Laravel 5.4 (no need for Laravel 5.5 and higher), register the service provider to your `config/app.php` file:

```php
'providers' => [
    ...
    Novius\Backpack\Base\BaseServiceProvider::class,
];
```

Launch these commands:

```sh
php artisan vendor:publish --provider="Novius\Backpack\Base\BaseServiceProvider" --tag="lang"
php artisan vendor:publish --provider="Novius\Backpack\Base\BaseServiceProvider" --tag="views" --force
php artisan vendor:publish --provider="Novius\Backpack\Base\BaseServiceProvider" --tag="routes"
```


## Configuration

You can override default routes after having published them (previous step) 

```
/routes/backpack/base.php
```


## Usage & Features

### Language / i18n

`backpackextended` namespace is now available.

You can use it in your own views like this:

```php
{{ trans('backpackextended::base.switch_language') }}
```


## Testing

Run the tests with:

```sh
./test.sh
```


## Lint

Run php-cs with:

```sh
./cs.sh
```

## Contributing

Contributions are welcome!
Leave an issue on Github, or create a Pull Request.

## Licence

This package is under [GNU Affero General Public License v3](http://www.gnu.org/licenses/agpl-3.0.html) or (at your option) any later version.
