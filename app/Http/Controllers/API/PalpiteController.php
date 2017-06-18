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
}
