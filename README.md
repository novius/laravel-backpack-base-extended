# Backpack CRUD Extended

This package extends [Backpack/Base](https://github.com/Laravel-Backpack/Base). See all features added bellow.


## Installation

In `config/app.php`, replaces

```php?start_inline=1
Backpack\CRUD\CrudServiceProvider::class,
```

by

```php?start_inline=1
Novius\Backpack\CRUD\CrudServiceProvider::class,
```

Launch these commands

```php?start_inline=1
php artisan vendor:publish --provider="Novius\Backpack\Base\BaseServiceProvider" --tag="lang"
php artisan vendor:publish --provider="Novius\Backpack\Base\BaseServiceProvider" --tag="views" --force
php artisan vendor:publish --provider="Novius\Backpack\Base\BaseServiceProvider" --tag="routes"
```

