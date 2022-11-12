<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight sm:before:'sm'">
                {{ __('Gerenciando participantes') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(Auth::user()->master)
                <form method="POST" action="{{ route('participantes.store') }}" class="flex items-center justify-between p-3 sm:p-6 border-b border-gray-200 gap-4">
                    @csrf

                    <input type="hidden" name="bolao_id" value="{{ $bolaoId }}">

                    <select name="user_id" class="vb-custom-input italic">
                        <option value="">Selecione um usuário...</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn-primary">Adicionar</button>
                </form>
                @endif

                @if(count($participantes) > 0)
                    <div class="p-3 sm:p-6 border-b border-gray-200">
                        <div class="hidden md:flex md:flex-row border-b-2 pb-2 font-bold">
                            <div class="flex items-start justify-end order-last mr-4">Ações</div>
                            <div class="px-2">#</div>
                            <div class="px-2 flex-1 truncate">Nome</div>
                            <div class="px-2 flex-1 truncate">Criação</div>
                        </div>

                        @foreach ($participantes as $key => $participante)
                            <div class="flex flex-col md:flex-row border-b-2 last:border-none py-2">
                                <div class="flex items-start justify-end order-last">
                                    @if(Auth::user()->master)
                                    <form action="{{ route('participantes.destroy', $participante->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn-primary bg-red-700 hover:bg-red-800">Excluir</button>
                                    </form>
                                    @endif
                                </div>
                                <div class="p-2">{{ $key + 1 }}</div>
                                <div class="p-2 flex-1 truncate">
                                    <span class="font-bold md:hidden">Nome:</span>
                                    <span>{{ $participante->user->name }}</span>
                                </div>
                                <div class="p-2 flex-1 truncate">
                                    <span class="font-bold md:hidden">Criação:</span>
                                    <span>{{ $participante->created_format }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                @else
                    <div id="box-empty">Não existem dados para listar!</div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
