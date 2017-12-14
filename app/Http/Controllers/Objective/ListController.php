<?php

namespace GetShitDone\Http\Controllers\Objective;

use GetShitDone\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ListController extends Controller
{
    /**
     * Shows the listing of objectives
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $input = $request->validate(['offset' => 'nullable|integer',]);
        $offset = $input['offset'] ?? 0;
        $week = Carbon::now()->addWeeks($offset);

        $objectives = auth()->user()->objectives()
            ->dueOnWeek($week)
            ->whereNotNull('priority')
            ->orderBy('priority')
            ->get();

        return view('objectives.index', compact('objectives', 'week', 'offset'));
    }
}
