<?php

use Bolao\Models\Jogo;
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
                "id" => 2,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 1,
                "inicio" => "2017-05-13 16:00:00",
                "timecasa_id" => 102,
                "placar_casa" => 1,
                "placar_fora" => 1,
                "timefora_id" => 12
            ],
            [
                "id" => 12,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 1,
                "inicio" => "2017-05-13 19:00:00",
                "timecasa_id" => 72,
                "placar_casa" => 1,
                "placar_fora" => 1,
                "timefora_id" => 62
            ],
            [
                "id" => 22,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 1,
                "inicio" => "2017-05-14 11:00:00",
                "timecasa_id" => 112,
                "placar_casa" => 3,
                "placar_fora" => 2,
                "timefora_id" => 152
            ],
            [
                "id" => 32,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 1,
                "inicio" => "2017-05-14 16:00:00",
                "timecasa_id" => 92,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 162
            ],
            [
                "id" => 42,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 1,
                "inicio" => "2017-05-14 16:00:00",
                "timecasa_id" => 132,
                "placar_casa" => 4,
                "placar_fora" => 0,
                "timefora_id" => 182
            ],
            [
                "id" => 52,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 1,
                "inicio" => "2017-05-14 16:00:00",
                "timecasa_id" => 42,
                "placar_casa" => 6,
                "placar_fora" => 2,
                "timefora_id" => 22
            ],
            [
                "id" => 62,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 1,
                "inicio" => "2017-05-14 16:00:00",
                "timecasa_id" => 142,
                "placar_casa" => 4,
                "placar_fora" => 0,
                "timefora_id" => 172
            ],
            [
                "id" => 72,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 1,
                "inicio" => "2017-05-14 16:00:00",
                "timecasa_id" => 32,
                "placar_casa" => 0,
                "placar_fora" => 0,
                "timefora_id" => 192
            ],
            [
                "id" => 82,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 1,
                "inicio" => "2017-05-14 19:00:00",
                "timecasa_id" => 122,
                "placar_casa" => 2,
                "placar_fora" => 0,
                "timefora_id" => 52
            ],
            [
                "id" => 92,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 1,
                "inicio" => "2017-05-15 20:00:00",
                "timecasa_id" => 82,
                "placar_casa" => 4,
                "placar_fora" => 1,
                "timefora_id" => 2
            ],
            [
                "id" => 102,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 2,
                "inicio" => "2017-05-20 16:00:00",
                "timecasa_id" => 152,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 82
            ],
            [
                "id" => 112,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 2,
                "inicio" => "2017-05-20 19:00:00",
                "timecasa_id" => 2,
                "placar_casa" => 0,
                "placar_fora" => 3,
                "timefora_id" => 102
            ],
            [
                "id" => 122,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 2,
                "inicio" => "2017-05-20 19:00:00",
                "timecasa_id" => 62,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 132
            ],
            [
                "id" => 132,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 2,
                "inicio" => "2017-05-21 11:00:00",
                "timecasa_id" => 182,
                "placar_casa" => 2,
                "placar_fora" => 1,
                "timefora_id" => 42
            ],
            [
                "id" => 142,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 2,
                "inicio" => "2017-05-21 16:00:00",
                "timecasa_id" => 12,
                "placar_casa" => 1,
                "placar_fora" => 2,
                "timefora_id" => 112
            ],
            [
                "id" => 152,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 2,
                "inicio" => "2017-05-21 16:00:00",
                "timecasa_id" => 22,
                "placar_casa" => 0,
                "placar_fora" => 2,
                "timefora_id" => 122
            ],
            [
                "id" => 162,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 2,
                "inicio" => "2017-05-21 16:00:00",
                "timecasa_id" => 192,
                "placar_casa" => 0,
                "placar_fora" => 1,
                "timefora_id" => 72
            ],
            [
                "id" => 172,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 2,
                "inicio" => "2017-05-21 18:00:00",
                "timecasa_id" => 52,
                "placar_casa" => 2,
                "placar_fora" => 0,
                "timefora_id" => 142
            ],
            [
                "id" => 182,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 2,
                "inicio" => "2017-05-21 19:00:00",
                "timecasa_id" => 172,
                "placar_casa" => 1,
                "placar_fora" => 1,
                "timefora_id" => 92
            ],
            [
                "id" => 192,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 2,
                "inicio" => "2017-05-22 20:00:00",
                "timecasa_id" => 162,
                "placar_casa" => 2,
                "placar_fora" => 0,
                "timefora_id" => 32
            ],
            [
                "id" => 202,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 3,
                "inicio" => "2017-05-27 16:00:00",
                "timecasa_id" => 182,
                "placar_casa" => 3,
                "placar_fora" => 2,
                "timefora_id" => 112
            ],
            [
                "id" => 212,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 3,
                "inicio" => "2017-05-27 19:00:00",
                "timecasa_id" => 162,
                "placar_casa" => 2,
                "placar_fora" => 0,
                "timefora_id" => 132
            ],
            [
                "id" => 222,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 3,
                "inicio" => "2017-05-28 11:00:00",
                "timecasa_id" => 12,
                "placar_casa" => 2,
                "placar_fora" => 2,
                "timefora_id" => 142
            ],
            [
                "id" => 232,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 3,
                "inicio" => "2017-05-27 21:00:00",
                "timecasa_id" => 192,
                "placar_casa" => 0,
                "placar_fora" => 1,
                "timefora_id" => 82
            ],
            [
                "id" => 242,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 3,
                "inicio" => "2017-05-28 16:00:00",
                "timecasa_id" => 152,
                "placar_casa" => 0,
                "placar_fora" => 1,
                "timefora_id" => 92
            ],
            [
                "id" => 252,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 3,
                "inicio" => "2017-05-28 16:00:00",
                "timecasa_id" => 22,
                "placar_casa" => 1,
                "placar_fora" => 1,
                "timefora_id" => 102
            ],
            [
                "id" => 262,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 3,
                "inicio" => "2017-05-28 16:00:00",
                "timecasa_id" => 2,
                "placar_casa" => 0,
                "placar_fora" => 1,
                "timefora_id" => 72
            ],
            [
                "id" => 272,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 3,
                "inicio" => "2017-05-28 18:00:00",
                "timecasa_id" => 172,
                "placar_casa" => 4,
                "placar_fora" => 3,
                "timefora_id" => 122
            ],
            [
                "id" => 282,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 3,
                "inicio" => "2017-05-28 19:00:00",
                "timecasa_id" => 52,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 42
            ],
            [
                "id" => 292,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 3,
                "inicio" => "2017-05-29 20:00:00",
                "timecasa_id" => 62,
                "placar_casa" => 2,
                "placar_fora" => 0,
                "timefora_id" => 32
            ],
            [
                "id" => 302,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 4,
                "inicio" => "2017-06-03 16:00:00",
                "timecasa_id" => 82,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 22
            ],
            [
                "id" => 312,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 4,
                "inicio" => "2017-06-03 18:00:00",
                "timecasa_id" => 112,
                "placar_casa" => 2,
                "placar_fora" => 1,
                "timefora_id" => 192
            ],
            [
                "id" => 322,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 4,
                "inicio" => "2017-06-04 11:00:00",
                "timecasa_id" => 102,
                "placar_casa" => 0,
                "placar_fora" => 0,
                "timefora_id" => 52
            ],
            [
                "id" => 332,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 4,
                "inicio" => "2017-06-03 19:00:00",
                "timecasa_id" => 72,
                "placar_casa" => 2,
                "placar_fora" => 0,
                "timefora_id" => 152
            ],
            [
                "id" => 342,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 4,
                "inicio" => "2017-06-04 11:00:00",
                "timecasa_id" => 32,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 172
            ],
            [
                "id" => 352,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 4,
                "inicio" => "2017-06-04 16:00:00",
                "timecasa_id" => 132,
                "placar_casa" => 0,
                "placar_fora" => 0,
                "timefora_id" => 12
            ],
            [
                "id" => 362,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 4,
                "inicio" => "2017-06-04 16:00:00",
                "timecasa_id" => 122,
                "placar_casa" => 2,
                "placar_fora" => 0,
                "timefora_id" => 182
            ],
            [
                "id" => 372,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 4,
                "inicio" => "2017-06-04 16:00:00",
                "timecasa_id" => 142,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 162
            ],
            [
                "id" => 382,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 4,
                "inicio" => "2017-06-04 19:00:00",
                "timecasa_id" => 92,
                "placar_casa" => 0,
                "placar_fora" => 2,
                "timefora_id" => 62
            ],
            [
                "id" => 392,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 4,
                "inicio" => "2017-06-05 20:00:00",
                "timecasa_id" => 42,
                "placar_casa" => 3,
                "placar_fora" => 0,
                "timefora_id" => 2
            ],
            [
                "id" => 402,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 5,
                "inicio" => "2017-06-06 20:00:00",
                "timecasa_id" => 112,
                "placar_casa" => 1,
                "placar_fora" => 1,
                "timefora_id" => 22
            ],
            [
                "id" => 412,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 5,
                "inicio" => "2017-06-07 19:30:00",
                "timecasa_id" => 12,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 32
            ],
            [
                "id" => 422,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 5,
                "inicio" => "2017-06-07 19:30:00",
                "timecasa_id" => 82,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 132
            ],
            [
                "id" => 432,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 5,
                "inicio" => "2017-06-07 21:00:00",
                "timecasa_id" => 152,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 52
            ],
            [
                "id" => 442,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 5,
                "inicio" => "2017-06-07 21:45:00",
                "timecasa_id" => 182,
                "placar_casa" => 2,
                "placar_fora" => 5,
                "timefora_id" => 72
            ],
            [
                "id" => 452,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 5,
                "inicio" => "2017-06-07 21:45:00",
                "timecasa_id" => 172,
                "placar_casa" => 2,
                "placar_fora" => 0,
                "timefora_id" => 102
            ],
            [
                "id" => 462,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 5,
                "inicio" => "2017-06-08 19:30:00",
                "timecasa_id" => 162,
                "placar_casa" => 2,
                "placar_fora" => 0,
                "timefora_id" => 192
            ],
            [
                "id" => 472,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 5,
                "inicio" => "2017-06-08 19:30:00",
                "timecasa_id" => 2,
                "placar_casa" => 3,
                "placar_fora" => 0,
                "timefora_id" => 142
            ],
            [
                "id" => 482,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 5,
                "inicio" => "2017-06-08 20:00:00",
                "timecasa_id" => 62,
                "placar_casa" => 3,
                "placar_fora" => 6,
                "timefora_id" => 122
            ],
            [
                "id" => 492,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 5,
                "inicio" => "2017-06-08 21:00:00",
                "timecasa_id" => 42,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 92
            ],
            [
                "id" => 502,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 6,
                "inicio" => "2017-06-10 16:00:00",
                "timecasa_id" => 132,
                "placar_casa" => 3,
                "placar_fora" => 1,
                "timefora_id" => 112
            ],
            [
                "id" => 512,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 6,
                "inicio" => "2017-06-10 19:00:00",
                "timecasa_id" => 182,
                "placar_casa" => 2,
                "placar_fora" => 1,
                "timefora_id" => 172
            ],
            [
                "id" => 522,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 6,
                "inicio" => "2017-06-11 11:00:00",
                "timecasa_id" => 52,
                "placar_casa" => 2,
                "placar_fora" => 2,
                "timefora_id" => 82
            ],
            [
                "id" => 532,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 6,
                "inicio" => "2017-06-11 16:00:00",
                "timecasa_id" => 72,
                "placar_casa" => 3,
                "placar_fora" => 2,
                "timefora_id" => 162
            ],
            [
                "id" => 542,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 6,
                "inicio" => "2017-06-11 16:00:00",
                "timecasa_id" => 192,
                "placar_casa" => 2,
                "placar_fora" => 0,
                "timefora_id" => 12
            ],
            [
                "id" => 552,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 6,
                "inicio" => "2017-06-11 16:00:00",
                "timecasa_id" => 142,
                "placar_casa" => 3,
                "placar_fora" => 2,
                "timefora_id" => 62
            ],
            [
                "id" => 562,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 6,
                "inicio" => "2017-06-11 16:00:00",
                "timecasa_id" => 32,
                "placar_casa" => 1,
                "placar_fora" => 1,
                "timefora_id" => 102
            ],
            [
                "id" => 572,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 6,
                "inicio" => "2017-06-11 18:30:00",
                "timecasa_id" => 92,
                "placar_casa" => 2,
                "placar_fora" => 0,
                "timefora_id" => 2
            ],
            [
                "id" => 582,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 6,
                "inicio" => "2017-06-11 19:00:00",
                "timecasa_id" => 22,
                "placar_casa" => 0,
                "placar_fora" => 2,
                "timefora_id" => 152
            ],
            [
                "id" => 592,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 6,
                "inicio" => "2017-06-12 20:00:00",
                "timecasa_id" => 122,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 42
            ],
            [
                "id" => 602,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 7,
                "inicio" => "2017-06-14 19:30:00",
                "timecasa_id" => 12,
                "placar_casa" => 0,
                "placar_fora" => 1,
                "timefora_id" => 22
            ],
            [
                "id" => 612,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 7,
                "inicio" => "2017-06-14 19:30:00",
                "timecasa_id" => 172,
                "placar_casa" => 0,
                "placar_fora" => 0,
                "timefora_id" => 162
            ],
            [
                "id" => 622,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 7,
                "inicio" => "2017-06-14 19:30:00",
                "timecasa_id" => 192,
                "placar_casa" => 2,
                "placar_fora" => 2,
                "timefora_id" => 52
            ],
            [
                "id" => 632,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 7,
                "inicio" => "2017-06-14 19:30:00",
                "timecasa_id" => 2,
                "placar_casa" => 3,
                "placar_fora" => 1,
                "timefora_id" => 32
            ],
            [
                "id" => 642,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 7,
                "inicio" => "2017-06-14 21:00:00",
                "timecasa_id" => 102,
                "placar_casa" => 2,
                "placar_fora" => 0,
                "timefora_id" => 142
            ],
            [
                "id" => 652,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 7,
                "inicio" => "2017-06-14 21:45:00",
                "timecasa_id" => 152,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 132
            ],
            [
                "id" => 662,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 7,
                "inicio" => "2017-06-14 21:45:00",
                "timecasa_id" => 72,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 92
            ],
            [
                "id" => 672,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 7,
                "inicio" => "2017-06-14 21:45:00",
                "timecasa_id" => 62,
                "placar_casa" => 2,
                "placar_fora" => 1,
                "timefora_id" => 182
            ],
            [
                "id" => 682,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 7,
                "inicio" => "2017-06-15 16:00:00",
                "timecasa_id" => 82,
                "placar_casa" => 0,
                "placar_fora" => 0,
                "timefora_id" => 42
            ],
            [
                "id" => 692,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 7,
                "inicio" => "2017-06-15 21:00:00",
                "timecasa_id" => 112,
                "placar_casa" => 0,
                "placar_fora" => 2,
                "timefora_id" => 122
            ],
            [
                "id" => 702,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 8,
                "inicio" => "2017-06-17 16:00:00",
                "timecasa_id" => 2,
                "placar_casa" => 0,
                "placar_fora" => 1,
                "timefora_id" => 22
            ],
            [
                "id" => 712,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 8,
                "inicio" => "2017-06-17 19:00:00",
                "timecasa_id" => 182,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 32
            ],
            [
                "id" => 722,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 8,
                "inicio" => "2017-06-17 21:00:00",
                "timecasa_id" => 152,
                "placar_casa" => 0,
                "placar_fora" => 0,
                "timefora_id" => 142
            ],
            [
                "id" => 732,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 8,
                "inicio" => "2017-06-18 11:00:00",
                "timecasa_id" => 82,
                "placar_casa" => 0,
                "placar_fora" => 0,
                "timefora_id" => 72
            ],
            [
                "id" => 742,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 8,
                "inicio" => "2017-06-18 16:00:00",
                "timecasa_id" => 112,
                "placar_casa" => 2,
                "placar_fora" => 2,
                "timefora_id" => 102
            ],
            [
                "id" => 752,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 8,
                "inicio" => "2017-06-18 16:00:00",
                "timecasa_id" => 162,
                "placar_casa" => 1,
                "placar_fora" => 2,
                "timefora_id" => 12
            ],
            [
                "id" => 762,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 8,
                "inicio" => "2017-06-18 16:00:00",
                "timecasa_id" => 42,
                "placar_casa" => 2,
                "placar_fora" => 4,
                "timefora_id" => 132
            ],
            [
                "id" => 772,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 8,
                "inicio" => "2017-06-18 16:00:00",
                "timecasa_id" => 62,
                "placar_casa" => 0,
                "placar_fora" => 2,
                "timefora_id" => 52
            ],
            [
                "id" => 782,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 8,
                "inicio" => "2017-06-18 19:00:00",
                "timecasa_id" => 172,
                "placar_casa" => 1,
                "placar_fora" => 3,
                "timefora_id" => 192
            ],
            [
                "id" => 792,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 8,
                "inicio" => "2017-06-19 20:00:00",
                "timecasa_id" => 92,
                "placar_casa" => 3,
                "placar_fora" => 3,
                "timefora_id" => 122
            ],
            [
                "id" => 802,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 9,
                "inicio" => "2017-06-21 19:30:00",
                "timecasa_id" => 192,
                "placar_casa" => 0,
                "placar_fora" => 2,
                "timefora_id" => 152
            ],
            [
                "id" => 812,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 9,
                "inicio" => "2017-06-21 21:00:00",
                "timecasa_id" => 52,
                "placar_casa" => 3,
                "placar_fora" => 1,
                "timefora_id" => 182
            ],
            [
                "id" => 822,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 9,
                "inicio" => "2017-06-21 21:45:00",
                "timecasa_id" => 12,
                "placar_casa" => 2,
                "placar_fora" => 2,
                "timefora_id" => 172
            ],
            [
                "id" => 832,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 9,
                "inicio" => "2017-06-21 21:45:00",
                "timecasa_id" => 22,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 162
            ],
            [
                "id" => 842,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 9,
                "inicio" => "2017-06-21 21:00:00",
                "timecasa_id" => 132,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 2
            ],
            [
                "id" => 852,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 9,
                "inicio" => "2017-06-21 21:45:00",
                "timecasa_id" => 32,
                "placar_casa" => 0,
                "placar_fora" => 3,
                "timefora_id" => 112
            ],
            [
                "id" => 862,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 9,
                "inicio" => "2017-06-22 19:30:00",
                "timecasa_id" => 72,
                "placar_casa" => 3,
                "placar_fora" => 0,
                "timefora_id" => 42
            ],
            [
                "id" => 872,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 9,
                "inicio" => "2017-06-22 19:30:00",
                "timecasa_id" => 142,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 92
            ],
            [
                "id" => 882,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 9,
                "inicio" => "2017-06-22 21:00:00",
                "timecasa_id" => 102,
                "placar_casa" => 5,
                "placar_fora" => 1,
                "timefora_id" => 62
            ],
            [
                "id" => 892,
                "campeonato_id" => 2,
                "bolao_id" => 2,
                "rodada" => 9,
                "inicio" => "2017-06-22 21:00:00",
                "timecasa_id" => 122,
                "placar_casa" => 2,
                "placar_fora" => 0,
                "timefora_id" => 82
            ]
        ];

        foreach ($jogos as $jogo){
            Jogo::create($jogo);
        }
    }
}
