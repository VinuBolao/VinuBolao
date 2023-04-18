<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Participante extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'bolao_id'];

    protected $guarded = ['id'];

    protected $appends = ['created_format'];

    protected function createdFormat(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attr) => Carbon::createFromFormat('Y-m-d H:i:s', $attr['created_at'])->format('d/m/Y'),
        );
    }

    public function rules()
    {
        return [
            "user_id" => "required|exists:users,id",
            "bolao_id" => "required|exists:bolaos,id",
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function bolao()
    {
        return $this->belongsTo(Bolao::class, 'bolao_id', 'id');
    }

    public function getByBolao($id)
    {
        return $this->join('users', 'users.id', '=', 'user_id')
            ->where('bolao_id', $id)
            ->orderBy('users.name')
            ->get();
    }

    public function getRanking($bolaoId, $rodada = null, $turno = null)
    {
        $bolao = Bolao::findOrFail($bolaoId);

        $sql = 'u.id, u.name,
            SUM(CASE
                WHEN (j.placar_casa = p.palpite_casa) AND (j.placar_fora = p.palpite_fora) THEN 1
                WHEN (j.placar_casa - j.placar_fora = 0) AND (p.palpite_casa - p.palpite_fora = 0) THEN 0
                WHEN (j.placar_casa - j.placar_fora > 0) AND (p.palpite_casa - p.palpite_fora > 0) THEN 0
                WHEN (j.placar_casa - j.placar_fora < 0) AND (p.palpite_casa - p.palpite_fora < 0) THEN 0
                ELSE 0
            END) AS placarexato,
            SUM(CASE
                WHEN (j.placar_casa = p.palpite_casa) AND (j.placar_fora = p.palpite_fora) THEN 0
                WHEN (j.placar_casa - j.placar_fora = 0) AND (p.palpite_casa - p.palpite_fora = 0) THEN 1
                WHEN (j.placar_casa - j.placar_fora > 0) AND (p.palpite_casa - p.palpite_fora > 0) THEN 1
                WHEN (j.placar_casa - j.placar_fora < 0) AND (p.palpite_casa - p.palpite_fora < 0) THEN 1
                ELSE 0
            END) AS placarvencedor,
            SUM(
            CASE
                WHEN (j.rodada >= b.rodada_dobro) THEN
                    CASE
                        WHEN (j.placar_casa = p.palpite_casa) AND (j.placar_fora = p.palpite_fora) THEN b.placar_exato * 2
                        WHEN (j.placar_casa - j.placar_fora = 0) AND (p.palpite_casa - p.palpite_fora = 0) THEN b.placar_vencedor * 2
                        WHEN (j.placar_casa - j.placar_fora > 0) AND (p.palpite_casa - p.palpite_fora > 0) THEN b.placar_vencedor * 2
                        WHEN (j.placar_casa - j.placar_fora < 0) AND (p.palpite_casa - p.palpite_fora < 0) THEN b.placar_vencedor * 2
                        ELSE 0
                    END
                ELSE
                    CASE
                        WHEN (j.placar_casa = p.palpite_casa) AND (j.placar_fora = p.palpite_fora) THEN b.placar_exato
                        WHEN (j.placar_casa - j.placar_fora = 0) AND (p.palpite_casa - p.palpite_fora = 0) THEN b.placar_vencedor
                        WHEN (j.placar_casa - j.placar_fora > 0) AND (p.palpite_casa - p.palpite_fora > 0) THEN b.placar_vencedor
                        WHEN (j.placar_casa - j.placar_fora < 0) AND (p.palpite_casa - p.palpite_fora < 0) THEN b.placar_vencedor
                        ELSE 0
                    END
                END
            ) AS pontosganhos';

        $whereRaw = ($rodada) ? "j.campeonato_id = $bolao->campeonato_id AND j.rodada = $rodada" : "j.campeonato_id = $bolao->campeonato_id";

        if ($turno == 1) $whereRaw = "j.campeonato_id = $bolao->campeonato_id AND j.rodada < 20";
        if ($turno == 2) $whereRaw = "j.campeonato_id = $bolao->campeonato_id AND j.rodada > 19";

        return DB::table('palpites AS p')
            ->join('jogos AS j', 'j.id', '=', 'p.jogo_id')
            ->join('users AS u', 'u.id', '=', 'p.user_id')
            ->join('bolaos AS b', 'b.id', '=', 'j.bolao_id')
            ->select(DB::raw($sql))
            ->whereRaw($whereRaw)
            ->orderBy('pontosganhos', 'DESC')
            ->orderBy('placarexato', 'DESC')
            ->orderBy('placarvencedor', 'DESC')
            ->orderBy('name', 'ASC')
            ->groupBy('u.id')
            ->groupBy('u.name')
            ->get();
    }
}
