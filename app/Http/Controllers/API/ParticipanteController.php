<?php

namespace Bolao\Http\Controllers\API;

use Bolao\User;
use Bolao\Palpite;
use Bolao\Participante;
use Bolao\Http\Controllers\Controller;

class ParticipanteController extends Controller
{
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

    public function updatedData()
    {
        $users = User::all();

        foreach ($users as $user) {
            $dados = $this->getDados($user->id);

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

                    switch ($palpite){
                        case ($palpite->palpite_casa === null && $palpite->palpite_fora === null):
                            $dados['placarexato'] = $dados['placarexato'] + 0;
                            $dados['pontosganhos'] = $dados['pontosganhos'] + 0;
                            $dados['placarvencedor'] = $dados['placarvencedor'] + 0;
                            break;
                        case ($palpite->jogo->placar_casa === $palpite->palpite_casa && $palpite->jogo->placar_fora === $palpite->palpite_fora):
                            $dados['pontosganhos'] = $dados['pontosganhos'] + 10;
                            $dados['placarexato'] = $dados['placarexato'] + 1;
                            break;
                        case ($palpite->jogo->placar_casa === $palpite->jogo->placar_fora && $palpite->palpite_casa === $palpite->palpite_fora):
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
