<?php

namespace Bolao\Forms;

use Bolao\Models\Time;
use Bolao\Models\Campeonato;
use Kris\LaravelFormBuilder\Form;

class JogoForm extends Form
{
    public function buildForm()
    {
        $times = [];
        $campeonatos = [];
        $dataTime = Time::all();
        $dataCampeonato = Campeonato::all();
        $mandanteId = $this->getData('timecasa_id');
        $visitanteId = $this->getData('timefora_id');
        $campeonatoId = $this->getData('campeonato_id');

        foreach ($dataCampeonato as $campeonato) {
            $campeonatos[$campeonato->id] = $campeonato->nome;
        }

        foreach ($dataTime as $time) {
            $times[$time->id] = $time->nome;
        }

        $this
            ->add('campeonato_id', 'select', [
                'label' => 'Campeonato',
                'choices' => $campeonatos,
                'selected' => $campeonatoId,
                'empty_value' => 'Selecione o campeonato',
                'rules' => 'required',
            ])
            ->add('rodada', 'number', [
                'label' => 'Rodada',
                'attr' => ['placeholder' => 'Ex: 19', 'min' => 1, 'max' => 38],
                'rules' => 'required',
            ])
            ->add('timecasa_id', 'select', [
                'label' => 'Mandante',
                'choices' => $times,
                'selected' => $mandanteId,
                'empty_value' => 'Selecione o mandante',
                'rules' => 'required',
            ])
            ->add('placar_casa', 'number', [
                'label' => 'Placar Casa',
                'attr' => ['placeholder' => 'Ex: 1', 'min' => 1, 'max' => 20],
            ])->add('placar_fora', 'number', [
                'label' => 'Placar Fora',
                'attr' => ['placeholder' => 'Ex: 1', 'min' => 1, 'max' => 20],
            ])
            ->add('timefora_id', 'select', [
                'label' => 'Visitante',
                'choices' => $times,
                'selected' => $visitanteId,
                'empty_value' => 'Selecione o visitante',
                'rules' => 'required',
            ])
            ->add('inicio', 'datetime-local', [
                'label' => 'Início',
                'rules' => 'required',
            ]);
    }
}
