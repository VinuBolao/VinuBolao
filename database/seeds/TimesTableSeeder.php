<?php

use Bolao\Time;
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
                'nome' => 'Flamengo',
                'sigla' => 'FLA',
                'estadio' => 'Maracanã',
                'estado' => 'RJ',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Clube Atlético Paranaense',
                'nome' =>  'Atlético-PR',
                'sigla' =>  'CAP',
                'estadio' => 'Arena da Baixada',
                'estado' => 'PR',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Clube Atlético Mineiro',
                'nome' =>  'Atlético-MG',
                'sigla' =>  'CAM',
                'estadio' => 'Independência',
                'estado' => 'MG',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Botafogo de Futebol e Regatas',
                'nome' =>  'Botafogo',
                'sigla' =>  'BOT',
                'estadio' => 'Engenhão',
                'estado' => 'RJ',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Sport Club Corinthians Paulista',
                'nome' =>  'Corinthians',
                'sigla' =>  'COR',
                'estadio' => 'Arena Corinthians',
                'estado' => 'SP',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Coritiba Football Club',
                'nome' =>  'Coritiba',
                'sigla' =>  'CTB',
                'estadio' => 'Couto Pereira',
                'estado' => 'PR',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Cruzeiro Esporte Clube',
                'nome' =>  'Cruzeiro',
                'sigla' =>  'CRU',
                'estadio' => 'Mineirão',
                'estado' => 'MG',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Sport Club do Recife',
                'nome' =>  'Sport',
                'sigla' =>  'SPT',
                'estadio' => 'Ilha do Retiro',
                'estado' => 'PE',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Fluminense Football Club',
                'nome' =>  'Fluminense',
                'sigla' =>  'FLU',
                'estadio' => 'Maracanã',
                'estado' => 'RJ',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Grêmio Foot-Ball Porto-Alegrense',
                'nome' =>  'Grêmio',
                'sigla' =>  'GRE',
                'estadio' => 'Arena Grêmio',
                'estado' => 'RS',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Associação Chapecoense de Futebol',
                'nome' =>  'Chapecoense',
                'sigla' =>  'CHA',
                'estadio' => 'Arena Condá',
                'estado' => 'SC',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Sociedade Esportiva Palmeiras',
                'nome' =>  'Palmeiras',
                'sigla' =>  'PAL',
                'estadio' => 'Allianz Parque',
                'estado' => 'SP',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Associação Atlética Ponte Preta',
                'nome' =>  'Ponte Preta',
                'sigla' =>  'PON',
                'estadio' => 'Moisés Lucarelli',
                'estado' => 'SP',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Esporte Clube Vitória',
                'nome' =>  'Vitória',
                'sigla' =>  'VIT',
                'estadio' => 'Fonte Nova',
                'estado' => 'BA',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Santos Futebol Clube',
                'nome' =>  'Santos',
                'sigla' =>  'SAN',
                'estadio' => 'Vila Belmiro',
                'estado' => 'SP',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'São Paulo Futebol Clube',
                'nome' =>  'São Paulo',
                'sigla' =>  'SPA',
                'estadio' => 'Morumbi',
                'estado' => 'SP',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Atlético Clube Goianiense',
                'nome' =>  'Atlético-GO',
                'sigla' =>  'ACG',
                'estadio' => 'Serra Dourada',
                'estado' => 'GO',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Avaí Futebol Clube',
                'nome' =>  'Avaí',
                'sigla' =>  'AVA',
                'estadio' => 'Ressacada',
                'estado' => 'SC',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Esporte Clube Bahia',
                'nome' =>  'Bahia',
                'sigla' =>  'BAH',
                'estadio' => 'Fonte Nova',
                'estado' => 'BA',
                'pais' => 'Brasil'
            ],[
                'nome_completo' => 'Club de Regatas Vasco da Gama',
                'nome' =>  'Vasco',
                'sigla' =>  'VAS',
                'estadio' => 'São Januário',
                'estado' => 'RJ',
                'pais' => 'Brasil'
            ]
        ];

        foreach($equipes as $equipe) {
            Time::create($equipe);
        }
    }
}
