<?php

namespace Bolao\Http\Controllers\Admin;

use Bolao\Models\Campeonato;
use Bolao\Forms\CampeonatoForm;
use Bolao\Http\Controllers\Controller;

class CampeonatoController extends Controller
{
    public function index()
    {
        $campeonatos = Campeonato::orderBy('nome')->paginate(15)->appends(request()->query());
        return view('admin.campeonato.index', compact('campeonatos'));
    }

    public function create()
    {
        $form = \FormBuilder::create(CampeonatoForm::class, [
            'url' => route('admin.campeonato.store'),
            'method' => 'POST'
        ]);
        return view('admin.campeonato.add', compact('form'));
    }

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

    public function show(Campeonato $campeonato)
    {
        return view('admin.campeonato.show', compact('campeonato'));
    }

    public function edit(Campeonato $campeonato)
    {
        $form = \FormBuilder::create(CampeonatoForm::class, [
            'url' => route('admin.campeonato.update', ['campeonato' => $campeonato->id]),
            'method' => 'PUT',
            'model' => $campeonato
        ]);
        return view('admin.campeonato.edit', compact('form'));
    }

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

    public function destroy(Campeonato $campeonato)
    {
        $campeonato->delete();
        return redirect()->route('admin.campeonato.index');
    }
}
