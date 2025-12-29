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

    public function getByUser($id)
    {
        return Participante::join('users', 'users.id', '=', 'participantes.user_id')
            ->join('bolaos', 'bolaos.id', '=', 'participantes.bolao_id')
            ->join('campeonatos', 'campeonatos.id', '=', 'bolaos.campeonato_id')
            ->where('participantes.user_id', $id)
            ->where('bolaos.ativo', 1)
            ->whereColumn('bolaos.id', 'users.current_bolao_id')
            ->first();
    }

    public function listByUser($id)
    {
        return Participante::select('bolaos.*', 'users.name as user_name')
            ->join('bolaos', 'bolaos.id', '=', 'participantes.bolao_id')
            ->join('users', 'users.id', '=', 'bolaos.user_id')
            ->where('participantes.user_id', $id);
    }

    public function listForSelectByUser($id)
    {
        return Participante::select('bolaos.*', 'users.current_bolao_id')
            ->join('bolaos', 'bolaos.id', '=', 'participantes.bolao_id')
            ->join('users', 'users.id', '=', 'bolaos.user_id')
            ->where('participantes.user_id', $id)
            ->where('bolaos.ativo', 1)
            ->get();
    }
}
