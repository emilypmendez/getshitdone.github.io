<?php

namespace GetShitDone\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * Shows the dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('dashboard.index');
    }
}
