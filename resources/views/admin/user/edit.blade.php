@component('layouts.admin')
    @slot('pageTitle') Editando @endslot
    @slot('pageSub') Usuário @endslot

    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Obs:</strong> se não quiser alterar a senha atual deixe o campo senha como está!
            </div>

            {!!
                form($form->add('Editar', 'submit', [
                    'attr' => ['class' => 'btn btn-success btn-admin', 'style' => "margin-top: 15px;"]
                ]))
             !!}
        </div>
    </div>
@endcomponent