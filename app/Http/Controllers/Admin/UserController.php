<?php

namespace Bolao\Http\Controllers\Admin;

use Bolao\Forms\UserForm;
use Bolao\Models\User;
use Illuminate\Http\Request;
use Bolao\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('master', 'desc')->orderBy('name')->paginate(15)->appends(request()->query());
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $form = \FormBuilder::create(UserForm::class, [
            'url' => route('admin.user.store'),
            'method' => 'POST'
        ]);
        return view('admin.user.add', compact('form'));
    }

    public function store(Request $request)
    {
        $form = \FormBuilder::create(UserForm::class);
        if(!$form->isValid()){
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $user = $form->getFieldValues();
        $user['password'] = bcrypt($user['password']);
        User::create($user);
        return redirect()->route('admin.user.index');
    }

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $form = \FormBuilder::create(UserForm::class, [
            'url' => route('admin.user.update', ['user' => $user->id]),
            'method' => 'PUT',
            'model' => $user
        ]);
        return view('admin.user.edit', compact('form'));
    }

    public function update(User $user)
    {
        $form = \FormBuilder::create(UserForm::class, [
            'data' => ['id' => $user->id, 'master' => $user->master]
        ]);
        if(!$form->isValid()){
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $data = $form->getFieldValues();
        if($user->password === $data['password']){
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }
        $user->update($data);
        return redirect()->route('admin.user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
