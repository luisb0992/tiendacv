<?php

namespace App\Http\Middleware;

use Closure;
use App\Producto;
use App\User;
use App\Orden;
use App\Pregunta;
use App\Calificacion;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->perfil == 1) {

            return response()->view('admin.index',[
                 'users' => Producto::count(),   
                 'productos' => User::count(),   
                 'ordenes' => Orden::count(),  
                 'preguntas' => Pregunta::count(),  
                 'calificaciones' => Calificacion::count()  
            ]);

        }else{
            return $next($request);
        }


    }
}
