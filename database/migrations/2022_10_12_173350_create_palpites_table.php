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
        Schema::create('palpites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jogo_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->integer('palpite_casa')->nullable();
            $table->integer('palpite_fora')->nullable();
            $table->timestamp('horario');
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
        Schema::dropIfExists('palpites');
    }
};
