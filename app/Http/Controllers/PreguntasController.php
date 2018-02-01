<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pregunta;
use App\Producto;
use App\Tienda;

class PreguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::where("user_id", \Auth::user()->id)->get(['id']);
        $questions = Pregunta::whereIn("producto_id", $productos)
                     ->where('respuesta', null)->get();
        // dd($preguntas);
        return view('preguntas.index',[
            'questions' => $questions    
        ]);
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
            'pregunta' =>'required'
        ]);
        
        if ($request->ajax()) {
            $preguntas = new Pregunta();
            $preguntas->pregunta = $request->pregunta;
            $preguntas->producto_id = $request->producto_id;
            $preguntas->user_id = \Auth::user()->id;

            $preguntas->save();

            return response()->json($preguntas);

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
            $preguntas = Pregunta::with('user')->where("producto_id",$id)->where("respuesta", null)->get();

            return response()->json($preguntas);
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

        $respuesta = Pregunta::findOrFail($id);
        $respuesta->respuesta = $request->respuesta;
        $respuesta->save();

        $productos = Producto::where("user_id", \Auth::user()->id)->get(['id']);
        $count = Pregunta::whereIn("producto_id", $productos)
                     ->where('respuesta', null)->count();
        
        return response()->json([
            "respuesta" => $respuesta, 
            "count" => $count
        ]);

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
