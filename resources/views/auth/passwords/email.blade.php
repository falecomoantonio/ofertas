@extends('layouts.app')

@section('CONTENT')

    <div class="col s12 z-depth-4 card-panel">
        <form class="login-form" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="row">
                <div class="input-field col s12 center">
                    <p class="center login-form-text">Recovery Password</p>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <input name="email" type="text" class="@error('email') is-invalid @enderror" required />
                    <label for="email" class="center-align">Email *</label>
                    @error('email')
                    <small class="invalid-feedback text-danger" style="color:#af0605" role="alert">
                        <strong>{{ $message }}</strong>
                    </small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button type="submit" class="btn waves-effect waves-light col s12">Recuperar Senha</button>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <p class="margin right-align center medium-small"><a href="{{ url('login') }}">Já possuo a minha senha</a></p>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('SCRIPT')
    <script type="text/javascript">
        $(function(){
            @if (session('status'))
            $.toast({html: '{{ session('status') }}'})
            @endif
        });
    </script>
@endsection
