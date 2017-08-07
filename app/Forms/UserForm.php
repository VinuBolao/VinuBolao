<?php

namespace Bolao\Forms;

use Kris\LaravelFormBuilder\Form;

class UserForm extends Form
{
    public function buildForm()
    {
        $id = $this->getData('id');
        $master = $this->getData('master');

        $this
            ->add('master', 'select', [
                'label' => 'Administrador',
                'choices' => ['0' => 'Não', '1' => 'Sim'],
                'selected' => $master,
            ])
            ->add('name', 'text', [
                'label' => 'Nome',
                'rules' => 'required|max:255',
            ])
            ->add('username', 'text', [
                'label' => 'Usuário',
                'rules' => "required|max:255|unique:users,username,{$id}",
            ])
            ->add('email', 'email', [
                'label' => 'E-mail',
                'rules' => "required|max:255|unique:users,email,{$id}",
            ])
            ->add('password', 'password', [
                'label' => 'Senha',
                'rules' => "required|min:6",
            ]);
    }
}
