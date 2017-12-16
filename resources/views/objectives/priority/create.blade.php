@extends('layouts.app')

@section('protip')
    <pro-tip
            title="Assign Priorities"
            message="Let’s get shit done.<br /><br />
Here’s the gist:<br /><br />
* A = only You can do it, it earns You $$ monies, and must be done within the next 2 weeks.<br /><br />
* B = someone must follow up with you, or - alternatively - someone needs to be contacted or delegated to relatively soon.<br /><br />
* C = must be done sometime in the near future."></pro-tip>
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