<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Casilla;
use Illuminate\Http\Request;

class CasillaController extends Controller
{
    // Obtener las casillas completas de una sección específica
    public function porSeccion($seccion_id)
    {
        $casillas = Casilla::where('seccion_id', $seccion_id)->get();
        return response()->json($casillas);
    }

    // Actualizar las coordenadas y el nombre del lugar
    public function actualizarUbicacion(Request $request, $id)
    {
        $request->validate([
            'latitud' => 'required|numeric',
            'longitud' => 'required|numeric',
            'ubicacion_texto' => 'nullable|string'
        ]);

        $casilla = Casilla::findOrFail($id);
        $casilla->update([
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
            'ubicacion_texto' => $request->ubicacion_texto
        ]);

        return response()->json(['message' => 'Ubicación de la casilla guardada con éxito', 'casilla' => $casilla]);
    }

    // Obtener todo el mapa de casillas y secciones
    public function todasParaMapa()
    {
        $secciones = \App\Models\Seccion::with(['casillas' => function($query) {
            $query->whereNotNull('latitud')->whereNotNull('longitud');
        }])->get();

        return response()->json($secciones);
    }
}