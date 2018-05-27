<?php

namespace Bolao\Http\Controllers\Admin;

use Bolao\Forms\JogoForm;
use Bolao\Models\Campeonato;
use Bolao\Models\Jogo;
use Illuminate\Http\Request;
use Bolao\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;

class JogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $campeonatos = Campeonato::all();
        if($request->campeonatoId > 0 && $request->rodada > 0) {
            $jogos = Jogo::with('timecasa', 'timefora', 'campeonato')
                ->where('campeonato_id', $request->campeonatoId)
                ->where('rodada', $request->rodada)
                ->orderBy('rodada')
                ->orderBy('inicio')
                ->paginate(10)
                ->appends(request()->query());
        } elseif($request->campeonatoId > 0 || $request->rodada > 0) {
            $jogos = Jogo::with('timecasa', 'timefora', 'campeonato')
                ->where('campeonato_id', $request->campeonatoId)
                ->orWhere('rodada', $request->rodada)
                ->orderBy('rodada')
                ->orderBy('inicio')
                ->paginate(10)
                ->appends(request()->query());
        } else {
            $jogos = Jogo::with('timecasa', 'timefora', 'campeonato')
                ->orderBy('rodada')
                ->orderBy('inicio')
                ->paginate(10)
                ->appends(request()->query());
        }
        return view('admin.jogo.index', compact('jogos', 'campeonatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(JogoForm::class, [
            'url' => route('admin.jogo.store'),
            'method' => 'POST'
        ]);
        return view('admin.jogo.add', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = \FormBuilder::create(JogoForm::class);
        if(!$form->isValid()){
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $jogo = $form->getFieldValues();
        $jogo['inicio'] = $jogo['inicio'] . " " . $jogo['horario'];
        unset($jogo['horario']);
        Jogo::create($jogo);
        return redirect()->route('admin.jogo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Bolao\Models\Jogo  $jogo
     * @return \Illuminate\Http\Response
     */
    public function show(Jogo $jogo)
    {
        return view('admin.jogo.show', compact('jogo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Bolao\Models\Jogo  $jogo
     * @return \Illuminate\Http\Response
     */
    public function edit(Jogo $jogo)
    {
        $form = \FormBuilder::create(JogoForm::class, [
            'url' => route('admin.jogo.update', ['jogo' => URL::previous()]),
            'method' => 'PUT',
            'model' => $jogo,
            'previous' => URL::previous()
        ]);
        return view('admin.jogo.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Bolao\Models\Jogo  $jogo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jogo $jogo)
    {
        echo "<pre>" . print_r($jogo, true) . "</pre>";
        die('FILE ' . __FILE__ . ' LINE ' . __LINE__);
        $form = \FormBuilder::create(JogoForm::class, [
            'data' => ['campeonato_id' => $jogo->campeonato_id, 'timecasa_id' => $jogo->timecasa_id, 'timefora_id' => $jogo->timefora_id]
        ]);
        if(!$form->isValid()){
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $data = $form->getFieldValues();
        $data['inicio'] = $data['inicio'] . " " . $data['horario'];
        unset($data['horario']);
        $jogo->update($data);
        return redirect()->route('admin.jogo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Bolao\Models\Jogo  $jogo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jogo $jogo)
    {
        $jogo->delete();
        return redirect()->route('admin.jogo.index');
    }
}
