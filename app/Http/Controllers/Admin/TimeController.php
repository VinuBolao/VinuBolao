<?php

namespace Bolao\Http\Controllers\Admin;

use Bolao\Forms\TimeForm;
use Bolao\Models\Time;
use Illuminate\Http\Request;
use Bolao\Http\Controllers\Controller;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $times = Time::paginate(20);
        return view('admin.time.index', compact('times'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(TimeForm::class, [
            'url' => route('admin.time.store'),
            'method' => 'POST'
        ]);

        return view('admin.time.add', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \Bolao\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function show(Time $time)
    {
        return view('admin.time.show', compact('time'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Bolao\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function edit(Time $time)
    {
        $form = \FormBuilder::create(TimeForm::class, [
            'url' => route('admin.time.update', ['time' => $time->id]),
            'method' => 'PUT',
            'model' => $time
        ]);

        return view('admin.time.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Bolao\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Bolao\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function destroy(Time $time)
    {
        $time->delete();
        return redirect()->route('admin.time.index');
    }
}
