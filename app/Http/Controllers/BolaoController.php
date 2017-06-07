<?php

namespace Bolao\Http\Controllers;

use Bolao\User;
use Bolao\Bolao;
use Bolao\Campeonato;
use Bolao\Participante;
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

    public function classificacao()
    {
        $boloes = Bolao::where(['user_id' => Auth::user()->id])->get();
        $participantes = [];
        if(count($boloes)>0){
            $participantes = Participante::where(['bolao_id' => $boloes[0]->id])
                ->orderBy('pontosganhos', 'DESC')
                ->orderBy('placarexato', 'DESC')
                ->orderBy('placarvencedor', 'DESC')
                ->get();
        }
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
        $bolao_id = Bolao::create($request->all())->id;

        $participante = new Participante;
        $participante->user_id = $request->user_id;
        $participante->bolao_id = $bolao_id;
        $participante->save();

        return redirect()->action('BolaoController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $bolao = Bolao::findOrFail($id);
        return view('bolao.edit', ['bolao' => $bolao]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = Bolao::findOrFail($id);

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
    public function destroy($id)
    {
        $page = Bolao::findOrFail($id);
        $page->delete();
        return redirect()->action('BolaoController@index');
    }
}
