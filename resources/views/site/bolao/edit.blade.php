<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-slate-300 leading-tight sm:before:'sm'">
                {{ __('Editando o bolão') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 sm:p-6 bg-white dark:bg-slate-800 dark:text-slate-300 border-b border-gray-200">
                    <form id="form-edit" method="POST" action="{{ route('bolaos.update', $bolao->id) }}">
                        @method('PUT')
                        @csrf

                        <input type="hidden" name="user_id" value="{{ $bolao->user_id }}">

                        <label class="block pb-4" for="ativo">
                            <div class="flex items-center gap-2">
                                <span class="block text-sm font-medium text-slate-700">Ativar bolão?:</span>
                                <input id="ativo" type="checkbox" name="ativo" class="rounded-sm cursor-pointer" {{ $bolao->ativo ? 'checked' : '' }} />
                            </div>
                        </label>

                        @foreach($fields as $key => $field)
                        <label class="block pb-4">
                            <span class="{{ $field['required'] ? "after:content-['*'] after:ml-0.5 after:text-red-500 " : "" }}block text-sm font-medium text-slate-700">
                                {{ $field['label'] }}:
                            </span>

                            @if($field['type'] === 'select')
                                <select name="{{ $field['name'] }}" class="vb-custom-input italic">
                                    @foreach(${$field['options']} as $option)
                                        <option value="{{ $option->id }}" {{ $option->id === $bolao->{$field['name']} ? 'selected' : '' }}>
                                            {{ $option->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            @else
                                <input class="vb-custom-input italic"
                                       type="{{ $field['type'] }}"
                                       name="{{ $field['name'] }}"
                                       value="{{ $field['name'] === 'inicio' ? \Carbon\Carbon::parse($bolao->inicio)->format('Y-m-d') : $bolao->{$field['name']} }}"
                                       placeholder="Digite a(o) {{ $field['label'] }}..." />
                            @endif

                            @error($field['name'])
                            <p class="mt-2 peer-invalid:visible text-red-500 text-sm">
                                {{ $message }}
                            </p>
                            @enderror
                        </label>
                        @endforeach

                        <label class="block pb-4">
                            <span class="block text-sm font-medium text-slate-700 capitalize">
                                {{ $field['label'] }}:
                            </span>

                            <textarea class="vb-custom-input italic" name="descricao" rows="8" placeholder="Digite a descrição...">{{ $bolao->descricao }}</textarea>

                            @error('descricao')
                            <p class="mt-2 peer-invalid:visible text-red-500 text-sm">
                                {{ $message }}
                            </p>
                            @enderror
                        </label>
                    </form>

                    <form id="form-delete" action="{{ route('bolaos.destroy', $bolao->id) }}" method="POST" class="hidden">
                        @method('DELETE')
                        @csrf
                    </form>

                    <div class="grid gap-4 mt-4">
                        <button form="form-delete" class="btn-primary bg-red-700 hover:bg-red-800">Excluir</button>
                        <a class="btn-secondary col-end-6" href="{{ route('bolaos.index') }}">Cancelar</a>
                        <button form="form-edit" type="submit" class="btn-primary col-end-7">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
