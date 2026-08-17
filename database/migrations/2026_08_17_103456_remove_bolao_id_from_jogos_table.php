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
        Schema::table('jogos', function (Blueprint $table) {
            $table->dropForeign(['bolao_id']);
            $table->dropColumn('bolao_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jogos', function (Blueprint $table) {
            $table->unsignedBigInteger('bolao_id')->nullable();

            $table->foreign('bolao_id')
                ->references('id')
                ->on('bolaos');
        });
    }
};
