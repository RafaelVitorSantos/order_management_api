<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrdemServico>
 */
class OrdemServicoFactory extends Factory
{
    protected function withFaker(): \Faker\Generator
    {
        return \Faker\Factory::create('pt_BR');
    }

    public function definition()
    {
        $dataInicioPrev = $this->faker->dateTimeBetween('-1 week', '+1 month');
        $dataCriacao = (clone $dataInicioPrev)->modify('-' . rand(1, 10) . 'days');
        $dataFimPrev = (clone $dataInicioPrev)->modify('+' . rand(1, 8) . ' hours');

        return [
            'fil_id' => strtoupper($this->faker->lexify('???')),
            'osproc_seq' => $this->faker->numberBetween(0, 3),
            'osproc_descricao' => $this->faker->text(100),
            'osproc_status' => $this->faker->randomElement(['A', 'I']),
            'osproc_dthriniprev' => $dataInicioPrev,
            'osproc_dthrfimprev' => $dataFimPrev,
            'osproc_dthrinireal' => null,
            'osproc_dthrfimreal' => null,
            'osproc_os_id' => $this->faker->unique()->numberBetween(1, 100),
            'os_dthrcriacao' => $dataCriacao,
            'os_titulo' => $this->faker->text(150),
            'os_status' => $this->faker->randomElement(['0', '3', '6', '9']),
            'os_api_id' => $this->faker->unique()->numberBetween(1, 100),
            'os_pes_idresp' => $this->faker->unique()->numberBetween(1, 100),
            'resp_pes_razao' => $this->faker->name(),
            'os_pes_idcliente' => $this->faker->unique()->numberBetween(1, 100),
            'cli_pes_razao' => $this->faker->name(),
            'calc_endercompleto' => $this->faker->address(),
            'sync_status' => $this->faker->numberBetween(0, 1),
            'update_at' => $dataCriacao,
        ];
    }
}
