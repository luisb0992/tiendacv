<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Tienda;

class TiendaProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('*', function($view){

            $user = Auth::check();
            
            if ($user) {

                $usertienda = Tienda::total_tiendas();

                $view->with('usertienda', $usertienda);

             } 

        });
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
}
