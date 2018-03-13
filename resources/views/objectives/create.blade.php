@extends('layouts.app')

@section('protip')
    <pro-tip
            title="Take a dump here."
            message="Dump all the things you need to do for the week. <br />
            We'll begin sorting on the next screen.">
    </pro-tip>
@endsection

@section('content')

    <div class="row align-items-center mb-3">
        <div class="col-2 text-left">
            <a href="{{ route('dashboard') }}">
                <i class="fa fa-3x fa-chevron-circle-left"></i>
            </a>
        </div>

        <div class="col-8">
            <h1 class="mb-3">Brain Dump</h1>
        </div>

        <div class="col-2 text-right">
            <a href="{{ route('objectives.priority.create') }}">
                <i class="fa fa-3x fa-chevron-circle-right"></i>
            </a>
        </div>
    </div>

    <create-objective-form
            :initial-objectives="{{ $objectives->toJson() }}"
            :user="{{ auth()->user()->toJson() }}">
    </create-objective-form>
@endsection
