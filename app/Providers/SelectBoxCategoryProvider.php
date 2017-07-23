<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SelectBoxCategoryProvider extends ServiceProvider
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
        $this->composeSelectBoxCategory();
    }

     public function composeSelectBoxCategory(){
        view()->composer('selectBoxCategories','App\Http\Composers\SelectBoxCategoriesComposer');
    }
}
