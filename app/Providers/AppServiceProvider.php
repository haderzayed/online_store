<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use Illuminate\Pagination\Paginator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         Validator::extend('filter',function($attribute,$value,$params){
            if( strtolower($value) == $params)  {
                  return 'This name is forbidden'   ;
             }


         });

        Paginator::UseBootstrapFour();
  //     Paginator::defaultView('components.pagenation.custom');

    }
}
