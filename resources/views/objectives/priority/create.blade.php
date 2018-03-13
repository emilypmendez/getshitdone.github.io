@extends('layouts.app')

@section('protip')
    <pro-tip
            title="Assign Priorities"
            message="Let’s get shit done.<br /><br />

<b>You are only going to give a shit about the 'A's.</b> <br /><br />

* A = <b>Takes you closer to your big goal(s).</b>
Only you can do it. It's business critical, time bound/urgent, potentially 'life-changing' - in other words, important shit that actually matters! Must be done within 2-3 weeks.

* B = <b>Still important, but could perhaps be handled by someone else</b>, follow up with you, or - alternatively - someone needs to be contacted or delegated to relatively soon.

* C = <b>Not urgent</b> or time bound, would like to be done 'sometime' but if it doesn't happen isn't the end of the world."></pro-tip>
@endsection

@section('content')
    <div class="row align-items-center mb-3">
        <div class="col-2 text-left">
            <a href="{{ route('objectives.create') }}">
                <i class="fa fa-3x fa-chevron-circle-left"></i>
            </a>
        </div>

        <div class="col-8">
            <h1 class="mb-3">Dump Sorting</h1>
        </div>

        <div class="col-2 text-right">
            <a href="{{ route('objectives.schedule.create') }}">
                <i class="fa fa-3x fa-chevron-circle-right"></i>
            </a>
        </div>
    </div>

    <update-objective-priority-form
            :initial-objectives="{{ $objectives->toJson() }}"
            :user="{{ auth()->user()->toJson() }}">
    </update-objective-priority-form>
@endsection
