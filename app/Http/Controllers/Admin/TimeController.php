<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Time;
use App\Traits\TraitCrud;

class TimeController extends Controller
{
    use TraitCrud;

    protected $model;

    protected $prefixView = "admin.time";

    protected $relationships = [];

    protected $fields = [
        ['label' => 'Nome', 'name' => 'nome', 'type' => 'text', 'required' => true],
        ['label' => 'Nome completo', 'name' => 'nome_completo', 'type' => 'text', 'required' => true],
        ['label' => 'Sigla', 'name' => 'sigla', 'type' => 'text', 'required' => true],
        ['label' => 'Estádio', 'name' => 'estadio', 'type' => 'text', 'required' => true],
        ['label' => 'Estado', 'name' => 'estado', 'type' => 'text', 'required' => true],
        ['label' => 'País', 'name' => 'pais', 'type' => 'text', 'required' => true],
        ['label' => 'Escudo', 'name' => 'escudo', 'type' => 'text', 'required' => false],
    ];

    public function __construct(Time $model)
    {
        $this->model = $model;
    }
}
