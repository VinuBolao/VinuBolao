<?php

namespace Bolao\Http\Controllers\API;

use Bolao\Models\User;
use Bolao\Models\Bolao;
use Bolao\Models\Participante;
use Bolao\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParticipanteController extends Controller
{
    public function get($participanteId = null)
    {
        if($participanteId){
            return response()->json(Participante::with('user')->findOrFail($participanteId));
        } else {
            return response()->json(Participante::with('user')->get());
        }
    }

    public function getBolao($bolaoId = null)
    {
        return response()->json(Participante::with('user')->where('bolao_id', $bolaoId)->get());
    }

    public function getRanking($rodada = null)
    {
        $placar_exato = 10;
        $placar_vencedor = 7;
        $rodada_dobro = 13;

        $sql = 'u.name,
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
                WHEN (j.bolao_id = 12 AND j.rodada >= ' . $rodada_dobro . ') THEN 
                    CASE
                        WHEN (j.placar_casa = p.palpite_casa) AND (j.placar_fora = p.palpite_fora) THEN ' . ($placar_exato * 2) . ' 
                        WHEN (j.placar_casa - j.placar_fora = 0) AND (p.palpite_casa - p.palpite_fora = 0) THEN ' . ($placar_vencedor * 2) . ' 
                        WHEN (j.placar_casa - j.placar_fora > 0) AND (p.palpite_casa - p.palpite_fora > 0) THEN ' . ($placar_vencedor * 2) . ' 
                        WHEN (j.placar_casa - j.placar_fora < 0) AND (p.palpite_casa - p.palpite_fora < 0) THEN ' . ($placar_vencedor * 2) . ' 
                        ELSE 0
                    END
                ELSE
                    CASE
                        WHEN (j.placar_casa = p.palpite_casa) AND (j.placar_fora = p.palpite_fora) THEN ' . $placar_exato . ' 
                        WHEN (j.placar_casa - j.placar_fora = 0) AND (p.palpite_casa - p.palpite_fora = 0) THEN ' . $placar_vencedor . ' 
                        WHEN (j.placar_casa - j.placar_fora > 0) AND (p.palpite_casa - p.palpite_fora > 0) THEN ' . $placar_vencedor . ' 
                        WHEN (j.placar_casa - j.placar_fora < 0) AND (p.palpite_casa - p.palpite_fora < 0) THEN ' . $placar_vencedor . ' 
                        ELSE 0
                    END
                END
            ) AS pontosganhos';

        $bolao = Bolao::with('campeonato')->where('ativo', 1)->orderByDesc('id')->first();
        $ranking = DB::table('palpites AS p')
            ->join('jogos AS j', 'j.id', '=', 'p.jogo_id')
            ->join('users AS u', 'u.id', '=', 'p.user_id')
            ->select(DB::raw($sql))
            ->whereRaw(($rodada) ? "j.bolao_id = $bolao->id AND j.rodada = $rodada" : "j.bolao_id = $bolao->id")
            ->orderBy('pontosganhos', 'DESC')
            ->orderBy('placarexato', 'DESC')
            ->orderBy('placarvencedor', 'DESC')
            ->groupBy('u.name', 'ASC')
            ->get();

        return response()->json($ranking, 200);
    }

    public function create(Request $request) {
        $user = User::findOrFail($request->userId);
        $participante = new Participante;
        $participante->user_id = $request->userId;
        $participante->bolao_id = $request->bolaoId;
        if($participante->save()) {
            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['success' => false], 400);
        }
    }

    public function destroy($participanteId) {
        $participante = Participante::findOrFail($participanteId);
        if($participante->delete()) {
            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['success' => false], 400);
        }
    }
}
