<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait TraitCrud
{
    public function index(Request $request)
    {
        $table = $this->model->getTable();

        $order = property_exists($this->model, 'order') ? $this->model->order : "id";

        ${$table} = $this->model->with($this->relationships);

        foreach ($request->all() as $key => $item) {
            if ($key != 'page' && $item) ${$table} = ${$table}->where($key, 'like', "%{$request->get($key)}%");
        }

        ${$table} = ${$table}->orderByRaw($order)->paginate(10)->withQueryString();

        return view("{$this->prefixView}.index", compact($table));
    }

    public function create()
    {
        return view("{$this->prefixView}.add", ['fields' => $this->fields]);
    }

    public function store(Request $request)
    {
        $request->validate($this->model->rules());

        $this->model->create($request->all());

        return redirect()->route("{$this->prefixView}s.index");
    }

    public function edit($id)
    {
        $name = substr($this->model->getTable(), 0, -1);
        return view("{$this->prefixView}.edit", ['fields' => $this->fields, "{$name}" => $this->model->findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $rules = $this->model->rules();
        $data = $request->except(['_method', '_token', 'password_confirmation']);

        if ($request->has('password') && empty($request->get('password'))) {
            unset($data['password']);
            unset($rules['password']);
        }

        if ($this->model->getTable() === 'users') {
            $data['master'] = $request->has('master');
            $data['manager'] = $request->has('manager');
        }

        if ($request->has('email')) {
            $rules['email'] = "sometimes|required|email|unique:{$this->model->getTable()},email,{$id}";
        }

        if ($request->has('username')) {
            $rules['username'] = "sometimes|required|min:3|max:50|unique:{$this->model->getTable()},username,{$id}";
        }

        $request->validate($rules);
        $this->model->findOrFail($id)->update($data);

        return redirect()->route("{$this->prefixView}s.index");
    }

    public function destroy($id)
    {
        $this->model->destroy($id);
        return redirect()->route("{$this->prefixView}s.index");
    }
}
