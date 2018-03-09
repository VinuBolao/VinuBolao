<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampeonatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campeonatos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 50);
            $table->string('nome_completo', 50);
            $table->integer('qtd_times');
            $table->integer('qtd_rodadas');
            $table->integer('rodada')->nullable();
            $table->integer('temporada');
            $table->char('serie', 1);
            $table->string('estado', 2)->nullable();
            $table->string('pais', 50);
            $table->date('inicio');
            $table->date('termino');
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
        Schema::dropIfExists('campeonatos');
    }
}
