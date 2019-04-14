@extends('layouts.app')

@section('title'){{ $profile->user->name }} {{ $profile->user->lastname }} |@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        {{ $profile->user->name }}
    </div>
</div>
@endsection