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
                        <label for="infoCampeonato">Ativo:</label>
                        <select class="form-control" name="ativo" id="infoAtivo" required>
                            <option value="0" selected>NÃO</option>
                            <option value="1">SIM</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="infoUser">Usuário:</label>
                        <select class="form-control" name="user_id" id="infoUser" required>
                            <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="infoCampeonato">Campeonato:</label>
                        <select class="form-control" name="campeonato_id" id="infoCampeonato" required>
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
                        <input type="text" class="form-control" name="nome" id="infoNome" placeholder="..." required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-3">
                        <label for="infoData">Data Inicial:</label>
                        <input type="date" class="form-control" name="inicio" id="infoData" required>
                    </div>
                    <div class="col-sm-1">
                        <label for="infoData">PE:</label>
                        <input type="number" class="form-control" name="placar_exato" id="infoPlacarExato">
                    </div>
                    <div class="col-sm-1">
                        <label for="infoData">PV:</label>
                        <input type="number" class="form-control" name="placar_vencedor" id="infoPlacarVencedor" >
                    </div>
                    <div class="col-sm-1">
                        <label for="infoRodadaDobro">RDP:</label>
                        <input type="number" class="form-control" name="rodada_dobro" id="infoRodadaDobro">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="infoDescription">Descrição:</label>
                        <textarea class="form-control" name="descricao" id="infoDescription" placeholder="Digite uma descrição..." required></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success" style="margin-top: 15px">Salvar</button>
        </form>
    </div>
@endcomponent
