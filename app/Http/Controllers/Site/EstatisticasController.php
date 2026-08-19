<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Bolao;
use App\Models\Participante;
use App\Services\RankingService;
use Inertia\Inertia;

class EstatisticasController extends Controller
{
    public function getStatistcs(Participante $participante, RankingService $rankingService)
    {
        $classificacao = $rankingService->getRanking(0, 0);

        return Inertia::render('Estatisticas', [
            'title' => 'Estatísticas',
            'subtitle' => "Veja algumas estatísticas da história do VinúBolão!",
            'classificacao' => $classificacao,
            'champions' => $this->getAllChampions($participante),
        ]);
    }

    private function getAllChampions($participante) {
        $data = $participante->selectRaw('participantes.user_id, COUNT(participantes.posicao) as quantidade')
            ->join('bolaos', 'bolaos.id', '=', 'participantes.bolao_id')
            ->with('user')
            ->where('bolaos.ativo', 0)
            ->where('participantes.posicao', 1)
            ->groupBy('participantes.user_id')
            ->orderBy('quantidade', 'desc')
            ->get();

        foreach ($data as $item) {
            $item['participacoes'] = $participante->select('participantes.bolao_id')
                ->join('bolaos', 'bolaos.id', '=', 'participantes.bolao_id')
                ->with('bolao')
                ->where('bolaos.ativo', 0)
                ->where('participantes.user_id', $item->user_id)
                ->get();
        }

        return $data;
    }
}
