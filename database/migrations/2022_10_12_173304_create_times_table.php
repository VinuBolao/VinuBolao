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
        Schema::create('times', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->string('nome_completo', 100);
            $table->string('sigla', 3);
            $table->string('estadio', 70)->nullable();
            $table->string('escudo', 150)->nullable();
            $table->string('estado', 2)->nullable();
            $table->string('pais', 50);
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
        Schema::dropIfExists('times');
    }
};
