<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tienda;
use App\User;
use App\Carrito;
use App\Producto;

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
        $productos = Producto::latest('id')->get();
        $usertienda = Tienda::where('user_id','=',\Auth::user()->id)->count();
        return view('home',[
            'usertienda' => $usertienda,
            'productos' =>$productos
        ]);
    }
}
