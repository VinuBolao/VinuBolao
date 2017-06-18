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
            ['campeonato_id' => 1, 'rodada' => 1, 'timecasa_id' => 11, 'timefora_id' => 2, 'inicio' => '2017-05-13 16:00:00'],
            ['campeonato_id' => 1, 'rodada' => 1, 'timecasa_id' => 8, 'timefora_id' => 7, 'inicio' => '2017-05-13 19:00:00'],
            ['campeonato_id' => 1, 'rodada' => 1, 'timecasa_id' => 12, 'timefora_id' => 16, 'inicio' => '2017-05-14 11:00:00'],
            ['campeonato_id' => 1, 'rodada' => 1, 'timecasa_id' => 10, 'timefora_id' => 17, 'inicio' => '2017-05-14 16:00:00'],
            ['campeonato_id' => 1, 'rodada' => 1, 'timecasa_id' => 14, 'timefora_id' => 19, 'inicio' => '2017-05-14 16:00:00'],
            ['campeonato_id' => 1, 'rodada' => 1, 'timecasa_id' => 15, 'timefora_id' => 18, 'inicio' => '2017-05-14 16:00:00'],
            ['campeonato_id' => 1, 'rodada' => 1, 'timecasa_id' => 4, 'timefora_id' => 20, 'inicio' => '2017-05-14 16:00:00'],
            ['campeonato_id' => 1, 'rodada' => 1, 'timecasa_id' => 5, 'timefora_id' => 3, 'inicio' => '2017-05-14 16:00:00'],
            ['campeonato_id' => 1, 'rodada' => 1, 'timecasa_id' => 13, 'timefora_id' => 6, 'inicio' => '2017-05-14 19:00:00'],
            ['campeonato_id' => 1, 'rodada' => 1, 'timecasa_id' => 9, 'timefora_id' => 1, 'inicio' => '2017-05-15 20:00:00'],
            ['campeonato_id' => 1, 'rodada' => 2, 'timecasa_id' => 16, 'timefora_id' => 9, 'inicio' => '2017-05-20 16:00:00'],
            ['campeonato_id' => 1, 'rodada' => 2, 'timecasa_id' => 1, 'timefora_id' => 11, 'inicio' => '2017-05-20 19:00:00'],
            ['campeonato_id' => 1, 'rodada' => 2, 'timecasa_id' => 7, 'timefora_id' => 14, 'inicio' => '2017-05-20 19:00:00'],
            ['campeonato_id' => 1, 'rodada' => 2, 'timecasa_id' => 19, 'timefora_id' => 5, 'inicio' => '2017-05-21 11:00:00'],
            ['campeonato_id' => 1, 'rodada' => 2, 'timecasa_id' => 2, 'timefora_id' => 12, 'inicio' => '2017-05-21 16:00:00'],
            ['campeonato_id' => 1, 'rodada' => 2, 'timecasa_id' => 3, 'timefora_id' => 13, 'inicio' => '2017-05-21 16:00:00'],
            ['campeonato_id' => 1, 'rodada' => 2, 'timecasa_id' => 20, 'timefora_id' => 8, 'inicio' => '2017-05-21 16:00:00'],
            ['campeonato_id' => 1, 'rodada' => 2, 'timecasa_id' => 6, 'timefora_id' => 15, 'inicio' => '2017-05-21 16:00:00'],
            ['campeonato_id' => 1, 'rodada' => 2, 'timecasa_id' => 18, 'timefora_id' => 10, 'inicio' => '2017-05-21 16:00:00'],
            ['campeonato_id' => 1, 'rodada' => 2, 'timecasa_id' => 17, 'timefora_id' => 4, 'inicio' => '2017-05-21 16:00:00']
        ];

        foreach ($jogos as $jogo){
            Jogo::create($jogo);
        }
    }
}
