<?php

namespace Bolao\Http\Controllers;

use Bolao\Campeonato;
use Bolao\Palpite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PalpiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jogos = Palpite::where('user_id', Auth::user()->id)->get();
        $campeonatos = Campeonato::all();
        return view('palpite.index', [
            'palpites' => $jogos,
            'campeonatos' => $campeonatos,
            'camp_id' => $campeonatos[0]->id,
            'rodada' => 1
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
        $palpites = $request->all();
        $data =[];

        foreach ($palpites['jogo'] as $key => $palpite){
            $palpite['jogo_id'] = $key;
            $palpite['user_id'] = $palpites['user'];
            $palpite['horario'] = date('Y-m-d H:i:s');
            array_push($data, $palpite);
        }

        foreach ($data as $item){
            Palpite::create($item);
        }

        return redirect()->action('PalpiteController@index');
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
        //
    }
}
