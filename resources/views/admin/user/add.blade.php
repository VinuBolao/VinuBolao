<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-slate-300 leading-tight sm:before:'sm'">
                {{ __('Criando novo usuário') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 sm:p-6 bg-white dark:bg-slate-800 dark:text-slate-300 border-b border-gray-200 last:border-b-0">
                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf

                        <label class="block pb-4">
                            <div class="flex items-center gap-2">
                                <span class="block text-sm font-medium text-slate-700 dark:text-slate-100">
                                    Permissão administrador:
                                </span>
                                <input type="checkbox" name="master" class="rounded-sm cursor-pointer" placeholder="Digite a permissão" />
                            </div>

                            @error('master')
                            <p class="mt-2 peer-invalid:visible text-red-500 text-sm">
                                {{ $message }}
                            </p>
                            @enderror
                        </label>

                        <label class="block pb-4">
                            <div class="flex items-center gap-2">
                                <span class="block text-sm font-medium text-slate-700 dark:text-slate-100">
                                    Permissão para gerenciar:
                                </span>
                                <input type="checkbox" name="manager" class="rounded-sm cursor-pointer" placeholder="Digite a permissão" />
                            </div>

                            @error('manager')
                            <p class="mt-2 peer-invalid:visible text-red-500 text-sm">
                                {{ $message }}
                            </p>
                            @enderror
                        </label>

                        @foreach($fields as $key => $field)
                        <label class="block pb-4">
                            <span class="{{ $field['required'] ? "after:content-['*'] after:ml-0.5 after:text-red-500 " : "" }}block text-sm font-medium text-slate-700">
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
                            <a class="btn-secondary" href="{{ url()->previous() }}">Cancelar</a>
                            <button type="submit" class="btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
