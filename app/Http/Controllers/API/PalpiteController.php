<?php

namespace Bolao\Http\Controllers\API;

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

    public function get_campeonato($id, $rodada = null)
    {
        if($rodada){
            $condition = ['user_id' => Auth::user()->id, 'campeonato_id' => $id, 'rodada' => $rodada];
            return response()->json(Palpite::with('jogo', 'user')->where($condition)->get());
        } else {
            $condition = ['user_id' => Auth::user()->id, 'campeonato_id' => $id];
            return response()->json(Palpite::with('jogo', 'user')->where($condition)->get());
        }
    }

    public function save(Request $request, $id = null)
    {
        if($id){
            $palpite = Palpite::findOrFail($id);
        } else {
            $palpite = new Palpite;
        }

        $palpite->jogo_id = $request->id;
        $palpite->user_id = 1;
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
