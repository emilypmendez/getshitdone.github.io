<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Theme color and icons-->
    <meta name="theme-color" content="#CA1F29"/>
    <link rel="icon" sizes="192x192" href="{{ asset('images/favicons/apple-touch-icon.png') }}"/>
    <link rel="apple-touch-icon" href="{{ asset('images/favicons/apple-touch-icon.png') }}"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @hasSection('title')
        @yield('title') &raquo; {{ config('app.name') }}
        @else
            {{ config('app.name') }}
        @endif
    </title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    @include('layouts._header')

    <main class="d-flex flex-column justify-content-center text-center">

        <p><img src="{{ asset('images/branding.png') }}" /></p>

        <div class="container">
            @yield('content')
        </div>
    </main>

    @include('flash::message')
</div>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
