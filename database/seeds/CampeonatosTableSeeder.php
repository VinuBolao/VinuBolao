<?php

use Bolao\Campeonato;
use Illuminate\Database\Seeder;

class CampeonatosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campeonato = [
            'id' => 2,
            'nome' => 'Brasileirão',
            'nome_completo' => 'Campeonato Brasileiro',
            'qtd_times' => 20,
            'qtd_rodadas' => 38,
            'rodada' => 1,
            'temporada' => 2017,
            'serie' => 'A',
            'pais' => 'Brasil',
            'inicio' => '2017-05-03',
            'termino' => '2017-12-03'
        ];

        Campeonato::create($campeonato);
    }
}
