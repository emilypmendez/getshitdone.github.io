<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Theme color and icons-->
    <meta name="theme-color" content="#CA1F29"/>
    <link rel="icon" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="pusher-key" content="{{ config('broadcasting.connections.pusher.key') }}">

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
    <main class="d-flex flex-column justify-content-center text-center">
        <div style="position: relative">
            <div class="container" style="position: relative">
                @include('layouts._header')

                @yield('protip')
            </div>

            <img src="{{ asset('images/branding.png') }}" />
        </div>

        <div class="container mb-3">
            @yield('content')
        </div>

        <footer class="text-muted">
            <p>All rights reserved. &copy; Coffee With Dan.</p>
            <p><a href="https://twitter.com/beastofbusiness" target="_blank">@beastofbusiness</a></p>
        </footer>
    </main>

    @include('flash::message')
</div>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
