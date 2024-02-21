<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-slate-300 leading-tight sm:before:'sm'">
                {{ __('Lista de Times') }}
            </h2>

            <a class="btn-primary rounded-3xl p-[0.75rem]" href="{{ route('admin.times.create') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-3 sm:p-6 bg-white dark:bg-slate-800 dark:text-slate-300 border-b border-gray-200">
                    <form method="GET" action="{{ route('admin.times.index') }}" class="flex flex-col sm:flex-row gap-4 items-center">
                        <input
                            min="0"
                            name="nome_completo"
                            class="vb-custom-input mt-0"
                            value="{{ request('nome_completo') }}"
                            placeholder="Pesquise..."
                        />

                        <button type="submit" class="btn-primary self-end">Filtrar</button>
                    </form>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(count($times) > 0)

                <div class="p-3 sm:p-6 bg-white dark:bg-slate-800 dark:text-slate-300 border-b border-gray-200">
                    <div class="hidden md:flex md:flex-row border-b-2 pb-4 font-bold">
                        <div class="flex items-start justify-end order-last mr-4">Ações</div>
                        <div class="px-2 w-8">#</div>
                        <div class="px-2 w-40 flex-1 truncate">Nome</div>
                        <div class="px-2 w-40 flex-1 truncate">Sigla</div>
                        <div class="px-2 w-40 flex-1 truncate">Estádio</div>
                    </div>

                    @foreach ($times as $key => $time)
                        <div class="flex flex-col md:flex-row border-b-2 last:border-none py-4">
                            <div class="flex items-start justify-end order-last">
                                <a href="{{ route('admin.times.edit', $time->id) }}" class="btn-primary">Editar</a>
                            </div>
                            <div class="p-2 w-8">{{ $key + 1 }}</div>
                            <div class="p-2 md:w-40 flex-1 truncate">
                                <span class="font-bold md:hidden">Nome:</span>
                                <span>{{ $time->nome }}</span>
                            </div>
                            <div class="p-2 md:w-40 flex-1 truncate">
                                <span class="font-bold md:hidden">Sigla:</span>
                                <span>{{ $time->sigla }}</span>
                            </div>
                            <div class="p-2 md:w-60 flex-1 truncate">
                                <span class="font-bold md:hidden">Estádio:</span>
                                <span>{{ $time->estadio }}</span>
                            </div>
                        </div>
                    @endforeach

                    <div class="vb-paginate">{{ $times->links() }}</div>
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
