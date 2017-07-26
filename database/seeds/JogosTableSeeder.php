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
                "id" => 2,
                "campeonato_id" => 2,
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
                "rodada" => 9,
                "inicio" => "2017-06-22 21:00:00",
                "timecasa_id" => 122,
                "placar_casa" => 2,
                "placar_fora" => 0,
                "timefora_id" => 82
            ],
            [
                "id" => 902,
                "campeonato_id" => 2,
                "rodada" => 10,
                "inicio" => "2017-06-24 19:00:00",
                "timecasa_id" => 152,
                "placar_casa" => 0,
                "placar_fora" => 1,
                "timefora_id" => 172
            ],
            [
                "id" => 912,
                "campeonato_id" => 2,
                "rodada" => 10,
                "inicio" => "2017-06-25 16:00:00",
                "timecasa_id" => 162,
                "placar_casa" => 1,
                "placar_fora" => 1,
                "timefora_id" => 112
            ],
            [
                "id" => 922,
                "campeonato_id" => 2,
                "rodada" => 10,
                "inicio" => "2017-06-25 16:00:00",
                "timecasa_id" => 22,
                "placar_casa" => 4,
                "placar_fora" => 1,
                "timefora_id" => 192
            ],
            [
                "id" => 932,
                "campeonato_id" => 2,
                "rodada" => 10,
                "inicio" => "2017-06-25 16:00:00",
                "timecasa_id" => 92,
                "placar_casa" => 2,
                "placar_fora" => 0,
                "timefora_id" => 82
            ],
            [
                "id" => 942,
                "campeonato_id" => 2,
                "rodada" => 10,
                "inicio" => "2017-06-25 16:00:00",
                "timecasa_id" => 122,
                "placar_casa" => 0,
                "placar_fora" => 1,
                "timefora_id" => 72
            ],
            [
                "id" => 952,
                "campeonato_id" => 2,
                "rodada" => 10,
                "inicio" => "2017-06-25 16:00:00",
                "timecasa_id" => 142,
                "placar_casa" => 1,
                "placar_fora" => 2,
                "timefora_id" => 132
            ],
            [
                "id" => 962,
                "campeonato_id" => 2,
                "rodada" => 10,
                "inicio" => "2017-06-25 19:00:00",
                "timecasa_id" => 62,
                "placar_casa" => 0,
                "placar_fora" => 1,
                "timefora_id" => 12
            ],
            [
                "id" => 972,
                "campeonato_id" => 2,
                "rodada" => 10,
                "inicio" => "2017-06-25 11:00:00",
                "timecasa_id" => 182,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 2
            ],
            [
                "id" => 982,
                "campeonato_id" => 2,
                "rodada" => 10,
                "inicio" => "2017-06-25 18:30:00",
                "timecasa_id" => 42,
                "placar_casa" => 0,
                "placar_fora" => 1,
                "timefora_id" => 102
            ],
            [
                "id" => 992,
                "campeonato_id" => 2,
                "rodada" => 10,
                "inicio" => "2017-06-26 20:00:00",
                "timecasa_id" => 52,
                "placar_casa" => 0,
                "placar_fora" => 2,
                "timefora_id" => 32
            ],
            [
                "id" => 1002,
                "campeonato_id" => 2,
                "rodada" => 11,
                "inicio" => "2017-07-01 19:00:00",
                "timecasa_id" => 2,
                "placar_casa" => 1,
                "placar_fora" => 1,
                "timefora_id" => 152
            ],
            [
                "id" => 1012,
                "campeonato_id" => 2,
                "rodada" => 11,
                "inicio" => "2017-07-01 16:00:00",
                "timecasa_id" => 132,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 122
            ],
            [
                "id" => 1022,
                "campeonato_id" => 2,
                "rodada" => 11,
                "inicio" => "2017-07-02 16:00:00",
                "timecasa_id" => 72,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 52
            ],
            [
                "id" => 1032,
                "campeonato_id" => 2,
                "rodada" => 11,
                "inicio" => "2017-07-02 16:00:00",
                "timecasa_id" => 102,
                "placar_casa" => 2,
                "placar_fora" => 0,
                "timefora_id" => 162
            ],
            [
                "id" => 1042,
                "campeonato_id" => 2,
                "rodada" => 11,
                "inicio" => "2017-07-02 16:00:00",
                "timecasa_id" => 172,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 22
            ],
            [
                "id" => 1052,
                "campeonato_id" => 2,
                "rodada" => 11,
                "inicio" => "2017-07-02 16:00:00",
                "timecasa_id" => 12,
                "placar_casa" => 3,
                "placar_fora" => 1,
                "timefora_id" => 92
            ],
            [
                "id" => 1062,
                "campeonato_id" => 2,
                "rodada" => 11,
                "inicio" => "2017-07-02 16:00:00",
                "timecasa_id" => 192,
                "placar_casa" => 0,
                "placar_fora" => 0,
                "timefora_id" => 42
            ],
            [
                "id" => 1072,
                "campeonato_id" => 2,
                "rodada" => 11,
                "inicio" => "2017-07-02 19:00:00",
                "timecasa_id" => 82,
                "placar_casa" => 2,
                "placar_fora" => 2,
                "timefora_id" => 182
            ],
            [
                "id" => 1082,
                "campeonato_id" => 2,
                "rodada" => 11,
                "inicio" => "2017-07-02 19:00:00",
                "timecasa_id" => 32,
                "placar_casa" => 0,
                "placar_fora" => 0,
                "timefora_id" => 142
            ],
            [
                "id" => 1092,
                "campeonato_id" => 2,
                "rodada" => 11,
                "inicio" => "2017-07-03 20:00:00",
                "timecasa_id" => 112,
                "placar_casa" => 3,
                "placar_fora" => 3,
                "timefora_id" => 62
            ],
            [
                "id" => 1102,
                "campeonato_id" => 2,
                "rodada" => 12,
                "inicio" => "2017-07-08 16:00:00",
                "timecasa_id" => 2,
                "placar_casa" => 1,
                "placar_fora" => 2,
                "timefora_id" => 192
            ],
            [
                "id" => 1112,
                "campeonato_id" => 2,
                "rodada" => 12,
                "inicio" => "2017-07-08 18:00:00",
                "timecasa_id" => 182,
                "placar_casa" => 0,
                "placar_fora" => 1,
                "timefora_id" => 102
            ],
            [
                "id" => 1122,
                "campeonato_id" => 2,
                "rodada" => 12,
                "inicio" => "2017-07-08 19:00:00",
                "timecasa_id" => 72,
                "placar_casa" => 2,
                "placar_fora" => 0,
                "timefora_id" => 142
            ],
            [
                "id" => 1132,
                "campeonato_id" => 2,
                "rodada" => 12,
                "inicio" => "2017-07-09 11:00:00",
                "timecasa_id" => 62,
                "placar_casa" => 1,
                "placar_fora" => 1,
                "timefora_id" => 22
            ],
            [
                "id" => 1142,
                "campeonato_id" => 2,
                "rodada" => 12,
                "inicio" => "2017-07-09 16:00:00",
                "timecasa_id" => 92,
                "placar_casa" => 3,
                "placar_fora" => 1,
                "timefora_id" => 132
            ],
            [
                "id" => 1152,
                "campeonato_id" => 2,
                "rodada" => 12,
                "inicio" => "2017-07-09 16:00:00",
                "timecasa_id" => 122,
                "placar_casa" => 0,
                "placar_fora" => 2,
                "timefora_id" => 32
            ],
            [
                "id" => 1162,
                "campeonato_id" => 2,
                "rodada" => 12,
                "inicio" => "2017-07-09 16:00:00",
                "timecasa_id" => 42,
                "placar_casa" => 1,
                "placar_fora" => 1,
                "timefora_id" => 112
            ],
            [
                "id" => 1172,
                "campeonato_id" => 2,
                "rodada" => 12,
                "inicio" => "2017-07-09 19:00:00",
                "timecasa_id" => 52,
                "placar_casa" => 1,
                "placar_fora" => 1,
                "timefora_id" => 12
            ],
            [
                "id" => 1182,
                "campeonato_id" => 2,
                "rodada" => 12,
                "inicio" => "2017-07-09 19:00:00",
                "timecasa_id" => 152,
                "placar_casa" => 3,
                "placar_fora" => 2,
                "timefora_id" => 162
            ],
            [
                "id" => 1192,
                "campeonato_id" => 2,
                "rodada" => 12,
                "inicio" => "2017-07-10 20:00:00",
                "timecasa_id" => 82,
                "placar_casa" => 0,
                "placar_fora" => 3,
                "timefora_id" => 172
            ],
            [
                "id" => 1202,
                "campeonato_id" => 2,
                "rodada" => 13,
                "inicio" => "2017-07-12 19:30:00",
                "timecasa_id" => 12,
                "placar_casa" => 0,
                "placar_fora" => 1,
                "timefora_id" => 152
            ],
            [
                "id" => 1212,
                "campeonato_id" => 2,
                "rodada" => 13,
                "inicio" => "2017-07-12 19:30:00",
                "timecasa_id" => 142,
                "placar_casa" => 0,
                "placar_fora" => 3,
                "timefora_id" => 42
            ],
            [
                "id" => 1222,
                "campeonato_id" => 2,
                "rodada" => 13,
                "inicio" => "2017-07-12 21:00:00",
                "timecasa_id" => 112,
                "placar_casa" => 0,
                "placar_fora" => 1,
                "timefora_id" => 52
            ],
            [
                "id" => 1232,
                "campeonato_id" => 2,
                "rodada" => 13,
                "inicio" => "2017-07-12 21:45:00",
                "timecasa_id" => 132,
                "placar_casa" => 0,
                "placar_fora" => 2,
                "timefora_id" => 72
            ],
            [
                "id" => 1242,
                "campeonato_id" => 2,
                "rodada" => 13,
                "inicio" => "2017-07-12 21:45:00",
                "timecasa_id" => 22,
                "placar_casa" => 0,
                "placar_fora" => 2,
                "timefora_id" => 92
            ],
            [
                "id" => 1252,
                "campeonato_id" => 2,
                "rodada" => 13,
                "inicio" => "2017-07-12 21:45:00",
                "timecasa_id" => 192,
                "placar_casa" => 1,
                "placar_fora" => 4,
                "timefora_id" => 182
            ],
            [
                "id" => 1262,
                "campeonato_id" => 2,
                "rodada" => 13,
                "inicio" => "2017-07-13 19:30:00",
                "timecasa_id" => 102,
                "placar_casa" => 0,
                "placar_fora" => 1,
                "timefora_id" => 122
            ],
            [
                "id" => 1272,
                "campeonato_id" => 2,
                "rodada" => 13,
                "inicio" => "2017-07-13 19:30:00",
                "timecasa_id" => 162,
                "placar_casa" => 2,
                "placar_fora" => 2,
                "timefora_id" => 2
            ],
            [
                "id" => 1282,
                "campeonato_id" => 2,
                "rodada" => 13,
                "inicio" => "2017-07-13 19:30:00",
                "timecasa_id" => 172,
                "placar_casa" => 3,
                "placar_fora" => 0,
                "timefora_id" => 62
            ],
            [
                "id" => 1292,
                "campeonato_id" => 2,
                "rodada" => 13,
                "inicio" => "2017-07-13 21:00:00",
                "timecasa_id" => 32,
                "placar_casa" => 1,
                "placar_fora" => 4,
                "timefora_id" => 82
            ],
            [
                "id" => 1302,
                "campeonato_id" => 2,
                "rodada" => 14,
                "inicio" => "2017-07-15 19:00:00",
                "timecasa_id" => 72,
                "placar_casa" => 2,
                "placar_fora" => 2,
                "timefora_id" => 22
            ],
            [
                "id" => 1312,
                "campeonato_id" => 2,
                "rodada" => 14,
                "inicio" => "2017-07-16 11:00:00",
                "timecasa_id" => 132,
                "placar_casa" => 4,
                "placar_fora" => 2,
                "timefora_id" => 192
            ],
            [
                "id" => 1322,
                "campeonato_id" => 2,
                "rodada" => 14,
                "inicio" => "2017-07-16 16:00:00",
                "timecasa_id" => 182,
                "placar_casa" => 0,
                "placar_fora" => 0,
                "timefora_id" => 152
            ],
            [
                "id" => 1332,
                "campeonato_id" => 2,
                "rodada" => 14,
                "inicio" => "2017-07-16 16:00:00",
                "timecasa_id" => 92,
                "placar_casa" => 1,
                "placar_fora" => 1,
                "timefora_id" => 102
            ],
            [
                "id" => 1342,
                "campeonato_id" => 2,
                "rodada" => 14,
                "inicio" => "2017-07-16 16:00:00",
                "timecasa_id" => 122,
                "placar_casa" => 3,
                "placar_fora" => 1,
                "timefora_id" => 142
            ],
            [
                "id" => 1352,
                "campeonato_id" => 2,
                "rodada" => 14,
                "inicio" => "2017-07-16 16:00:00",
                "timecasa_id" => 2,
                "placar_casa" => 1,
                "placar_fora" => 2,
                "timefora_id" => 12
            ],
            [
                "id" => 1362,
                "campeonato_id" => 2,
                "rodada" => 14,
                "inicio" => "2017-07-16 16:00:00",
                "timecasa_id" => 62,
                "placar_casa" => 2,
                "placar_fora" => 0,
                "timefora_id" => 162
            ],
            [
                "id" => 1372,
                "campeonato_id" => 2,
                "rodada" => 14,
                "inicio" => "2017-07-16 19:00:00",
                "timecasa_id" => 82,
                "placar_casa" => 1,
                "placar_fora" => 2,
                "timefora_id" => 112
            ],
            [
                "id" => 1382,
                "campeonato_id" => 2,
                "rodada" => 14,
                "inicio" => "2017-07-16 19:00:00",
                "timecasa_id" => 42,
                "placar_casa" => 1,
                "placar_fora" => 1,
                "timefora_id" => 32
            ],
            [
                "id" => 1392,
                "campeonato_id" => 2,
                "rodada" => 14,
                "inicio" => "2017-07-17 20:00:00",
                "timecasa_id" => 52,
                "placar_casa" => 2,
                "placar_fora" => 1,
                "timefora_id" => 172
            ],
            [
                "id" => 1402,
                "campeonato_id" => 2,
                "rodada" => 15,
                "inicio" => "2017-07-19 19:30:00",
                "timecasa_id" => 152,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 62
            ],
            [
                "id" => 1412,
                "campeonato_id" => 2,
                "rodada" => 15,
                "inicio" => "2017-07-19 19:30:00",
                "timecasa_id" => 192,
                "placar_casa" => 1,
                "placar_fora" => 3,
                "timefora_id" => 122
            ],
            [
                "id" => 1422,
                "campeonato_id" => 2,
                "rodada" => 15,
                "inicio" => "2017-07-19 21:00:00",
                "timecasa_id" => 32,
                "placar_casa" => 0,
                "placar_fora" => 0,
                "timefora_id" => 72
            ],
            [
                "id" => 1432,
                "campeonato_id" => 2,
                "rodada" => 15,
                "inicio" => "2017-07-19 21:00:00",
                "timecasa_id" => 142,
                "placar_casa" => 4,
                "placar_fora" => 0,
                "timefora_id" => 82
            ],
            [
                "id" => 1442,
                "campeonato_id" => 2,
                "rodada" => 15,
                "inicio" => "2017-07-19 21:45:00",
                "timecasa_id" => 102,
                "placar_casa" => 2,
                "placar_fora" => 2,
                "timefora_id" => 132
            ],
            [
                "id" => 1452,
                "campeonato_id" => 2,
                "rodada" => 15,
                "inicio" => "2017-07-19 21:45:00",
                "timecasa_id" => 162,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 182
            ],
            [
                "id" => 1462,
                "campeonato_id" => 2,
                "rodada" => 15,
                "inicio" => "2017-07-19 21:45:00",
                "timecasa_id" => 12,
                "placar_casa" => 0,
                "placar_fora" => 2,
                "timefora_id" => 42
            ],
            [
                "id" => 1472,
                "campeonato_id" => 2,
                "rodada" => 15,
                "inicio" => "2017-07-20 19:30:00",
                "timecasa_id" => 112,
                "placar_casa" => 1,
                "placar_fora" => 1,
                "timefora_id" => 92
            ],
            [
                "id" => 1482,
                "campeonato_id" => 2,
                "rodada" => 15,
                "inicio" => "2017-07-20 19:30:00",
                "timecasa_id" => 172,
                "placar_casa" => 4,
                "placar_fora" => 0,
                "timefora_id" => 2
            ],
            [
                "id" => 1492,
                "campeonato_id" => 2,
                "rodada" => 15,
                "inicio" => "2017-07-20 21:00:00",
                "timecasa_id" => 22,
                "placar_casa" => 0,
                "placar_fora" => 0,
                "timefora_id" => 52
            ],
            [
                "id" => 1502,
                "campeonato_id" => 2,
                "rodada" => 16,
                "inicio" => "2017-07-22 16:00:00",
                "timecasa_id" => 192,
                "placar_casa" => 1,
                "placar_fora" => 2,
                "timefora_id" => 62
            ],
            [
                "id" => 1512,
                "campeonato_id" => 2,
                "rodada" => 16,
                "inicio" => "2017-07-22 19:00:00",
                "timecasa_id" => 102,
                "placar_casa" => 2,
                "placar_fora" => 1,
                "timefora_id" => 82
            ],
            [
                "id" => 1522,
                "campeonato_id" => 2,
                "rodada" => 16,
                "inicio" => "2017-07-23 11:00:00",
                "timecasa_id" => 152,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 42
            ],
            [
                "id" => 1532,
                "campeonato_id" => 2,
                "rodada" => 16,
                "inicio" => "2017-07-23 16:00:00",
                "timecasa_id" => 112,
                "placar_casa" => 0,
                "placar_fora" => 1,
                "timefora_id" => 72
            ],
            [
                "id" => 1542,
                "campeonato_id" => 2,
                "rodada" => 16,
                "inicio" => "2017-07-23 16:00:00",
                "timecasa_id" => 172,
                "placar_casa" => 0,
                "placar_fora" => 2,
                "timefora_id" => 132
            ],
            [
                "id" => 1552,
                "campeonato_id" => 2,
                "rodada" => 16,
                "inicio" => "2017-07-23 16:00:00",
                "timecasa_id" => 32,
                "placar_casa" => 1,
                "placar_fora" => 0,
                "timefora_id" => 92
            ],
            [
                "id" => 1562,
                "campeonato_id" => 2,
                "rodada" => 16,
                "inicio" => "2017-07-23 19:00:00",
                "timecasa_id" => 12,
                "placar_casa" => 1,
                "placar_fora" => 2,
                "timefora_id" => 182
            ],
            [
                "id" => 1572,
                "campeonato_id" => 2,
                "rodada" => 16,
                "inicio" => "2017-07-23 19:00:00",
                "timecasa_id" => 22,
                "placar_casa" => 0,
                "placar_fora" => 2,
                "timefora_id" => 142
            ],
            [
                "id" => 1582,
                "campeonato_id" => 2,
                "rodada" => 16,
                "inicio" => "2017-07-23 19:00:00",
                "timecasa_id" => 2,
                "placar_casa" => 1,
                "placar_fora" => 1,
                "timefora_id" => 52
            ],
            [
                "id" => 1592,
                "campeonato_id" => 2,
                "rodada" => 16,
                "inicio" => "2017-07-24 20:00:00",
                "timecasa_id" => 162,
                "placar_casa" => 0,
                "placar_fora" => 0,
                "timefora_id" => 122
            ],
            [
                "id" => 1602,
                "campeonato_id" => 2,
                "rodada" => 17,
                "inicio" => "2017-07-29 16:00:00",
                "timecasa_id" => 52,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 162
            ],
            [
                "id" => 1612,
                "campeonato_id" => 2,
                "rodada" => 17,
                "inicio" => "2017-07-29 19:00:00",
                "timecasa_id" => 132,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 32
            ],
            [
                "id" => 1622,
                "campeonato_id" => 2,
                "rodada" => 17,
                "inicio" => "2017-07-29 21:00:00",
                "timecasa_id" => 92,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 192
            ],
            [
                "id" => 1632,
                "campeonato_id" => 2,
                "rodada" => 17,
                "inicio" => "2017-07-30 16:00:00",
                "timecasa_id" => 72,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 102
            ],
            [
                "id" => 1642,
                "campeonato_id" => 2,
                "rodada" => 17,
                "inicio" => "2017-07-30 11:00:00",
                "timecasa_id" => 62,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 2
            ],
            [
                "id" => 1652,
                "campeonato_id" => 2,
                "rodada" => 17,
                "inicio" => "2017-07-30 16:00:00",
                "timecasa_id" => 82,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 12
            ],
            [
                "id" => 1662,
                "campeonato_id" => 2,
                "rodada" => 17,
                "inicio" => "2017-07-30 16:00:00",
                "timecasa_id" => 42,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 172
            ],
            [
                "id" => 1672,
                "campeonato_id" => 2,
                "rodada" => 17,
                "inicio" => "2017-07-30 16:00:00",
                "timecasa_id" => 142,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 112
            ],
            [
                "id" => 1682,
                "campeonato_id" => 2,
                "rodada" => 17,
                "inicio" => "2017-07-30 19:00:00",
                "timecasa_id" => 122,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 152
            ],
            [
                "id" => 1692,
                "campeonato_id" => 2,
                "rodada" => 17,
                "inicio" => "2017-07-31 20:00:00",
                "timecasa_id" => 182,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 22
            ],
            [
                "id" => 1702,
                "campeonato_id" => 2,
                "rodada" => 18,
                "inicio" => "2017-08-02 19:30:00",
                "timecasa_id" => 172,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 112
            ],
            [
                "id" => 1712,
                "campeonato_id" => 2,
                "rodada" => 18,
                "inicio" => "2017-08-02 19:30:00",
                "timecasa_id" => 62,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 42
            ],
            [
                "id" => 1722,
                "campeonato_id" => 2,
                "rodada" => 18,
                "inicio" => "2017-08-02 21:00:00",
                "timecasa_id" => 192,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 142
            ],
            [
                "id" => 1732,
                "campeonato_id" => 2,
                "rodada" => 18,
                "inicio" => "2017-08-02 21:00:00",
                "timecasa_id" => 12,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 72
            ],
            [
                "id" => 1742,
                "campeonato_id" => 2,
                "rodada" => 18,
                "inicio" => "2017-08-02 21:45:00",
                "timecasa_id" => 52,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 132
            ],
            [
                "id" => 1752,
                "campeonato_id" => 2,
                "rodada" => 18,
                "inicio" => "2017-08-02 21:45:00",
                "timecasa_id" => 2,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 122
            ],
            [
                "id" => 1762,
                "campeonato_id" => 2,
                "rodada" => 18,
                "inicio" => "2017-08-02 21:45:00",
                "timecasa_id" => 152,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 102
            ],
            [
                "id" => 1772,
                "campeonato_id" => 2,
                "rodada" => 18,
                "inicio" => "2017-08-03 19:30:00",
                "timecasa_id" => 162,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 82
            ],
            [
                "id" => 1782,
                "campeonato_id" => 2,
                "rodada" => 18,
                "inicio" => "2017-08-03 19:30:00",
                "timecasa_id" => 22,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 32
            ],
            [
                "id" => 1792,
                "campeonato_id" => 2,
                "rodada" => 18,
                "inicio" => "2017-08-03 21:00:00",
                "timecasa_id" => 182,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 92
            ],
            [
                "id" => 1802,
                "campeonato_id" => 2,
                "rodada" => 19,
                "inicio" => "2017-08-05 19:00:00",
                "timecasa_id" => 72,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 172
            ],
            [
                "id" => 1812,
                "campeonato_id" => 2,
                "rodada" => 19,
                "inicio" => "2017-08-06 11:00:00",
                "timecasa_id" => 102,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 192
            ],
            [
                "id" => 1822,
                "campeonato_id" => 2,
                "rodada" => 19,
                "inicio" => "2017-08-06 16:00:00",
                "timecasa_id" => 92,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 52
            ],
            [
                "id" => 1832,
                "campeonato_id" => 2,
                "rodada" => 19,
                "inicio" => "2017-08-06 16:00:00",
                "timecasa_id" => 132,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 22
            ],
            [
                "id" => 1842,
                "campeonato_id" => 2,
                "rodada" => 19,
                "inicio" => "2017-08-06 16:00:00",
                "timecasa_id" => 82,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 62
            ],
            [
                "id" => 1852,
                "campeonato_id" => 2,
                "rodada" => 19,
                "inicio" => "2017-08-06 16:00:00",
                "timecasa_id" => 122,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 12
            ],
            [
                "id" => 1862,
                "campeonato_id" => 2,
                "rodada" => 19,
                "inicio" => "2017-08-06 16:00:00",
                "timecasa_id" => 42,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 162
            ],
            [
                "id" => 1872,
                "campeonato_id" => 2,
                "rodada" => 19,
                "inicio" => "2017-08-06 19:00:00",
                "timecasa_id" => 142,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 182
            ],
            [
                "id" => 1882,
                "campeonato_id" => 2,
                "rodada" => 19,
                "inicio" => "2017-08-06 19:00:00",
                "timecasa_id" => 32,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 152
            ],
            [
                "id" => 1892,
                "campeonato_id" => 2,
                "rodada" => 19,
                "inicio" => "2017-08-07 20:00:00",
                "timecasa_id" => 112,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 2
            ],
            [
                "id" => 1902,
                "campeonato_id" => 2,
                "rodada" => 20,
                "inicio" => "2017-08-12 16:00:00",
                "timecasa_id" => 2,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 82
            ],
            [
                "id" => 1912,
                "campeonato_id" => 2,
                "rodada" => 20,
                "inicio" => "2017-08-12 19:00:00",
                "timecasa_id" => 192,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 32
            ],
            [
                "id" => 1922,
                "campeonato_id" => 2,
                "rodada" => 20,
                "inicio" => "2017-08-13 16:00:00",
                "timecasa_id" => 182,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 132
            ],
            [
                "id" => 1932,
                "campeonato_id" => 2,
                "rodada" => 20,
                "inicio" => "2017-08-13 11:00:00",
                "timecasa_id" => 162,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 92
            ],
            [
                "id" => 1942,
                "campeonato_id" => 2,
                "rodada" => 20,
                "inicio" => "2017-08-13 16:00:00",
                "timecasa_id" => 152,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 112
            ],
            [
                "id" => 1952,
                "campeonato_id" => 2,
                "rodada" => 20,
                "inicio" => "2017-08-13 16:00:00",
                "timecasa_id" => 12,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 102
            ],
            [
                "id" => 1962,
                "campeonato_id" => 2,
                "rodada" => 20,
                "inicio" => "2017-08-13 16:00:00",
                "timecasa_id" => 22,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 42
            ],
            [
                "id" => 1972,
                "campeonato_id" => 2,
                "rodada" => 20,
                "inicio" => "2017-08-13 19:00:00",
                "timecasa_id" => 52,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 122
            ],
            [
                "id" => 1982,
                "campeonato_id" => 2,
                "rodada" => 20,
                "inicio" => "2017-08-14 20:00:00",
                "timecasa_id" => 172,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 142
            ],
            [
                "id" => 1992,
                "campeonato_id" => 2,
                "rodada" => 20,
                "inicio" => "2017-08-23 19:30:00",
                "timecasa_id" => 62,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 72
            ],
            [
                "id" => 2002,
                "campeonato_id" => 2,
                "rodada" => 21,
                "inicio" => "2017-08-20 00:00:00",
                "timecasa_id" => 112,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 12
            ],
            [
                "id" => 2012,
                "campeonato_id" => 2,
                "rodada" => 21,
                "inicio" => "2017-08-20 00:00:00",
                "timecasa_id" => 102,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 2
            ],
            [
                "id" => 2022,
                "campeonato_id" => 2,
                "rodada" => 21,
                "inicio" => "2017-08-20 00:00:00",
                "timecasa_id" => 132,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 62
            ],
            [
                "id" => 2032,
                "campeonato_id" => 2,
                "rodada" => 21,
                "inicio" => "2017-08-20 00:00:00",
                "timecasa_id" => 82,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 152
            ],
            [
                "id" => 2042,
                "campeonato_id" => 2,
                "rodada" => 21,
                "inicio" => "2017-08-20 00:00:00",
                "timecasa_id" => 92,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 172
            ],
            [
                "id" => 2052,
                "campeonato_id" => 2,
                "rodada" => 21,
                "inicio" => "2017-08-20 00:00:00",
                "timecasa_id" => 72,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 192
            ],
            [
                "id" => 2062,
                "campeonato_id" => 2,
                "rodada" => 21,
                "inicio" => "2017-08-20 00:00:00",
                "timecasa_id" => 122,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 22
            ],
            [
                "id" => 2072,
                "campeonato_id" => 2,
                "rodada" => 21,
                "inicio" => "2017-08-20 00:00:00",
                "timecasa_id" => 42,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 182
            ],
            [
                "id" => 2082,
                "campeonato_id" => 2,
                "rodada" => 21,
                "inicio" => "2017-08-20 00:00:00",
                "timecasa_id" => 142,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 52
            ],
            [
                "id" => 2092,
                "campeonato_id" => 2,
                "rodada" => 21,
                "inicio" => "2017-08-20 00:00:00",
                "timecasa_id" => 32,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 162
            ],
            [
                "id" => 2102,
                "campeonato_id" => 2,
                "rodada" => 22,
                "inicio" => "2017-08-27 00:00:00",
                "timecasa_id" => 112,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 182
            ],
            [
                "id" => 2112,
                "campeonato_id" => 2,
                "rodada" => 22,
                "inicio" => "2017-08-27 00:00:00",
                "timecasa_id" => 102,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 22
            ],
            [
                "id" => 2122,
                "campeonato_id" => 2,
                "rodada" => 22,
                "inicio" => "2017-08-27 00:00:00",
                "timecasa_id" => 132,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 162
            ],
            [
                "id" => 2132,
                "campeonato_id" => 2,
                "rodada" => 22,
                "inicio" => "2017-08-27 00:00:00",
                "timecasa_id" => 72,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 2
            ],
            [
                "id" => 2142,
                "campeonato_id" => 2,
                "rodada" => 22,
                "inicio" => "2017-08-27 00:00:00",
                "timecasa_id" => 92,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 152
            ],
            [
                "id" => 2152,
                "campeonato_id" => 2,
                "rodada" => 22,
                "inicio" => "2017-08-27 00:00:00",
                "timecasa_id" => 82,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 192
            ],
            [
                "id" => 2162,
                "campeonato_id" => 2,
                "rodada" => 22,
                "inicio" => "2017-08-27 00:00:00",
                "timecasa_id" => 122,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 172
            ],
            [
                "id" => 2172,
                "campeonato_id" => 2,
                "rodada" => 22,
                "inicio" => "2017-08-27 00:00:00",
                "timecasa_id" => 42,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 52
            ],
            [
                "id" => 2182,
                "campeonato_id" => 2,
                "rodada" => 22,
                "inicio" => "2017-08-27 00:00:00",
                "timecasa_id" => 142,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 12
            ],
            [
                "id" => 2192,
                "campeonato_id" => 2,
                "rodada" => 22,
                "inicio" => "2017-08-27 00:00:00",
                "timecasa_id" => 32,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 62
            ],
            [
                "id" => 2202,
                "campeonato_id" => 2,
                "rodada" => 23,
                "inicio" => "2017-09-10 00:00:00",
                "timecasa_id" => 52,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 102
            ],
            [
                "id" => 2212,
                "campeonato_id" => 2,
                "rodada" => 23,
                "inicio" => "2017-09-10 00:00:00",
                "timecasa_id" => 182,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 122
            ],
            [
                "id" => 2222,
                "campeonato_id" => 2,
                "rodada" => 23,
                "inicio" => "2017-09-10 00:00:00",
                "timecasa_id" => 162,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 142
            ],
            [
                "id" => 2232,
                "campeonato_id" => 2,
                "rodada" => 23,
                "inicio" => "2017-09-10 00:00:00",
                "timecasa_id" => 152,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 72
            ],
            [
                "id" => 2242,
                "campeonato_id" => 2,
                "rodada" => 23,
                "inicio" => "2017-09-10 00:00:00",
                "timecasa_id" => 22,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 82
            ],
            [
                "id" => 2252,
                "campeonato_id" => 2,
                "rodada" => 23,
                "inicio" => "2017-09-10 00:00:00",
                "timecasa_id" => 12,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 132
            ],
            [
                "id" => 2262,
                "campeonato_id" => 2,
                "rodada" => 23,
                "inicio" => "2017-09-10 00:00:00",
                "timecasa_id" => 192,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 112
            ],
            [
                "id" => 2272,
                "campeonato_id" => 2,
                "rodada" => 23,
                "inicio" => "2017-09-10 00:00:00",
                "timecasa_id" => 2,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 42
            ],
            [
                "id" => 2282,
                "campeonato_id" => 2,
                "rodada" => 23,
                "inicio" => "2017-09-10 00:00:00",
                "timecasa_id" => 62,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 92
            ],
            [
                "id" => 2292,
                "campeonato_id" => 2,
                "rodada" => 23,
                "inicio" => "2017-09-10 00:00:00",
                "timecasa_id" => 172,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 32
            ],
            [
                "id" => 2302,
                "campeonato_id" => 2,
                "rodada" => 24,
                "inicio" => "2017-09-17 00:00:00",
                "timecasa_id" => 52,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 152
            ],
            [
                "id" => 2312,
                "campeonato_id" => 2,
                "rodada" => 24,
                "inicio" => "2017-09-17 00:00:00",
                "timecasa_id" => 102,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 172
            ],
            [
                "id" => 2322,
                "campeonato_id" => 2,
                "rodada" => 24,
                "inicio" => "2017-09-17 00:00:00",
                "timecasa_id" => 132,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 82
            ],
            [
                "id" => 2332,
                "campeonato_id" => 2,
                "rodada" => 24,
                "inicio" => "2017-09-17 00:00:00",
                "timecasa_id" => 92,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 42
            ],
            [
                "id" => 2342,
                "campeonato_id" => 2,
                "rodada" => 24,
                "inicio" => "2017-09-17 00:00:00",
                "timecasa_id" => 72,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 182
            ],
            [
                "id" => 2352,
                "campeonato_id" => 2,
                "rodada" => 24,
                "inicio" => "2017-09-17 00:00:00",
                "timecasa_id" => 22,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 112
            ],
            [
                "id" => 2362,
                "campeonato_id" => 2,
                "rodada" => 24,
                "inicio" => "2017-09-17 00:00:00",
                "timecasa_id" => 122,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 62
            ],
            [
                "id" => 2372,
                "campeonato_id" => 2,
                "rodada" => 24,
                "inicio" => "2017-09-17 00:00:00",
                "timecasa_id" => 192,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 162
            ],
            [
                "id" => 2382,
                "campeonato_id" => 2,
                "rodada" => 24,
                "inicio" => "2017-09-17 00:00:00",
                "timecasa_id" => 142,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 2
            ],
            [
                "id" => 2392,
                "campeonato_id" => 2,
                "rodada" => 24,
                "inicio" => "2017-09-17 00:00:00",
                "timecasa_id" => 32,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 12
            ],
            [
                "id" => 2402,
                "campeonato_id" => 2,
                "rodada" => 25,
                "inicio" => "2017-09-24 00:00:00",
                "timecasa_id" => 112,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 132
            ],
            [
                "id" => 2412,
                "campeonato_id" => 2,
                "rodada" => 25,
                "inicio" => "2017-09-24 00:00:00",
                "timecasa_id" => 102,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 32
            ],
            [
                "id" => 2422,
                "campeonato_id" => 2,
                "rodada" => 25,
                "inicio" => "2017-09-24 00:00:00",
                "timecasa_id" => 152,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 22
            ],
            [
                "id" => 2432,
                "campeonato_id" => 2,
                "rodada" => 25,
                "inicio" => "2017-09-24 00:00:00",
                "timecasa_id" => 162,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 72
            ],
            [
                "id" => 2442,
                "campeonato_id" => 2,
                "rodada" => 25,
                "inicio" => "2017-09-24 00:00:00",
                "timecasa_id" => 12,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 192
            ],
            [
                "id" => 2452,
                "campeonato_id" => 2,
                "rodada" => 25,
                "inicio" => "2017-09-24 00:00:00",
                "timecasa_id" => 82,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 52
            ],
            [
                "id" => 2462,
                "campeonato_id" => 2,
                "rodada" => 25,
                "inicio" => "2017-09-24 00:00:00",
                "timecasa_id" => 172,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 182
            ],
            [
                "id" => 2472,
                "campeonato_id" => 2,
                "rodada" => 25,
                "inicio" => "2017-09-24 00:00:00",
                "timecasa_id" => 42,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 122
            ],
            [
                "id" => 2482,
                "campeonato_id" => 2,
                "rodada" => 25,
                "inicio" => "2017-09-24 00:00:00",
                "timecasa_id" => 2,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 92
            ],
            [
                "id" => 2492,
                "campeonato_id" => 2,
                "rodada" => 25,
                "inicio" => "2017-09-24 00:00:00",
                "timecasa_id" => 62,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 142
            ],
            [
                "id" => 2502,
                "campeonato_id" => 2,
                "rodada" => 26,
                "inicio" => "2017-09-27 00:00:00",
                "timecasa_id" => 52,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 192
            ],
            [
                "id" => 2512,
                "campeonato_id" => 2,
                "rodada" => 26,
                "inicio" => "2017-09-27 00:00:00",
                "timecasa_id" => 132,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 152
            ],
            [
                "id" => 2522,
                "campeonato_id" => 2,
                "rodada" => 26,
                "inicio" => "2017-09-27 00:00:00",
                "timecasa_id" => 182,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 62
            ],
            [
                "id" => 2532,
                "campeonato_id" => 2,
                "rodada" => 26,
                "inicio" => "2017-09-27 00:00:00",
                "timecasa_id" => 162,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 172
            ],
            [
                "id" => 2542,
                "campeonato_id" => 2,
                "rodada" => 26,
                "inicio" => "2017-09-27 00:00:00",
                "timecasa_id" => 92,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 72
            ],
            [
                "id" => 2552,
                "campeonato_id" => 2,
                "rodada" => 26,
                "inicio" => "2017-09-27 00:00:00",
                "timecasa_id" => 22,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 12
            ],
            [
                "id" => 2562,
                "campeonato_id" => 2,
                "rodada" => 26,
                "inicio" => "2017-09-27 00:00:00",
                "timecasa_id" => 122,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 112
            ],
            [
                "id" => 2572,
                "campeonato_id" => 2,
                "rodada" => 26,
                "inicio" => "2017-09-27 00:00:00",
                "timecasa_id" => 42,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 82
            ],
            [
                "id" => 2582,
                "campeonato_id" => 2,
                "rodada" => 26,
                "inicio" => "2017-09-27 00:00:00",
                "timecasa_id" => 142,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 102
            ],
            [
                "id" => 2592,
                "campeonato_id" => 2,
                "rodada" => 26,
                "inicio" => "2017-09-27 00:00:00",
                "timecasa_id" => 32,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 2
            ],
            [
                "id" => 2602,
                "campeonato_id" => 2,
                "rodada" => 27,
                "inicio" => "2017-10-01 00:00:00",
                "timecasa_id" => 52,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 62
            ],
            [
                "id" => 2612,
                "campeonato_id" => 2,
                "rodada" => 27,
                "inicio" => "2017-10-01 00:00:00",
                "timecasa_id" => 102,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 112
            ],
            [
                "id" => 2622,
                "campeonato_id" => 2,
                "rodada" => 27,
                "inicio" => "2017-10-01 00:00:00",
                "timecasa_id" => 132,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 42
            ],
            [
                "id" => 2632,
                "campeonato_id" => 2,
                "rodada" => 27,
                "inicio" => "2017-10-01 00:00:00",
                "timecasa_id" => 72,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 82
            ],
            [
                "id" => 2642,
                "campeonato_id" => 2,
                "rodada" => 27,
                "inicio" => "2017-10-01 00:00:00",
                "timecasa_id" => 12,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 162
            ],
            [
                "id" => 2652,
                "campeonato_id" => 2,
                "rodada" => 27,
                "inicio" => "2017-10-01 00:00:00",
                "timecasa_id" => 22,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 2
            ],
            [
                "id" => 2662,
                "campeonato_id" => 2,
                "rodada" => 27,
                "inicio" => "2017-10-01 00:00:00",
                "timecasa_id" => 122,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 92
            ],
            [
                "id" => 2672,
                "campeonato_id" => 2,
                "rodada" => 27,
                "inicio" => "2017-10-01 00:00:00",
                "timecasa_id" => 192,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 172
            ],
            [
                "id" => 2682,
                "campeonato_id" => 2,
                "rodada" => 27,
                "inicio" => "2017-10-01 00:00:00",
                "timecasa_id" => 142,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 152
            ],
            [
                "id" => 2692,
                "campeonato_id" => 2,
                "rodada" => 27,
                "inicio" => "2017-10-01 00:00:00",
                "timecasa_id" => 32,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 182
            ],
            [
                "id" => 2702,
                "campeonato_id" => 2,
                "rodada" => 28,
                "inicio" => "2017-10-15 00:00:00",
                "timecasa_id" => 112,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 32
            ],
            [
                "id" => 2712,
                "campeonato_id" => 2,
                "rodada" => 28,
                "inicio" => "2017-10-15 00:00:00",
                "timecasa_id" => 152,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 192
            ],
            [
                "id" => 2722,
                "campeonato_id" => 2,
                "rodada" => 28,
                "inicio" => "2017-10-15 00:00:00",
                "timecasa_id" => 182,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 52
            ],
            [
                "id" => 2732,
                "campeonato_id" => 2,
                "rodada" => 28,
                "inicio" => "2017-10-15 00:00:00",
                "timecasa_id" => 92,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 142
            ],
            [
                "id" => 2742,
                "campeonato_id" => 2,
                "rodada" => 28,
                "inicio" => "2017-10-15 00:00:00",
                "timecasa_id" => 162,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 22
            ],
            [
                "id" => 2752,
                "campeonato_id" => 2,
                "rodada" => 28,
                "inicio" => "2017-10-15 00:00:00",
                "timecasa_id" => 82,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 122
            ],
            [
                "id" => 2762,
                "campeonato_id" => 2,
                "rodada" => 28,
                "inicio" => "2017-10-15 00:00:00",
                "timecasa_id" => 172,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 12
            ],
            [
                "id" => 2772,
                "campeonato_id" => 2,
                "rodada" => 28,
                "inicio" => "2017-10-15 00:00:00",
                "timecasa_id" => 42,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 72
            ],
            [
                "id" => 2782,
                "campeonato_id" => 2,
                "rodada" => 28,
                "inicio" => "2017-10-15 00:00:00",
                "timecasa_id" => 2,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 132
            ],
            [
                "id" => 2792,
                "campeonato_id" => 2,
                "rodada" => 28,
                "inicio" => "2017-10-15 00:00:00",
                "timecasa_id" => 62,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 102
            ],
            [
                "id" => 2802,
                "campeonato_id" => 2,
                "rodada" => 29,
                "inicio" => "2017-10-18 00:00:00",
                "timecasa_id" => 112,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 162
            ],
            [
                "id" => 2812,
                "campeonato_id" => 2,
                "rodada" => 29,
                "inicio" => "2017-10-18 00:00:00",
                "timecasa_id" => 102,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 42
            ],
            [
                "id" => 2822,
                "campeonato_id" => 2,
                "rodada" => 29,
                "inicio" => "2017-10-18 00:00:00",
                "timecasa_id" => 132,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 142
            ],
            [
                "id" => 2832,
                "campeonato_id" => 2,
                "rodada" => 29,
                "inicio" => "2017-10-18 00:00:00",
                "timecasa_id" => 12,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 62
            ],
            [
                "id" => 2842,
                "campeonato_id" => 2,
                "rodada" => 29,
                "inicio" => "2017-10-18 00:00:00",
                "timecasa_id" => 72,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 122
            ],
            [
                "id" => 2852,
                "campeonato_id" => 2,
                "rodada" => 29,
                "inicio" => "2017-10-18 00:00:00",
                "timecasa_id" => 172,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 152
            ],
            [
                "id" => 2862,
                "campeonato_id" => 2,
                "rodada" => 29,
                "inicio" => "2017-10-18 00:00:00",
                "timecasa_id" => 82,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 92
            ],
            [
                "id" => 2872,
                "campeonato_id" => 2,
                "rodada" => 29,
                "inicio" => "2017-10-18 00:00:00",
                "timecasa_id" => 192,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 22
            ],
            [
                "id" => 2882,
                "campeonato_id" => 2,
                "rodada" => 29,
                "inicio" => "2017-10-18 00:00:00",
                "timecasa_id" => 2,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 182
            ],
            [
                "id" => 2892,
                "campeonato_id" => 2,
                "rodada" => 29,
                "inicio" => "2017-10-18 00:00:00",
                "timecasa_id" => 32,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 52
            ],
            [
                "id" => 2902,
                "campeonato_id" => 2,
                "rodada" => 30,
                "inicio" => "2017-10-22 00:00:00",
                "timecasa_id" => 52,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 72
            ],
            [
                "id" => 2912,
                "campeonato_id" => 2,
                "rodada" => 30,
                "inicio" => "2017-10-22 00:00:00",
                "timecasa_id" => 182,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 82
            ],
            [
                "id" => 2922,
                "campeonato_id" => 2,
                "rodada" => 30,
                "inicio" => "2017-10-22 00:00:00",
                "timecasa_id" => 162,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 102
            ],
            [
                "id" => 2932,
                "campeonato_id" => 2,
                "rodada" => 30,
                "inicio" => "2017-10-22 00:00:00",
                "timecasa_id" => 152,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 2
            ],
            [
                "id" => 2942,
                "campeonato_id" => 2,
                "rodada" => 30,
                "inicio" => "2017-10-22 00:00:00",
                "timecasa_id" => 92,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 12
            ],
            [
                "id" => 2952,
                "campeonato_id" => 2,
                "rodada" => 30,
                "inicio" => "2017-10-22 00:00:00",
                "timecasa_id" => 22,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 172
            ],
            [
                "id" => 2962,
                "campeonato_id" => 2,
                "rodada" => 30,
                "inicio" => "2017-10-22 00:00:00",
                "timecasa_id" => 122,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 132
            ],
            [
                "id" => 2972,
                "campeonato_id" => 2,
                "rodada" => 30,
                "inicio" => "2017-10-22 00:00:00",
                "timecasa_id" => 42,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 192
            ],
            [
                "id" => 2982,
                "campeonato_id" => 2,
                "rodada" => 30,
                "inicio" => "2017-10-22 00:00:00",
                "timecasa_id" => 142,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 32
            ],
            [
                "id" => 2992,
                "campeonato_id" => 2,
                "rodada" => 30,
                "inicio" => "2017-10-22 00:00:00",
                "timecasa_id" => 62,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 112
            ],
            [
                "id" => 3002,
                "campeonato_id" => 2,
                "rodada" => 31,
                "inicio" => "2017-10-29 00:00:00",
                "timecasa_id" => 112,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 42
            ],
            [
                "id" => 3012,
                "campeonato_id" => 2,
                "rodada" => 31,
                "inicio" => "2017-10-29 00:00:00",
                "timecasa_id" => 102,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 182
            ],
            [
                "id" => 3022,
                "campeonato_id" => 2,
                "rodada" => 31,
                "inicio" => "2017-10-29 00:00:00",
                "timecasa_id" => 12,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 52
            ],
            [
                "id" => 3032,
                "campeonato_id" => 2,
                "rodada" => 31,
                "inicio" => "2017-10-29 00:00:00",
                "timecasa_id" => 162,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 152
            ],
            [
                "id" => 3042,
                "campeonato_id" => 2,
                "rodada" => 31,
                "inicio" => "2017-10-29 00:00:00",
                "timecasa_id" => 22,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 62
            ],
            [
                "id" => 3052,
                "campeonato_id" => 2,
                "rodada" => 31,
                "inicio" => "2017-10-29 00:00:00",
                "timecasa_id" => 132,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 92
            ],
            [
                "id" => 3062,
                "campeonato_id" => 2,
                "rodada" => 31,
                "inicio" => "2017-10-29 00:00:00",
                "timecasa_id" => 172,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 82
            ],
            [
                "id" => 3072,
                "campeonato_id" => 2,
                "rodada" => 31,
                "inicio" => "2017-10-29 00:00:00",
                "timecasa_id" => 192,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 2
            ],
            [
                "id" => 3082,
                "campeonato_id" => 2,
                "rodada" => 31,
                "inicio" => "2017-10-29 00:00:00",
                "timecasa_id" => 142,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 72
            ],
            [
                "id" => 3092,
                "campeonato_id" => 2,
                "rodada" => 31,
                "inicio" => "2017-10-29 00:00:00",
                "timecasa_id" => 32,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 122
            ],
            [
                "id" => 3102,
                "campeonato_id" => 2,
                "rodada" => 32,
                "inicio" => "2017-11-05 00:00:00",
                "timecasa_id" => 52,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 112
            ],
            [
                "id" => 3112,
                "campeonato_id" => 2,
                "rodada" => 32,
                "inicio" => "2017-11-05 00:00:00",
                "timecasa_id" => 182,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 192
            ],
            [
                "id" => 3122,
                "campeonato_id" => 2,
                "rodada" => 32,
                "inicio" => "2017-11-05 00:00:00",
                "timecasa_id" => 72,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 132
            ],
            [
                "id" => 3132,
                "campeonato_id" => 2,
                "rodada" => 32,
                "inicio" => "2017-11-05 00:00:00",
                "timecasa_id" => 152,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 12
            ],
            [
                "id" => 3142,
                "campeonato_id" => 2,
                "rodada" => 32,
                "inicio" => "2017-11-05 00:00:00",
                "timecasa_id" => 122,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 102
            ],
            [
                "id" => 3152,
                "campeonato_id" => 2,
                "rodada" => 32,
                "inicio" => "2017-11-05 00:00:00",
                "timecasa_id" => 92,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 22
            ],
            [
                "id" => 3162,
                "campeonato_id" => 2,
                "rodada" => 32,
                "inicio" => "2017-11-05 00:00:00",
                "timecasa_id" => 42,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 142
            ],
            [
                "id" => 3172,
                "campeonato_id" => 2,
                "rodada" => 32,
                "inicio" => "2017-11-05 00:00:00",
                "timecasa_id" => 62,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 172
            ],
            [
                "id" => 3182,
                "campeonato_id" => 2,
                "rodada" => 32,
                "inicio" => "2017-11-05 00:00:00",
                "timecasa_id" => 2,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 162
            ],
            [
                "id" => 3192,
                "campeonato_id" => 2,
                "rodada" => 32,
                "inicio" => "2017-11-05 00:00:00",
                "timecasa_id" => 82,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 32
            ],
            [
                "id" => 3202,
                "campeonato_id" => 2,
                "rodada" => 33,
                "inicio" => "2017-11-08 00:00:00",
                "timecasa_id" => 112,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 82
            ],
            [
                "id" => 3212,
                "campeonato_id" => 2,
                "rodada" => 33,
                "inicio" => "2017-11-08 00:00:00",
                "timecasa_id" => 152,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 182
            ],
            [
                "id" => 3222,
                "campeonato_id" => 2,
                "rodada" => 33,
                "inicio" => "2017-11-08 00:00:00",
                "timecasa_id" => 102,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 92
            ],
            [
                "id" => 3232,
                "campeonato_id" => 2,
                "rodada" => 33,
                "inicio" => "2017-11-08 00:00:00",
                "timecasa_id" => 12,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 2
            ],
            [
                "id" => 3242,
                "campeonato_id" => 2,
                "rodada" => 33,
                "inicio" => "2017-11-08 00:00:00",
                "timecasa_id" => 162,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 62
            ],
            [
                "id" => 3252,
                "campeonato_id" => 2,
                "rodada" => 33,
                "inicio" => "2017-11-08 00:00:00",
                "timecasa_id" => 22,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 72
            ],
            [
                "id" => 3262,
                "campeonato_id" => 2,
                "rodada" => 33,
                "inicio" => "2017-11-08 00:00:00",
                "timecasa_id" => 172,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 52
            ],
            [
                "id" => 3272,
                "campeonato_id" => 2,
                "rodada" => 33,
                "inicio" => "2017-11-08 00:00:00",
                "timecasa_id" => 192,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 132
            ],
            [
                "id" => 3282,
                "campeonato_id" => 2,
                "rodada" => 33,
                "inicio" => "2017-11-08 00:00:00",
                "timecasa_id" => 142,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 122
            ],
            [
                "id" => 3292,
                "campeonato_id" => 2,
                "rodada" => 33,
                "inicio" => "2017-11-08 00:00:00",
                "timecasa_id" => 32,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 42
            ],
            [
                "id" => 3302,
                "campeonato_id" => 2,
                "rodada" => 34,
                "inicio" => "2017-11-12 00:00:00",
                "timecasa_id" => 52,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 22
            ],
            [
                "id" => 3312,
                "campeonato_id" => 2,
                "rodada" => 34,
                "inicio" => "2017-11-12 00:00:00",
                "timecasa_id" => 182,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 162
            ],
            [
                "id" => 3322,
                "campeonato_id" => 2,
                "rodada" => 34,
                "inicio" => "2017-11-12 00:00:00",
                "timecasa_id" => 92,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 112
            ],
            [
                "id" => 3332,
                "campeonato_id" => 2,
                "rodada" => 34,
                "inicio" => "2017-11-12 00:00:00",
                "timecasa_id" => 132,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 102
            ],
            [
                "id" => 3342,
                "campeonato_id" => 2,
                "rodada" => 34,
                "inicio" => "2017-11-12 00:00:00",
                "timecasa_id" => 122,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 192
            ],
            [
                "id" => 3352,
                "campeonato_id" => 2,
                "rodada" => 34,
                "inicio" => "2017-11-12 00:00:00",
                "timecasa_id" => 82,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 142
            ],
            [
                "id" => 3362,
                "campeonato_id" => 2,
                "rodada" => 34,
                "inicio" => "2017-11-12 00:00:00",
                "timecasa_id" => 2,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 172
            ],
            [
                "id" => 3372,
                "campeonato_id" => 2,
                "rodada" => 34,
                "inicio" => "2017-11-12 00:00:00",
                "timecasa_id" => 72,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 32
            ],
            [
                "id" => 3382,
                "campeonato_id" => 2,
                "rodada" => 34,
                "inicio" => "2017-11-12 00:00:00",
                "timecasa_id" => 62,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 152
            ],
            [
                "id" => 3392,
                "campeonato_id" => 2,
                "rodada" => 34,
                "inicio" => "2017-11-12 00:00:00",
                "timecasa_id" => 42,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 12
            ],
            [
                "id" => 3402,
                "campeonato_id" => 2,
                "rodada" => 35,
                "inicio" => "2017-11-15 00:00:00",
                "timecasa_id" => 52,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 2
            ],
            [
                "id" => 3412,
                "campeonato_id" => 2,
                "rodada" => 35,
                "inicio" => "2017-11-15 00:00:00",
                "timecasa_id" => 182,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 12
            ],
            [
                "id" => 3422,
                "campeonato_id" => 2,
                "rodada" => 35,
                "inicio" => "2017-11-15 00:00:00",
                "timecasa_id" => 72,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 112
            ],
            [
                "id" => 3432,
                "campeonato_id" => 2,
                "rodada" => 35,
                "inicio" => "2017-11-15 00:00:00",
                "timecasa_id" => 132,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 172
            ],
            [
                "id" => 3442,
                "campeonato_id" => 2,
                "rodada" => 35,
                "inicio" => "2017-11-15 00:00:00",
                "timecasa_id" => 92,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 32
            ],
            [
                "id" => 3452,
                "campeonato_id" => 2,
                "rodada" => 35,
                "inicio" => "2017-11-15 00:00:00",
                "timecasa_id" => 82,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 102
            ],
            [
                "id" => 3462,
                "campeonato_id" => 2,
                "rodada" => 35,
                "inicio" => "2017-11-15 00:00:00",
                "timecasa_id" => 122,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 162
            ],
            [
                "id" => 3472,
                "campeonato_id" => 2,
                "rodada" => 35,
                "inicio" => "2017-11-15 00:00:00",
                "timecasa_id" => 42,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 152
            ],
            [
                "id" => 3482,
                "campeonato_id" => 2,
                "rodada" => 35,
                "inicio" => "2017-11-15 00:00:00",
                "timecasa_id" => 142,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 22
            ],
            [
                "id" => 3492,
                "campeonato_id" => 2,
                "rodada" => 35,
                "inicio" => "2017-11-15 00:00:00",
                "timecasa_id" => 62,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 192
            ],
            [
                "id" => 3502,
                "campeonato_id" => 2,
                "rodada" => 36,
                "inicio" => "2017-11-19 00:00:00",
                "timecasa_id" => 112,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 142
            ],
            [
                "id" => 3512,
                "campeonato_id" => 2,
                "rodada" => 36,
                "inicio" => "2017-11-19 00:00:00",
                "timecasa_id" => 102,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 72
            ],
            [
                "id" => 3522,
                "campeonato_id" => 2,
                "rodada" => 36,
                "inicio" => "2017-11-19 00:00:00",
                "timecasa_id" => 152,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 122
            ],
            [
                "id" => 3532,
                "campeonato_id" => 2,
                "rodada" => 36,
                "inicio" => "2017-11-19 00:00:00",
                "timecasa_id" => 12,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 82
            ],
            [
                "id" => 3542,
                "campeonato_id" => 2,
                "rodada" => 36,
                "inicio" => "2017-11-19 00:00:00",
                "timecasa_id" => 162,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 52
            ],
            [
                "id" => 3552,
                "campeonato_id" => 2,
                "rodada" => 36,
                "inicio" => "2017-11-19 00:00:00",
                "timecasa_id" => 22,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 182
            ],
            [
                "id" => 3562,
                "campeonato_id" => 2,
                "rodada" => 36,
                "inicio" => "2017-11-19 00:00:00",
                "timecasa_id" => 172,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 42
            ],
            [
                "id" => 3572,
                "campeonato_id" => 2,
                "rodada" => 36,
                "inicio" => "2017-11-19 00:00:00",
                "timecasa_id" => 192,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 92
            ],
            [
                "id" => 3582,
                "campeonato_id" => 2,
                "rodada" => 36,
                "inicio" => "2017-11-19 00:00:00",
                "timecasa_id" => 2,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 62
            ],
            [
                "id" => 3592,
                "campeonato_id" => 2,
                "rodada" => 36,
                "inicio" => "2017-11-19 00:00:00",
                "timecasa_id" => 32,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 132
            ],
            [
                "id" => 3602,
                "campeonato_id" => 2,
                "rodada" => 37,
                "inicio" => "2017-11-26 00:00:00",
                "timecasa_id" => 102,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 152
            ],
            [
                "id" => 3612,
                "campeonato_id" => 2,
                "rodada" => 37,
                "inicio" => "2017-11-26 00:00:00",
                "timecasa_id" => 112,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 172
            ],
            [
                "id" => 3622,
                "campeonato_id" => 2,
                "rodada" => 37,
                "inicio" => "2017-11-26 00:00:00",
                "timecasa_id" => 72,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 12
            ],
            [
                "id" => 3632,
                "campeonato_id" => 2,
                "rodada" => 37,
                "inicio" => "2017-11-26 00:00:00",
                "timecasa_id" => 132,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 52
            ],
            [
                "id" => 3642,
                "campeonato_id" => 2,
                "rodada" => 37,
                "inicio" => "2017-11-26 00:00:00",
                "timecasa_id" => 122,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 2
            ],
            [
                "id" => 3652,
                "campeonato_id" => 2,
                "rodada" => 37,
                "inicio" => "2017-11-26 00:00:00",
                "timecasa_id" => 92,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 182
            ],
            [
                "id" => 3662,
                "campeonato_id" => 2,
                "rodada" => 37,
                "inicio" => "2017-11-26 00:00:00",
                "timecasa_id" => 142,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 192
            ],
            [
                "id" => 3672,
                "campeonato_id" => 2,
                "rodada" => 37,
                "inicio" => "2017-11-26 00:00:00",
                "timecasa_id" => 82,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 162
            ],
            [
                "id" => 3682,
                "campeonato_id" => 2,
                "rodada" => 37,
                "inicio" => "2017-11-26 00:00:00",
                "timecasa_id" => 32,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 22
            ],
            [
                "id" => 3692,
                "campeonato_id" => 2,
                "rodada" => 37,
                "inicio" => "2017-11-26 00:00:00",
                "timecasa_id" => 42,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 62
            ],
            [
                "id" => 3702,
                "campeonato_id" => 2,
                "rodada" => 38,
                "inicio" => "2017-12-03 00:00:00",
                "timecasa_id" => 52,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 92
            ],
            [
                "id" => 3712,
                "campeonato_id" => 2,
                "rodada" => 38,
                "inicio" => "2017-12-03 00:00:00",
                "timecasa_id" => 182,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 142
            ],
            [
                "id" => 3722,
                "campeonato_id" => 2,
                "rodada" => 38,
                "inicio" => "2017-12-03 00:00:00",
                "timecasa_id" => 152,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 32
            ],
            [
                "id" => 3732,
                "campeonato_id" => 2,
                "rodada" => 38,
                "inicio" => "2017-12-03 00:00:00",
                "timecasa_id" => 162,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 42
            ],
            [
                "id" => 3742,
                "campeonato_id" => 2,
                "rodada" => 38,
                "inicio" => "2017-12-03 00:00:00",
                "timecasa_id" => 12,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 122
            ],
            [
                "id" => 3752,
                "campeonato_id" => 2,
                "rodada" => 38,
                "inicio" => "2017-12-03 00:00:00",
                "timecasa_id" => 22,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 132
            ],
            [
                "id" => 3762,
                "campeonato_id" => 2,
                "rodada" => 38,
                "inicio" => "2017-12-03 00:00:00",
                "timecasa_id" => 172,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 72
            ],
            [
                "id" => 3772,
                "campeonato_id" => 2,
                "rodada" => 38,
                "inicio" => "2017-12-03 00:00:00",
                "timecasa_id" => 192,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 102
            ],
            [
                "id" => 3782,
                "campeonato_id" => 2,
                "rodada" => 38,
                "inicio" => "2017-12-03 00:00:00",
                "timecasa_id" => 2,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 112
            ],
            [
                "id" => 3792,
                "campeonato_id" => 2,
                "rodada" => 38,
                "inicio" => "2017-12-03 00:00:00",
                "timecasa_id" => 62,
                "placar_casa" => null,
                "placar_fora" => null,
                "timefora_id" => 82
            ]
        ];

        foreach ($jogos as $jogo){
            Jogo::create($jogo);
        }
    }
}
