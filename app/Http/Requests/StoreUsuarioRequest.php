<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
{
    public function authorize()
    {
        //libera autorização por aqui, pois a validação está sendo realizada via Policy
        return true;
    }

    public function rules()
    {
        return [
            'usu_id' => ['required', 'integer', 'unique:usuarios,usu_id'],
            'fil_id' => ['required', 'string'],
            'usu_login' => ['required', 'string', 'unique:usuarios,usu_login'],
            'usu_senha' => ['required', 'string'],
            'usu_master' => ['nullable', 'boolean'],
            'usu_status' => ['nullable', 'in:A,I'],
            'usu_validadesenha' => ['required', 'date'],
            'usu_pes_id' => ['required', 'integer'],
            'usu_pes_razao' => ['required', 'string'],
            'usu_pes_cnpjcpf' => ['required', 'string']
        ];
    }

    /*public function messages()
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
    }*/
}
