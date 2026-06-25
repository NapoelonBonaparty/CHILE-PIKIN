<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apoyo;
use Illuminate\Http\Request;

class ApoyoController extends Controller
{
    public function index()
    {
        return response()->json(Apoyo::orderBy('nombre', 'asc')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|unique:apoyos',
            'descripcion' => 'nullable|string'
        ]);

        $apoyo = Apoyo::create($request->all());
        return response()->json(['message' => 'Apoyo creado', 'apoyo' => $apoyo]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|unique:apoyos,nombre,' . $id,
            'descripcion' => 'nullable|string'
        ]);

        $apoyo = Apoyo::findOrFail($id);
        $apoyo->update($request->all());
        return response()->json(['message' => 'Apoyo actualizado', 'apoyo' => $apoyo]);
    }

    public function destroy($id)
    {
        $apoyo = Apoyo::findOrFail($id);
        $apoyo->delete();
        return response()->json(['message' => 'Apoyo eliminado']);
    }
}