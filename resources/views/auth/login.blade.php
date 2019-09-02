@extends('layouts.app')
@section('CONTENT')
    <div class="col s12 z-depth-4 card-panel">
        <form class="login-form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row">
                <div class="input-field col s12 center">
                    <p class="center login-form-text">Autenticação de Usuários</p>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <input name="email" type="text" class="@error('email') is-invalid @enderror" required />
                    <label for="email" class="center-align">Usuário</label>
                    @error('email')
                    <small class="invalid-feedback text-danger" style="color:#af0605" role="alert">
                        <strong>{{ $message }}</strong>
                    </small>
                    @enderror
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <input name="password" class=" @error('password') is-invalid @enderror" type="password" required />
                    <label for="password">Senha</label>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button type="submit" class="btn waves-effect waves-light col s12">Iniciar Sessão</button>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <p class="margin center right-align medium-small"><a href="{{ route('password.request') }}">Esqueceu sua senha</a></p>
                </div>
            </div>

        </form>
    </div>
@endsection
