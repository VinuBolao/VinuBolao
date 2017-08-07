<?php

namespace Bolao\Models;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $fillable = [
        'nome', 'nome_completo', 'sigla', 'estadio', 'estado', 'pais'
    ];

    protected $guarded = [
        'id'
    ];
}
