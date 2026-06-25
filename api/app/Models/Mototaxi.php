<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mototaxi extends Model
{
    use HasFactory;

    // Decimos cómo se llama la tabla exactamente
    protected $table = 'mototaxis';

    protected $fillable = [
        'votante_id',
        'numero_economico',
        'grupo'
    ];

    // Un Mototaxi pertenece a un Votante
    public function votante()
    {
        return $this->belongsTo(Votante::class);
    }
}