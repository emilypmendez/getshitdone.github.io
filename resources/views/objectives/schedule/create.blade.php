@extends('layouts.app')

@section('protip')
    <pro-tip title="Toilets are fantastic." message="Get your shit done this week so we can do more shit. Toilets are fantastic."></pro-tip>
@endsection

@section('content')
    <div class="row align-items-center mb-3">
        <div class="col-2 text-left">
            <a href="{{ route('objectives.priority.create') }}">
                <i class="fa fa-3x fa-chevron-circle-left"></i>
            </a>
        </div>

        <div class="col-8">
            <h1 class="mb-3">Scheduling Dumps</h1>
        </div>

        <div class="col-2 text-right">
            <a href="{{ route('objectives.index') }}">
                <i class="fa fa-3x fa-chevron-circle-right"></i>
            </a>
        </div>
    </div>

    <update-objective-schedule-form
            :initial-objectives="{{ $objectives->toJson() }}"
            :user="{{ auth()->user()->toJson() }}">
    </update-objective-schedule-form>
@endsection