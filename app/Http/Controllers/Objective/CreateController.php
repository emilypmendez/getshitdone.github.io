<?php

namespace GetShitDone\Http\Controllers\Objective;

use GetShitDone\Http\Controllers\Controller;

class CreateController extends Controller
{
    /**
     * Shows the form to create objectives.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $objectives = auth()->user()->objectives()
            ->withoutPriority()
            ->withoutSchedule()
            ->latest()
            ->get();

        return view('objectives.create', compact('objectives'));
    }
}
