<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex flex-col">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight sm:before:'sm'">
                    {{ __('Lista de Bolões') }}
                </h2>

                <p class="pt-2 text-gray-500">
                    Veja a lista de bolões que você participa!
                </p>
            </div>

            @if(Auth::user()->master)
            <a class="btn-primary rounded-3xl p-[0.75rem]" href="{{ route('bolaos.create') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </a>
            @endif
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(count($bolaos) > 0)

                <div class="p-3 sm:p-6 bg-white border-b border-gray-200">
                    <div class="hidden md:flex md:flex-row border-b-2 pb-4 font-bold">
                        @if(Auth::user()->master)
                            <div class="flex items-start justify-end order-last mr-4">Ações</div>
                        @endif

                        <div class="px-2 w-20">Ativo</div>
                        <div class="px-2 w-40">Nome</div>
                        <div class="px-2 w-40">Criador</div>
                        <div class="px-2 w-40">Data inicial</div>
                        <div class="px-2 w-40 flex-1">Descrição</div>
                    </div>

                    @foreach ($bolaos as $key => $bolao)
                        <div class="flex flex-col md:flex-row border-b-2 last:border-none py-4">
                            @if(Auth::user()->master)
                            <div class="flex sm:flex-col items-start justify-end order-last gap-2">
                                <a href="{{ route('bolaos.edit', $bolao->id) }}" class="btn-primary">Editar</a>
                                <a href="{{ route('participantes', $bolao->id) }}" class="btn-primary">Participantes</a>
                            </div>
                            @endif

                            <div class="p-2 w-20 flex items-start gap-1">
                                <span class="font-bold md:hidden">Ativo:</span>
                                <span class="md:px-[0.5rem] md:border-2 rounded-xl">
                                    {{ $bolao->ativo ? 'SIM' : 'NÃO' }}
                                </span>
                            </div>
                            <div class="p-2 md:w-40 truncate">
                                <span class="font-bold md:hidden">Nome:</span>
                                <span>{{ $bolao->nome }}</span>
                            </div>
                            <div class="p-2 md:w-40 truncate">
                                <span class="font-bold md:hidden">Criador:</span>
                                <span>{{ $bolao->user->name }}</span>
                            </div>
                            <div class="p-2 md:w-40 truncate">
                                <span class="font-bold md:hidden">Data inicial:</span>
                                <span>{{ \Carbon\Carbon::parse($bolao->inicio)->format('d/m/Y') }}</span>
                            </div>
                            <div class="p-2 md:w-40 flex-1">
                                <span class="font-bold md:hidden">Descrição:</span>
                                <span class="font-light">{!! $bolao->descricao !!}</span>
                            </div>
                        </div>
                    @endforeach

                        <div class="pt-[1.5rem]">{{ $bolaos->links() }}</div>
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
