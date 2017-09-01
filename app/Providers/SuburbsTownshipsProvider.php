<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SuburbsTownshipsProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
         $this->composeSurbubsTownships();
    }

     public function composeSurbubsTownships(){
          view()->composer('partials/suburbsTownships','App\Http\Composers\SuburbsTownshipsComposer');
    }
}
