<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SponsoredAdsProvider extends ServiceProvider
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
      $this->composeSponsoredAds();
    }

    public function composeSponsoredAds(){
          view()->composer('sponsoredAds','App\Http\Composers\sponsoredAdsComposer');
    }
}
