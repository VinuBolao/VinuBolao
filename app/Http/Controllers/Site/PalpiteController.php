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
            $participanteSelected = Participante::where('user_id', $userSelected)
                ->where('bolao_id', $currentBolao->id)
                ->first();

            $participantes = $participante->getByBolao($currentBolao->id);

            if ($request->has('compare')) {
                $compare = $this->model
                    ->with('participante.user')
                    ->whereHas('participante', function ($query) use ($currentBolao) {
                        $query->where('bolao_id', $currentBolao->id);
                    })
                    ->where('jogo_id', $request->get('compare'))
                    ->get()
                    ->sortBy('participante.user.name')
                    ->values();
            }

            $rodada = $request->get('rodada')
                ?? $currentBolao->campeonato->rodada;

            $jogos = Jogo::with([
                'timecasa',
                'timefora',
                'palpites' => function ($query) use ($participanteSelected) {
                    $query->where('participante_id', $participanteSelected?->id);
                }
            ])
                ->where('campeonato_id', $currentBolao->campeonato_id)
                ->where('rodada', $rodada)
                ->orderBy('inicio')
                ->get();

            foreach ($jogos as $jogo) {
                $palpite = $jogo->palpites->first();
                if ($userSelected != Auth::id() && $palpite && $jogo->inicio_timestamp > Carbon::now()->timestamp) {
                    $palpite->palpite_casa = null;
                    $palpite->palpite_fora = null;
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

        $currentBolao = Bolao::findOrFail(Auth::user()->current_bolao_id);

        $jogo = Jogo::where('id', $request->jogo_id)
            ->where('campeonato_id', $currentBolao->campeonato_id)
            ->firstOrFail();

        if (!Carbon::parse($jogo->inicio)->isFuture()) {
            return;
        }

        $currentBolao = (new Bolao)->getCurrentForUser(Auth::id());

        $data = $request->except([
            'inicio_jogo',
            'user_id',
            'participante_id',
        ]);

        $data['participante_id'] = $currentBolao->participante_id;
        $data['horario'] = Carbon::now('America/Sao_Paulo');

        $this->model->firstOrCreate(
            [
                'jogo_id' => $jogo->id,
                'participante_id' => $currentBolao->participante_id,
            ],
            $data
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->model->rules());

        $currentBolao = (new Bolao)->getCurrentForUser(Auth::id());

        $palpite = $this->model
            ->where('id', $id)
            ->where('participante_id', $currentBolao->participante_id)
            ->firstOrFail();

        $jogo = Jogo::where('id', $palpite->jogo_id)
            ->where('campeonato_id', $currentBolao->campeonato_id)
            ->firstOrFail();

        if (!Carbon::parse($jogo->inicio)->isFuture()) {
            return;
        }

        $data = $request->except([
            'inicio_jogo',
            'user_id',
            'participante_id',
            'jogo_id',
        ]);

        $data['horario'] = Carbon::now('America/Sao_Paulo');

        $palpite->update($data);
    }
}
