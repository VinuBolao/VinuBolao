<?php

namespace Bolao\Http\Controllers;

use Bolao\Models\Bolao;
use Bolao\Models\Participante;

class ParticipanteController extends Controller
{
    public function index()
    {
        $boloes = Bolao::all();
        return view('participante.index', compact('boloes'));
    }
}
