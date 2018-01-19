<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Pregunta;
use App\Producto;

class PreguntaProvider extends ServiceProvider
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

                $preguntas = Producto::total_preguntas();

                $view->with('preguntas', $preguntas);

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
