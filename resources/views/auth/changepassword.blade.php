@extends('layouts.app')

@section('title')
Cambiar contraseña |
@endsection

@section('content')
 
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
            <h1>Cambiar contraseña</h1>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
            @csrf

            <div class="form-group">
                <label for="current-password">{{ __('Contraseña actual') }}</label>
                <input id="current-password" type="password" class="form-control{{ $errors->has('current-password') ? ' is-invalid' : '' }}" name="current-password" required>
                @if ($errors->has('current-password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('current-password') }}</strong>
                    </span>
                @endif                
            </div>

            <div class="form-group">
                <label for="new-password">{{ __('Nueva contraseña') }}</label>
                <input id="new-password" type="password" class="form-control{{ $errors->has('new-password') ? ' is-invalid' : '' }}" name="new-password" required>
                @if ($errors->has('new-password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('new-password') }}</strong>
                    </span>
                @endif                
            </div>

            <div class="form-group">
                    <label for="new-password-confirm">{{ __('Confirmar nueva contraseña') }}</label>
    
                    
                        <input id="new-password-confirm" type="password" class="form-control" name="new-password-confirm" required>
                    
                </div>

            

            

            

            <div class="form-group">
                
                    <button type="submit" class="btn btn-primary">
                        Cambiar contraseña
                    </button>
                
            </div>
        </form>
            
    </div>
</div>

@endsection
