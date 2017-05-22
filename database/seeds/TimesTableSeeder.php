<?php

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
                'nome_completo' => 'Clube de Regatas do Flamengo',
                'nome_popular' => 'Flamengo',
                'sigla' => 'FLA',
                'eatadio' => 'Maracanã',
                'estado' => 'RJ',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Clube Atlético Paranaense',
                'nome_popular' =>  'Atlético-PR',
                'sigla' =>  'CAP',
                'eatadio' => 'Arena da Baixada',
                'estado' => 'PR',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Clube Atlético Mineiro',
                'nome_popular' =>  'Atlético-MG',
                'sigla' =>  'CAM',
                'eatadio' => 'Independência',
                'estado' => 'MG',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Botafogo de Futebol e Regatas',
                'nome_popular' =>  'Botafogo',
                'sigla' =>  'BOT',
                'eatadio' => 'Engenhão',
                'estado' => 'RJ',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Sport Club Corinthians Paulista',
                'nome_popular' =>  'Corinthians',
                'sigla' =>  'COR',
                'eatadio' => 'Arena Corinthians',
                'estado' => 'SP',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Coritiba Football Club',
                'nome_popular' =>  'Coritiba',
                'sigla' =>  'CTB',
                'eatadio' => 'Couto Pereira',
                'estado' => 'PR',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Cruzeiro Esporte Clube',
                'nome_popular' =>  'Cruzeiro',
                'sigla' =>  'CRU',
                'eatadio' => 'Mineirão',
                'estado' => 'MG',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Sport Club do Recife',
                'nome_popular' =>  'Sport',
                'sigla' =>  'SPT',
                'eatadio' => 'Ilha do Retiro',
                'estado' => 'PE',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Fluminense Football Club',
                'nome_popular' =>  'Fluminense',
                'sigla' =>  'FLU',
                'eatadio' => 'Maracanã',
                'estado' => 'RJ',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Grêmio Foot-Ball Porto-Alegrense',
                'nome_popular' =>  'Grêmio',
                'sigla' =>  'GRE',
                'eatadio' => 'Arena Grêmio',
                'estado' => 'RS',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Associação Chapecoense de Futebol',
                'nome_popular' =>  'Chapecoense',
                'sigla' =>  'CHA',
                'eatadio' => 'Arena Condá',
                'estado' => 'SC',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Sociedade Esportiva Palmeiras',
                'nome_popular' =>  'Palmeiras',
                'sigla' =>  'PAL',
                'eatadio' => 'Allianz Parque',
                'estado' => 'SP',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Associação Atlética Ponte Preta',
                'nome_popular' =>  'Ponte Preta',
                'sigla' =>  'PON',
                'eatadio' => 'Moisés Lucarelli',
                'estado' => 'SP',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Esporte Clube Vitória',
                'nome_popular' =>  'Vitória',
                'sigla' =>  'VIT',
                'eatadio' => 'Fonte Nova',
                'estado' => 'BA',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Santos Futebol Clube',
                'nome_popular' =>  'Santos',
                'sigla' =>  'SAN',
                'eatadio' => 'Vila Belmiro',
                'estado' => 'SP',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'São Paulo Futebol Clube',
                'nome_popular' =>  'São Paulo',
                'sigla' =>  'SPA',
                'eatadio' => 'Morumbi',
                'estado' => 'SP',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Atlético Clube Goianiense',
                'nome_popular' =>  'Atlético-GO',
                'sigla' =>  'ACG',
                'eatadio' => 'Serra Dourada',
                'estado' => 'GO',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Avaí Futebol Clube',
                'nome_popular' =>  'Avaí',
                'sigla' =>  'AVA',
                'eatadio' => 'Ressacada',
                'estado' => 'SC',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Esporte Clube Bahia',
                'nome_popular' =>  'Bahia',
                'sigla' =>  'BAH',
                'eatadio' => 'Fonte Nova',
                'estado' => 'BA',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Club de Regatas Vasco da Gama',
                'nome_popular' =>  'Vasco',
                'sigla' =>  'VAS',
                'eatadio' => 'São Januário',
                'estado' => 'RJ',
                'pais' => 'Brasil'
            ]
        ];

        foreach($equipes as $equipe) {
            Time::create($equipe);
        }
    }
}
