<?php

use Bolao\Jogo;
use Illuminate\Database\Seeder;

class JogosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jogos = [
            [
                'campeonato_id' => 1,
                'rodada' => 1,
                'inicio' => '2017-05-13 16:00:00',
                'timecasa_id' => 11,
                'timefora_id' => 2,
            ],
            [
                'campeonato_id' => 1,
                'rodada' => 1,
                'inicio' => '2017-05-13 19:00:00',
                'timecasa_id' => 8,
                'timefora_id' => 7,
            ],
            [
                'campeonato_id' => 1,
                'rodada' => 1,
                'inicio' => '2017-05-14 11:00:00',
                'timecasa_id' => 12,
                'timefora_id' => 16,
            ],
            [
                'campeonato_id' => 1,
                'rodada' => 1,
                'inicio' => '2017-05-14 16:00:00',
                'timecasa_id' => 10,
                'timefora_id' => 17,
            ],
            [
                'campeonato_id' => 1,
                'rodada' => 1,
                'inicio' => '2017-05-14 16:00:00',
                'timecasa_id' => 14,
                'timefora_id' => 19,
            ],
            [
                'campeonato_id' => 1,
                'rodada' => 1,
                'inicio' => '2017-05-14 16:00:00',
                'timecasa_id' => 15,
                'timefora_id' => 18,
            ],
            [
                'campeonato_id' => 1,
                'rodada' => 1,
                'inicio' => '2017-05-14 16:00:00',
                'timecasa_id' => 4,
                'timefora_id' => 20,
            ],
            [
                'campeonato_id' => 1,
                'rodada' => 1,
                'inicio' => '2017-05-14 16:00:00',
                'timecasa_id' => 5,
                'timefora_id' => 3,
            ],
            [
                'campeonato_id' => 1,
                'rodada' => 1,
                'inicio' => '2017-05-14 19:00:00',
                'timecasa_id' => 13,
                'timefora_id' => 6,
            ],
            [
                'campeonato_id' => 1,
                'rodada' => 1,
                'inicio' => '2017-05-15 20:00:00',
                'timecasa_id' => 9,
                'timefora_id' => 1,
            ]
        ];

        foreach ($jogos as $jogo){
            Jogo::create($jogo);
        }
    }
}
