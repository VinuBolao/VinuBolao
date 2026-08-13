<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bolao extends Model
{
    use HasFactory;

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

    protected $casts = [
        'ativo' => 'boolean',
    ];

    public $order = "ativo DESC, inicio DESC";

    protected function inicio(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::createFromFormat('Y-m-d', $value)->format('m/d/Y'),
        );
    }

    public function rules()
    {
        return [
            "user_id" => "required|exists:users,id",
            "campeonato_id" => "required|exists:campeonatos,id",
            "nome" => "required|min:3|max:50",
            "placar_exato" => "required|integer",
            "placar_vencedor" => "required|integer",
            "rodada_dobro" => "nullable|integer",
            "inicio" => "required",
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function campeonato()
    {
        return $this->belongsTo(Campeonato::class);
    }

    public function getCurrentForUser($userId)
    {
        $bolao = self::select(
                'bolaos.*',
                'participantes.id as participante_id',
                'participantes.pontosganhos as participante_pontosganhos',
                'participantes.placarexato as participante_placar_exato',
                'participantes.placarvencedor as participante_placar_vencedor',
            )
            ->with('campeonato')
            ->join('participantes', 'participantes.bolao_id', '=', 'bolaos.id')
            ->join('users', 'users.id', '=', 'participantes.user_id')
            ->where('participantes.user_id', $userId)
            ->where('bolaos.ativo', 1)
            ->whereColumn('bolaos.id', 'users.current_bolao_id')
            ->first();

        if ($bolao) {
            $bolao->setRelation('currentUser', User::find($userId));
        }

        return $bolao;
    }

    public function getAllForUser($userId)
    {
        return self::select('bolaos.*', 'users.name as user_name')
            ->join('participantes', 'participantes.bolao_id', '=', 'bolaos.id')
            ->join('users', 'users.id', '=', 'bolaos.user_id')
            ->where('participantes.user_id', $userId);
    }

    public function getActiveForUser($userId)
    {
        return self::select('bolaos.*', 'user_participant.current_bolao_id')
            ->join('participantes', 'participantes.bolao_id', '=', 'bolaos.id')
            ->join('users as user_participant', 'user_participant.id', '=', 'participantes.user_id')
            ->where('participantes.user_id', $userId)
            ->where('bolaos.ativo', 1)
            ->get();
    }
}
