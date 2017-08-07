<?php

use Bolao\Models\Time;
use Illuminate\Database\Seeder;

class TimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $equipes = [
            [
                "id" => 2,
                "nome" => "Atlético-GO",
                "nome_completo" => "Atlético Clube Goianiense",
                "sigla" => "ACG",
                "estadio" => "Serra Dourada",
                "estado" => "GO",
                "pais" => "Brasil"
            ],
            [
                "id" => 12,
                "nome" => "Atlético-MG",
                "nome_completo" => "Clube Atlético Mineiro",
                "sigla" => "CAM",
                "estadio" => "Independência",
                "estado" => "MG",
                "pais" => "Brasil"
            ],
            [
                "id" => 22,
                "nome" => "Atlético-PR",
                "nome_completo" => "Clube Atlético Paranaense",
                "sigla" => "CAP",
                "estadio" => "Arena da Baixada",
                "estado" => "PR",
                "pais" => "Brasil"
            ],
            [
                "id" => 32,
                "nome" => "Avaí",
                "nome_completo" => "Avaí Futebol Clube",
                "sigla" => "AVA",
                "estadio" => "Ressacada",
                "estado" => "SC",
                "pais" => "Brasil"
            ],
            [
                "id" => 42,
                "nome" => "Bahia",
                "nome_completo" => "Esporte Clube Bahia",
                "sigla" => "BAH",
                "estadio" => "Fonte Nova",
                "estado" => "BA",
                "pais" => "Brasil"
            ],
            [
                "id" => 52,
                "nome" => "Botafogo",
                "nome_completo" => "Botafogo de Futebol e Regatas",
                "sigla" => "BOT",
                "estadio" => "Engenhão",
                "estado" => "RJ",
                "pais" => "Brasil"
            ],
            [
                "id" => 62,
                "nome" => "Chapecoense",
                "nome_completo" => "Associação Chapecoense de Futebol",
                "sigla" => "CHA",
                "estadio" => "Arena Condá",
                "estado" => "SC",
                "pais" => "Brasil"
            ],
            [
                "id" => 72,
                "nome" => "Corinthians",
                "nome_completo" => "Sport Club Corinthians Paulista",
                "sigla" => "COR",
                "estadio" => "Arena Corinthians",
                "estado" => "SP",
                "pais" => "Brasil"
            ],
            [
                "id" => 82,
                "nome" => "Coritiba",
                "nome_completo" => "Coritiba Football Club",
                "sigla" => "CTB",
                "estadio" => "Couto Pereira",
                "estado" => "PR",
                "pais" => "Brasil"
            ],
            [
                "id" => 92,
                "nome" => "Cruzeiro",
                "nome_completo" => "Cruzeiro Esporte Clube",
                "sigla" => "CRU",
                "estadio" => "Mineirão",
                "estado" => "MG",
                "pais" => "Brasil"
            ],
            [
                "id" => 102,
                "nome" => "Flamengo",
                "nome_completo" => "Clube de Regatas do Flamengo",
                "sigla" => "FLA",
                "estadio" => "Maracanã",
                "estado" => "RJ",
                "pais" => "Brasil"
            ],
            [
                "id" => 112,
                "nome" => "Fluminense",
                "nome_completo" => "Fluminense Football Club",
                "sigla" => "FLU",
                "estadio" => "Maracanã",
                "estado" => "RJ",
                "pais" => "Brasil"
            ],
            [
                "id" => 122,
                "nome" => "Grêmio",
                "nome_completo" => "Grêmio Foot-Ball Porto-Alegrense",
                "sigla" => "GRE",
                "estadio" => "Arena Grêmio",
                "estado" => "RS",
                "pais" => "Brasil"
            ],
            [
                "id" => 132,
                "nome" => "Palmeiras",
                "nome_completo" => "Sociedade Esportiva Palmeiras",
                "sigla" => "PAL",
                "estadio" => "Allianz Parque",
                "estado" => "SP",
                "pais" => "Brasil"
            ],
            [
                "id" => 142,
                "nome" => "Ponte Preta",
                "nome_completo" => "Associação Atlética Ponte Preta",
                "sigla" => "PON",
                "estadio" => "Moisés Lucarelli",
                "estado" => "SP",
                "pais" => "Brasil"
            ],
            [
                "id" => 152,
                "nome" => "Santos",
                "nome_completo" => "Santos Futebol Clube",
                "sigla" => "SAN",
                "estadio" => "Vila Belmiro",
                "estado" => "SP",
                "pais" => "Brasil"
            ],
            [
                "id" => 162,
                "nome" => "São Paulo",
                "nome_completo" => "São Paulo Futebol Clube",
                "sigla" => "SPA",
                "estadio" => "Morumbi",
                "estado" => "SP",
                "pais" => "Brasil"
            ],
            [
                "id" => 172,
                "nome" => "Sport",
                "nome_completo" => "Sport Club do Recife",
                "sigla" => "SPT",
                "estadio" => "Ilha do Retiro",
                "estado" => "PE",
                "pais" => "Brasil"
            ],
            [
                "id" => 182,
                "nome" => "Vasco",
                "nome_completo" => "Club de Regatas Vasco da Gama",
                "sigla" => "VAS",
                "estadio" => "São Januário",
                "estado" => "RJ",
                "pais" => "Brasil"
            ],
            [
                "id" => 192,
                "nome" => "Vitória",
                "nome_completo" => "Esporte Clube Vitória",
                "sigla" => "VIT",
                "estadio" => "Fonte Nova",
                "estado" => "BA",
                "pais" => "Brasil"
            ]
        ];

        foreach($equipes as $equipe) {
            Time::create($equipe);
        }
    }
}
