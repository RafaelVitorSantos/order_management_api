<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateApontamentoRequest extends FormRequest
{
    public function authorize(): bool
    {
        //libera autorização por aqui, pois a validação está sendo realizada via Policy
        return true;
    }

    public function rules(): array
    {
        return [
            "apo_id" => ['sometimes', 'string', Rule::unique('apontamentos')->ignore($this->apo_id)],
            "fil_id" => ['sometimes', 'string', 'max:3'],
            "apo_dthrini" => ['sometimes', 'date_format:Y-m-d H:i:s'],
            "apo_dthrinireal" => ['sometimes', 'date_format:Y-m-d H:i:s'],
            "apo_dthrfim" => ['sometimes', 'date_format:Y-m-d H:i:s'],
            "apo_dthrfimreal" => ['sometimes', 'date_format:Y-m-d H:i:s'],
            "apo_osproc_os_id" => ['sometimes', 'integer', 'min:1'],
            "apo_osproc_seq" => ['sometimes', 'integer', 'min:0'],
            "apo_loc_lat" => ['sometimes', 'string'],
            "apo_loc_long" => ['sometimes', 'string'],
            "apo_loc_dthr" => ['sometimes', 'date_format:Y-m-d H:i:s'],
            "apo_pes_id" => ['sometimes', 'integer'],
            "resp_pes_razao" => ['sometimes', 'string'],
            "sync_status" => ['sometimes', 'boolean'],
            "update_at" => ['sometimes', 'date_format:Y-m-d H:i:s'],
        ];
    }
}
