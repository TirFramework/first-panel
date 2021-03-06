<?php

namespace Tir\FirstPanel;


use Illuminate\Support\ServiceProvider;
use Tir\FirstPanel\Services\AdminMenu;

class FirstPanelServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
        $this->adminMenu();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');

        $this->loadViewsFrom(__DIR__.'/Resources/Views', 'first-panel');

        $this->loadTranslationsFrom(__DIR__ . '/Resources/Lang/', 'first-panel');

        $this->publishes([
            __DIR__ . '/public/adminpanel' => public_path('adminpanel'),
        ], 'first-panel');


    }


    private function adminMenu()
    {
        $this->app->singleton('AdminMenu', function ($app) {
            return new AdminMenu;
        });
    }
}
