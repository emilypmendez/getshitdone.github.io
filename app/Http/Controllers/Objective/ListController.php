<?php

namespace GetShitDone\Http\Controllers\Objective;

use GetShitDone\Http\Controllers\Controller;

class ListController extends Controller
{
    /**
     * Shows the listing of objectives
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('objectives.index');
    }
}
