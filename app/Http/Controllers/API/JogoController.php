<?php

namespace Bolao\Http\Controllers\API;

use Bolao\Models\Jogo;
use Bolao\Models\Time;
use Illuminate\Http\Request;
use Bolao\Http\Controllers\Controller;

class JogoController extends Controller
{
    public function get($jogoId = null)
    {
        if ($jogoId) {
            return response()->json(Jogo::findOrFail($jogoId), 200);
        } else {
            return response()->json(Jogo::all(), 200);
        }
    }

    public function getCampeonato($campeonatoId, $rodada = null)
    {
        if ($rodada) {
            $jogos = Jogo::with('timecasa', 'timefora')->where(['campeonato_id' => $campeonatoId, 'rodada' => $rodada])->orderBy('inicio')->get();
        } else {
            $jogos = Jogo::with('timecasa')->where(['campeonato_id' => $campeonatoId])->orderBy('inicio')->get();
        }

        return response()->json($jogos, 200);
    }

    public function update(Request $request)
    {
        $jogo = Jogo::findOrFail($request->id);
        $jogo->placar_casa = $request->placar_casa;
        $jogo->placar_fora = $request->placar_fora;

        if($jogo->save()){
            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['success' => false], 400);
        }
    }

    public function save(Request $request)
    {
        if (isset($request->jogos)) {
            $saved = false;

            foreach ($request->jogos as $jogo) {
                $saved = Jogo::create($jogo);
            }

            return response()->json(["success" => (bool)$saved], 200);
        }

        return response()->json(["error" => true], 200);
    }

    public function getJogosGE(Request $request)
    {
        $result = [
            'jogos' => [],
            'outros' => [],
        ];

        if (isset($request->url)) {
            $data = file_get_contents($request->url, false);
            $data = json_decode($data);

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
