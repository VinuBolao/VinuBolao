<?php

namespace Bolao;

use Illuminate\Database\Eloquent\Model;

class Palpite extends Model
{
    protected $fillable = ['user_id', 'jogo_id', 'palpite_casa', 'palpite_fora', 'horario'];

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('Bolao\User');
    }

    public function jogo()
    {
        return $this->belongsTo('Bolao\Jogo');
    }
}
