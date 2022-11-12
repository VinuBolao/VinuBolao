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
        Schema::create('jogos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campeonato_id')->constrained();
            $table->foreignId('bolao_id')->constrained()->onDelete('cascade');
            $table->integer('rodada');
            $table->dateTime('inicio');
            $table->unsignedBigInteger('timecasa_id');
            $table->foreign('timecasa_id')->references('id')->on('times');
            $table->integer('placar_casa')->nullable();
            $table->integer('placar_fora')->nullable();
            $table->unsignedBigInteger('timefora_id');
            $table->foreign('timefora_id')->references('id')->on('times');
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
        Schema::dropIfExists('jogos');
    }
};
