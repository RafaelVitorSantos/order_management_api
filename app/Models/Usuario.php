<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasApiTokens, Notifiable;

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

    protected $casts = [
        'usu_validadesenha' => 'datetime',
    ];
}
