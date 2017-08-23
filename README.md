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

## Licence

This package is under [GNU Affero General Public License v3](http://www.gnu.org/licenses/agpl-3.0.html) or (at your option) any later version.
