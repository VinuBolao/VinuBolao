<?php

namespace Bolao;

use Illuminate\Database\Eloquent\Model;

class Campeonato extends Model
{
    protected $fillable = [
        'nome', 'nome_completo', 'qtd_times', 'qtd_rodadas', 'rodada', 'temporada', 'serie', 'estado', 'pais', 'inicio', 'termino'
    ];
}
