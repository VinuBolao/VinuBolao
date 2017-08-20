<?php

namespace Bolao\Forms;

use Kris\LaravelFormBuilder\Form;

class TimeForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('nome', 'text', [
                'label' => 'Nome',
                'attr' => ['placeholder' => 'Ex: Atlético-GO'],
                'rules' => 'required|string|max:255',
            ])
            ->add('nome_completo', 'text', [
                'label' => 'Nome Completo',
                'attr' => ['placeholder' => 'Ex: Atlético Clube Goianiense'],
                'rules' => 'required|string|max:255',
            ])
            ->add('sigla', 'text', [
                'label' => 'Sigla',
                'attr' => ['placeholder' => 'Ex: SPA'],
                'rules' => 'required|string|max:3',
            ])
            ->add('estadio', 'text', [
                'label' => 'Estádio',
                'attr' => ['placeholder' => 'Ex: Maracanã'],
                'rules' => 'required|string|max:255',
            ])
            ->add('estado', 'text', [
                'label' => 'Estado',
                'attr' => ['placeholder' => 'Ex: SP'],
                'rules' => 'required|string|max:2',
            ])
            ->add('pais', 'text', [
                'label' => 'País',
                'attr' => ['placeholder' => 'Ex: Brasil'],
                'default_value' => 'Brasil',
                'rules' => 'required|string|max:255',
            ]);

    }
}
