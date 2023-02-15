<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table="alumnos";
    protected $hidden=["id"];
    protected $fillable=["nombre","apellido","edad","direccion","telefono"];
//un alumno puede matricularse en muchos cursos
    public function cursos(){
    	return $this->belongsToMany(Curso::class);
    }
}
