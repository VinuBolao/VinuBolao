@component('layouts.app')
    @slot('title') Novo @endslot

    <div class="col-sm-12 box">
        <h2>Criando Novo Bolão</h2>
        <p>Preencha os campos para adicionar um novo bolão.</p>
    </div>

    <div class="col-sm-12 box">
        <form action="{{ route('bolao.store') }}" method="post">
            {{ csrf_field() }}
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
                            @foreach($campeonatos as $campeonato)
                                <option value="{{ $campeonato->id }}">{{ $campeonato->nome_completo }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="infoNome">Nome:</label>
                        <input type="text" class="form-control" name="nome" id="infoNome" placeholder="...">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-3">
                        <label for="infoData">Nome:</label>
                        <input type="date" class="form-control" name="inicio" id="infoData">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="infoDescription">Descrição:</label>
                        <input type="text" class="form-control" name="descricao" id="infoDescription" placeholder="Digite uma descrição...">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success" style="margin-top: 15px">Salvar</button>
        </form>
    </div>
@endcomponent
