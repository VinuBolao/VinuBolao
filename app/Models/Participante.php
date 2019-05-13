<?php

namespace Bolao\Models;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    protected $fillable = ['user_id', 'bolao_id'];

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
