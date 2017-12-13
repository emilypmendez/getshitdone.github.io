<?php

namespace GetShitDone\Http\Controllers\Objective;

use GetShitDone\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    /**
     * Shows the form to schedule objectives.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $objectives = auth()->user()->objectives()
            ->withoutSchedule()
            ->latest()
            ->get();

        return view('objectives.schedule.create', compact('objectives'));
    }
}
