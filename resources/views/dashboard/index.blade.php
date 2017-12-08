@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Welcome to GSD Club.</h1>

    <p><a href="{{ route('login') }}" class="btn btn-lg btn-block btn-danger">Login</a></p>
    <p><a href="{{ route('register') }}" class="btn btn-lg btn-block btn-danger">Register</a></p>
@endsection