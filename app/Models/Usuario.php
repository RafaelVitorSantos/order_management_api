<?php

namespace App\Models;

use App\Models\Concerns\HasFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, HasFilters, Notifiable;

    //define o nome da tabela, usar o mesmo que está no banco de dados.
    protected $table = 'usuarios';

    //define o nome da chave primaria, caso não seja igual a 'id' no banco de dados.
    protected $primaryKey = 'api_id';

    //define os campos que poderão ser incluido em massa como em create() ou update().
    protected $fillable = [
        'usu_id',
        'fil_id',
        'usu_login',
        'usu_senha',
        'usu_master',
        'usu_status',
        'usu_validadesenha',
        'usu_pes_id',
        'usu_pes_razao',
        'usu_pes_cnpjcpf'
    ];
    //caso eu quisesse decidir quais bloquear poderia fazer da seguinte forma (usar $fillable ou $guarded).
    //protected $guarded = [];
    //nesse caso irei usar somente $fillable para padronização do projeto.

    protected $hidden = [
        'usu_senha'
    ];

    protected $casts = [
        'usu_validadesenha' => 'datetime',
    ];

    //campo serve para mostrar quais campos podem ser filtrados
    //foi definido no Concerns/HasFilters.php
    protected $filterable = [
        'usu_id',
        'fil_id',
        'usu_login',
        'usu_senha',
        'usu_master',
        'usu_status',
        'usu_validadesenha',
        'usu_pes_id',
        'usu_pes_razao',
        'usu_pes_cnpjcpf',
        //_like = parcial
        'usu_login_like',
        'usu_pes_razao_like',
        'usu_pes_cnpjcpf_like',
    ];
}
