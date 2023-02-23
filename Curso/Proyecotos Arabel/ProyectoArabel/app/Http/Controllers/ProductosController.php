<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;


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
        $produco = Productos::all();
        return view('productos.lista', ['productos' => $produco]);
        // return view('productos.prueba', ['productos' => $produco]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pro = Productos::all();
        return view('productos.crear', ['productos' => $pro]);
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
        $producto = new Productos();

        $producto->codigo = $request->input('codigo');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio_compra = $request->input('precio_compra');
        $producto->precio_venta = $request->input('precio_venta');
        $producto->stock = $request->input('stock');

        $producto->save();

        return redirect()->action([ProductosController::class, 'index']);
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
        $producto = Productos::find($id);
        //recoger los productos
        return view('productos.modificar', array('producto' => $producto));


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
        $producto = Productos::find($id);
        $producto->delete();
        return redirect()->action([ProductosController::class, 'index']);


    }
}