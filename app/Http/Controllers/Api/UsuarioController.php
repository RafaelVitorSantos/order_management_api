<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UsuarioController extends Controller
{
    protected function validationRules()
    {
        return [
            'usu_id' => 'required|integer|unique:usuarios,usu_id',
            'fil_id' => 'required|string',
            'usu_login' => 'required|string|unique:usuarios,usu_login',
            'usu_senha' => 'required|string',
            'usu_master' => 'nullable|boolean',
            'usu_status' => 'nullable|in:A,I',
            'usu_validadesenha' => 'required|date',
            'usu_pes_id' => 'required|integer',
            'usu_pes_razao' => 'required|string',
            'usu_pes_cnpjcpf' => 'required|string'
        ];
    }

    protected function validationMessages()
    {
        return [
            'usu_id.required' => 'O campo ID do usuário é obrigatório.',
            'usu_id.integer' => 'O campo ID do usuário deve ser um número inteiro.',
            'usu_id.unique' => 'Esse ID do usuário já está em uso.',

            'fil_id.required' => 'O campo ID da filial é obrigatório.',
            'fil_id.string' => 'O campo ID da filial deve ser um texto.',

            'usu_login.required' => 'O campo login do usuário é obrigatório.',
            'usu_login.string' => 'O campo login do usuário deve ser um texto.',
            'usu_login.unique' => 'Esse login do usuário já está em uso.',

            'usu_senha.required' => 'O campo senha do usuário é obrigatório.',
            'usu_senha.string' => 'O campo senha do usuário deve ser um texto.',

            'usu_validadesenha.required' => 'O campo Validade Senha do usuário é obrigatório.',
            'usu_validadesenha.date' => 'O campo Validade Senha deve ser uma data.',

            'usu_pes_id.required' => 'O campo ID da pessoa é obrigatório.',
            'usu_pes_id.integer' => 'O campo ID da pessoa deve ser um número inteiro.',

            'usu_pes_razao.required' => 'O campo razão da pessoa é obrigatório.',
            'usu_pes_razao.string' => 'O campo razão da pessoa deve ser um texto.',

            'usu_pes_cnpjcpf.required' => 'O campo CNPJ/CPF da pessoa é obrigatório.',
            'usu_pes_cnpjcpf.string' => 'O campo CNPJ/CPF deve ser um texto.',
        ];
    }

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

    public function store(Request $request)
    {
        try {
            $this->authorize('create', Usuario::class);

            $data = $request->validate($this->validationRules(), $this->validationMessages());
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

    public function update(Request $request, int $id)
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

        $data = $request->validate([
            'usu_id' => ['sometimes', 'integer', Rule::unique('usuarios')->ignore($user->usu_id)],
            'fil_id' => 'sometimes|string',
            'usu_login' => ['sometimes', 'string', Rule::unique('usuarios')->ignore($user->usu_login)],
            'usu_senha' => 'sometimes|string',
            'usu_master' => 'sometimes|boolean',
            'usu_status' => 'sometimes|in:A,I',
            'usu_validadesenha' => 'sometimes|date',
            'usu_pes_id' => 'sometimes|integer',
            'usu_pes_razao' => 'sometimes|string',
            'usu_pes_cnpjcpf' => 'sometimes|string',
        ]);

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
