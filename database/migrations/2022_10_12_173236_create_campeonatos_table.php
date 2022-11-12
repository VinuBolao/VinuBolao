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
        Schema::create('campeonatos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->string('nome_completo', 100);
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
};
