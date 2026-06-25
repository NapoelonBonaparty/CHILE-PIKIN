<?php

namespace App\Imports;

use App\Models\Mototaxi;
use App\Models\Votante;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MototaxisImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (empty($row['nombre_completo'])) {
            return null;
        }

        $nombre = trim($row['nombre_completo']);
        $clave = !empty($row['clave_elector']) ? trim($row['clave_elector']) : null;
        $seccion = $row['seccion'] ?? null;
        
        $votante = null;

        // 1. Intentamos buscar por Clave INE (Es la forma más exacta)
        if ($clave) {
            $votante = Votante::where('clave_elector', $clave)->first();
        }

        // 2. Si no lo encontró por clave (quizás en la BD la clave está vacía o es distinta)
        if (!$votante) {
            // Lo buscamos por su Nombre Exacto
            $votante = Votante::where('nombre', $nombre)->first();
            
            // ESTA ES LA MAGIA QUE PEDISTE 
            // Si SÍ lo encontramos por nombre, pero en nuestra BD no tenía clave y el Excel SÍ tiene, ¡se la guardamos!
            if ($votante && $clave && empty($votante->clave_elector)) {
                $votante->clave_elector = $clave;
                $votante->save(); // Actualizamos la tabla Votantes al instante
            }
        }

        // 3. Si después de buscar por clave y por nombre, de plano no existe, entonces sí lo creamos
        if (!$votante) {
            $nombreLimpio = Str::slug($nombre, '_');
            
            $rutaFoto = null;
            if (\Illuminate\Support\Facades\Storage::disk('public')->exists('fotos_padron/' . $nombreLimpio . '.jpg')) {
                $rutaFoto = 'fotos_padron/' . $nombreLimpio . '.jpg';
            } elseif (\Illuminate\Support\Facades\Storage::disk('public')->exists('fotos_padron/' . $nombreLimpio . '.png')) {
                $rutaFoto = 'fotos_padron/' . $nombreLimpio . '.png';
            }

            $votante = Votante::create([
                'nombre'        => $nombre,
                'clave_elector' => $clave,
                'seccion'       => $seccion,
                'simpatia'      => 'no_visitado',
                'foto_url'      => $rutaFoto,
            ]);
        }

        // 4. Finalmente, le ponemos su sombrero de Mototaxi (Lo creamos o actualizamos)
        Mototaxi::updateOrCreate(
            ['votante_id' => $votante->id],
            [
                'numero_economico' => $row['no_mototaxi'] ?? null,
                'grupo'            => $row['grupo'] ?? null,
            ]
        );

        return null;
    }
}