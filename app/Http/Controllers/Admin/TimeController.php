<?php

namespace Bolao\Http\Controllers\Admin;

use Bolao\Forms\TimeForm;
use Bolao\Models\Time;
use Illuminate\Http\Request;
use Bolao\Http\Controllers\Controller;

class TimeController extends Controller
{
    public function index()
    {
        $times = Time::orderBy('nome')->paginate(20)->appends(request()->query());
        return view('admin.time.index', compact('times'));
    }

    public function create()
    {
        $form = \FormBuilder::create(TimeForm::class, [
            'url' => route('admin.time.store'),
            'method' => 'POST'
        ]);
        return view('admin.time.add', compact('form'));
    }

    public function store(Request $request)
    {
        $form = \FormBuilder::create(TimeForm::class);
        if(!$form->isValid()){
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $time = $form->getFieldValues();
        Time::create($time);
        return redirect()->route('admin.time.index');
    }

    public function show(Time $time)
    {
        return view('admin.time.show', compact('time'));
    }

    public function edit(Time $time)
    {
        $form = \FormBuilder::create(TimeForm::class, [
            'url' => route('admin.time.update', ['time' => $time->id]),
            'method' => 'PUT',
            'model' => $time
        ]);
        return view('admin.time.edit', compact('form'));
    }

    public function update(Request $request, Time $time)
    {
        $form = \FormBuilder::create(TimeForm::class);
        if(!$form->isValid()){
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $data = $form->getFieldValues();
        $time->update($data);
        return redirect()->route('admin.time.index');
    }

    public function destroy(Time $time)
    {
        $time->delete();
        return redirect()->route('admin.time.index');
    }
}
