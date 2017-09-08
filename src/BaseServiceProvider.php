<?php

namespace Novius\Backpack\Base;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Novius\Backpack\Base\Http\Middleware\Admin;
use Route;

class BaseServiceProvider extends ServiceProvider
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
        $this->app['view']->prependNamespace('backpack', realpath(dirname(__DIR__).'/resources/views'));
        $this->app['view']->prependNamespace('backpack', resource_path('views/vendor/backpack/base'));

        /*
         * Add a new namespace "backpackbase", to allow bypassing overrided views
         * For instance, you can called an original backpack view using "backpackbase::foo"
         */
        $this->loadViewsFrom(dirname(__DIR__, 3).'/backpack/base/src/resources/views', 'backpackbase');

        /*
         * Translations for this package
         */
        $this->loadTranslationsFrom(dirname(__DIR__).'/resources/lang', 'backpackextended');

        /*
         * Publish overrided views, langs & routes
         * To overrides your views, use --force with vendor:publish command
         */
        $this->publishes([__DIR__.'/../resources/views' => resource_path('views/vendor/backpack/base')], 'views');
        $this->publishes([__DIR__.'/../resources/lang' => resource_path('lang/vendor/backpackextended')], 'lang');
        $this->publishes([__DIR__.'/../routes' => base_path().'/routes'], 'routes');

        /*
         * Override Admin Middleware
         */
        $this->registerAdminMiddleware($this->app->router);
    }

    public function registerAdminMiddleware(Router $router)
    {
        Route::aliasMiddleware('admin', Admin::class);
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

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        // register its dependencies
        $this->app->register(\Backpack\Base\BaseServiceProvider::class);
    }
}
