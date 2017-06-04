<?php

namespace Bolao\Http\Controllers;

use Bolao\Bolao;
use Bolao\Participante;
use Bolao\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participantes = Participante::where(['bolao_id' => 5])->get();
        $boloes = Bolao::where(['user_id' => Auth::user()->id])->get();
        $users = User::all();
        return view('participante.index', [
            'participantes' => $participantes,
            'boloes' => $boloes,
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Participante::create($request->all());
        return redirect()->action('ParticipanteController@index');
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participante = Participante::findOrFail($id);
        $participante->delete();
        return redirect()->action('ParticipanteController@index');
    }
}
