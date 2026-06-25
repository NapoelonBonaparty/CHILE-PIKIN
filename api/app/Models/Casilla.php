<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casilla extends Model
{
    use HasFactory;

    protected $fillable = [
        'seccion_id',
        'nombre',
        'ubicacion_texto',
        'latitud',
        'longitud'
    ];

    public function seccion()
    {
        return $this->belongsTo(Seccion::class);
    }
}