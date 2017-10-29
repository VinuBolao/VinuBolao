<?php

namespace Bolao\Http\Controllers\API;

use Bolao\Models\User;
use Bolao\Models\Palpite;
use Bolao\Models\Participante;
use Bolao\Http\Controllers\Controller;
use Bolao\Traits\Calculator;

class ParticipanteController extends Controller
{
    use Calculator;

    public function get($participanteId = null)
    {
        if($participanteId){
            return response()->json(Participante::with('user')->findOrFail($participanteId));
        } else {
            return response()->json(Participante::with('user')->get());
        }
    }

    public function getBolao($bolaoId = null)
    {
        return response()->json(Participante::with('user')->where('bolao_id', $bolaoId)->get());
    }

    public function updatedData($rodada = null)
    {
        $users = User::all();

        foreach ($users as $user) {
            $dados = $this->getDados($user->id, $rodada);

            if(count($dados) > 0) {
                Participante::where(['user_id' => $user->id])->update([
                    'placarvencedor' => $dados['placarvencedor'],
                    'pontosganhos' => $dados['pontosganhos'],
                    'placarexato' => $dados['placarexato']
                ]);
            }
        }

        return response()->json(['success' => true], 200);
    }

    public function getDados($userId, $rodada = null)
    {
        if($rodada){
            $palpites = Palpite::with(['jogo' => function ($query) use ($rodada) {
                $query->where('rodada', '=', $rodada);
            }])->where(['user_id' => $userId])->get();
        } else {
            $palpites = Palpite::with('jogo')->where(['user_id' => $userId])->get();
        }

        $dados = ['pontosganhos' => 0, 'placarexato' => 0, 'placarvencedor' => 0];

        if(count($palpites) > 0){
            foreach ($palpites as $palpite) {
                if(isset($palpite->jogo->placar_casa) && isset($palpite->jogo->placar_fora)){
                    //Calculando Pontos
                    $result = $this->calcularPontos($palpite->jogo->placar_casa, $palpite->jogo->placar_fora, $palpite->palpite_casa, $palpite->palpite_fora);

                    $dados['pontosganhos'] += $result->pontosganhos;
                    $dados['placarexato'] += $result->placarexato;
                    $dados['placarvencedor'] += $result->placarvencedor;
                }
            }
        }

        return $dados;
    }
}
