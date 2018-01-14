<?php

use Bolao\Models\Bolao;
use Illuminate\Database\Seeder;

class BolaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bolao = [
            'id' => 2,
            'user_id' => 2,
            'campeonato_id' => 2,
            'nome' => 'Brasileirão 2017',
            'descricao' => 'Bolão dos Melo Lima',
            'ativo' => 1,
            'inicio' => '2017-03-05'
        ];

        Bolao::create($bolao);
    }
}
