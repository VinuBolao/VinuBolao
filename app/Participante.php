<?php

namespace Bolao;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    protected $fillable = ['user_id', 'bolao_id'];

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('Bolao\User', 'user_id', 'id')->orderBy('name');
    }
}
