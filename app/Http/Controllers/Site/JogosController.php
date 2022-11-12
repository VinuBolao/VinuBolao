<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Bolao;
use App\Models\Jogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class JogosController extends Controller
{
    protected $model;

    public function __construct(Jogo $model)
    {
        $this->model = $model;
    }

    public function index(Bolao $bolao, Request $request)
    {
        $userBolao = $bolao->getByUser(Auth::id());

        if ($userBolao) {
            $jogos = $this->model->with('timecasa', 'timefora')
                ->where('bolao_id', $userBolao->bolao_id)
                ->where('jogos.rodada', $request->get('rodada') ?? $userBolao->rodada)
                ->orderBy('jogos.inicio')
                ->get();
        }

        return Inertia::render('Jogos', [
            'title' => 'Jogos',
            'subtitle' => 'Lista de jogos filtrados por campeonato e rodada, preencha os resultados.',
            'jogos' => $jogos ?? [],
            'bolao' => $userBolao ?? false,
            'rodada' => $request->get('rodada') ?? $userBolao?->rodada,
        ]);
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->master) {
            $jogo = Jogo::findOrFail($id);
            $jogo->placar_casa = $request->placar_casa;
            $jogo->placar_fora = $request->placar_fora;
            $jogo->save();
        }
    }
}
