<?php

namespace App\Models;

use App\Models\Concerns\HasFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{
    use HasFactory, HasFilters;

    protected $table = 'ordem_servicos';

    protected $primaryKey = 'api_id';

    protected $fillable = [
        'fil_id',
        'osproc_seq',
        'osproc_descricao',
        'osproc_status',
        'osproc_dthriniprev',
        'osproc_dthrfimprev',
        'osproc_dthrinireal',
        'osproc_dthrfimreal',
        'osproc_os_id',
        'os_dthrcriacao',
        'os_titulo',
        'os_status',
        'os_api_id',
        'os_pes_idresp',
        'resp_pes_razao',
        'os_pes_idcliente',
        'cli_pes_razao',
        'calc_endercompleto',
        'sync_status',
        'update_at',
    ];

    protected $filterable = [
        'fil_id',
        'osproc_seq',
        'osproc_descricao',
        'osproc_status',
        'osproc_dthriniprev',
        'osproc_dthrfimprev',
        'osproc_dthrinireal',
        'osproc_dthrfimreal',
        'osproc_os_id',
        'os_dthrcriacao',
        'os_titulo',
        'os_status',
        'os_api_id',
        'os_pes_idresp',
        'resp_pes_razao',
        'os_pes_idcliente',
        'cli_pes_razao',
        'calc_endercompleto',
        'sync_status',
        'update_at',
        //_like = parcial
        'osproc_descricao_like',
        'os_titulo_like',
        'resp_pes_razao_like',
        'cli_pes_razao_like',
        'calc_endercompleto_like'
    ];

    protected $casts = [
        'osproc_dthriniprev' => 'datetime',
        'osproc_dthrfimprev' => 'datetime',
        'osproc_dthrinireal' => 'datetime',
        'osproc_dthrfimreal' => 'datetime',
        'os_dthrcriacao' => 'datetime',
        'update_at' => 'datetime',
    ];
}
