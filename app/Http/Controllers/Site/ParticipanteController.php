<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Bolao;
use App\Models\Participante;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ParticipanteController extends Controller
{
    protected $model;

    public function __construct(Participante $model)
    {
        $this->model = $model;
    }

    public function getByBolao(Bolao $bolao, User $user, $id)
    {
        $users = $user->orderBy('name')->get();
        $userBolao = $bolao->getByUser(Auth::id());
        $participantes = $this->model->with('user')->where('bolao_id', $id)->get();

        return Inertia::render('Participantes', [
            'title' => 'Gerenciando participantes',
            'subtitle' => "",
            'users' => $users,
            'bolao' => $userBolao ?? false,
            'participantes' => $participantes
        ]);
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
