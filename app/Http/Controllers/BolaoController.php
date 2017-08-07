<?php

namespace Bolao\Http\Controllers;

use Bolao\Models\Bolao;
use Bolao\Models\Campeonato;
use Bolao\Models\Participante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BolaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boloes = Bolao::all();
        return view('bolao.index', compact('boloes'));
    }

    public function regulamento()
    {
        return view('regulamento');
    }

    public function classificacao()
    {
        $participantes = Participante::where('user_id', Auth::id())->first();
        return view('classificacao.index', compact('participantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('bolao.add')->with('campeonatos', Campeonato::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bolaoId = Bolao::create($request->all())->id;

        $participante = new Participante;
        $participante->user_id = $request->user_id;
        $participante->bolao_id = $bolaoId;
        $participante->save();

        return redirect()->action('BolaoController@index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($bolaoId)
    {
        $bolao = Bolao::findOrFail($bolaoId);
        return view('bolao.edit', ['bolao' => $bolao]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bolaoId)
    {
        $page = Bolao::findOrFail($bolaoId);

        $page->user_id       = $request->user;
        $page->campeonato_id = $request->campeonato;
        $page->nome          = $request->name;
        $page->inicio        = $request->datainicio;
        $page->descricao     = $request->description;
        $page->save();

        return response()->redirectToRoute('bolao.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($bolaoId)
    {
        $page = Bolao::findOrFail($bolaoId);
        $page->delete();
        return redirect()->action('BolaoController@index');
    }
}
