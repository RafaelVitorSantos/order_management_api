<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'usu_login' => 'required|string',
            'usu_senha' => 'required|string',
        ]);

        $user = Usuario::where('usu_login', $request->usu_login)->first();

        if (!$user || !Hash::check($request->usu_senha, $user->usu_senha)) {
            throw ValidationException::withMessages([
                'usu_login' => ['As credenciais estão incorretas.'],
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'Login realizado com sucesso.',
            'token' => $token,
            'data' => null
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout realizado com sucesso.',
        ]);
    }

    public function me(Request $request)
    {
        return response()->json([
            'status' => 'success',
            'message' => null,
            'data' => $request->user(),
        ]);
    }
}
