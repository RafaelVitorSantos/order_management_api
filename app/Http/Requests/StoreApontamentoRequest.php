<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApontamentoRequest extends FormRequest
{
    public function authorize(): bool
    {
        //libera autorização por aqui, pois a validação está sendo realizada via Policy
        return true;
    }

    public function rules(): array
    {
        return [
            "apo_id" => ['required', 'string', 'unique:apontamentos, apo_id'],
            "fil_id" => ['required', 'string', 'max:3'],
            "apo_dthrini" => ['required', 'date_format:Y-m-d H:i:s'],
            "apo_dthrinireal" => ['nullable', 'date_format:Y-m-d H:i:s'],
            "apo_dthrfim" => ['required', 'date_format:Y-m-d H:i:s'],
            "apo_dthrfimreal" => ['nullable', 'date_format:Y-m-d H:i:s'],
            "apo_osproc_os_id" => ['required', 'integer', 'min:1'],
            "apo_osproc_seq" => ['required', 'integer', 'min:0'],
            "apo_loc_lat" => ['nullable', 'string'],
            "apo_loc_long" => ['nullable', 'string'],
            "apo_loc_dthr" => ['nullable', 'date_format:Y-m-d H:i:s'],
            "apo_pes_id" => ['required', 'integer'],
            "resp_pes_razao" => ['required', 'string'],
            "sync_status" => ['nullable', 'boolean'],
            "update_at" => ['nullable', 'date_format:Y-m-d H:i:s'],
        ];
    }
}
