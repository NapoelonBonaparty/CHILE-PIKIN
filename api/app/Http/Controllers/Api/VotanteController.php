<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Votante;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 

class VotanteController extends Controller
{
    // Función para obtener todos los votantes y mandarlos a la tabla de Vue
    public function index(Request $request)
    {
        $query = Votante::with(['expediente', 'mototaxi', 'apoyos']);

        // Saber quién está pidiendo los datos
        $usuario = $request->user();

        // REGLAS DE SEGURIDAD SEGÚN EL ROL
        if ($usuario->rol === 'jefe_manzana') {
            // El Jefe de Manzana SOLO puede ver su sección y su casilla asignada
            $query->where('seccion', $usuario->seccion)
                ->where('casilla', $usuario->casilla);
        } elseif ($usuario->rol === 'movilizador') {
            // El Movilizador SOLO puede ver su sección asignada (todas las casillas)
            $query->where('seccion', $usuario->seccion);

            // Si el movilizador usa el filtro de casilla de la tabla, lo respetamos
            if ($request->has('casilla')) {
                $query->where('casilla', $request->casilla);
            }
        } else {
            // Si es SuperAdmin o Capturista, le dejamos usar los filtros normales de Vue
            if ($request->has('seccion')) {
                $query->where('seccion', $request->seccion);
            }
            if ($request->has('casilla')) {
                $query->where('casilla', $request->casilla);
            }
        }

        if ($request->has('busqueda') && $request->busqueda != '') {
            $termino = $request->busqueda;
            $query->where(function ($q) use ($termino) {
                $q->where('nombre', 'LIKE', '%' . $termino . '%')
                    ->orWhere('clave_elector', 'LIKE', '%' . $termino . '%');
            });
        }

        $votantes = $query->orderBy('nombre', 'asc')->get();

        return response()->json($votantes);
    }

    // Crear un nuevo votante (Nuevo Registro)
    public function store(Request $request)
    {
        // 1. Validamos los datos obligatorios y opcionales
        $request->validate([
            // MODIFICADO: Agregamos la regla unique para que no existan nombres idénticos
            'nombre' => 'required|string|max:255|unique:votantes,nombre',
            'clave_elector' => 'required|string|size:18|unique:votantes,clave_elector',
            'seccion' => 'required|string',
            'casilla' => 'nullable|string',      
            'asociacion' => 'nullable|string',   
            'foto_url' => 'nullable|image|max:2048' 
        ]);

        $rutaFoto = null;

        // 2. Si trae foto, la guardamos con el nombre de la persona (Ej. juan_perez_lopez)
        if ($request->hasFile('foto_url')) {
            // Convertimos "Juan Pérez" a "juan_perez" usando guiones bajos
            $nombreLimpio = Str::slug($request->nombre, '_'); 
            $extension = $request->file('foto_url')->getClientOriginalExtension();
            
            // Le agregamos un número aleatorio (time) al final por si hay dos "Juan Perez" no se borre la foto del primero
            $nombreArchivo = $nombreLimpio . '_' . time() . '.' . $extension; 
            
            // Guarda en storage/app/public/fotos_padron
            $rutaFoto = $request->file('foto_url')->storeAs('fotos_padron', $nombreArchivo, 'public');
        }

        // 3. Guardamos en la base de datos
        $votante = Votante::create([
            'nombre' => $request->nombre,
            'clave_elector' => strtoupper($request->clave_elector),
            'seccion' => $request->seccion,
            'casilla' => $request->casilla ? strtoupper($request->casilla) : null,
            'asociacion' => $request->asociacion, 
            'simpatia' => 'no_visitado', // Por defecto
            'foto_url' => $rutaFoto
        ]);

        // 4. Respondemos con el votante creado (Estatus 201: Creado)
        return response()->json($votante, 201);
    }

    // Actualizar el estatus (simpatía), ubicación y foto de un votante
    public function update(Request $request, string $id)
    {
        $request->validate([
            'simpatia' => 'required|in:a_favor,en_contra,indeciso,no_visitado',
            'direccion' => 'nullable|string',
            'latitud' => 'nullable|numeric',
            'longitud' => 'nullable|numeric',
            'observaciones' => 'nullable|string', 
            'foto_evidencia' => 'nullable|image|max:5120' 
        ]);

        $votante = Votante::findOrFail($id);

        // 1. Actualizamos los datos de texto y coordenadas
        $votante->simpatia = $request->simpatia;
        $votante->direccion = $request->direccion;
        $votante->latitud = $request->latitud;
        $votante->longitud = $request->longitud;
        $votante->observaciones = $request->observaciones;

        // Verificamos si nos mandaron una imagen de evidencia
        if ($request->hasFile('foto_evidencia')) {
            
            // Borramos la foto vieja si existía para ahorrar espacio
            if ($votante->foto_evidencia && \Illuminate\Support\Facades\Storage::disk('public')->exists($votante->foto_evidencia)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($votante->foto_evidencia);
            }

            // Como Vue ya la comprimió, simplemente la guardamos directo en la bóveda
            $path = $request->file('foto_evidencia')->store('evidencias', 'public');
            
            // Le decimos a la base de datos el nombre del archivo final
            $votante->foto_evidencia = $path;
        }

        // Guardamos todos los cambios en la base de datos
        $votante->save();

        return response()->json([
            'message' => 'Estatus, ubicación y evidencia actualizados con éxito', 
            'votante' => $votante
        ]);
    }

    // Obtener el historial de apoyos de una persona
    public function historialApoyos(string $id)
    {
        $votante = Votante::findOrFail($id);
        // orderByPivot ordena para que el apoyo más reciente salga arriba
        $historial = $votante->apoyos()->orderByPivot('created_at', 'desc')->get();
        return response()->json($historial);
    }

    // Registrar que se le entregó un apoyo
    public function asignarApoyo(Request $request, string $id)
    {
        $request->validate([
            'apoyo_id' => 'required|exists:apoyos,id',
            'fecha_entrega' => 'required|date',
            'observaciones' => 'nullable|string'
        ]);

        $votante = Votante::findOrFail($id);

        // attach() hace la magia de conectar al votante con el apoyo en la tabla intermedia
        $votante->apoyos()->attach($request->apoyo_id, [
            'fecha_entrega' => $request->fecha_entrega,
            'observaciones' => $request->observaciones
        ]);

        return response()->json(['message' => 'Apoyo registrado con éxito']);
    }

    public function actualizarVotante(Request $request, string $id)
    {
        $votante = Votante::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'clave_elector' => 'nullable|string|size:18|unique:votantes,clave_elector,' . $votante->id,
            'seccion' => 'required|string',
            'casilla' => 'nullable|string',
            'asociacion' => 'nullable|string',
            'foto_url' => 'nullable|image|max:2048'
        ]);

        $votante->nombre = $request->nombre;
        $votante->clave_elector = $request->clave_elector ? strtoupper($request->clave_elector) : $votante->clave_elector;
        $votante->seccion = $request->seccion;
        $votante->casilla = $request->casilla ? strtoupper($request->casilla) : null;
        $votante->asociacion = $request->asociacion;

        if ($request->hasFile('foto_url')) {
            if ($votante->foto_url && \Illuminate\Support\Facades\Storage::disk('public')->exists($votante->foto_url)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($votante->foto_url);
            }
            $nombreLimpio = Str::slug($request->nombre, '_');
            $extension = $request->file('foto_url')->getClientOriginalExtension();
            $nombreArchivo = $nombreLimpio . '_' . time() . '.' . $extension;
            $votante->foto_url = $request->file('foto_url')->storeAs('fotos_padron', $nombreArchivo, 'public');
        }

        $votante->save();

        return response()->json([
            'message' => 'Datos del registro actualizados correctamente',
            'votante' => $votante->load('expediente')
        ]);
    }

    public function actualizarClave(Request $request, string $id)
    {
        // Validamos que la clave tenga 18 caracteres y no se repita
        $request->validate([
            'clave_elector' => 'required|string|size:18|unique:votantes,clave_elector'
        ]);

        $votante = Votante::findOrFail($id);
        $votante->clave_elector = strtoupper($request->clave_elector);
        $votante->save();

        return response()->json([
            'mensaje' => 'Clave actualizada correctamente',
            'votante' => $votante
        ]);
    }
}