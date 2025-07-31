<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UsuarioController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Usuario::class);

        $users = Usuario::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Usuário encontrado com sucesso.',
            'data' => $users
        ], 200);
    }

    public function store(StoreUsuarioRequest $request)
    {
        try {
            $this->authorize('create', Usuario::class);

            $data = $request->validated();
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Erro de Validação',
                'data' => $e->errors(),
            ], 400);
        }

        $data['usu_senha'] = Hash::make($data['usu_senha']);

        $user = Usuario::create($data);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'Usuário criado com sucesso!',
            'token' => $token,
            'data' => $user
        ], 201);
    }

    public function show(int $id)
    {
        $user = Usuario::find($id);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Usuário não encontrado.',
                'data' => null
            ], 404);
        }

        $this->authorize('view', $user);

        return response()->json([
            'status' => 'success',
            'message' => 'Usuário encontrado com sucesso.',
            'data' => $user
        ]);
    }

    public function update(UpdateUsuarioRequest $request, int $id)
    {
        $user = Usuario::find($id);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Usuário não encontrado.',
                'data' => null
            ], 404);
        }

        $this->authorize('update', $user);

        $data = $request->validated();

        if (!empty($data['usu_senha'])) {
            $data['usu_senha'] = Hash::make($data['usu_senha']);
        } else {
            unset($data['usu_senha']);
        }

        $user->update($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Usuário atualizado com sucesso!',
            'data' => $user
        ]); // não especifiquei o HTTP, logo irá o padrão "200 OK".
    }

    public function destroy(int $id)
    {
        $user = Usuario::find($id);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Usuário não encontrado.',
                'data' => null
            ], 404);
        }

        $this->authorize('delete', $user);

        $user->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Usuário deletado com sucesso!',
            'data' => null
        ], 200);
    }
}
