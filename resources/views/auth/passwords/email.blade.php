@extends('layouts.app')

@section('title')
Enviar enlace para restablecer contraseña |
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
            <h1>Restablecer contraseña</h1>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <label for="email">{{ __('Correo electrónico') }}</label>

                
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
               
            </div>

            <div class="form-group">
                
                    <button type="submit" class="btn btn-primary">
                        {{ __('Enviar enlace para restablecer contraseña') }}
                    </button>
                
            </div>
        </form>
            
    </div>
</div>

@endsection
