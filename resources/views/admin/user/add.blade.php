@component('layouts.admin')
    @slot('pageTitle') Usuários @endslot
    @slot('pageSub') Criando @endslot

    <div class="row">
        <div class="col-sm-12">
            {!!
                form($form->add('Salvar', 'submit', [
                    'attr' => ['class' => 'btn btn-success btn-admin', 'style' => "margin-top: 15px;"]
                ]))
             !!}
        </div>
    </div>
@endcomponent