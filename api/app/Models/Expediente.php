<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;

    protected $fillable = [
        'votante_id',
        'curp',
        'telefono',
        'fecha_nacimiento',
        'genero',
        'calle',
        'numero',
        'colonia',
        'referencias',
        'foto_credencial',
        'foto_personal'
    ];

    public function votante()
    {
        return $this->belongsTo(Votante::class);
    }
}