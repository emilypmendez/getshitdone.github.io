<?php

namespace GetShitDone\Http\Controllers\Objective;

use GetShitDone\Http\Controllers\Controller;

class PriorityController extends Controller
{
    /**
     * Shows the form to prioritize objectives.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('objectives.priority.create');
    }
}
