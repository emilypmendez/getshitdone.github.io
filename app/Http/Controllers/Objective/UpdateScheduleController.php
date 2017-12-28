<?php

namespace GetShitDone\Http\Controllers\Objective;

use GetShitDone\Objective;
use GetShitDone\Rules\PriorityLimitRule;
use Illuminate\Http\Request;
use GetShitDone\Http\Controllers\Controller;

class UpdateScheduleController extends Controller
{
    /**
     * Update the priority of a given objective.
     *
     * @param Request $request
     * @param Objective $objective
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Objective $objective)
    {
        $this->authorize('update', $objective);

        $input = $request->validate([
            'due_at' => ['required', 'date', new PriorityLimitRule($objective)],
        ]);

        $objective->update($input);

        return response([], 204);
    }
}
