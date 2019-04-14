@extends('layouts.app')

@section('title')Editar perfil de usuario |@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
        <h1 class="text-center">Editar perfil de usuario</h1>
        <div class="container mt-4">
            <div class="row">
                <div class="col-4">
                        <avatar-form :avatarurl="'{{ $user->avatar() }}'" 
                            :storeurl="'{{ route('avatar.store') }}'">
                                @csrf 
                        </avatar-form>                   
                </div>
                <div class="col-8">
                        <p><b>Email:</b> {{ $user->email }}</p> 
                        <p><b>Nombre de usuario:</b> {{ $user->profile->username }}</p>
                        <form method="post" action="{{ route('profiles.update', ['profile' => $user->profile->id]) }}">
                            <div class="form-group">
                                <label for="name">{{ __('Nombre') }}</label>
                                <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $user->name) }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif                
                            </div>
                            <div class="form-group">
                                <label for="lastname">{{ __('Apellido') }}</label>
                                <input id="lastname" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname', $user->lastname) }}" required>
                                @if ($errors->has('lastname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif                
                            </div>
                    
                    
                    
                        @csrf 
                        @method('patch')
                        
                        <div class="form-group">
                            <label for="id_number">{{ __('Número de cédula') }}</label>
                            <input id="id_number" class="form-control{{ $errors->has('id_number') ? ' is-invalid' : '' }}" name="id_number" value="{{ old('id_number', $user->profile->id_number) }}" required>
                            @if ($errors->has('id_number'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('id_number') }}</strong>
                                </span>
                            @endif                
                        </div>

                        <div class="form-group">
                            <label for="passport">{{ __('passport') }}</label>
                            <input id="passport" class="form-control{{ $errors->has('passport') ? ' is-invalid' : '' }}" name="passport" value="{{ old('passport', $user->profile->passport) }}" required>
                            @if ($errors->has('passport'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('passport') }}</strong>
                                </span>
                            @endif                
                        </div>

                        <div class="form-group">
                            <label for="phone">{{ __('Teléfono') }}</label>
                            <input id="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone', $user->profile->phone) }}" required>
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif                
                        </div>

                        <div class="form-group">
                            <label for="cellphone">{{ __('Celular') }}</label>
                            <input id="cellphone" class="form-control{{ $errors->has('cellphone') ? ' is-invalid' : '' }}" name="cellphone" value="{{ old('cellphone', $user->profile->cellphone) }}" required>
                            @if ($errors->has('cellphone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cellphone') }}</strong>
                                </span>
                            @endif                
                        </div>

                        <categories-profile-form></categories-profile-form>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Editar perfil de usuario') }}
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