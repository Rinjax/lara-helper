<?php

namespace Rinjax\LaraHelper\Providers;

use Illuminate\Support\ServiceProvider;
use Rinjax\LaraHelper\Managers\HelperManager;


class LaraHelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('rinjaxHelper', function (){
            return new HelperManager();
        });

        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('RinjaxHelper', 'Rinjax\LaraHelper\Managers\HelperManagerFacade');

    }
}