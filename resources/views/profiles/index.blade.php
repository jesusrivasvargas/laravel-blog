@extends('layouts.app')

@section('title')Perfil de usuario |@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
        <h1 class="text-center">Perfil de usuario</h1>
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
                    <p><b>Número de cédula:</b> {{ $user->profile->id_number }}</p>
                    <p><b>Número de pasaporte:</b> {{ $user->profile->passport }}</p>
                    <p><b>Número de teléfono:</b> {{ $user->profile->phone }}</p>  
                    <p><b>Número de celular:</b> {{ $user->profile->cellphone }}</p> 
                    <p><b>Campo laboral:</b> {{ $user->profile->subcategory->category->category }}</p>
                    <p><b>Subcampo laboral:</b> {{ $user->profile->subcategory->subcategory }}</p> 
                    <a href="{{ route('profiles.edit', ['profile' => $user->profile->id ]) }}">Editar perfil de usurio</a>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection