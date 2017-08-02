<?php

namespace Bolao\Http\Controllers;

use Bolao\Participante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PalpiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participante = Participante::where('user_id', Auth::id())->first();
        return view('palpite.index', compact('participante'));
    }

}
