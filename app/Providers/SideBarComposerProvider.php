<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SideBarComposerProvider extends ServiceProvider
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
        $this->composeSideBar();
    }

    public function composeSideBar(){
        view()->composer('categories','App\Http\Composers\SideBarComposer');
    }
}
