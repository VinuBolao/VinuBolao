<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Bolao;
use App\Models\Campeonato;
use App\Models\Participante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BolaoController extends Controller
{
    protected $model;

    protected $relationships = ['user', 'campeonato'];

    protected $fields = [
        ['label' => 'Campeonato', 'name' => 'campeonato_id', 'type' => 'select', 'options' => 'campeonatos', 'required' => true],
        ['label' => 'Nome', 'name' => 'nome', 'type' => 'text', 'required' => true],
        ['label' => 'Data inicial', 'name' => 'inicio', 'type' => 'date', 'required' => true],
        ['label' => 'Pontos Placar Exato', 'name' => 'placar_exato', 'type' => 'number', 'required' => true],
        ['label' => 'Pontos Placar Vencedor', 'name' => 'placar_vencedor', 'type' => 'number', 'required' => true],
        ['label' => 'Dobro de Pontos', 'name' => 'rodada_dobro', 'type' => 'number', 'required' => false],
    ];

    public function __construct(Bolao $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $bolaos = $this->model->listByUser(Auth::id())->orderByRaw($this->model->order)->paginate(10)->withQueryString();;
        return view("site.bolao.index", compact('bolaos'));
    }

    public function create()
    {
        $fields = $this->fields;

        $campeonatos = Campeonato::orderBy('nome')->get();

        return view("site.bolao.add", compact('fields','campeonatos'));
    }

    public function store(Request $request)
    {
        $request->validate($this->model->rules());

        $data = $request->all();
        $data['ativo'] = $request->has('ativo');

        $bolao = $this->model->create($data);

        if ($bolao) {
            Participante::create(['user_id' => $bolao->user_id, 'bolao_id' => $bolao->id]);
        }

        return redirect()->route("bolaos.index");
    }

    public function edit($id)
    {
        $fields = $this->fields;

        $bolao = $this->model->findOrFail($id);

        $campeonatos = Campeonato::orderBy('nome')->get();

        return view("site.bolao.edit", compact('fields', 'bolao', 'campeonatos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->model->rules());

        $data = $request->all();
        $data['ativo'] = $request->has('ativo');

        $this->model->findOrFail($id)->update($data);

        return redirect()->route("bolaos.index");
    }

    public function destroy($id)
    {
        $participantes = Participante::where('bolao_id', $id)->count();

        if ($participantes <= 1) {
            Participante::where('bolao_id', $id)->delete();
        }

        $this->model->destroy($id);
        return redirect()->route("bolaos.index");
    }
}
