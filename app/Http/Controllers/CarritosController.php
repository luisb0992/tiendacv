<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Carrito;
use App\Paypal;
use App\Producto;
use App\ProductoCarrito;

class CarritosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carrito_id = \Session::get('carrito_id');
        $carrito = Carrito::findOrCreateBySessionID($carrito_id);
        $productos = $carrito->productos()->get();
        $totalUSD = $carrito->totalUSD();
        $totalBSF = $carrito->totalBSF();
        return view('carritos.index',[
            'productos' => $productos,
            'totalUSD' => $totalUSD,
            'totalBSF' => $totalBSF
        ]);
    }

    // metodo para pagar por paypal
    public function pagar(Request $request){
        $carrito_id = \Session::get('carrito_id');
        $carrito = Carrito::findOrCreateBySessionID($carrito_id);
        $paypal = new Paypal($carrito);

        // ids de los productos
        $id = ProductoCarrito::where('carrito_id', $carrito->id)
              ->get()
              ->groupBy('producto_id'); 
        // cantidad de productos en el carrito
        $count_id = $id->count();

        $array = array();
        foreach ($id as $idpro) {
            $array [] = $idpro;
        }  
        dd($array, 'Productos en el carrito legalmente '.$count_id);

        // datos de los productos
        $pro = Producto::whereIn('id', $id)->get();

        $pago = $paypal->generate();


        return redirect($pago->getApprovalLink());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd("llega al show");
        $carrito = Carrito::where('customid', $id)->first();
        $orden = $carrito->orden();

        return view('carritos.orden', [
                "carrito" => $carrito,
                "orden" => $orden
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
