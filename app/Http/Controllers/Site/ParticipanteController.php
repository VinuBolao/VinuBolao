<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Participante;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParticipanteController extends Controller
{
    protected $model;

    protected $relationships = ['user'];

    public function __construct(Participante $model)
    {
        $this->model = $model;
    }

    public function getByBolao(User $user, $id)
    {
        $bolaoId = $id;
        $users = $user->orderBy('name')->get();
        $participantes = $this->model->where('bolao_id', $id)->get();

        return view("site.bolao.participants", compact('users', 'participantes', 'bolaoId'));
    }

    public function store(Request $request)
    {
        $request->validate($this->model->rules());

        if (Auth::user()->master) {
            $this->model->create($request->all());
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        if (Auth::user()->master) {
            $this->model->destroy($id);
        }

        return redirect()->back();
    }
}
