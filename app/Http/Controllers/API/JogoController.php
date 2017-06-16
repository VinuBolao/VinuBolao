<?php

namespace Bolao\Http\Controllers\API;

use Bolao\Jogo;
use Illuminate\Http\Request;
use Bolao\Http\Controllers\Controller;

class JogoController extends Controller
{
    public function get($id = null)
    {
        if($id){
            return response()->json(Jogo::findOrFail($id));
        } else {
            return response()->json(Jogo::all());
        }
    }

    public function get_campeonato($id, $rodada = null)
    {
        if ($rodada){
            $jogos = Jogo::with('timecasa', 'timefora')->where(['campeonato_id' => $id, 'rodada' => $rodada])->get();
        } else {
            $jogos = Jogo::with('timecasa')->where(['campeonato_id' => $id])->get();
        }
        return response()->json($jogos);
    }
}
