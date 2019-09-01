@extends('layouts.dashboard')
@section('STYLE')

@endsection
@section('CONTENT')

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Perfil</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("administrators.profile.save") }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Nome</label>
                                        <input type="text" value="{{ old('name', $user->name) }}" maxlength="50" class="form-control" name="name" required autofocus />
                                        @if($errors->has('name'))
                                        <p class="error text-danger"><small><strong>{{ $errors->first('name') }}</strong></small></p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Email</label>
                                        <input type="email" value="{{ old('email', $user->email) }}" maxlength="120" class="form-control" name="email" required />
                                        @if($errors->has('email'))
                                        <p class="error text-danger"><small><strong>{{ $errors->first('email') }}</strong></small></p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Username</label>
                                        <input type="text" value="{{ old('username', $user->username) }}" maxlength="20" class="form-control" name="username" />
                                        @if($errors->has('username'))
                                        <p class="error text-danger"><small><strong>{{ $errors->first('username') }}</strong></small></p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Atualizar Perfil</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Alterar Senha</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route("administrators.profile.password") }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Senha Atual</label>
                                    <input type="password" value="" maxlength="256" class="form-control" name="current_password" required />
                                    @if($errors->has('current_password'))
                                    <p class="error text-danger"><small><strong>{{ $errors->first('current_password') }}</strong></small></p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Nova Senha</label>
                                    <input type="password" value="" maxlength="120" class="form-control" name="password" required />
                                    @if($errors->has('password'))
                                    <p class="error text-danger"><small><strong>{{ $errors->first('password') }}</strong></small></p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Repita a nova Senha</label>
                                    <input type="password" value="" class="form-control" name="password_confirmation" required />
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Atualizar Perfil</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('SCRIPT')

@endsection
