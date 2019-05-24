<?php

namespace Bolao\Http\Controllers\API;

use Bolao\Models\Jogo;
use Illuminate\Http\Request;
use Bolao\Http\Controllers\Controller;

class JogoController extends Controller
{
    private $jogo;

    public function __construct(Jogo $jogo)
    {
        $this->jogo = $jogo;
    }

    public function get($jogoId = null)
    {
        if ($jogoId) {
            return response()->json($this->jogo->findOrFail($jogoId), 200);
        } else {
            return response()->json($this->jogo->all(), 200);
        }
    }

    public function getCampeonato($campeonatoId, $rodada = null)
    {
        if ($rodada) {
            $jogos = $this->jogo
                ->with('timecasa', 'timefora')
                ->where(['campeonato_id' => $campeonatoId, 'rodada' => $rodada])
                ->orderBy('inicio')
                ->get();
        } else {
            $jogos = $this->jogo
                ->with('timecasa')
                ->where(['campeonato_id' => $campeonatoId])
                ->orderBy('inicio')
                ->get();
        }

        return response()->json($jogos, 200);
    }

    public function update(Request $request)
    {
        $jogo = $this->jogo->findOrFail($request->id);
        $jogo->placar_casa = $request->placar_casa;
        $jogo->placar_fora = $request->placar_fora;

        if($jogo->save()){
            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['success' => false], 400);
        }
    }
}
