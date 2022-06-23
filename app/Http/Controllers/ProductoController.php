<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Support\Facades\Validator;
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
        $productos = Producto:: all();
        return view('products/listaProductos') -> with("productos", $productos);
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
        $reglas = [
            "nombre" => 'required|alpha|unique:productos,nombre',
            "descripcion" => 'required|min:10|max:100',
            "precio" => 'required|numeric',
            "imagen" => 'required|image',
            "marca" => 'required',
            "categoria" => 'required',
        ];
        // Objeto Validator
        $v = Validator::make($request->all(), $reglas, $message = [
            'required'=> 'El campo :attribute no debe estar vacio',
            'min'=> 'El campo :attribute debe tener minimo :min caracteres',
            'max'=> 'El campo :attribute debe tener maximo :max caracteres',
            'image'=> 'El campo solo acepta imagenes',
            'unique'=> 'El producto ya se encuentra registrado',
        ]);
        // Validator
        if( $v -> fails() ){
            return redirect('productos/create')
            ->withErrors($v);
        }
        else{
            //Crear el objeto uploadedFile
            $archivo=$request->imagen;
            $nombre_archivo=$archivo->getClientOriginalName();
            // Mover el arvhivo a la carpeta public
            $ruta=public_path();
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
            return redirect('/productos');
        }
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
