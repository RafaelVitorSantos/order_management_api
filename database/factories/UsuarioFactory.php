<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    protected function withFaker(): \Faker\Generator
    {
        return \Faker\Factory::create('pt_BR');
    }

    public function definition()
    {
        return [
            'usu_id' => $this->faker->unique()->numberBetween(1, 100),
            'fil_id' => strtoupper($this->faker->lexify('???')),
            'usu_login' => $this->faker->unique()->userName(),
            'usu_senha' => bcrypt('123'),
            'usu_master' => $this->faker->boolean(),
            'usu_status' => $this->faker->randomElement(['A', 'I']),
            'usu_validadesenha' => $this->faker->dateTimeBetween('+2 month', '+5 year'),
            'usu_pes_id' => $this->faker->unique()->numberBetween(1, 100),
            'usu_pes_razao' => $this->faker->name(),
            'usu_pes_cnpjcpf' => $this->faker->cpf(),
        ];
    }
}
