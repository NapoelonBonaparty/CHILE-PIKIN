<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Seccion;
use Illuminate\Http\Request;

class SeccionController extends Controller
{
    public function index()
    {
        $secciones = Seccion::with('casillas')->orderBy('numero', 'asc')->get()->map(function ($seccion) {
            $seccion->casillas_disponibles = $seccion->casillas->pluck('nombre')->toArray();
            return $seccion;
        });

        return response()->json($secciones);
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|string|unique:secciones',
            'casillas_disponibles' => 'required|array',
            'poligono' => 'nullable|array',
            'barrios' => 'nullable|array',
            'latitud' => 'nullable|numeric',
            'longitud' => 'nullable|numeric'
        ]);

        // ¡AQUÍ ESTABA EL ERROR 500! Ahora le mandamos todos los datos obligatorios
        $seccion = Seccion::create([
            'numero' => $request->numero,
            'casillas_disponibles' => $request->casillas_disponibles, // Faltaba esto
            'poligono' => $request->poligono,
            'barrios' => $request->barrios,
            'latitud' => $request->latitud ?? null,
            'longitud' => $request->longitud ?? null
        ]);

        // Creamos las casillas hijas en su tabla correspondiente
        foreach ($request->casillas_disponibles as $nombreCasilla) {
            $seccion->casillas()->create([
                'nombre' => $nombreCasilla
            ]);
        }

        $seccion->casillas_disponibles = $request->casillas_disponibles;

        return response()->json(['message' => 'Sección y casillas guardadas con éxito', 'seccion' => $seccion], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'numero' => 'required|string|unique:secciones,numero,' . $id,
            'casillas_disponibles' => 'required|array',
            'poligono' => 'nullable|array',
            'barrios' => 'nullable|array',
            'latitud' => 'nullable|numeric',
            'longitud' => 'nullable|numeric'
        ]);

        $seccion = Seccion::findOrFail($id);
        
        // Actualizamos los datos principales
        $seccion->update([
            'numero' => $request->numero,
            'casillas_disponibles' => $request->casillas_disponibles, // Faltaba esto
            'poligono' => $request->poligono,
            'barrios' => $request->barrios,
            'latitud' => $request->latitud ?? $seccion->latitud,
            'longitud' => $request->longitud ?? $seccion->longitud
        ]);

        $casillasEnBaseDeDatos = $seccion->casillas()->pluck('nombre')->toArray();
        $casillasDesdeVue = $request->casillas_disponibles;

        // Borrar las casillas que se quitaron en Vue
        $paraBorrar = array_diff($casillasEnBaseDeDatos, $casillasDesdeVue);
        if (!empty($paraBorrar)) {
            $seccion->casillas()->whereIn('nombre', $paraBorrar)->delete();
        }

        // Agregar las casillas nuevas que se pusieron en Vue
        $paraAgregar = array_diff($casillasDesdeVue, $casillasEnBaseDeDatos);
        foreach ($paraAgregar as $nombreCasilla) {
            $seccion->casillas()->create([
                'nombre' => $nombreCasilla
            ]);
        }

        $seccion->casillas_disponibles = $seccion->casillas()->pluck('nombre')->toArray();

        return response()->json(['message' => 'Sección actualizada con éxito', 'seccion' => $seccion]);
    }

    public function destroy($id)
    {
        $seccion = Seccion::findOrFail($id);
        
        // Borramos las casillas relacionadas primero (buena práctica)
        $seccion->casillas()->delete();
        // Borramos la sección
        $seccion->delete();
        
        return response()->json(['message' => 'Sección eliminada con éxito']);
    }
}