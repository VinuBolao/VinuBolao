<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campeonato extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'nome_completo',
        'qtd_times',
        'qtd_rodadas',
        'rodada',
        'temporada',
        'serie',
        'estado',
        'pais',
        'inicio',
        'termino'
    ];

    public $order = "nome ASC";

    public function rules()
    {
        return [
            "nome" => "required|min:3|max:50",
            "nome_completo" => "required|min:3|max:100",
            "qtd_times" => "required",
            "qtd_rodadas" => "required",
            "rodada" => "required",
            "temporada" => "required",
            "serie" => "required|min:1|max:1",
            "estado" => "nullable|min:2|max:2",
            "pais" => "required|min:3|max:50",
            "inicio" => "required",
            "termino" => "required",
        ];
    }
}
