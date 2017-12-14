@extends('layouts.app')

@section('content')
    <h1>Agenda</h1>

    <div class="row align-items-center mb-3">
        <div class="col-2 text-left">
            <a href="{{ route('objectives.index', ['offset' => $offset - 1]) }}">
                <i class="fa fa-2x fa-chevron-circle-left"></i>
            </a>
        </div>

        <div class="col-8">
            <h3 class="text-muted">Week of {{ $week->startOfWeek()->format('m/d') }} to {{ $week->endOfWeek()->format('m/d') }} </h3>
        </div>

        <div class="col-2 text-right">
            <a href="{{ route('objectives.index', ['offset' => $offset + 1]) }}">
                <i class="fa fa-2x fa-chevron-circle-right"></i>
            </a>
        </div>
    </div>

    <list-objectives
            :initial-objectives="{{ $objectives->toJson() }}"
            :user="{{ auth()->user()->toJson() }}">
    </list-objectives>
@endsection