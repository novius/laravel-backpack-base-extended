<?php

namespace Novius\Backpack\Base;

use Backpack\Base\BaseServiceProvider as BackpackBaseServiceProvider;
use Illuminate\Routing\Router;
use Novius\Backpack\Base\Http\Middleware\LocaleFromCookie;
use Route;

class BaseServiceProvider extends BackpackBaseServiceProvider
{
    public $routeFilePath = '/../routes/backpack/base.php';

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        /*
         * Allows this package to override backpack views (Project > Novius\Backpack\Base > Backpack\Base)
         *
         * For instance, when view "base::foo" is called, Laravel will try to load theses files (in this order):
         * - resources/views/vendor/backpack/base/foo.blade.php
         * - vendor/novius/laravel-backpack-base-extended/resources/views/foo.blade.php
         * - vendor/backpack/base/resources/views/foo.blade.php
         */
        $this->loadViewsFrom(resource_path('views/vendor/backpack/base'), 'backpack');
        $this->loadViewsFrom(realpath(__DIR__.'/../resources/views'), 'backpack');

        parent::boot($router);

        // Add language file for features
        $this->loadTranslationsFrom(realpath(__DIR__.'/../resources/lang'), 'backpackextended');
        $this->publishes([__DIR__.'/../resources/lang' => resource_path('lang/vendor/backpackextended')], 'lang');

        // Allow to publish overrided views (use --force with vendor:publish command)
        $this->publishes([__DIR__.'/../resources/views' => resource_path('views/vendor/backpack/base')], 'views');

        $this->publishes([__DIR__.'/../routes' => base_path().'/routes'], 'routes');

        /*
         * Add a new namespace "backpackbase", to allow bypassing overrided views
         * For instance, you can called an original backpack view using "backpackbase::foo"
         */
        $this->loadViewsFrom(realpath(dirname(__DIR__, 3).'/backpack/base/src/resources/views'), 'backpackbase');

        $this->registerAdminMiddleware($this->app->router);
    }

    public function registerAdminMiddleware(Router $router)
    {
        parent::registerAdminMiddleware($router);

        Route::aliasMiddleware('adminLocalFromCookie', LocaleFromCookie::class);
    }

    /**
     * Define the routes for the application.
     *
     * @param \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function setupRoutes(Router $router)
    {
        // by default, use the routes file provided in vendor
        $routeFilePathInUse = __DIR__.$this->routeFilePath;

        // but if there's a file with the same name in routes/backpack, use that one
        if (file_exists(base_path().$this->routeFilePath)) {
            $routeFilePathInUse = base_path().$this->routeFilePath;
        }

        $this->loadRoutesFrom($routeFilePathInUse);
    }

}
