<?php

namespace Bolao\Http\Controllers\Admin;

use Bolao\Models\Campeonato;
use Bolao\Forms\CampeonatoForm;
use Bolao\Http\Controllers\Controller;

class CampeonatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campeonatos = Campeonato::orderBy('nome')->paginate(15)->appends(request()->query());
        return view('admin.campeonato.index', compact('campeonatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(CampeonatoForm::class, [
            'url' => route('admin.campeonato.store'),
            'method' => 'POST'
        ]);
        return view('admin.campeonato.add', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $form = \FormBuilder::create(CampeonatoForm::class);
        if(!$form->isValid()){
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $campeonato = $form->getFieldValues();
        Campeonato::create($campeonato);
        return redirect()->route('admin.campeonato.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Bolao\Models\Campeonato  $campeonato
     * @return \Illuminate\Http\Response
     */
    public function show(Campeonato $campeonato)
    {
        return view('admin.campeonato.show', compact('campeonato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Bolao\Models\Campeonato  $campeonato
     * @return \Illuminate\Http\Response
     */
    public function edit(Campeonato $campeonato)
    {
        $form = \FormBuilder::create(CampeonatoForm::class, [
            'url' => route('admin.campeonato.update', ['campeonato' => $campeonato->id]),
            'method' => 'PUT',
            'model' => $campeonato
        ]);
        return view('admin.campeonato.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Campeonato $campeonato
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Campeonato $campeonato)
    {
        $form = \FormBuilder::create(CampeonatoForm::class);
        if(!$form->isValid()){
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $data = $form->getFieldValues();
        $campeonato->update($data);
        return redirect()->route('admin.campeonato.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Bolao\Models\Campeonato  $campeonato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campeonato $campeonato)
    {
        $campeonato->delete();
        return redirect()->route('admin.campeonato.index');
    }

    public function teste()
    {
        $html = file_get_contents("https://globoesporte.globo.com/servico/backstage/esportes_campeonato/esporte/futebol/modalidade/futebol_de_campo/categoria/profissional/campeonato/campeonato-brasileiro/edicao/campeonato-brasileiro-2018/fases/fase-unica-seriea-2018/rodada/19/jogos.html");
        $doc = new \DOMDocument();
        @$doc->loadHTML($html);

        $divs = $doc->getElementsByTagName("div");
        $spans = $doc->getElementsByTagName("span");

        $infos = [];
        $mandantes = [];
        $visitantes = [];

        foreach ($divs as $key => $item) {
            if (strtolower($item->getAttribute("class")) == "placar-jogo-informacoes") {
                $infos[] = $item->nodeValue;
            }
        }

        foreach ($spans as $key => $item) {
            if (strtolower($item->getAttribute("class")) == "placar-jogo-equipes-item placar-jogo-equipes-mandante") {
                $mandantes[] = $item->nodeValue;
            }

            if (strtolower($item->getAttribute("class")) == "placar-jogo-equipes-item placar-jogo-equipes-visitante") {
                $visitantes[] = $item->nodeValue;
            }
        }

        return [$infos, $mandantes, $visitantes];
    }
}
