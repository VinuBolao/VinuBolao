<?php

namespace Bolao\Http\Controllers\API;

use Bolao\Models\Jogo;
use Bolao\Models\Palpite;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Bolao\Http\Controllers\Controller;
use Bolao\Traits\Calculator;

class PalpiteController extends Controller
{
    use Calculator;

    public function get($palpiteId = null)
    {
        if($palpiteId){
            return response()->json(Palpite::with('jogo', 'user')->findOrFail($palpiteId));
        } else {
            return response()->json(Palpite::with('jogo', 'user')->get());
        }
    }

    public function getPalpites($userId, $campeonatoId, $rodada = null)
    {
        if($rodada){
            $jogos = $this->mountJson($userId, $campeonatoId, $rodada);
            return response()->json($jogos);
        } else {
            return response()->json(
                Palpite::with('jogo', 'user')
                    ->where(['user_id' => $userId, 'campeonato_id' => $campeonatoId])
                    ->orderBy('inicio')
                    ->get()
            );
        }
    }

    public function getCompararPalpites($jogoId)
    {
        return response()->json(
            Palpite::join('users', 'users.id', '=', 'palpites.user_id')
                ->select('users.name', 'palpites.palpite_casa', 'palpites.palpite_fora')
                ->where(['palpites.jogo_id' => $jogoId])
                ->orderBy('users.name')
                ->get()
        );
    }

    public function save(Request $request)
    {
        if(Carbon::now('America/Sao_Paulo') > $request->inicio){
            return response()->json(['success' => false], 200);
        }
        if(isset($request->palpite_id)){
            $palpite = Palpite::find($request->palpite_id);
        } else {
            $palpite = new Palpite;
        }
        $palpite->jogo_id = $request->id;
        $palpite->user_id = $request->userId;
        $palpite->palpite_casa = $request->placar_casa;
        $palpite->palpite_fora = $request->placar_fora;
        $palpite->horario = Carbon::now();
        if($palpite->save()){
            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['success' => false], 400);
        }
    }

    private function mountJson($userId, $campeonatoId, $rodada)
    {
        $palpites = Palpite::with('jogo', 'user')->where(['user_id' => $userId])->get();
        $jogos = Jogo::with('timecasa', 'timefora')->where(['campeonato_id' => $campeonatoId, 'rodada' => $rodada])->orderBy('inicio')->get();
        foreach ($jogos as $jogo) {
            $placarMandante = $jogo->placar_casa;
            $placarVisitante = $jogo->placar_fora;
            $jogo->placar_casa = null;
            $jogo->placar_fora = null;
            $jogo->palpite_status = null;
            foreach ($palpites as $palpite) {
                if($jogo->id === $palpite->jogo_id){
                    $jogo->palpite_id = $palpite->id;
                    $jogo->placar_casa = $palpite->palpite_casa;
                    $jogo->placar_fora = $palpite->palpite_fora;
                    if(isset($placarMandante) && isset($placarVisitante)) {
                        $jogo->palpite_status = $this->calcularPontos($placarMandante, $placarVisitante, $palpite->palpite_casa, $palpite->palpite_fora)->pontosganhos;
                    }
                }
            }
        }
        return $jogos;
    }
}
