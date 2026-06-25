<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;

    protected $table = 'secciones';

    protected $fillable = [
        'numero', 
        'casillas_disponibles',
        'latitud',
        'longitud',
        'poligono',
        'barrios'
        ];

    // Laravel transformará el JSON de MariaDB en un Array automáticamente
    protected $casts = [
        'casillas_disponibles' => 'array',
        'poligono' => 'array',
        'barrios' => 'array',
    ];

    public function casillas()
    {
        return $this->hasMany(Casilla::class);
    }
}