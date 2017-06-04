@component('layouts.app')
    @slot('title') Editar @endslot

    <div class="col-md-12 box">
        <h2>Editando Bolão</h2>
        <p>Preencha os campos para atualizar o bolão.</p>
    </div>

    <div class="col-sm-6 box">
        <form action="{{ route('bolao.update', $bolao->id) }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="infoUser">Usuário:</label>
                        <select class="form-control" name="user" id="infoUser">
                            <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="infoCampeonato">Campeonato:</label>
                        <select class="form-control" name="campeonato" id="infoCampeonato">
                            <option value="{{ $bolao->campeonato->id }}">{{ $bolao->campeonato->nome_completo }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="infoNome">Nome:</label>
                        <input type="text" class="form-control" name="name" id="infoNome" value="{{ $bolao->nome }}" placeholder="Digite o nome...">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="infoData">Data Inicial:</label>
                        <input type="date" class="form-control" name="datainicio" id="infoData" value="{{ $bolao->inicio }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="infoDescription">Descrição:</label>
                        <input type="text" class="form-control" name="description" id="infoDescription" value="{{ $bolao->descricao }}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success" style="margin-top: 15px">Salvar</button>
        </form>
    </div>
    <div class="col-sm-5 col-sm-offset-1 box">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="2" class="text-center">Participantes do {{ $bolao->nome }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($participantes as $participante)
                    <tr>
                        <td class="text-center">{{ $participante->user->name }}</td>
                        <td class="text-right">Desde: {{ $participante->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('participante.store') }}" method="post" class="form-horizontal">
            <div class="row">
                <div class="col-sm-9">
                    {{ csrf_field() }}
                    <input type="hidden" name="bolao_id" value="{{ $bolao->id }}">
                    <label for="infoParticipante" class="label"></label>
                    <select name="user_id" id="infoParticipante" class="form-control">
                        <option value="">Selecione o participante...</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-block btn-success">Adicionar</button>
                </div>
            </div>
        </form>
    </div>
@endcomponent
