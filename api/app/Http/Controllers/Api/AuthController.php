<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // 1. Ahora validamos que nos manden 'username'
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // 2. Revisamos si el usuario y contraseña coinciden
        if (!Auth::attempt($request->only('username', 'password'))) {
            return response()->json(['mensaje' => 'Usuario o contraseña incorrectos'], 401);
        }

        // 3. Generamos el Token
        $user = User::where('username', $request->username)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'mensaje' => 'Bienvenido ' . $user->name,
            'token' => $token,
            'usuario' => $user
        ]);
    }

    public function logout(Request $request)
    {
        // El usuario actual entrega su "gafete" y Laravel lo destruye de la base de datos
        $request->user()->currentAccessToken()->delete();

        return response()->json(['mensaje' => 'Sesión cerrada exitosamente']);
    }
}