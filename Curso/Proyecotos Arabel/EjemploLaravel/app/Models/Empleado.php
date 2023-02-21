<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Empleado extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = ['nombre', 'apellidos', 'sueldo', 'departamento_id'];

    public $sortable = ['nombre', 'apellidos', 'sueldo', 'departamento_id'];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function idiomas()
    {
        return $this->belongsToMany(Idioma::class);
    }


}