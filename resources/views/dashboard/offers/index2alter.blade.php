@extends('layouts.dashboard')
@section('STYLE')

@endsection
@section('CONTENT')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Lista de Ofertas</h4>
                <p class="card-category" style="float:left;"> Você atualizar os preços apenas</p>
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
                            <th width="55%">Título</th>
                            <th width="20%">Preço Antigo</th>
                            <th width="20%">Preço Atual</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($offers as $key => $o)
                            <tr>
                                <td>{{ $o->id }}</td>
                                <td>
                                    {{ $o->title }} <br />
                                    <small><a href="{{ $o->bitly }}" target="_blank"><i class="material-icons">link</i> Acessar</a></small>
                                    <small><a href="#!"><i id="result{{ $key }}" class="material-icons">done</i></a></small>
                                </td>
                                <td id="price_{{ $key }}">R$ {{ number_format($o->price,2,',','.') }}</td>
                                <td>
                                    <form action="#" method="post">
                                        @csrf
                                        <input type="text" class="form-control price" value="{{ $o->price }}" data-key="{{ $key }}" data-price="{{ $o->price }}" data-offer="{{ $o->crypt_id }}" />
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

        $(function(){

            $('form input').keydown(function (e) {
                if (e.keyCode == 13) {
                    var inputs = $(this).parents("form").eq(0).find(":input");
                    if (inputs[inputs.index(this) + 1] != null) {
                        inputs[inputs.index(this) + 1].focus();
                    }
                    e.preventDefault();
                    return false;
                }
            });

            $('.price').blur(function(){
                var key = $(this).data('key');
                var display = '#result' + key;
                var price = $(this).val();
                var oldPrice = $(this).data('price');
                var priceKey = '#price_' + key;
                var offer = $(this).data('offer');
                var newPrice = `R$ ${price}`;

                $.ajax({
                    url:'{{ route("offers.change.price") }}',
                    method:'PUT',
                    data: { offer:offer, price: price },
                    success:function(response){
                        if(response.status) {
                            $(display).html('done_all');
                            $(priceKey).html(newPrice);
                        } else {
                            $(display).html('warning');
                        }
                    } ,
                    error:function(response){
                        $(this).val(oldPrice)
                        $(display).html('error');
                    }
                });

            });

        });

    </script>
@endsection
