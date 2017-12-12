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
        return view('objectives.schedule.create');
    }
}
