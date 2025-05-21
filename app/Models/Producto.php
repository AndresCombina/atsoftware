<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
    'nombre',
    'marca_id',
    'rubro_id',
    'subrubro_id',
    'grupo_id',
    'serie',
    'sector_id',
    'precio',
    'stock',
];
}
