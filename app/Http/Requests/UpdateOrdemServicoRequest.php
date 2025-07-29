<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOrdemServicoRequest extends FormRequest
{
    public function authorize()
    {
        //libera autorização por aqui, pois a validação está sendo realizada via Policy
        return true;
    }

    public function rules()
    {
        return [
            'fil_id' => ['sometimes', 'string'],
            'osproc_seq' => [
                'sometimes',
                'integer',
                Rule::unique('ordem_servicos')
                    ->where(function ($query) {
                        return $query->where('osproc_os_id', $this->osproc_os_id);
                    })
                    ->ignore($this->route('ordemServico')->api_id),
            ],
            'osproc_descricao' => ['sometimes', 'string'],
            'osproc_status' => ['sometimes', 'string', 'max:1'],
            'osproc_dthriniprev' => ['sometimes', 'date_format:Y-m-d H:i:s'],
            'osproc_dthrfimprev' => ['sometimes', 'date_format:Y-m-d H:i:s'],
            'osproc_dthrinireal' => ['sometimes', 'date_format:Y-m-d H:i:s'],
            'osproc_dthrfimreal' => ['sometimes', 'date_format:Y-m-d H:i:s'],
            'osproc_os_id' => ['sometimes', 'integer'],
            'os_dthrcriacao' => ['sometimes', 'date_format:Y-m-d H:i:s'],
            'os_titulo' => ['sometimes', 'string'],
            'os_status' => ['sometimes', 'string', 'max:1'],
            'os_api_id' => ['sometimes', 'integer'],
            'os_pes_idresp' => ['sometimes', 'integer'],
            'resp_pes_razao' => ['sometimes', 'string'],
            'os_pes_idcliente' => ['sometimes', 'integer'],
            'cli_pes_razao' => ['sometimes', 'string'],
            'calc_endercompleto' => ['sometimes', 'string'],
            'sync_status' => ['sometimes', 'boolean'],
            'update_at' => ['sometimes', 'date_format:Y-m-d H:i:s'],
        ];
    }
}
