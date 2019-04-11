<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') {{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        
        @include('layouts.navbar')

        <main class="py-4">
            <div class="container">
                
                @if (session('status'))
                <div class="mx-3 row justify-content-center">
                    <div class="col-6 alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                </div>
                @endif

                @yield('content')

            </div>
        </main>
    </div>
</body>
</html>
