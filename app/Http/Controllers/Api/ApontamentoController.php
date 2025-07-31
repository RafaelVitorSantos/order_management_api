<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApontamentoRequest;
use App\Http\Requests\UpdateApontamentoRequest;
use App\Models\Apontamento;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ApontamentoController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Apontamento::class);

        $orderLogs = Apontamento::query()
            ->filter($request)
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return response()->json([
            'status' => 'success',
            'message' => 'Apontamento encontrado com sucesso.',
            'data' => $orderLogs
        ], 200);
    }

    public function store(StoreApontamentoRequest $request)
    {
        try {
            $this->authorize('store', Apontamento::class);

            $data = $request->validated();
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Erro de Validação',
                'data' => $e->errors(),
            ], 400);
        }

        $orderLog = Apontamento::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Apontamento criado com sucesso!',
            'data' => $orderLog
        ], 201);
    }

    public function show(int $id)
    {
        $orderLog = Apontamento::find($id);

        if (!$orderLog) {
            return response()->json([
                'status' => 'error',
                'message' => 'Apontamento não encontrado.',
                'data' => null
            ], 400);
        }

        $this->authorize('view', $orderLog);

        return response()->json([
            'status' => 'success',
            'message' => 'Apontamento encontrado com sucesso.',
            'data' => $orderLog
        ], 200);
    }

    public function update(UpdateApontamentoRequest $request, Apontamento $apontamento)
    {
        try {
            $this->authorize('update', $apontamento);

            $data = $request->validated();
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Erro de Validação',
                'data' => $e->errors(),
            ], 400);
        }

        $apontamento->update($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Apontamento criado com sucesso!',
            'data' => $apontamento,
        ], 200);
    }

    public function destroy(int $id)
    {
        $orderLog = Apontamento::find($id);

        if (!$orderLog) {
            return response()->json([
                'status' => 'error',
                'message' => 'Apontamento não encontrada.',
                'data' => null
            ], 404);
        }

        $this->authorize('delete', $orderLog);

        $orderLog->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Apontamento deletado com sucesso!',
            'data' => null
        ], 200);
    }
}
