<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profesores;
use App\Models\Curso;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $profesores = profesores::all();
        return view('profesor.lista', ['profesores' => $profesores]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('profesor.crear');


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

        $ProfesorNuevo = new profesores($request->all());
        $ProfesorNuevo->save();
        return redirect()->route('profesores.index');
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

        $profesor = profesores::find($id);
        $cursosImpartidos = $profesor->cursos->orderby('nombre')->get();
        return view('profesor.ver', array('profesor' => $profesor, 'cursosImpartidos' => $cursosImpartidos));


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

        $profesor = profesores::find($id);
        return view('profesor.editar', ['profesor' => $profesor]);
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

        $profesor = profesores::find($id);
        $profesor->nombre_apellido = $request->nombre_apellido;
        $profesor->profesion = $request->profesion;
        $profesor->grado_academico = $request->grado_academico;
        $profesor->telefono = $request->telefono;
        $profesor->save();
        return redirect()->action([ProfesorController::class, 'index']);
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

        $profesor = profesores::find($id);
        $profesor->delete();
        return redirect()->action([ProfesorController::class, 'index']);
    }
}