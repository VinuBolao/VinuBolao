<?php

namespace Bolao\Forms;

use Kris\LaravelFormBuilder\Form;

class CampeonatoForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('nome', 'text', [
                'label' => 'Nome',
                'attr' => ['placeholder' => 'Ex: Brasileirão'],
                'rules' => 'required|string|max:255',
            ])
            ->add('nome_completo', 'text', [
                'label' => 'Nome Completo',
                'attr' => ['placeholder' => 'Ex: Campeonato Brasileirão'],
                'rules' => 'required|string|max:255',
            ])
            ->add('qtd_times', 'number', [
                'label' => 'Total de Times',
                'attr' => ['placeholder' => 'Ex: 20', 'min' => 1, 'max' => 50],
                'rules' => 'required',
            ])
            ->add('qtd_rodadas', 'number', [
                'label' => 'Total de Rodadas',
                'attr' => ['placeholder' => 'Ex: 38', 'min' => 1, 'max' => 50],
                'rules' => 'required',
            ])
            ->add('rodada', 'number', [
                'label' => 'Rodada Atual',
                'attr' => ['placeholder' => 'Ex: 1', 'min' => 1, 'max' => 38],
                'rules' => 'required',
            ])
            ->add('temporada', 'number', [
                'label' => 'Temporada',
                'attr' => ['placeholder' => 'Ex: 2017', 'min' => 2010, 'max' => 2050],
                'rules' => 'required',
            ])
            ->add('serie', 'select', [
                'label' => 'Série',
                'choices' => ['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D'],
                'selected' => 'A',
                'rules' => 'required',
            ])
            ->add('estado', 'text', [
                'attr' => ['placeholder' => 'Ex: SP'],
                'label' => 'Estado'
            ])
            ->add('pais', 'text', [
                'label' => 'País',
                'attr' => ['placeholder' => 'Ex: Brasil'],
                'default_value' => 'Brasil',
                'rules' => 'required|string|max:50',
            ])
            ->add('inicio', 'date', [
                'label' => '',
                'rules' => 'required',
            ])
            ->add('termino', 'date', [
                'label' => '',
                'rules' => 'required',
            ]);
    }
}