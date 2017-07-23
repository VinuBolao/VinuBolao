<?php

namespace Bolao\Http\Controllers\API;

use Bolao\Jogo;
use Bolao\Palpite;
use Illuminate\Http\Request;
use Bolao\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PalpiteController extends Controller
{
    public function get($id = null)
    {
        if($id){
            return response()->json(Palpite::with('jogo', 'user')->findOrFail());
        } else {
            return response()->json(Palpite::with('jogo', 'user')->get());
        }
    }

    public function get_palpites($campeonato_id, $rodada = null)
    {
        if($rodada){
            $palpites = Palpite::with('jogo', 'user')->where(['user_id' => Auth::id()])->get();
            $jogos = Jogo::with('timecasa', 'timefora')->where(['campeonato_id' => $campeonato_id, 'rodada' => $rodada])->get();

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
                Palpite::with('jogo', 'user')->where(['user_id' => Auth::id(), 'campeonato_id' => $campeonato_id])->get()
            );
        }
    }

    public function save(Request $request)
    {
        if(isset($request->palpite_id)){
            $palpite = Palpite::find($request->palpite_id);
        } else {
            $palpite = new Palpite;
        }

        $palpite->jogo_id = $request->id;
        $palpite->user_id = $request->userId;
        $palpite->palpite_casa = $request->placar_casa;
        $palpite->palpite_fora = $request->placar_fora;
        $palpite->horario = "2017-06-18 00:00:00";
        if($palpite->save()){
            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['success' => false], 400);
        }
    }
}
