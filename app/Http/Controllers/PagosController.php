<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrito;
use App\Paypal;
use App\Orden;
use App\Producto;
use App\ProductoCarrito;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $carrito_id = \Session::get('carrito_id');
        $carrito = Carrito::findOrCreateBySessionID($carrito_id);
        $paypal = new Paypal($carrito);
        $response = $paypal->execute($request->paymentId, $request->PayerID);

        if ($response->state == "approved") {
            \Session::remove("carrito_id");
            $detalle = Orden::respuestaPaypal($response, $carrito);
            $carrito->aprovado();
        }
        

        return view('carritos.orden', [
                "carrito" => $carrito,
                "orden" => $detalle
        ]);
    }

    public function procesarpago(Request $request)
    {
        // $producto = array();
        // foreach ($request->id_producto as $id) {
        //     $producto [] = $id;
        // }
        $carrito_id = \Session::get('carrito_id');
        $carrito = Carrito::findOrCreateBySessionID($carrito_id);
        $pc = ProductoCarrito::where('carrito_id', $carrito->id)->count();
        // $p_dolar = Producto::whereIn('id', $pc)->get(['precio_dolar']);
        return response()->json($carrito->productos()->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
