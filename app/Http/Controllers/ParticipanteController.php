<?php

namespace Bolao\Http\Controllers;

use Bolao\Models\Bolao;
use Bolao\Models\Participante;
use Bolao\Models\User;
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
        $boloes = Bolao::where(['user_id' => Auth::user()->id])->get();
        $participantes = Participante::where(['bolao_id' => $boloes[0]->id])->get();
        $users = User::all();
        return view('participante.index', [
            'participantes' => $participantes,
            'boloes' => $boloes,
            'users' => $users
        ]);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $participanteId
     * @return \Illuminate\Http\Response
     */
    public function destroy($participanteId)
    {
        $participante = Participante::findOrFail($participanteId);
        $participante->delete();
        return redirect()->action('ParticipanteController@index');
    }
}
