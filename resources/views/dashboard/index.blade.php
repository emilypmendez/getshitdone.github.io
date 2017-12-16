@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Dashboard</h1>

    <div class="row">
        <div class="col-sm-8 offset-sm-2 text-center">
            <p><a href="{{ route('objectives.create') }}" class="btn btn-lg btn-block btn-danger">Add to the List</a></p>
            <p><a href="{{ route('objectives.index') }}" class="btn btn-lg btn-block btn-danger">View Agenda</a></p>
            <p><a href="#" class="btn btn-lg btn-block btn-danger disabled">Profile</a></p>
            <p><a href="#" class="btn btn-lg btn-block btn-danger disabled">Support</a></p>
        </div>
    </div>
@endsection