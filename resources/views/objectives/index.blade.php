@extends('layouts.app')

@section('content')
    <h1>Agenda</h1>

    <pro-tip message="Get your shit done this week so we can do more shit. Toilets are fantastic."></pro-tip>

    <div class="row align-items-center mb-3">
        <div class="col-2 text-left">
            @if ($offset >= -3)
                <a href="{{ route('objectives.index', ['offset' => $offset - 1]) }}">
                    <i class="fa fa-2x fa-chevron-circle-left"></i>
                </a>
            @endif
        </div>

        <div class="col-8">
            <h3 class="text-muted">Week of {{ $week->startOfWeek()->format('m/d') }} to {{ $week->endOfWeek()->format('m/d') }} </h3>
        </div>

        <div class="col-2 text-right">
            @if ($offset <= 1)
                <a href="{{ route('objectives.index', ['offset' => $offset + 1]) }}">
                    <i class="fa fa-2x fa-chevron-circle-right"></i>
                </a>
            @endif
        </div>
    </div>

    <list-objectives
            :initial-objectives="{{ $objectives->toJson() }}"
            :user="{{ auth()->user()->toJson() }}">
    </list-objectives>
@endsection