<?php

namespace Bolao\Http\Controllers;

use Bolao\Models\Bolao;

class ParticipanteController extends Controller
{
    public function index()
    {
        $bolaos = Bolao::all();
        return view('participante.index', compact('bolaos'));
    }
}
