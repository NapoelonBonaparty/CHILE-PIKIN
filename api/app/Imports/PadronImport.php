<?php

namespace App\Imports;

use App\Models\Votante;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PadronImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Si la fila no tiene nombre, nos la saltamos (escala filas vacías del Excel)
        if (empty($row['nombre'])) {
            return null;
        }

        $nombre = trim($row['nombre']);
        $clave = !empty($row['clave_elector']) ? trim($row['clave_elector']) : null;
        
        $nombreLimpio = \Illuminate\Support\Str::slug($nombre, '_');
        
        $rutaFoto = null;
        if (\Illuminate\Support\Facades\Storage::disk('public')->exists('fotos_padron/' . $nombreLimpio . '.jpg')) {
            $rutaFoto = 'fotos_padron/' . $nombreLimpio . '.jpg';
        } elseif (\Illuminate\Support\Facades\Storage::disk('public')->exists('fotos_padron/' . $nombreLimpio . '.png')) {
            $rutaFoto = 'fotos_padron/' . $nombreLimpio . '.png';
        }

        // Preparamos los datos que queremos guardar o actualizar
        $datosParaGuardar = [
            'nombre'   => $nombre, 
            'seccion'  => $row['seccion'] ?? null,
            'casilla'  => $row['casilla'] ?? null,
            'simpatia' => $row['simpatia'] ?? 'no_visitado',
            'foto_url' => $rutaFoto, // Guardará la ruta exacta (con .png o .jpg)
        ];

        // LOGICA INTELIGENTE DE GUARDADO
        if ($clave) {
            // 1. Si TIENE clave INE, buscamos por clave para no duplicar
            Votante::updateOrCreate(
                ['clave_elector' => $clave], // ← Condición de búsqueda
                $datosParaGuardar            // ← Datos a actualizar o crear
            );
        } else {
            // 2. Si NO TIENE clave, buscamos por su nombre exacto para no duplicar
            Votante::updateOrCreate(
                ['nombre' => $nombre],       // ← Condición de búsqueda
                $datosParaGuardar
            );
        }

        // Devolvemos "null" para decirle a la librería de Excel que nosotros 
        // ya hicimos el trabajo de guardado manualmente y no intente insertarlo de nuevo.
        return null;
    }
}