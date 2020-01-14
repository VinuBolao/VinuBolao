<?php

namespace Bolao\Http\Controllers;

use Bolao\Models\Bolao;
use Bolao\Models\Participante;
use Illuminate\Support\Facades\Auth;

class PalpiteController extends Controller
{
    public function index()
    {
        $bolao = Bolao::where('ativo', 1)->orderByDesc('id')->first();
        $participante = Participante::with('user', 'bolao')->where('user_id', Auth::id())->first();
        return view('palpite.index', compact('participante', 'bolao'));
    }
}
