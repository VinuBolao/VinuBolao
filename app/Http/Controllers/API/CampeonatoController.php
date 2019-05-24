<?php

namespace Bolao\Http\Controllers\API;

use Bolao\Models\Campeonato;
use Bolao\Http\Controllers\Controller;

class CampeonatoController extends Controller
{
    private $campeonato;

    public function __construct(Campeonato $campeonato)
    {
        $this->campeonato = $campeonato;
    }
    public function get($campeonatoId = null)
    {
        if($campeonatoId){
            return response()->json($this->campeonato->findOrFail($campeonatoId));
        } else {
            return response()->json($this->campeonato->all());
        }
    }
}
