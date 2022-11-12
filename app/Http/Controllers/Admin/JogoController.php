<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bolao;
use App\Models\Campeonato;
use App\Models\Jogo;
use App\Models\Time;
use App\Traits\TraitCrud;

class JogoController extends Controller
{
    use TraitCrud;

    protected $model;

    protected $prefixView = "admin.jogo";

    protected $relationships = ['bolao', 'campeonato', 'timecasa', 'timefora'];

    protected $fields = [
        ['label' => 'Bolão', 'name' => 'bolao_id', 'type' => 'select', 'options' => 'boloes', 'required' => true],
        ['label' => 'Campeonato', 'name' => 'campeonato_id', 'type' => 'select', 'options' => 'campeonatos', 'required' => true],
        ['label' => 'Rodada', 'name' => 'rodada', 'type' => 'number', 'required' => true],
        ['label' => 'Mandante', 'name' => 'timecasa_id', 'type' => 'select', 'options' => 'times', 'required' => true],
        ['label' => 'Placar Casa', 'name' => 'placar_casa', 'type' => 'number', 'required' => false],
        ['label' => 'Placar Casa', 'name' => 'placar_fora', 'type' => 'number', 'required' => false],
        ['label' => 'Visitante', 'name' => 'timefora_id', 'type' => 'select', 'options' => 'times', 'required' => true],
        ['label' => 'Inicio', 'name' => 'inicio', 'type' => 'datetime-local', 'required' => true],
    ];

    public function __construct(Jogo $model)
    {
        $this->model = $model;
    }

    public function create()
    {
        $fields = $this->fields;

        $times = Time::orderBy('nome')->get();
        $boloes = Bolao::orderBy('nome')->get();
        $campeonatos = Campeonato::orderBy('nome')->get();

        return view("admin.jogo.add", compact('fields', 'boloes', 'times', 'campeonatos'));
    }

    public function edit($id)
    {
        $fields = $this->fields;

        $jogo = $this->model->findOrFail($id);
        $times = Time::orderBy('nome')->get();
        $boloes = Bolao::orderBy('nome')->get();
        $campeonatos = Campeonato::orderBy('nome')->get();

        return view("admin.jogo.edit", compact('fields', 'jogo', 'boloes', 'times', 'campeonatos'));
    }
}
