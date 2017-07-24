<?php

namespace Bolao\Http\Controllers\API;

use Bolao\Jogo;
use Bolao\Participante;
use Illuminate\Http\Request;
use Bolao\Http\Controllers\Controller;

class JogoController extends Controller
{
    public function get($id = null)
    {
        if ($id) {
            return response()->json(Jogo::findOrFail($id), 200);
        } else {
            return response()->json(Jogo::all(), 200);
        }
    }

    public function get_campeonato($id, $rodada = null)
    {
        if ($rodada) {
            $jogos = Jogo::with('timecasa', 'timefora')->where(['campeonato_id' => $id, 'rodada' => $rodada])->get();
        } else {
            $jogos = Jogo::with('timecasa')->where(['campeonato_id' => $id])->get();
        }
        return response()->json($jogos, 200);
    }

    public function update(Request $request)
    {
        $jogo = Jogo::findOrFail($request->id);
        $jogo->placar_casa = $request->placar_casa;
        $jogo->placar_fora = $request->placar_fora;
        if($jogo->save()){
            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['success' => false], 400);
        }
    }
}
