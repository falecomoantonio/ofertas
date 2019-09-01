@extends('layouts.dashboard')
@section('STYLE')

@endsection
@section('CONTENT')

    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Novo Administrador</h4>
        </div>
        <div class="card-body">
            <form action="{{ route("administrators.store") }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Nome</label>
                            <input type="text" value="{{ old('name', '') }}" maxlength="50" class="form-control" name="name" required autofocus />
                            @if($errors->has('name'))
                                <p class="error text-danger"><small><strong>{{ $errors->first('name') }}</strong></small></p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Email</label>
                            <input type="email" value="{{ old('email','') }}" maxlength="120" class="form-control" name="email" required />
                            @if($errors->has('email'))
                                <p class="error text-danger"><small><strong>{{ $errors->first('email') }}</strong></small></p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Username</label>
                            <input type="text" value="{{ old('username','') }}" maxlength="20" class="form-control" name="username" />
                            @if($errors->has('username'))
                                <p class="error text-danger"><small><strong>{{ $errors->first('username') }}</strong></small></p>
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

@endsection
