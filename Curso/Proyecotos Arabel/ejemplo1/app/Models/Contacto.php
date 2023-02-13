<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;
    protected $table="contactos";
    protected $fillable=['nombre','apellido','telefono','direccion'];
    protected $hidden=['id'];
    public $timestamps=false;
}
