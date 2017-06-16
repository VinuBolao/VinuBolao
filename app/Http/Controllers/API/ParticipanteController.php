<?php

namespace Bolao\Http\Controllers\API;

use Bolao\Participante;
use Illuminate\Http\Request;
use Bolao\Http\Controllers\Controller;

class ParticipanteController extends Controller
{
    public function get_bolao($id)
    {
        return response()->json(Participante::with('user')->where(['bolao_id' => $id])->get());
    }
}
