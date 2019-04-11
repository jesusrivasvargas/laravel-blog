@extends('layouts.app')

@section('title')
Únete | 
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
        <h1>Únete</h1>
        
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">{{ __('Nombre') }}</label>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif                
            </div>

            <div class="form-group">
                <label for="lastname">{{ __('Apellido') }}</label>
                <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autofocus>
                @if ($errors->has('lastname'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('lastname') }}</strong>
                    </span>
                @endif                
            </div>

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
                        {{ __('Únete') }}
                    </button>
               
            </div>
        </form>
            
    </div>
</div>

@endsection
