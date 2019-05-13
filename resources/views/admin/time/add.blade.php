@component('layouts.admin')
    @slot('pageTitle') Criando @endslot
    @slot('pageSub') Time @endslot

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