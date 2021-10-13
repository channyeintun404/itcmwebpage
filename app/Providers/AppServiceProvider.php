<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Navbar;
use Illuminate\Support\Facades\Schema;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //ma aye chan
      Schema::defaultStringLength(191);
      View::composer('*', function($view)
     {
        $navitem= Navbar::all();
        $view->with('navitem', $navitem);


     }); 
    }
}
