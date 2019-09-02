@extends('layouts.dashboard')
@section('STYLE')

@endsection
@section('CONTENT')

    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Editar {{ $category->name }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route("categories.update",['id'=>$category->crypt_id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Nome</label>
                            <input type="text" value="{{ old('name', $category->name) }}" maxlength="50" class="form-control" name="name" required autofocus />
                            @if($errors->has('name'))
                                <p class="error text-danger"><small><strong>{{ $errors->first('name') }}</strong></small></p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group is-focused" >
                            <label  class="bmd-label-floating">Tipo</label>
                            <select name="parent_id" id="selectType" class="form-control" >
                                <option value="{{ $category->parent_id }}">Deixar o Atual</option>
                                <option value="{{ env('SUPER_CATEGORY_BLOG') }}">Blog</option>
                                <option value="{{ env('SUPER_CATEGORY_OFFER') }}">Ofertas</option>
                            </select>
                            @if($errors->has('parent_id'))
                                <p class="error text-danger"><small><strong>{{ $errors->first('parent_id') }}</strong></small></p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Descrição</label>
                            <textarea class="form-control" rows="10" name="description">{{ old('description', $category->description) }}</textarea>
                            @if($errors->has('description'))
                                <p class="error text-danger"><small><strong>{{ $errors->first('description') }}</strong></small></p>
                            @endif
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right">Atualizar</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>

@endsection
@section('SCRIPT')
    <script>
        $(function(){

        });
    </script>
@endsection
