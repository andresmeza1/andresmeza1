<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'hola';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Seleccionar marcas y categorias desde la db
        $marcas=Marca::all();
        $categorias=Categoria::all();
        return view('products.new')->with("marcas",$marcas)->with("categorias",$categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "<pre>";
        // var_dump($request->nombre);
        // var_dump($request->descripcion);
        // var_dump($request->precio);
        // var_dump($request->imagen);
        // echo "</pre>";

        //Crear el objeto uploadedFile

        $archivo=$request->imagen;
        $nombre_archivo=$archivo->getClientOriginalName();
        // Mover el arvhivo a la carpeta public
        $ruta=public_path();
        var_dump($ruta);
        $archivo->move("$ruta/img/",$nombre_archivo);
        // Registrar producto
        $producto=new Producto();
        $producto->nombre=$request->nombre;
        $producto->descripcion=$request->descripcion;
        $producto->precio=$request->precio;
        $producto->imagen=$nombre_archivo;
        $producto->marca_id=$request->marca;
        $producto->categoria_id=$request->categoria;
        $producto->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        return "Producto $producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        return "Editar Form $producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
