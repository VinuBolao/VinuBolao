<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Palpite extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'jogo_id', 'palpite_casa', 'palpite_fora', 'horario'];

    protected $guarded = ['id'];

    protected $casts = [
        'palpite_casa' => 'integer',
        'palpite_fora' => 'integer',
    ];

    public function rules()
    {
        return [
            "jogo_id" => "required|exists:jogos,id",
            "user_id" => "required|exists:users,id",
            "palpite_casa" => "nullable|integer",
            "palpite_fora" => "nullable|integer",
            "horario" => "required",
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class)->orderBy('name');
    }

    public function jogo()
    {
        return $this->belongsTo(Jogo::class)->with('timecasa', 'timefora');
    }
}
