# Backpack CRUD Extended

This package extends [Backpack/Base](https://github.com/Laravel-Backpack/Base). See all features added bellow.


## Installation

In `config/app.php`, replaces

```
Backpack\Base\BaseServiceProvider::class,
```

by

```
Novius\Backpack\Base\BaseServiceProvider::class,
```

Launch these commands

```
php artisan vendor:publish --provider="Novius\Backpack\Base\BaseServiceProvider" --tag="lang"
php artisan vendor:publish --provider="Novius\Backpack\Base\BaseServiceProvider" --tag="views" --force
php artisan vendor:publish --provider="Novius\Backpack\Base\BaseServiceProvider" --tag="routes"
```

## Configuration

You can override default routes after having published them (previous step) 

```
/routes/backpack/base.php
```

### Language / i18n

"backpackextended" namespace is now available.

You can use it in your own views like this:

```php
{{ trans('backpackextended::base.switch_language') }}
```

## Lint

Run php-cs with:

```bash
./cs.sh
```

## Contributing

Contributions are welcome!
Leave an issue on Github, or create a Pull Request.

## Licence

This package is under [GNU Affero General Public License v3](http://www.gnu.org/licenses/agpl-3.0.html) or (at your option) any later version.
