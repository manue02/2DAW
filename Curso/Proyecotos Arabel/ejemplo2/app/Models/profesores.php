<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profesores extends Model
{
    use HasFactory;
    protected $table = 'profesores';

    protected $primaryKey = 'id';
    protected $fillable = ['nombre_apellido', 'profesion', 'grado_academico', "telefono"];

    protected $hidden = ['id'];

    //un profesor tiene muchos cursos
    //devuelve todos los cursos que tengas
    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }

//explicame que es este codigo y que hace
//este codigo es para que cuando se cree un nuevo profesor se le asigne un id
//y cuando se cree un nuevo curso se le asigne un id
}