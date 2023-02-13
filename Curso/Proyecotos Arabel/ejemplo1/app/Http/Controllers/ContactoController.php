<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //como la select *
        $contactos = Contacto::all();
        //enviar datos a la vista
        return view('contactos.lista', array('miscontactos' => $contactos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contactos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contactoNuevo = new Contacto($request->all());
        $contactoNuevo->save();
        return redirect()->action([ContactoController::class, 'index']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contacto = Contacto::find($id);
        return view('contactos.ver', array('contactoActual' => $contacto));

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
        $contacto = Contacto::find($id);
        return view('contactos.editar', array('contactoActual' => $contacto));
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
        $contacto = Contacto::find($id);
        $contacto->nombre = $request->nombre;
        $contacto->apellido = $request->apellido;
        $contacto->direccion = $request->direccion;
        $contacto->telefono = $request->telefono;
        $contacto->save();
        return redirect()->action([ContactoController::class, 'index']);
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
        $contacto = Contacto::find($id);
        $contacto->delete();
        return redirect()->action([ContactoController::class, 'index']);
    }
}