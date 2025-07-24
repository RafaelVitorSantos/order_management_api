<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrdemServicoRequest extends FormRequest
{
    public function authorize()
    {
        //libera autorização por aqui, pois a validação está sendo realizada via Policy
        return true;
    }

    public function rules()
    {
        return [
            'fil_id' => ['required', 'string'],
            'osproc_seq' => [
                'required',
                'integer',
                Rule::unique('ordem_servicos')->where(function ($query) {
                    return $query->where('osproc_os_id', $this->osproc_os_id);
                }),
            ],
            'osproc_descricao' => ['nullable', 'string'],
            'osproc_status' => ['required', 'string', 'max:1'],
            'osproc_dthriniprev' => ['required', 'date_format:Y-m-d H:i:s'],
            'osproc_dthrfimprev' => ['required', 'date_format:Y-m-d H:i:s'],
            'osproc_dthrinireal' => ['required', 'date_format:Y-m-d H:i:s'],
            'osproc_dthrfimreal' => ['required', 'date_format:Y-m-d H:i:s'],
            'osproc_os_id' => ['required', 'integer'],
            'os_dthrcriacao' => ['required', 'date_format:Y-m-d H:i:s'],
            'os_titulo' => ['required', 'string'],
            'os_status' => ['required', 'string', 'max:1'],
            'os_api_id' => ['required', 'integer'],
            'os_pes_idresp' => ['required', 'integer'],
            'resp_pes_razao' => ['required', 'string'],
            'os_pes_idcliente' => ['required', 'integer'],
            'cli_pes_razao' => ['required', 'string'],
            'calc_endercompleto' => ['required', 'string'],
            'sync_status' => ['nullable', 'boolean'],
            'update_at' => ['required', 'date_format:Y-m-d H:i:s'],
        ];
    }
}
