<?php

namespace Bolao\Http\Controllers\API;

use Bolao\Models\Campeonato;
use Bolao\Http\Controllers\Controller;

class CampeonatoController extends Controller
{
    public function get($campeonatoId = null)
    {
        if ($campeonatoId) {
            return response()->json(Campeonato::findOrFail($campeonatoId));
        } else {
            return response()->json(Campeonato::all());
        }
    }

    public function rodadaAtual($campeonatoId, $rodada)
    {
        $campeonato = Campeonato::findOrFail($campeonatoId);
        $campeonato->rodada = $rodada;

        if (!$campeonato->save()) {
            return response()->json(["success" => false]);
        }

        return response()->json(["success" => true]);
    }
}
