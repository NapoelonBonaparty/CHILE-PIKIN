<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apoyo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    // Relación inversa: Saber a qué votantes se les dio este apoyo
    public function votantes()
    {
        return $this->belongsToMany(Votante::class, 'apoyo_votante')
                    ->withPivot('fecha_entrega', 'observaciones')
                    ->withTimestamps();
    }
}