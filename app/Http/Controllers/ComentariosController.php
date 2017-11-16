<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;

class ComentariosController extends Controller
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
        $this->validate($request, [
            'descripcion' =>'required|string',
            'calif' =>'required|numeric'
        ]);

        if ($request->ajax()) {
            $comentario = new Comentario();
            $comentario->descripcion = $request->descripcion;
            $comentario->producto_id = $request->producto_id;
            $comentario->user_id = \Auth::user()->id;
            
            if ($comentario->save()) {
                $caiificacion = new Calificacion();
                $calificacion->comentario_id = $comentario->id;
                $calificacion->puntaje = $request->calif;
                $calificacion->save();
            }

            return response()->json($comentario);
        }
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
