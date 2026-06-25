<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Votante;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function estadisticas(Request $request)
    {
        $query = Votante::query();

        $usuario = $request->user();

        if ($usuario->rol === 'jefe_manzana') {
            $query->where('seccion', $usuario->seccion)
                ->where('casilla', $usuario->casilla);
        } elseif ($usuario->rol === 'movilizador') {
            $query->where('seccion', $usuario->seccion);
        } else {
            if ($request->has('seccion') && $request->seccion !== 'todas') {
                $query->where('seccion', $request->seccion);
            }
        }

        $total = $query->count();

        $a_favor = (clone $query)->where('simpatia', 'a_favor')->count();
        $en_contra = (clone $query)->where('simpatia', 'en_contra')->count();
        $indeciso = (clone $query)->where('simpatia', 'indeciso')->count();
        $no_visitado = (clone $query)->where('simpatia', 'no_visitado')->count();

        $meta_mayoria = intval(ceil($total * 0.60));
        $faltan_para_meta = $meta_mayoria - $a_favor;
        if ($faltan_para_meta < 0) $faltan_para_meta = 0; 

        return response()->json([
            'total' => $total,
            'conteo' => [
                'a_favor' => $a_favor,
                'en_contra' => $en_contra,
                'indeciso' => $indeciso,
                'no_visitado' => $no_visitado,
            ],
            'porcentajes' => [
                'a_favor' => $total > 0 ? round(($a_favor / $total) * 100, 1) : 0,
                'en_contra' => $total > 0 ? round(($en_contra / $total) * 100, 1) : 0,
                'indeciso' => $total > 0 ? round(($indeciso / $total) * 100, 1) : 0,
                'no_visitado' => $total > 0 ? round(($no_visitado / $total) * 100, 1) : 0,
            ],
            'estrategia' => [
                'meta_mayoria' => $meta_mayoria,
                'faltan_para_meta' => $faltan_para_meta
            ]
        ]);
    }
}
