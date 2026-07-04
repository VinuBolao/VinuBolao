<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Bolao;
use App\Models\Participante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ClassificacaoController extends Controller
{
    public function index(Bolao $bolao, Participante $participante, Request $request)
    {
        $currentBolao = $bolao->getCurrentForUser(Auth::id());
        $participantes = $currentBolao
            ? $participante->getRanking(
                $currentBolao->campeonato_id,
                $request->get('rodada'),
                $request->get('turno'))
            : [];

        return Inertia::render('Classificacao', [
            'title' => 'Classificação',
            'subtitle' => "Veja sua posição em relação aos outros participantes no bolão <strong>". ($currentBolao->nome ?? '') ."</strong>!",
            'participantes' => $participantes,
            'bolao' => $currentBolao ?? false,
            'rodada' => $request->get('rodada'),
            'turno' => $request->get('turno')
        ]);
    }
}
