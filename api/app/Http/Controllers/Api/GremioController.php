<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mototaxi;
use Illuminate\Http\Request;

class GremioController extends Controller
{
    public function obtenerMototaxis()
    {
        // Traemos todos los mototaxis y usando "with('votante')" 
        // le decimos a Laravel que nos traiga también su nombre, foto, INE, etc.
        $mototaxis = Mototaxi::with('votante')->get();

        return response()->json($mototaxis);
    }
}