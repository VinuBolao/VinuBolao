<?php

namespace Bolao\Http\Controllers\API;

use Bolao\Jogo;
use Bolao\Palpite;
use Bolao\Participante;
use Illuminate\Http\Request;
use Bolao\Http\Controllers\Controller;

class JogoController extends Controller
{
    public function get($id = null)
    {
        if ($id) {
            return response()->json(Jogo::findOrFail($id), 200);
        } else {
            return response()->json(Jogo::all(), 200);
        }
    }

    public function get_campeonato($id, $rodada = null)
    {
        if ($rodada) {
            $jogos = Jogo::with('timecasa', 'timefora')->where(['campeonato_id' => $id, 'rodada' => $rodada])->get();
        } else {
            $jogos = Jogo::with('timecasa')->where(['campeonato_id' => $id])->get();
        }
        return response()->json($jogos, 200);
    }

    public function update(Request $request)
    {
        $jogo = Jogo::findOrFail($request->id);
        $jogo->placar_casa = $request->placar_casa;
        $jogo->placar_fora = $request->placar_fora;
        if($jogo->save()){
            $dados = $this->setPontos($request->userId);

            if(Participante::where(['user_id' => $request->userId])->update($dados)){
                return response()->json(['success' => true], 200);
            }
        } else {
            return response()->json(['success' => false], 400);
        }
    }

    private function setPontos($userId)
    {
        $palpites = Palpite::with('jogo')->where(['user_id' => $userId])->get();

        $dados = [
            'pontosganhos' => 0,
            'placarexato' => 0,
            'placarvencedor' => 0
        ];

        if(count($palpites) > 0){
            foreach ($palpites as $palpite) {
                if(isset($palpite->jogo->placar_casa) && isset($palpite->jogo->placar_fora)){

                    switch ($palpite){
                        case ($palpite->jogo->placar_casa == $palpite->palpite_casa && $palpite->jogo->placar_fora == $palpite->palpite_fora):
                            $dados['pontosganhos'] = $dados['pontosganhos'] + 10;
                            $dados['placarexato'] = $dados['placarexato'] + 1;
                            break;
                        case ($palpite->jogo->placar_casa == $palpite->jogo->placar_fora && $palpite->palpite_casa == $palpite->palpite_fora):
                        case ($palpite->jogo->placar_casa > $palpite->jogo->placar_fora && $palpite->palpite_casa > $palpite->palpite_fora):
                        case ($palpite->jogo->placar_casa < $palpite->jogo->placar_fora && $palpite->palpite_casa < $palpite->palpite_fora):
                            $dados['pontosganhos'] = $dados['pontosganhos'] + 7;
                            $dados['placarvencedor'] = $dados['placarvencedor'] + 1;
                            break;
                    }

                }
            }
        }

        return $dados;
    }
}
