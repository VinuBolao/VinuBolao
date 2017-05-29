<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePalpitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('palpites', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('jogo_id');
            $table->foreign('jogo_id')->references('id')->on('jogo');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('palpite_casa');
            $table->integer('palpite_fora');
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
}
