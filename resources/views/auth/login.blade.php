@extends('layouts.app')

@section('title')
Iniciar sesión |
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
        <h1>Iniciar sesión</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">{{ __('Correo electrónico') }}</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
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
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Recuérdarme') }}
                    </label>
                </div>                
            </div>

            <div class="form-group">
                
                <button type="submit" class="btn btn-primary">
                    {{ __('Iniciar sesión') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('¿Olvidó su contraseña?') }}
                    </a>
                @endif
                
            </div>
        </form>
    </div>
        
</div>

@endsection
