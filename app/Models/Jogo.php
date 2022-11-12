<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    use HasFactory;

    protected $fillable = [
        'bolao_id', 'campeonato_id', 'rodada', 'inicio', 'timecasa_id', 'placar_casa', 'placar_fora', 'timefora_id'
    ];

    protected $guarded = ['id'];

    protected $appends = ['inicio_format'];

    public $order = "inicio ASC, rodada ASC";

    protected $casts = [
        'rodada' => 'integer',
    ];

    protected function inicioFormat(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attr) => Carbon::createFromFormat('Y-m-d H:i:s', $attr['inicio'])
                ->locale('pt')
                ->translatedFormat('D d/m H:i'),
        );
    }

    public function rules()
    {
        return [
            "bolao_id" => "required|exists:bolaos,id",
            "campeonato_id" => "required|exists:campeonatos,id",
            "timecasa_id" => "required|exists:times,id",
            "timefora_id" => "required|exists:times,id",
            "rodada" => "required|integer",
            "inicio" => "required",
        ];
    }

    public function bolao()
    {
        return $this->belongsTo(Bolao::class);
    }

    public function palpite()
    {
        return $this->hasOne(Palpite::class);
    }

    public function campeonato()
    {
        return $this->belongsTo(Campeonato::class);
    }

    public function timecasa()
    {
        return $this->belongsTo(Time::class, 'timecasa_id', 'id');
    }

    public function timefora()
    {
        return $this->belongsTo(Time::class, 'timefora_id', 'id');
    }
}
