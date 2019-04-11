@extends('layouts.app')

@section('title')
Restablecer contraseña |
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
        <h1>Restablecer contraseña</h1>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email">{{ __('Correo electrónico') }}</label>

                
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                
            </div>

            <div class="form-group">
                <label for="password">{{ __('Contraseña') }}</label>

                
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                
            </div>

            <div class="form-group">
                <label for="password-confirm">{{ __('Confirmar Contraseña') }}</label>

                
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                
            </div>

            <div class="form-group">
                
                    <button type="submit" class="btn btn-primary">
                        {{ __('Restablecer contraseña') }}
                    </button>
                
            </div>
        </form>
    </div>
</div>

@endsection
