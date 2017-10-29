<?php
/**
 * Created by PhpStorm.
 * User: Gustavo Santos
 * Date: 29/10/17
 */

namespace Bolao\Traits;


trait Calculator
{
    public function calcularPontos($placar1, $placar2, $palpite1, $palpite2)
    {
        $dados = (object)['pontosganhos' => 0, 'placarexato' => 0, 'placarvencedor' => 0];

        if($placar1 === $palpite1 && $placar2 === $palpite2){
            $dados->pontosganhos = 10;
            $dados->placarexato++;
            return $dados;
        } elseif (($placar1 === $placar2 && $palpite1 === $palpite2) || ($placar1 > $placar2 && $palpite1 > $palpite2) || ($placar1 < $placar2 && $palpite1 < $palpite2)) {
            $dados->pontosganhos = 7;
            $dados->placarvencedor++;
            return $dados;
        } else {
            return $dados;
        }
    }
}