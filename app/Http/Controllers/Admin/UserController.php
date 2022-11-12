<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\TraitCrud;

class UserController extends Controller
{
    use TraitCrud;

    protected $model;

    protected $prefixView = "admin.user";

    protected $relationships = [];

    protected $fields = [
        ['label' => 'Nome', 'name' => 'name', 'type' => 'text', 'required' => true],
        ['label' => 'Usuário', 'name' => 'username', 'type' => 'text', 'required' => true],
        ['label' => 'Email', 'name' => 'email', 'type' => 'email', 'required' => true],
        ['label' => 'Senha', 'name' => 'password', 'type' => 'password', 'required' => false],
        ['label' => 'Confirmação de senha', 'name' => 'password_confirmation', 'type' => 'password', 'required' => false],
    ];

    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
