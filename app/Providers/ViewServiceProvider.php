<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer(
            ['frontEnd.products', 'frontEnd.product_details'],
            'App\Http\View\Composers\CategoryComposer'
        );
        View::composer(
            ['frontEnd.*', 'frontEnd.*'],
            'App\Http\View\Composers\CartItemCountComposer'
        );

        // Using Closure based composers...
        // View::composer('dashboard', function ($view) {
        //     //
        // });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
