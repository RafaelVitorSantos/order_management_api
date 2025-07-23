<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('api_id');
            $table->integer('usu_id')->unique();
            $table->string('fil_id');
            $table->string('usu_login')->unique();
            $table->string('usu_senha');
            $table->boolean('usu_master')->default(false);
            $table->string('usu_status', 1)->default('A');
            $table->dateTime('usu_validadesenha');
            $table->integer('usu_pes_id');
            $table->string('usu_pes_razao');
            $table->string('usu_pes_cnpjcpf');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
