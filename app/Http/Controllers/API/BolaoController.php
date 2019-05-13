<?php

namespace Bolao\Http\Controllers\API;

use Bolao\Models\Bolao;
use Illuminate\Http\Request;
use Bolao\Http\Controllers\Controller;

class BolaoController extends Controller
{
    public function get($bolaoId = null)
    {
        if ($bolaoId) {
            return response()->json(Bolao::with('user', 'campeonato')->findOrFail($bolaoId), 200);
        } else {
            return response()->json(Bolao::with('user', 'campeonato')->get(), 200);
        }
    }

    public function getActive()
    {
        return response()->json(Bolao::with('user', 'campeonato')->where('ativo', 1)->first(), 200);
    }
}
