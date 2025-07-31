<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apontamento>
 */
class ApontamentoFactory extends Factory
{
    public function definition(): array
    {
        $dthrIni = $this->faker->dateTimeBetween('+1 week', '+1 month');
        $dthrIniReal = (clone $dthrIni)->modify('+' . rand(5, 30) . ' minutes');
        $dthrFim = (clone $dthrIni)->modify('+' . rand(2, 6) . ' hour');
        $dthrFimReal = (clone $dthrFim)->modify('+' . rand(5, 30) . ' minutes');
        $update_at = (clone $dthrIni)->modify('-' . rand(3, 15) . ' days');
        return [
            "apo_id" => $this->faker->unique()->numberBetween(1, 100),
            "fil_id" => strtoupper($this->faker->lexify('???')),
            "apo_dthrini" => $dthrIni,
            "apo_dthrinireal" => $dthrIniReal,
            "apo_dthrfim" => $dthrFim,
            "apo_dthrfimreal" => $dthrFimReal,
            "apo_osproc_os_id" => $this->faker->numberBetween(1, 10),
            "apo_osproc_seq" => $this->faker->numberBetween(0, 3),
            "apo_loc_lat" => strval($this->faker->randomFloat(5, -22, -23)),
            "apo_loc_long" => strval($this->faker->randomFloat(5, -47, -48)),
            "apo_loc_dthr" => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            "apo_pes_id" => $this->faker->numberBetween(1, 10),
            "resp_pes_razao" => $this->faker->name(),
            "sync_status" => $this->faker->boolean(),
            "update_at" => $update_at,
        ];
    }
}
