<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TopAdsComposerProvider extends ServiceProvider
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
        $this->composeTopAds();
    }

    public function composeTopAds(){
        view()->composer('topAdsPartial','App\Http\Composers\TopAdsComposer');
    }
}
