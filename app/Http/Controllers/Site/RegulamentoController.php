<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Bolao;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class RegulamentoController extends Controller
{
    public function index(Bolao $bolao)
    {
        $userBolao = $bolao->getByUser(Auth::id());

        return Inertia::render('Regulamento', [
            'title' => 'Regulamento',
            'subtitle' => "Veja as regras, critérios que usamos para pontuação e outras informações importantes.",
            'bolao' => $userBolao ?? false,
        ]);
    }
}
