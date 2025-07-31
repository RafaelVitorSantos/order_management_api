<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUsuarioRequest extends FormRequest
{
    public function authorize()
    {
        //libera autorização por aqui, pois a validação está sendo realizada via Policy
        return true;
    }

    public function rules()
    {
        return [
            'usu_id' => ['sometimes', 'integer', Rule::unique('usuarios')->ignore($this->usu_id)],
            'fil_id' => ['sometimes', 'string'],
            'usu_login' => ['sometimes', 'string', Rule::unique('usuarios')->ignore($this->usu_login)],
            'usu_senha' => ['sometimes', 'string'],
            'usu_master' => ['sometimes', 'boolean'],
            'usu_status' => ['sometimes', 'in:A,I'],
            'usu_validadesenha' => ['sometimes', 'date'],
            'usu_pes_id' => ['sometimes', 'integer'],
            'usu_pes_razao' => ['sometimes', 'string'],
            'usu_pes_cnpjcpf' => ['sometimes', 'string'],
        ];
    }
}
