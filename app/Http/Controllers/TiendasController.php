<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTIendaRequest;
use App\Http\Requests\EditTIendaRequest;
use App\Tienda;
use App\Producto;
use App\User;
use App\Pregunta;

class TiendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = \Auth::user()->id;
        $productos = Producto::where('user_id','=',$user_id)->get();
        $tiendas = Tienda::where('user_id','=',$user_id)->get();
        $preguntas = Producto::total_preguntas();
        // dd($preguntas);
        return view('tiendas.index',[
            'tiendas' => $tiendas,
            'productos' => $productos,
            'total_preguntas' => $preguntas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiendas = new Tienda;
        return view('tiendas.create',[
            'tiendas' => $tiendas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTIendaRequest $request)
    {
        $tienda = new Tienda;
        
        if (count(Tienda::where('titulo','=',$request->titulo)->get()) > 0) {
            \Session::flash('error', 'Este Titulo ya existe, elija otro para su tienda');
            return redirect('tiendas/create');
        }else{
            $tienda->titulo = strtoupper($request->titulo);
            $tienda->sub_titulo = strtoupper($request->sub_titulo);
            $tienda->letra = $request->letra;
            $tienda->RIF = $request->RIF;
            $tienda->correo = strtoupper($request->correo);
            $tienda->telefono_1 = $request->telefono_1;
            $tienda->telefono_2 = $request->telefono_2;
            $tienda->user_id = \AUth::user()->id;

            if ($tienda->save()) {
                \Session::flash('message', 'Tienda creada exitosamente');
                return redirect('tiendas');
            }
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
        $tienda = Tienda::find($id);

        return view('tiendas.show',[
            'tienda' => $tienda
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditTiendaRequest $request, $id)
    {
        $tienda = Tienda::findOrFail($id);

            $tienda->titulo = strtoupper($request->titulo);
            $tienda->sub_titulo = strtoupper($request->sub_titulo);
            $tienda->RIF = $request->RIF;
            $tienda->correo = strtoupper($request->correo);
            $tienda->telefono_1 = $request->telefono_1;
            $tienda->telefono_2 = $request->telefono_2;

            if ($tienda->save()) {
                \Session::flash('message', 'Cambios realizados exitosamente');
                return redirect('tiendas');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Tienda::destroy($id);
        // \Session::flash('message', 'Tienda eliminada exitosamente');
        // return redirect('tiendas');
    }
}
