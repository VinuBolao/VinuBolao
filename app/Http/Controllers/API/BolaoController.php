<?php

namespace Bolao\Http\Controllers\API;

use Bolao\Models\Bolao;
use Bolao\Http\Controllers\Controller;

class BolaoController extends Controller
{
    private $bolao;

    public function __construct(Bolao $bolao)
    {
        $this->bolao = $bolao;
    }

    public function get($bolaoId = null)
    {
        $order = 'created_at';
        $withs = ['user', 'campeonato'];

        if ($bolaoId) {
            return response()->json($this->bolao->with($withs)->orderByDesc($order)->findOrFail($bolaoId), 200);
        } else {
            return response()->json($this->bolao->with($withs)->orderByDesc($order)->get(), 200);
        }
    }

    public function getActive()
    {
        $withs = ['user', 'campeonato'];
        return response()->json($this->bolao->with($withs)->where('ativo', 1)->first(), 200);
    }
}
