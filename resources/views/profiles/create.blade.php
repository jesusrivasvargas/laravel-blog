@extends('layouts.app')

@section('title')
Crear perfil de usuario | 
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
        <h1 class="text-center">Crear perfil de usuario</h1>
        <div class="container mt-4">
            <div class="row">
                <div class="col-4">
                        <avatar-form :avatarurl="'{{ $user->avatar() }}'" 
                            :storeurl="'{{ route('avatar.store') }}'">
                                @csrf 
                        </avatar-form>                   
                </div>
                <div class="col-8">
                    <p><b>Nombre:</b> {{ $user->name }}</p>
                    <p><b>Apellido:</b> {{ $user->lastname }}</p>
                    <p><b>Email:</b> {{ $user->email }}</p> 
                    <hr>
                    <form method="post" action="{{ route('profiles.store') }}">
                        @csrf 

                        <div class="form-group">
                            <label for="username">{{ __('Nombre de usuaio') }}</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">@</div>
                                </div>
                            <input id="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                            </div> @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif               
                        </div>
                        
                        <div class="form-group">
                            <label for="id_number">{{ __('Número de cédula') }}</label>
                            <input id="id_number" class="form-control{{ $errors->has('id_number') ? ' is-invalid' : '' }}" name="id_number" value="{{ old('id_number') }}" required>
                            @if ($errors->has('id_number'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('id_number') }}</strong>
                                </span>
                            @endif                
                        </div>

                        <div class="form-group">
                            <label for="passport">{{ __('passport') }}</label>
                            <input id="passport" class="form-control{{ $errors->has('passport') ? ' is-invalid' : '' }}" name="passport" value="{{ old('passport') }}" required>
                            @if ($errors->has('passport'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('passport') }}</strong>
                                </span>
                            @endif                
                        </div>

                        <div class="form-group">
                            <label for="phone">{{ __('Teléfono') }}</label>
                            <input id="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif                
                        </div>

                        <div class="form-group">
                            <label for="cellphone">{{ __('Celular') }}</label>
                            <input id="cellphone" class="form-control{{ $errors->has('cellphone') ? ' is-invalid' : '' }}" name="cellphone" value="{{ old('cellphone') }}" required>
                            @if ($errors->has('cellphone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cellphone') }}</strong>
                                </span>
                            @endif                
                        </div>

                        <categories-profile-form></categories-profile-form>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Crear perfil de usuario') }}
                        </button>

                    </form>                     
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection