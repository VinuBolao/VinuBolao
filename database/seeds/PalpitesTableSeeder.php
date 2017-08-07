<?php

use Bolao\Models\Palpite;
use Illuminate\Database\Seeder;

class PalpitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $palpites = [
            [
                "jogo_id" => 2,
                "user_id" => 2,
                "palpite_casa" => 1,
                "palpite_fora" => 2,
                "horario" => "2017-06-18 00:00:00"
            ],
            [
                "jogo_id" => 12,
                "user_id" => 2,
                "palpite_casa" => 2,
                "palpite_fora" => 0,
                "horario" => "2017-06-18 00:00:00"
            ],
            [
                "jogo_id" => 22,
                "user_id" => 2,
                "palpite_casa" => 2,
                "palpite_fora" => 1,
                "horario" => "2017-06-18 00:00:00"
            ],
            [
                "jogo_id" => 32,
                "user_id" => 2,
                "palpite_casa" => 1,
                "palpite_fora" => 0,
                "horario" => "2017-06-18 00:00:00"
            ],
            [
                "jogo_id" => 42,
                "user_id" => 2,
                "palpite_casa" => 2,
                "palpite_fora" => 0,
                "horario" => "2017-06-18 00:00:00"
            ],
            [
                "jogo_id" => 52,
                "user_id" => 2,
                "palpite_casa" => 1,
                "palpite_fora" => 1,
                "horario" => "2017-06-18 00:00:00"
            ],
            [
                "jogo_id" => 62,
                "user_id" => 2,
                "palpite_casa" => 2,
                "palpite_fora" => 1,
                "horario" => "2017-06-18 00:00:00"
            ],
            [
                "jogo_id" => 72,
                "user_id" => 2,
                "palpite_casa" => 1,
                "palpite_fora" => 0,
                "horario" => "2017-06-18 00:00:00"
            ],
            [
                "jogo_id" => 82,
                "user_id" => 2,
                "palpite_casa" => 1,
                "palpite_fora" => 0,
                "horario" => "2017-06-18 00:00:00"
            ],
            [
                "jogo_id" => 92,
                "user_id" => 2,
                "palpite_casa" => 2,
                "palpite_fora" => 1,
                "horario" => "2017-06-18 00:00:00"
            ]
        ];

        foreach ($palpites as $palpite){
            Palpite::create($palpite);
        }
    }
}
