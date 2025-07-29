<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrdemServico;

class OrdemServicoSeeder extends Seeder
{
    public function run()
    {
        OrdemServico::factory()->count(20)->create();
    }
}
