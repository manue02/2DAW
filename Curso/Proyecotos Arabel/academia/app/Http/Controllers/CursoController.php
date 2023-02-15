<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;
use App\Models\Curso;
use App\Models\Alumno;
class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.lista', ['cursos' => $cursos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //a la vista le tengo que mandar los datos para los combos
        $profesores=Profesor::all();
        $alumnos=Alumno::all();
        return view('cursos.crear',array("profesores"=>$profesores,"alumnos"=>$alumnos));
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
        $nuevo=new Curso();
        $nuevo->nombre=$request->nombre;
        $nuevo->nivel=$request->nivel;
        $nuevo->horas_academicas=$request->horas_academicas;
        $nuevo->profesor_id=$request->profesor_id;
        $nuevo->save();
        foreach ($request->alumnos_ids as $alumno_id){
            $nuevo->alumnos()->attach($alumno_id);
        }
        return redirect()->action([CursoController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso=Curso::find($id);
        $alumnos=$curso->alumnos()->orderBy('apellido')->get();
        return view('cursos.ver',array('curso'=>$curso,'alumnos'=>$alumnos));
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
    public function destroy($id){
        $curso = Curso::findOrFail($id);
        $curso->alumnos()->detach();
        $curso->delete();
        return redirect()->action([CursoController::class, 'index']);
    }
}
