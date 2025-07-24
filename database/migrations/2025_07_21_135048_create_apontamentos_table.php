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
        Schema::create('apontamentos', function (Blueprint $table) {
            $table->id('api_id');
            $table->integer('apo_id')->unique();
            $table->string('fil_id');
            $table->dateTime('apo_dthrini');
            $table->dateTime('apo_dthrinireal');
            $table->dateTime('apo_dthrfim');
            $table->dateTime('apo_dthrfimreal');
            $table->integer('apo_osproc_os_id');
            $table->integer('apo_osproc_seq');
            $table->string('apo_loc_lat');
            $table->string('apo_loc_long');
            $table->dateTime('apo_loc_dthr');
            $table->integer('apo_pes_id');
            $table->string('resp_pes_razao');
            $table->boolean('sync_status')->default(true);
            $table->dateTime('update_at');
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
        Schema::dropIfExists('apontamentos');
    }
};
