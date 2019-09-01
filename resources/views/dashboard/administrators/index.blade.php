@extends('layouts.dashboard')
@section('STYLE')

@endsection
@section('CONTENT')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Lista de Administradores</h4>
                <p class="card-category" style="float:left;"> Você pode apenas remover, não é possível realizar modificações em seus dados pessoais</p>
                <p style="float:right;margin-top:-20px;">
                    <a href="{{ route('administrators.create') }}" class="btn btn-warning btn-sm">Adicionar</a>
                </p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th width="5%">ID</th>
                                <th width="25%">Nome</th>
                                <th width="20%">Username</th>
                                <th width="35%">Email</th>
                                <th width="15%">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($administrators as $key => $adm)
                            <tr>
                                <td>{{ $adm->id }}</td>
                                <td>{{ $adm->name }}</td>
                                <td>{{ $adm->username }}</td>
                                <td>{{ $adm->email }}</td>
                                <td>
                                    @if($adm->id == env('ROOT'))
                                        <!-- Nenhuma Alteração para esse Usuário -->
                                    @elseif($adm->id == \Illuminate\Support\Facades\Auth::id())
                                    <a class="btn btn-sm btn-primary btn-block" href="{{ route("administrators.profile") }}">Perfil</a>
                                    @else
                                    <span class="btn btn-sm btn-danger btn-block btnremove" title="Remover {{ $adm->name }}?" data-frm="#adm{{ $key }}" data-name="{{ $adm->name }}">Excluir</span>
                                    <form id="adm{{ $key }}" action="{{ route("administrators.destroy",["id"=>$adm->crypt_id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">
                                    {!! $administrators->links() !!}
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
                text: "Remover Administrador?",
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
