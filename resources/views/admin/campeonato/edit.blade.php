@component('layouts.admin')
    @slot('pageTitle') Editando @endslot
    @slot('pageSub') Campeonato @endslot

    <div class="row">
        <div class="col-sm-12">
            {!!
                form($form->add('Editar', 'submit', [
                    'attr' => ['class' => 'btn btn-success btn-admin', 'style' => "margin-top: 15px;"]
                ]))
             !!}
        </div>
    </div>
@endcomponent