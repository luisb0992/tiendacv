<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Carrito;

class CarritoProvider extends ServiceProvider
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
            
            if ($user && Auth::user()->perfil != 1) {
                $carrito_id = \Session::get('carrito_id');
                $carrito = Carrito::findOrCreateBySessionID($carrito_id);
                // dd($carrito);
                \Session::put("carrito_id", $carrito->id); 

                $view->with('carrito', $carrito);

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
