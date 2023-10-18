<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-slate-300 leading-tight sm:before:'sm'">
                {{ __('Criando novo bolão') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 sm:p-6 bg-white dark:bg-slate-800 dark:text-slate-300 border-b border-gray-200">
                    <form method="POST" action="{{ route('bolaos.store') }}">
                        @csrf

                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                        <label class="block pb-4" for="ativo">
                            <div class="flex items-center gap-2">
                                <span class="block text-sm font-medium text-slate-700 dark:text-slate-100">Ativar bolão?:</span>
                                <input id="ativo" type="checkbox" name="ativo" class="rounded-sm cursor-pointer dark:bg-slate-800" />
                            </div>
                        </label>

                        @foreach($fields as $key => $field)
                        <label class="block pb-4">
                            <span class="{{ $field['required'] ? "after:content-['*'] after:ml-0.5 after:text-red-500 " : "" }}block text-sm font-medium text-slate-700 capitalize dark:text-slate-100">
                                {{ $field['label'] }}:
                            </span>

                            @if($field['type'] === 'select')
                                <select name="{{ $field['name'] }}" class="vb-custom-input italic">
                                    @foreach(${$field['options']} as $option)
                                        <option value="{{ $option->id }}">{{ $option->nome }}</option>
                                    @endforeach
                                </select>
                            @else
                                <input class="vb-custom-input italic"
                                       type="{{ $field['type'] }}"
                                       name="{{ $field['name'] }}"
                                       value="{{ old($field['name']) }}"
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
                            <span class="block text-sm font-medium text-slate-700 dark:text-slate-100 capitalize">
                                {{ $field['label'] }}:
                            </span>

                            <textarea class="vb-custom-input italic" name="descricao" rows="8" placeholder="Digite a descrição..."></textarea>

                            @error('descricao')
                            <p class="mt-2 peer-invalid:visible text-red-500 text-sm">
                                {{ $message }}
                            </p>
                            @enderror
                        </label>

                        <div class="flex justify-end gap-4 mt-4">
                            <a class="btn-secondary" href="{{ route('bolaos.index') }}">Cancelar</a>
                            <button type="submit" class="btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
