<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campeonato;
use App\Traits\TraitCrud;

class CampeonatoController extends Controller
{
    use TraitCrud;

    protected $model;

    protected $prefixView = "admin.campeonato";

    protected $relationships = [];

    protected $fields = [
        ['label' => 'Nome', 'name' => 'nome', 'type' => 'text', 'required' => true],
        ['label' => 'Nome completo', 'name' => 'nome_completo', 'type' => 'text', 'required' => true],
        ['label' => 'Quantidade de times', 'name' => 'qtd_times', 'type' => 'number', 'required' => true],
        ['label' => 'Quantidade de rodadas', 'name' => 'qtd_rodadas', 'type' => 'number', 'required' => true],
        ['label' => 'Rodada atual', 'name' => 'rodada', 'type' => 'number', 'required' => true],
        ['label' => 'Temporada', 'name' => 'temporada', 'type' => 'number', 'required' => true],
        ['label' => 'Série', 'name' => 'serie', 'type' => 'text', 'required' => true],
        ['label' => 'Estado', 'name' => 'estado', 'type' => 'text', 'required' => false],
        ['label' => 'País', 'name' => 'pais', 'type' => 'text', 'required' => true],
        ['label' => 'Inicio', 'name' => 'inicio', 'type' => 'date', 'required' => true],
        ['label' => 'Termino', 'name' => 'termino', 'type' => 'date', 'required' => true],
    ];

    public function __construct(Campeonato $model)
    {
        $this->model = $model;
    }
}
