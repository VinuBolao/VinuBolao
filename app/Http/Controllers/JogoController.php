<?php

namespace Bolao\Http\Controllers;

use Bolao\Models\Participante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participante = Participante::where('user_id', Auth::id())->first();
        return view('jogo.index', compact('participante'));
    }

}
