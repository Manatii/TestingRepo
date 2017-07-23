<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AccountSideBarProvider extends ServiceProvider
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
    }

     public function composeAccountSideBar(){
        view()->composer('account-side-bar','App\Http\Composers\SideBarComposer');
    }
}
