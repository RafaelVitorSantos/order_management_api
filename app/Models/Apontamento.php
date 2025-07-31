<?php

namespace App\Models;

use App\Models\Concerns\HasFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apontamento extends Model
{
    use HasFactory, HasFilters;

    protected $table = 'apontamentos';

    protected $primaryKey = 'api_id';

    protected $fillable = [
        "fil_id",
        "apo_dthrini",
        "apo_dthrinireal",
        "apo_dthrfim",
        "apo_dthrfimreal",
        "apo_osproc_os_id",
        "apo_osproc_seq",
        "apo_loc_lat",
        "apo_loc_long",
        "apo_loc_dthr",
        "apo_pes_id",
        "resp_pes_razao",
        "sync_status",
        "update_at",
    ];

    protected $filterable = [
        "fil_id",
        "apo_dthrini",
        "apo_dthrinireal",
        "apo_dthrfim",
        "apo_dthrfimreal",
        "apo_osproc_os_id",
        "apo_osproc_seq",
        "apo_loc_lat",
        "apo_loc_long",
        "apo_loc_dthr",
        "apo_pes_id",
        "resp_pes_razao",
        "sync_status",
        "update_at",
        //_like = parcial
        "resp_pes_razao_like",
    ];

    protected $casts = [
        "apo_dthrini" => "datetime",
        "apo_dthrinireal" => "datetime",
        "apo_dthrfim" => "datetime",
        "apo_dthrfimreal" => "datetime",
        "apo_loc_dthr" => "datetime",
        "update_at" => "datetime",
    ];
}
