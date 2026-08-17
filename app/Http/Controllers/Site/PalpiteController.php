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
        $currentBolao = $bolao->getCurrentForUser(Auth::id());
        $userSelected = $request->get('participante') ?? Auth::id();

        if ($currentBolao) {
            $participantes = $participante->getByBolao($currentBolao->id);

            if ($request->has('compare')) {
                $compare = $this->model
                    ->with('user')
                    ->where('jogo_id', $request->get('compare'))
                    ->get()
                    ->sortBy('user.name')
                    ->values();
            }

            $rodada = $request->get('rodada')
                ?? $currentBolao->campeonato->rodada;

            $jogos = Jogo::with([
                'timecasa',
                'timefora',
                'palpite' => function ($query) use ($userSelected) {
                    $query->where('user_id', $userSelected);
                }
            ])
                ->where('campeonato_id', $currentBolao->campeonato_id)
                ->where('rodada', $rodada)
                ->orderBy('inicio')
                ->get();

            foreach ($jogos as $jogo) {
                if ($userSelected != Auth::id() && $jogo->palpite && $jogo->inicio_timestamp > Carbon::now()->timestamp) {
                    $jogo->palpite->palpite_casa = null;
                    $jogo->palpite->palpite_fora = null;
                }
            }
        }

        return Inertia::render('Palpites', [
            'title' => 'Palpites',
            'subtitle' => "Lista de jogos do bolão <strong>{$currentBolao?->nome}</strong> para você preencher os seus palpites, lembre-se de preencher seu palpite antes do inicio de cada jogo.",
            'jogos' => $jogos ?? [],
            'bolao' => $currentBolao ?? false,
            'compare' => $compare ?? [],
            'participantes' => $participantes ?? [],
            'rodada' => $request->get('rodada') ?? $currentBolao?->campeonato->rodada,
            'selected' => $userSelected,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate($this->model->rules());

        $jogo = Jogo::findOrFail($request->jogo_id);

        if (!Carbon::parse($jogo->inicio)->isFuture()) {
            return;
        }

        $data = $request->except([
            'inicio_jogo',
            'user_id',
        ]);

        $data['user_id'] = Auth::id();
        $data['horario'] = Carbon::now('America/Sao_Paulo');

        $this->model->firstOrCreate(
            [
                'jogo_id' => $jogo->id,
                'user_id' => Auth::id(),
            ],
            $data
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->model->rules());

        $palpite = $this->model
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $jogo = Jogo::findOrFail($palpite->jogo_id);

        if (!Carbon::parse($jogo->inicio)->isFuture()) {
            return;
        }

        $data = $request->except([
            'inicio_jogo',
            'user_id',
            'jogo_id',
        ]);

        $data['horario'] = Carbon::now('America/Sao_Paulo');

        $palpite->update($data);
    }
}
