<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateProductoRequest;
use App\Http\Requests\EditProductoRequest;
use App\Producto;
use App\Categoria;

class ProductosController extends Controller
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
        $productos = new Producto;
        $categorias = Categoria::all();

        return view('productos.create',[
            'productos' => $productos,
            'categorias' => $categorias
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductoRequest $request)
    {

        
        $productos = new Producto;
        
        $hasfile = $request->hasFile('imagen') && $request->imagen->isValid();
        $productos->user_id = \Auth::user()->id;
        $productos->titulo = strtoupper($request->titulo);
        $productos->categoria_id = $request->categoria_id;
        $productos->descripcion = $request->descripcion;
        $productos->precio_bolivar = $request->precio_bolivar;
        $productos->precio_dolar = $request->precio_dolar;
        //$productos->extension = $request->extension;

        //extrayendo extension de la imagen
        if ($hasfile){
            $extension = $request->imagen->extension();
            if ($extension == 'jpeg' || $extension == 'png' || $extension == 'bmp' || $extension == 'jpg') {
                $productos->extension = $extension;
                if ($productos->save()) {
                    $request->imagen->storeAs('images',"$productos->id.$extension");
                    \Session::flash('message', 'Producto creado exitosamente');
                    return redirect('tiendas');
                }
            }else{
                \Session::flash('error', 'La imagen es invalida, formatos validos (jpeg, png, jpg, bmp)');
                return redirect('productos/create');
            }
            
        }

        // if ($productos->save()) {

        //     if ($hasfile){
        //         $request->imagen->storeAs('images',"$productos->id.$extension");
        //     }

        //     \Session::flash('message', 'Producto creado exitosamente');
        //     return redirect('tiendas');
        // }else{
        //     return redirect('productos.create');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('productos.show',[
            'producto' => $producto
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
        $productos = Producto::find($id);
        $categorias = Categoria::all();

        return view('productos.edit',[
            'productos' => $productos,
            'categorias' => $categorias
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductoRequest $request, $id)
    {
        $productos = Producto::findOrfail($id);
        
        $hasfile = $request->hasFile('imagen') && $request->imagen->isValid();
        $productos->titulo = strtoupper($request->titulo);
        $productos->categoria_id = $request->categoria_id;
        $productos->descripcion = $request->descripcion;
        $productos->precio_bolivar = $request->precio_bolivar;
        $productos->precio_dolar = $request->precio_dolar;

        //extrayendo extension de la imagen
        if ($hasfile){
            $extension = $request->imagen->extension();
            if ($extension == 'jpeg' || $extension == 'png' || $extension == 'bmp' || $extension == 'jpg') {
                $productos->extension = $extension;
            }else{
                \Session::flash('error', 'La Imagen es invalida, formatos validos (jpeg, png, jpg, bmp)');
                return redirect('productos/create');
            }
            
        }

        if ($productos->save()) {

            if ($hasfile){
                $request->imagen->storeAs('images',"$productos->id.$extension");
            }

            \Session::flash('message', 'Producto editado exitosamente');
            return redirect('tiendas');
        }else{
            return redirect('productos/edit');
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
        Producto::destroy($id);
        \Session::flash('message', 'Producto eliminado exitosamente');
        return redirect('tiendas');
    }
}
