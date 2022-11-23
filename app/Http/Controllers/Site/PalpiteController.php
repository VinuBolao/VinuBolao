<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Bolao;
use App\Models\Jogo;
use App\Models\Palpite;
use App\Models\Participante;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PalpiteController extends Controller
{
    protected $model;

    public function __construct(Palpite $model)
    {
        $this->model = $model;
    }

    public function index(Participante $participante, Bolao $bolao, Request $request)
    {
        $userBolao = $bolao->getByUser(Auth::id());
        $userSelected = $request->get('participante') ?? Auth::id();

        if ($userBolao) {
            $participantes = $participante->getByBolao($userBolao->bolao_id);

            if ($request->has('compare')) {
                $compare = $this->model->with('user')
                    ->where('jogo_id', $request->get('compare'))
                    ->get();
            }

            $jogos = Jogo::with(['timecasa', 'timefora', 'palpite' => function($query) use ($userSelected) {
                    $query->where('user_id', $userSelected);
                }])
                ->where('bolao_id', $userBolao->bolao_id)
                ->where('jogos.rodada', $request->get('rodada') ?? $userBolao->rodada)
                ->orderBy('jogos.inicio')
                ->get();
        }

        return Inertia::render('Palpites', [
            'title' => 'Palpites',
            'subtitle' => 'Lista de jogos para você preencher os seus palpites, lembre-se de preencher seu palpite antes do inicio de cada jogo.',
            'jogos' => $jogos ?? [],
            'bolao' => $userBolao ?? false,
            'compare' => $compare ?? [],
            'participantes' => $participantes ?? [],
            'rodada' => $request->get('rodada') ?? $userBolao?->rodada,
            'selected' => $userSelected,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate($this->model->rules());

        $now = Carbon::now()->timezone('America/Fortaleza')->format('Y-m-d H:i:s');

        $data = $request->except('inicio_jogo');
        $data['horario'] = $now;

        if ($request->get('inicio_jogo') > $now) {
            $this->model->create($data);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->model->rules());

        $now = Carbon::now()->timezone('America/Fortaleza')->format('Y-m-d H:i:s');

        $data = $request->except('inicio_jogo');
        $data['horario'] = $now;

        if ($request->get('inicio_jogo') > $now) {
            $this->model->findOrFail($id)->update($data);
        }
    }
}
