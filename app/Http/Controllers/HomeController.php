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
        $productos = Producto::orderBy('id','desc')->limit(12)->get();
        $usertienda = Tienda::where('user_id','=',\Auth::user()->id)->count();
        return view('home',[
            'usertienda' => $usertienda,
            'productos' =>$productos,
            'preguntas' =>$preguntas
        ]);
    }

    public function busqueda(Request $request){
        $productos = Producto::where('titulo', 'like', '%' . $request->search . '%')->simplePaginate(15);
        return view('productos.all',[
            'productos' => $productos,
            'palabra' => $request->search
         ]);
    }
}
