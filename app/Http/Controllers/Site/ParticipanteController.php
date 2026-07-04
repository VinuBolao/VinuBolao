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

    public function getByBolao(User $user, $id)
    {
        $users = $user->orderBy('name')->get();
        $bolao = Bolao::where('id', $id)->first();
        $participantes = $this->model
            ->with('user')
            ->where('bolao_id', $id)
            ->orderBy('id', 'desc')
            ->get();

        return Inertia::render('Participantes', [
            'title' => 'Participantes',
            'subtitle' => "Lista de participantes do bolão: <strong>{$bolao?->nome}</strong>!",
            'users' => $users,
            'bolao_id' => $bolao?->id,
            'participantes' => $participantes,
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
