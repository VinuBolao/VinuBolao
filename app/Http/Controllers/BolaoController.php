<?php

namespace Bolao\Http\Controllers;

use Bolao\Bolao;
use Bolao\Campeonato;
use Illuminate\Http\Request;

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
        Bolao::create($request->all());
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
        return view('bolao.edit', compact('bolao'));
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
        $page->update($request->all());
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
        return response()->redirectToRoute('bolao.index');
    }
}
