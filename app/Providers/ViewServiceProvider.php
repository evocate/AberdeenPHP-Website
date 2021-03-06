<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['layouts.main'], function ($view) {
            $dir = './images/random_header_images/';
            $images = glob($dir.'*.{jpg,jpeg,png}', GLOB_BRACE);
            shuffle($images);
            $randomBackgroundImage = substr(array_pop($images), 1); // strip the relative url (events/aberdeen was broken)

            $view->with('randomBackgroundImage', $randomBackgroundImage);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
