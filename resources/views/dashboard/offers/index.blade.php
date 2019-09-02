@extends('layouts.dashboard')
@section('STYLE')

@endsection
@section('CONTENT')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Lista de Ofertas</h4>
                <p class="card-category" style="float:left;"> Você pode apenas remover, não é possível realizar modificações em seus dados pessoais</p>
                <p style="float:right;margin-top:-20px;">
                    <a href="{{ route('offers.create') }}" class="btn btn-warning btn-sm">Adicionar</a>
                </p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th width="5%">ID</th>
                                <th width="45%">Título</th>
                                <th width="10%">Categoria</th>
                                <th width="20%">Criado por</th>
                                <th width="10%">Ação</th>
                                <th width="10%">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($offers as $key => $o)
                            <tr>
                                <td>{{ $o->id }}</td>
                                <td>
                                    {{ $o->title }} <br />
                                    <small><a href="#" value="{{ $o->link_bitly }}" role="button" class="btnCopy" data-link="{{ $o->link_bitly }}"><i class="material-icons">link</i> Bitly</a></small>
                                </td>
                                <td>{{ $o->category->name }}</td>
                                <td>{{ $o->owner->name }}</td>
                                <td>
                                    <a href="{{ route("offers.edit", ["id"=>$o->crypt_id]) }}" class="btn btn-warning btn-block btn-sm">Editar</a>
                                </td>
                                <td>
                                    <span class="btn btn-sm btn-danger btn-block btnremove" title="Remover {{ $o->title }}?" data-frm="#offer{{ $key }}" data-name="{{ $o->title }}">Excluir</span>
                                    <form id="offer{{ $key }}" action="{{ route("offers.destroy",["id"=>$o->crypt_id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="5">
                                {!! $offers->links() !!}
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('SCRIPT')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>
    <script type="text/javascript">

        new ClipboardJS('.btnCopy', {
            text: function(trigger) {
                $.notify({
                    icon: "add_alert",
                    message: "Link copiado"

                }, {
                    type: 'info',
                    timer: 1000,
                });
                return trigger.getAttribute('data-link');
            }
        });

        $('.btnremove').click(function(){
            var name = $(this).data('name'),
                frm = $(this).data('frm');

            Swal.fire({
                title: `Tem certeza que você quer remover ${name}?`,
                text: "Remover Oferta?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Remover',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                    $(frm).submit();
                }
            });
        });


    </script>
@endsection
