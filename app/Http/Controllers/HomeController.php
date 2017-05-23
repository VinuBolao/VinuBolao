<?php

namespace Bolao\Http\Controllers;

use Bolao\Bolao;
use Bolao\Campeonato;
use Bolao\Jogo;
use Bolao\Palpite;
use Bolao\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Bolao::all();
        return view('bolao.home', ['boloes' => $data]);
    }

    public function classificacao()
    {
        $data = User::all();
        return view('bolao.classificacao', ['participantes' => $data]);
    }

    public function jogos($camp_id = 1, $rodada = 1)
    {
        $jogos = Jogo::where(['campeonato_id' => $camp_id, 'rodada' => $rodada])->get();
        $campeonatos = Campeonato::all();
        return view('bolao.jogos', [
            'jogos' => $jogos,
            'campeonatos' => $campeonatos,
            'camp_id' => $camp_id,
            'rodada' => $rodada
        ]);
    }

    public function palpites($camp_id = 1, $rodada = 1)
    {
        $jogos = Palpite::where('user_id', Auth::user()->id)->get();
        $campeonatos = Campeonato::all();
        return view('bolao.palpites', [
            'palpites' => $jogos,
            'campeonatos' => $campeonatos,
            'camp_id' => $camp_id,
            'rodada' => $rodada
        ]);
    }

    public function save(Request $request)
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

        return redirect()->action('HomeController@palpites');
    }
}
