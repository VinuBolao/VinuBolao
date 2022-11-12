<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight sm:before:'sm'">
                {{ __('Lista de Jogos') }}
            </h2>

            <a class="btn-primary rounded-3xl p-[0.75rem]" href="{{ route('admin.jogos.create') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(count($jogos) > 0)

                <div class="p-3 sm:p-6 bg-white border-b border-gray-200">
                    <div class="hidden md:flex md:flex-row border-b-2 pb-4 font-bold">
                        <div class="flex items-start justify-end order-last mr-4">Ações</div>
                        <div class="px-2 w-8">#</div>
                        <div class="px-2 w-40 flex-1 truncate">Rodada</div>
                        <div class="px-2 w-40 flex-1 truncate">Campeonato</div>
                        <div class="px-2 w-40 flex-1 truncate">Mandante</div>
                        <div class="px-2 w-40 flex-1 truncate">Placar</div>
                        <div class="px-2 w-40 flex-1 truncate">Visitante</div>
                        <div class="px-2 w-40 flex-1 truncate">Inicio</div>
                    </div>

                    @foreach ($jogos as $key => $jogo)
                        <div class="flex flex-col md:flex-row border-b-2 last:border-none py-4">
                            <div class="flex items-start justify-end order-last">
                                <a href="{{ route('admin.jogos.edit', $jogo->id) }}" class="btn-primary">Editar</a>
                            </div>
                            <div class="p-2 w-8">{{ $key + 1 }}</div>
                            <div class="p-2 md:w-40 flex-1 truncate">
                                <span class="font-bold md:hidden">Rodada:</span>
                                <span>{{ $jogo->rodada }}ª</span>
                            </div>
                            <div class="p-2 md:w-40 flex-1 truncate">
                                <span class="font-bold md:hidden">Campeonato:</span>
                                <span>{{ $jogo->campeonato->nome }}</span>
                            </div>
                            <div class="p-2 md:w-40 flex-1 truncate">
                                <span class="font-bold md:hidden">Mandante:</span>
                                <span>{{ $jogo->timecasa->nome }}</span>
                            </div>
                            <div class="p-2 md:w-40 flex-1 truncate">
                                <span class="font-bold md:hidden">Placar:</span>
                                <span>{{ $jogo->placar_casa }} x {{ $jogo->placar_fora }}</span>
                            </div>
                            <div class="p-2 md:w-60 flex-1 truncate">
                                <span class="font-bold md:hidden">Visitante:</span>
                                <span>{{ $jogo->timefora->nome }}</span>
                            </div>
                            <div class="p-2 md:w-40 flex-1 truncate">
                                <span class="font-bold md:hidden">Inicio:</span>
                                <span>{{ \Carbon\Carbon::parse($jogo->inicio)->format('H:i d/m/Y') }}</span>
                            </div>
                        </div>
                    @endforeach

                    <div class="pt-[1.5rem]">{{ $jogos->links() }}</div>
                </div>

                @else
                    <div id="box-empty">
                        Não existem dados para listar!
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
