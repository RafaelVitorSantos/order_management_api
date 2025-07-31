<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\Usuario;

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
            return response()->json([
                'status' => 'error',
                'message' => 'As credenciais estão incorretas.',
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'Login realizado com sucesso.',
            'token' => $token,
            'data' => $user
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
