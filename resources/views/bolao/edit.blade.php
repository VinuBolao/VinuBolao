@component('layouts.app')
    @slot('title') Editar @endslot

    <div class="col-md-12 box">
        <h2>Editando Bolão</h2>
        <p>Preencha os campos para atualizar o bolão.</p>
    </div>

    <div class="col-sm-12 box">
        <form action="{{ route('bolao.update', $bolao->id) }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="infoUser">Usuário:</label>
                        <select class="form-control" name="user_id" id="infoUser">
                            <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="infoCampeonato">Campeonato:</label>
                        <select class="form-control" name="campeonato_id" id="infoCampeonato">
                            <option value="{{ $bolao->campeonato->id }}">{{ $bolao->campeonato->nome_completo }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="infoNome">Nome:</label>
                        <input type="text" class="form-control" name="nome" id="infoNome" value="{{ $bolao->nome }}" placeholder="Digite o nome...">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-3">
                        <label for="infoData">Data Inicial:</label>
                        <input type="date" class="form-control" name="inicio" id="infoData" value="{{ $bolao->inicio }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="infoDescription">Descrição:</label>
                        <textarea class="form-control" name="descricao" id="infoDescription" placeholder="Digite a descrição...">
                            {{ $bolao->descricao }}
                        </textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success" style="margin-top: 15px">Salvar</button>
        </form>
    </div>
@endcomponent
