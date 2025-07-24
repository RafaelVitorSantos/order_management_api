<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrdemServico;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class OrdemServicoController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', OrdemServico::class);

        $order = OrdemServico::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Oredem de Serviço encontrado com sucesso.',
            'data' => $order
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            $this->authorize('store', OrdemServico::class);

            $data = $request->validated();
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Erro de Validação',
                'data' => $e->errors(),
            ], 400);
        }

        $order = OrdemServico::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Usuário criado com sucesso!',
            'data' => $order
        ], 201);
    }

    public function show(int $id)
    {
        $order = OrdemServico::find($id);

        if (!$order) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ordem de Serviço não encontrada.',
                'data' => null
            ], 400);
        }

        $this->authorize('view', $order);

        return response()->json([
            'status' => 'success',
            'message' => 'Ordem de Serviço encontrada com sucesso.',
            'data' => $order
        ], 200);
    }

    public function update(Request $request, OrdemServico $ordemServico)
    {
        //
    }

    public function destroy(OrdemServico $ordemServico)
    {
        //
    }
}
