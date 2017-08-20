<?php

namespace Bolao\Http\Controllers\API;

use Bolao\Models\Jogo;
use Bolao\Models\Palpite;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Bolao\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PalpiteController extends Controller
{
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
            $palpites = Palpite::with('jogo', 'user')->where(['user_id' => $userId])->get();
            $jogos = Jogo::with('timecasa', 'timefora')->where(['campeonato_id' => $campeonatoId, 'rodada' => $rodada])->orderBy('inicio')->get();

            foreach ($jogos as $jogo) {
                $jogo->placar_casa = null;
                $jogo->placar_fora = null;

                foreach ($palpites as $palpite) {
                    if($jogo->id === $palpite->jogo_id){
                        $jogo->palpite_id = $palpite->id;
                        $jogo->placar_casa = $palpite->palpite_casa;
                        $jogo->placar_fora = $palpite->palpite_fora;
                    }
                }
            }

            return response()->json($jogos);
        } else {
            return response()->json(
                Palpite::with('jogo', 'user')->where(['user_id' => $userId, 'campeonato_id' => $campeonatoId])->orderBy('inicio')->get()
            );
        }
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
}
