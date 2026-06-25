<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use App\Models\Votante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExpedienteController extends Controller
{
    public function storeOrUpdate(Request $request, $votante_id)
    {
        $votante = Votante::findOrFail($votante_id);

        $expediente = Expediente::firstOrNew(['votante_id' => $votante->id]);

        $expediente->curp = $request->curp;
        $expediente->telefono = $request->telefono;
        $expediente->fecha_nacimiento = $request->fecha_nacimiento;
        $expediente->genero = $request->genero;
        $expediente->calle = $request->calle;
        $expediente->numero = $request->numero;
        $expediente->colonia = $request->colonia;
        $expediente->referencias = $request->referencias;

        if ($request->hasFile('foto_credencial')) {
            if ($expediente->foto_credencial) {
                Storage::disk('public')->delete($expediente->foto_credencial);
            }
            $rutaCredencial = $request->file('foto_credencial')->store('expedientes', 'public');
            $expediente->foto_credencial = $rutaCredencial;
        }

        if ($request->hasFile('foto_personal')) {
            if ($expediente->foto_personal) {
                Storage::disk('public')->delete($expediente->foto_personal);
            }
            $rutaPersonal = $request->file('foto_personal')->store('expedientes', 'public');
            $expediente->foto_personal = $rutaPersonal;
        }

        $expediente->save();

        return response()->json([
            'mensaje' => 'Expediente guardado correctamente',
            'expediente' => $expediente
        ]);
    }
}