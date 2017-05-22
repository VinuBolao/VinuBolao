<?php

namespace Bolao\Http\Controllers\API;

use Bolao\Campeonato;
use Illuminate\Http\Request;
use Bolao\Http\Controllers\Controller;

class CampeonatoController extends Controller
{
    public function get($id = null)
    {
        if($id){
            return response()->json(Campeonato::findOrFail($id));
        } else {
            return response()->json(Campeonato::all());
        }
    }
}
