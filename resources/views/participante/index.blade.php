@component('layouts.app')
    @slot('title') Participantes @endslot

    <div class="col-sm-12 box">
        <h2>Lista</h2>
        <p>Veja a lista dos outros participantes!</p>
    </div>

    @if(!$participantes->isEmpty())
        <div class="col-sm-12 box">
            <div class="row">
                <div class="col-sm-4">
                    <select id="infoParticipante" name="bolao_id" class="form-control" form="formParticipante" required>
                        <option value="">Selecione o bolão...</option>
                        @foreach($boloes as $bolao)
                            <option value="{{ $bolao->id }}" @if(count($boloes) == 1) {{ "selected" }} @endif>{{ $bolao->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    @endif

    <div class="col-sm-12 box">
        @if(!$participantes->isEmpty())
            <form id="formParticipante" action="{{ route('participante.store') }}" method="post" class="form-horizontal" style="margin-bottom: 15px">
                <div class="row">
                    <div class="col-sm-9">
                        {{ csrf_field() }}
                        <label for="infoParticipante" class="label"></label>
                        <select name="user_id" id="infoParticipante" class="form-control" required>
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
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th colspan="4" class="text-center">Participantes</th>
                </tr>
                </thead>
                <tbody>
                @foreach($participantes as $key => $participante)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td class="text-center">{{ $participante->user->name }}</td>
                        <td class="text-right">Desde: {{ $participante->created_at->format('d/m/Y') }}</td>
                        <td class="text-center">
                            <form action="{{ route('participante.destroy', $participante->id) }}" method="post">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" value="Excluir" class="btn btn-xs btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-danger">
                <p class="text-center">Você não participa de nenhum bolão ainda.</p>
            </div>
        @endif
    </div>
@endcomponent