<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsuarioApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_cria_usuario_com_erro()
    {
        $response = $this->postJson('/api/v1/usuarios', [
            'usu_id' => 1,
            'fil_id' => 'ACT',
            'usu_login' => 'admin',
            'usu_senha' => '123',
            'usu_master' => true,
            'usu_status' => 'A',
            'usu_validadesenha' => '10/10/2030',
            'usu_pes_id' => 1,
            'usu_pes_razao' => 'Administrador',
            'usu_pes_cnpjcpf' => '000.000.000-00',
        ]);

        $response->assertStatus(401)
            ->assertJsonStructure(['status', 'message', 'data']);
    }
}
