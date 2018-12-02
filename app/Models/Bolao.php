<?php

namespace Bolao\Models;

use Illuminate\Database\Eloquent\Model;

class Bolao extends Model
{
    protected $table = 'bolaos';

    protected $fillable = [
        'nome', 
        'ativo',
        'inicio', 
        'user_id', 
        'descricao', 
        'rodada_dobro', 
        'placar_exato', 
        'campeonato_id',
        'placar_vencedor',
    ];

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('Bolao\Models\User');
    }

    public function campeonato()
    {
        return $this->belongsTo('Bolao\Models\Campeonato');
    }
}
