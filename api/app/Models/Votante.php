<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votante extends Model
{
    use HasFactory;

    // Los campos que Laravel tiene permitido llenar masivamente
    protected $fillable = [
        'clave_elector',
        'nombre',
        'seccion',
        'casilla',
        'asociacion',
        'foto_url',
        'simpatia',
        'foto_evidencia',
        'direccion',
        'latitud',
        'longitud',
    ];

    // Relación con la tabla de apoyos
    public function apoyos()
    {
        // Un votante pertenece a muchos apoyos (y viceversa)
        // Usamos withPivot para poder leer la fecha y las observaciones de la entrega
        return $this->belongsToMany(Apoyo::class, 'apoyo_votante')
                    ->withPivot('fecha_entrega', 'observaciones')
                    ->withTimestamps();
    }

    public function expediente()
    {
        return $this->hasOne(Expediente::class);
    }

    public function mototaxi()
    {
        return $this->hasOne(Mototaxi::class);
    }
}