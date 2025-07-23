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
        Schema::create('ordem_servicos', function (Blueprint $table) {
            $table->id('api_id');
            $table->unsignedBigInteger('osproc_os_id');
            $table->unsignedInteger('osproc_seq');
            $table->string('osproc_descricao');
            $table->string('osproc_status', 1);
            $table->dateTime('osproc_dthriniprev');
            $table->dateTime('osproc_dthrfimprev');
            $table->dateTime('osproc_dthrinireal');
            $table->dateTime('osproc_dthrfimreal');
            $table->dateTime('osdthrcriacao');
            $table->string('os_titulo');
            $table->string('os_status', 1);
            $table->integer('os_api_id');
            $table->integer('os_pes_idresp');
            $table->string('resp_pes_razao');
            $table->integer('os_pes_idcliente');
            $table->string('cli_pes_razao');
            $table->string('calc_endercompleto');
            $table->boolean('sync_status')->default(true);
            $table->dateTime('update_at');

            $table->unique(['osproc_os_id', 'osproc_seq'], 'osproc_os_id_osproc_seq_unique');
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
        Schema::dropIfExists('ordem_servicos');
    }
};
