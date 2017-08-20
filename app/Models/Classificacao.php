<?php

namespace Bolao\Models;

use Illuminate\Database\Eloquent\Model;

class Classificacao extends Model
{
    protected $fillable = ['user_id', 'bolao_id', 'rodada', 'pontos', 'placarexato', 'placarvencedor'];

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('Bolao\Models\User', 'user_id', 'id');
    }

    public function bolao()
    {
        return $this->belongsTo('Bolao\Models\Bolao', 'bolao_id', 'id');
    }
}
