<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $table = 'articulo';
    protected $primaryKey = 'codigo';

    protected $fillable = [
        'codigo',
        'descripcion',
        'precio_compra',
        'pewcio_venta',
        'stock',
    ];

    public $incrementing = false;



}