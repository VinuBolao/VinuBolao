<?php

namespace Bolao\Models;

use Illuminate\Database\Eloquent\Model;

class Bolao extends Model
{
    protected $table = 'bolaos';

    protected $fillable = ['nome', 'inicio', 'descricao', 'campeonato_id', 'user_id', 'ativo'];

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
