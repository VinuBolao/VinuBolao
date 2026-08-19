<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Palpite extends Model
{
    use HasFactory;

    protected $fillable = ['participante_id', 'jogo_id', 'palpite_casa', 'palpite_fora', 'horario'];

    protected $guarded = ['id'];

    protected $casts = [
        'palpite_casa' => 'integer',
        'palpite_fora' => 'integer',
    ];

    public function rules()
    {
        return [
            "jogo_id" => "required|exists:jogos,id",
            "palpite_casa" => "nullable|integer",
            "palpite_fora" => "nullable|integer",
            "horario" => "sometimes",
        ];
    }

    public function participante()
    {
        return $this->belongsTo(Participante::class);
    }

    public function jogo()
    {
        return $this->belongsTo(Jogo::class)->with('timecasa', 'timefora');
    }
}
