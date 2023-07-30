<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-slate-300 leading-tight sm:before:'sm'">
                {{ __('Editando o time') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 sm:p-6 bg-white dark:bg-slate-800 dark:text-slate-300 border-b border-gray-200">
                    <form id="form-edit" method="POST" action="{{ route('admin.times.update', $time->id) }}">
                        @method('PUT')
                        @csrf

                        @foreach($fields as $key => $field)
                        <label class="block pb-4">
                            <span class="{{ $field['required'] ? "after:content-['*'] after:ml-0.5 after:text-red-500 " : "" }}block text-sm font-medium text-slate-700">
                                {{ $field['label'] }}:
                            </span>

                            @if($field['type'] === 'select')
                                <select name="{{ $field['name'] }}" class="vb-custom-input italic">
                                    @foreach(${$field['options']} as $option)
                                        <option value="{{ $option->id }}" {{ $option->id === $time->{$field['name']} ? 'selected' : '' }}>
                                            {{ $option->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            @else
                                <input class="vb-custom-input italic"
                                       type="{{ $field['type'] }}"
                                       name="{{ $field['name'] }}"
                                       value="{{ $field['name'] === 'password' ? '' : $time->{$field['name']} }}"
                                       placeholder="Digite a(o) {{ $field['label'] }}..." />
                            @endif

                            @error($field['name'])
                            <p class="mt-2 peer-invalid:visible text-red-500 text-sm">
                                {{ $message }}
                            </p>
                            @enderror
                        </label>
                        @endforeach
                    </form>

                    <form id="form-delete" action="{{ route('admin.times.destroy', $time->id) }}" method="POST" class="hidden">
                        @method('DELETE')
                        @csrf
                    </form>

                    <div class="grid gap-4 mt-4">
                        <button form="form-delete" class="btn-primary bg-red-700 hover:bg-red-800">Excluir</button>
                        <a class="btn-secondary col-end-6" href="{{ url()->previous() }}">Cancelar</a>
                        <button form="form-edit" type="submit" class="btn-primary col-end-7">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
