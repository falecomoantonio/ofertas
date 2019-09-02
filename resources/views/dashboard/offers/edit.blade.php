@extends('layouts.dashboard')
@section('STYLE')

@endsection
@section('CONTENT')

    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Editar {{ $offer->title }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route("offers.update",["id"=>$offer->crypt_id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Título</label>
                            <input type="text" value="{{ old('title', $offer->title) }}" maxlength="200" class="form-control" name="title" required autofocus />
                            @if($errors->has('title'))
                                <p class="error text-danger"><small><strong>{{ $errors->first('title') }}</strong></small></p>
                            @endif
                        </div>
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Link da Oferta</label>
                            <input type="text" value="{{ old('link', $offer->link) }}" maxlength="200" class="form-control" name="link" required />
                            @if($errors->has('link'))
                                <p class="error text-danger"><small><strong>{{ $errors->first('link') }}</strong></small></p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Código do Produto</label>
                            <input type="text" value="{{ old('code', $offer->code) }}" maxlength="200" class="form-control" name="code" required />
                            @if($errors->has('code'))
                                <p class="error text-danger"><small><strong>{{ $errors->first('code') }}</strong></small></p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4 is-focused">
                        <div class="form-group bmd-form-group" id="labelType">
                            <label  class="bmd-label-floating">Categoria</label>
                            <select name="category_id" id="selectType" class="form-control" >
                                <option selected></option>
                                @foreach($categories as $cat)
                                <option {{ $cat->id == $offer->category->id ? 'selected' : '' }} value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('parent_id'))
                                <p class="error text-danger"><small><strong>{{ $errors->first('parent_id') }}</strong></small></p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Preço do Produto</label>
                            <input type="text" value="{{ old('price', $offer->price) }}" maxlength="200" class="form-control" name="price" required />
                            @if($errors->has('price'))
                                <p class="error text-danger"><small><strong>{{ $errors->first('price') }}</strong></small></p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div style="padding-top:10px;padding-bottom: 10px;"></div>
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Descrição</label>
                            <textarea class="form-control" rows="10" name="content" required>{{ old('content', $offer->content) }}</textarea>
                            @if($errors->has('content'))
                                <p class="error text-danger"><small><strong>{{ $errors->first('content') }}</strong></small></p>
                            @endif
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right">Registrar</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>

@endsection
@section('SCRIPT')
    <script>
        $(function(){
            $('#selectType').change(function() {
                var value = $(this).val();
                if(value===null || value === undefined || value === '')
                    $("#labelType").removeClass('is-focused');
                else
                    $("#labelType").addClass('is-focused');
            });
        });
    </script>
@endsection
