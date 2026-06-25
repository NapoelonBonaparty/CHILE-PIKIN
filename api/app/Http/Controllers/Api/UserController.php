<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // 1. Listar todos los usuarios
    public function index()
    {
        return response()->json(User::orderBy('name', 'asc')->get());
    }

    // 2. Crear un usuario nuevo
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'usuario' => 'required|string|unique:users,username', 
            'password' => 'required|string|min:6',
            'rol' => 'required|string|in:superadmin,capturista,movilizador,jefe_manzana',
            'seccion' => 'nullable|string',
            'casilla' => 'nullable|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->usuario,
            'email' => $request->usuario . '@sistema.local', 
            'password' => Hash::make($request->password), 
            'rol' => $request->rol,
            'seccion' => $request->seccion,
            'casilla' => $request->casilla,
        ]);

        return response()->json(['message' => 'Usuario creado con éxito', 'user' => $user]);
    }

    // 3. Actualizar un usuario existente
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'usuario' => 'required|string|unique:users,username,'.$user->id, 
            'rol' => 'required|string|in:superadmin,capturista,movilizador,jefe_manzana',
            'seccion' => 'nullable|string',
            'casilla' => 'nullable|string',
        ]);

        $dataToUpdate = [
            'name' => $request->name,
            'username' => $request->usuario,
            'email' => $request->usuario . '@sistema.local',
            'rol' => $request->rol,
            'seccion' => $request->seccion,
            'casilla' => $request->casilla,
        ];

        if ($request->filled('password')) {
            $dataToUpdate['password'] = Hash::make($request->password);
        }

        $user->update($dataToUpdate);

        return response()->json(['message' => 'Usuario actualizado con éxito', 'user' => $user]);
    }

    // 4. Eliminar un usuario
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'Usuario eliminado con éxito']);
    }

    // Obtener los responsables de una sección
    public function encargadosPorSeccion($seccion)
    {
        $encargados = \App\Models\User::where('seccion', $seccion)
            ->whereNotNull('rol') // Excluimos si hay usuarios sin rol
            ->select('id', 'name', 'rol', 'casilla')
            ->get();

        return response()->json($encargados);
    }
}