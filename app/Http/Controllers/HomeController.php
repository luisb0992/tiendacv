<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tienda;
use App\User;
use App\Carrito;
use App\Producto;
use App\Pregunta;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preguntas = Pregunta::whereIn("producto_id", Producto::where("user_id", \Auth::user()->id)->get(['id']))
                     ->where('respuesta', null)
                     ->count();
        // dd($preguntas);
        $productos = Producto::latest('id')->get();
        $usertienda = Tienda::where('user_id','=',\Auth::user()->id)->count();
        return view('home',[
            'usertienda' => $usertienda,
            'productos' =>$productos,
            'preguntas' =>$preguntas
        ]);
    }
}
