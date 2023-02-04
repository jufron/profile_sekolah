<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      Blade::if('requestIs', function ($value) {
        return request()->is($value);
      });

      Blade::if('requestRoute', function ($value) {
        return request()->routeIs($value);
      });

      // Blade::if('')
    }
}
