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
        Schema::create('bolaos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('campeonato_id')->constrained();
            $table->string('nome', 50);
            $table->text('descricao')->nullable();
            $table->integer('placar_exato')->nullable();
            $table->integer('placar_vencedor')->nullable();
            $table->integer('rodada_dobro')->nullable();
            $table->boolean('ativo')->default(0);
            $table->date('inicio');
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
        Schema::dropIfExists('bolaos');
    }
};
