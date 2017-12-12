@extends('layouts.app')

@section('content')
    <h1 class="mb-5">Welcome to GSD Club.</h1>

    <p><a href="{{ route('login') }}" class="btn btn-lg btn-block btn-danger">Login</a></p>
    <p><a href="{{ route('register') }}" class="btn btn-lg btn-block btn-danger">New Account</a></p>
@endsection