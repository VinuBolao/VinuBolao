<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight sm:before:'sm'">
                {{ __('Criando novo campeonato') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 sm:p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.campeonatos.store') }}">
                        @csrf

                        @foreach($fields as $key => $field)
                        <label class="block pb-4">
                            <span class="{{ $field['required'] ? "after:content-['*'] after:ml-0.5 after:text-red-500 " : "" }}block text-sm font-medium text-slate-700 capitalize">
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

                        <div class="flex justify-end gap-4 mt-4">
                            <a class="btn-secondary" href="{{ route('admin.campeonatos.index') }}">Cancelar</a>
                            <button type="submit" class="btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
