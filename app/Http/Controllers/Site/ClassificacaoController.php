<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Bolao;
use App\Services\RankingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ClassificacaoController extends Controller
{
    public function index(Bolao $bolao, RankingService $rankingService, Request $request)
    {
        $currentBolao = $bolao->getCurrentForUser(Auth::id());
        $classificacao = $currentBolao
            ? $rankingService->getRanking(
                $currentBolao->campeonato_id,
                $currentBolao->id,
                $request->get('rodada'),
                $request->get('turno'))
            : [];

        return Inertia::render('Classificacao', [
            'title' => 'Classificação',
            'subtitle' => "Veja sua posição em relação aos outros participantes no bolão <strong>". ($currentBolao->nome ?? '') ."</strong>!",
            'classificacao' => $classificacao,
            'bolao' => $currentBolao ?? false,
            'rodada' => $request->get('rodada'),
            'turno' => $request->get('turno')
        ]);
    }
}
