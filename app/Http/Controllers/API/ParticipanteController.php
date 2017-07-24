<?php

namespace Bolao\Http\Controllers\API;

use Bolao\Participante;
use Bolao\Http\Controllers\Controller;

class ParticipanteController extends Controller
{
    public function get($id = null)
    {
        if($id){
            return response()->json(Participante::with('user')->findOrFail($id));
        } else {
            return response()->json(Participante::with('user')->get());
        }
    }
}
