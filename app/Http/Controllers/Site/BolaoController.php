<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Bolao;
use App\Models\Campeonato;
use App\Models\Participante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

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

    public function index(Participante $participante)
    {
        $bolaos = $this->model->listByUser(Auth::id())->orderByRaw($this->model->order)->paginate(50)->withQueryString();

        $bolaos->transform(function ($bolao) use ($participante) {
            $bolao->campeoes = $participante->getRanking($bolao->campeonato_id, 0, 0);
            return $bolao;
        });

        return Inertia::render('Bolao', [
            'title' => 'Lista de Bolões',
            'subtitle' => "Veja a lista de bolões que você participa!",
            'bolaos' => $bolaos,
        ]);
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

    public function finish(Request $request, Participante $participante)
    {
        if ($request->has('id')) {
            $id = $request->get('id');
            $bolao = $this->model->findOrFail($id);

            $data = $participante->getRanking($bolao->campeonato_id);

            foreach ($data as $key => $item) {
                $participante->where(['bolao_id' => $id, 'user_id' => $item->id])->update([
                    'pontosganhos' => $item->pontosganhos,
                    'placarexato' => $item->placarexato,
                    'placarvencedor' => $item->placarvencedor,
                    'posicao' => $key + 1,
                ]);
            }

            $this->model->where(['id' => $id])->update(['ativo' => 0]);
        }

        return redirect()->route("bolaos.index");
    }
}
