<?php

namespace Database\Seeders;

use App\Models\Apontamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApontamentoSeeder extends Seeder
{
    public function run(): void
    {
        Apontamento::factory()->count(20)->create();
    }
}
