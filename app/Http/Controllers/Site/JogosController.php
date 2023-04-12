<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Bolao;
use App\Models\Jogo;
use App\Models\Time;
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
            'subtitle' => "Lista de jogos do bolão <strong>". ($userBolao->nome ?? '') ."</strong> filtrados por campeonato e rodada, preencha os resultados.",
            'jogos' => $jogos ?? [],
            'bolao' => $userBolao ?? false,
            'rodada' => $request->get('rodada') ?? $userBolao?->rodada,
        ]);
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->master || Auth::user()->manager) {
            $jogo = Jogo::findOrFail($id);
            $jogo->placar_casa = $request->placar_casa;
            $jogo->placar_fora = $request->placar_fora;
            $jogo->save();
        }
    }

    public function search(Bolao $bolao, Request $request)
    {
        return Inertia::render('BuscarJogos', [
            'title' => 'Buscar Jogos',
            'subtitle' => 'Em breve!!!',
            'bolao' => $bolao->getByUser(Auth::id()) ?? [],
            'rodada' => $request->all(),
        ]);
    }

    public function save(Request $request)
    {
        $saved = false;

        if ($request->has('jogos')) {
            $saved = Jogo::insert($request->get('jogos'));
        }

        return response()->json(['error' => !$saved, 'message' => 'Jogos salvos com sucesso!'], 200);
    }

    public function getJogosGE(Request $request)
    {
        $result = [
            'jogos' => [],
            'outros' => [],
            'rodada' => 0
        ];

        if (isset($request->url)) {
            $result = [];
            $data = file_get_contents($request->url, false);
            $data = json_decode($data);

            $arrExplode = explode('/', $request->url);
            $index = array_search('rodada', $arrExplode);
            $result['rodada'] = $arrExplode[$index + 1];

            foreach ($data as $item) {
                $casa = $item->equipes->mandante->nome_popular;
                $fora = $item->equipes->visitante->nome_popular;
                $horario = str_replace('T',' ', $item->data_realizacao);

                $mandante = Time::where('nome', 'like', '%' . $casa . '%')->first();
                $visitante = Time::where('nome', 'like', '%' . $fora . '%')->first();

                if ($mandante && $visitante) {
                    $result['jogos'][] = [
                        "horario" => $horario,
                        "mandante" => [
                            'id' => $mandante->id,
                            'nome' => $mandante->nome
                        ],
                        "visitante" => [
                            'id' => $visitante->id,
                            'nome' => $visitante->nome
                        ],
                    ];
                } else {
                    $result['outros'][] = $mandante ? $fora : $casa;
                }
            }
        }

        return response()->json($result, 200);
    }
}
