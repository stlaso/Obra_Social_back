<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
            'telefono' => 'nullable|string',
            'correo' => 'nullable|string|email|max:255|unique:users',
            'roles_id' => 'required|exists:roles,id',
            'estados_id' => 'nullable',
            'seccional_id' => 'required|exists:seccional,id'
        ]);

        $user = User::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'roles_id' => $request->roles_id,
            'estados_id' => 1,
            'seccional_id' => $request->seccional_id,
        ]);

        return response()->json($user, 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'username' => ['El usuario es incorrecto.'],
            ]);
        }

        return response()->json([
            'token' => $user->createToken($request->username)->plainTextToken,
        ]);
    }


    public function refreshToken(Request $request)
    {
        $user = $request->user();

        if (! $user) {
            return response()->json([
                'error' => 'Usuario no autenticado.',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $currentToken = $user->currentAccessToken();

        if (! $currentToken) {
            return response()->json([
                'error' => 'Token no válido.',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $newToken = $user->createToken('NewToken')->plainTextToken;
        $rol= $user->roles_id;

        return response()->json([
            'token' => $newToken,
            'user' => $rol,

        ], Response::HTTP_OK);
    }
}
