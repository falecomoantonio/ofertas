@extends('layouts.dashboard')
@section('STYLE')

@endsection
@section('CONTENT')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Lista de Categorias</h4>
                <p class="card-category" style="float:left;"> Adicione as categorias do Sistema</p>
                <p style="float:right;margin-top:-20px;">
                    <a href="{{ route('categories.create') }}" class="btn btn-warning btn-sm">Adicionar</a>
                </p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                        <tr>
                            <th width="5%">ID</th>
                            <th width="40%">Nome</th>
                            <th width="40%">Super</th>
                            <th width="7.5%">Ação</th>
                            <th width="7.5%">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $key => $cat)
                            <tr>
                                <td>{{ $cat->id }}</td>
                                <td>{{ $cat->name }}</td>
                                <td>{{ $cat->super->name }}</td>
                                <td>
                                    <a href="{{ route("categories.edit", ["id"=>$cat->crypt_id]) }}" class="btn btn-warning btn-block btn-sm">Editar</a>
                                </td>
                                <td>
                                    <span class="btn btn-sm btn-danger btn-block btnremove" title="Remover {{ $cat->name }}?" data-frm="#cat{{ $key }}" data-name="{{ $cat->name }}">Excluir</span>
                                    <form id="cat{{ $key }}" action="{{ route("categories.destroy",["id"=>$cat->crypt_id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="6">
                                {!! $categories->links() !!}
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
    <script type="text/javascript">
        $('.btnremove').click(function(){
            var name = $(this).data('name'),
                frm = $(this).data('frm');

            Swal.fire({
                title: `Tem certeza que você quer remover o ${name}?`,
                text: "Remover Categoria?",
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
