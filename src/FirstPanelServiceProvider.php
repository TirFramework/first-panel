<?php

namespace Tir\FirstPanel;


use Illuminate\Support\ServiceProvider;

class FirstPanelServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/Resources/Views', 'first-panel');
    }
}
