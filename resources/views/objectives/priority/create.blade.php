@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Dump Sorting</h1>

    <div class="row align-items-center mb-3">
        <div class="col-2 text-left">
            <a href="{{ route('objectives.create') }}">
                <i class="fa fa-5x fa-chevron-circle-left"></i>
            </a>
        </div>

        <div class="col-8">
            <update-objective-priority-form
                    :initial-objectives="{{ $objectives->toJson() }}"
                    :user="{{ auth()->user()->toJson() }}">
            </update-objective-priority-form>
        </div>

        <div class="col-2 text-right">
            <a href="{{ route('objectives.schedule.create') }}">
                <i class="fa fa-5x fa-chevron-circle-right"></i>
            </a>
        </div>
    </div>
@endsection