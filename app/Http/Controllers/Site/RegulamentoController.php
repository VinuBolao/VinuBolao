<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Bolao;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class RegulamentoController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $bolao = $user->current_bolao_id ? Bolao::findOrFail(Auth::user()->current_bolao_id) : null;

        return Inertia::render('Regulamento', [
            'title' => 'Regulamento',
            'subtitle' => "Veja as regras, critérios que usamos para pontuação e outras informações importantes.",
            'placar_exato' => $bolao->placar_exato ?? 10,
            'placar_vencedor' => $bolao->placar_vencedor ?? 7,
        ]);
    }
}
