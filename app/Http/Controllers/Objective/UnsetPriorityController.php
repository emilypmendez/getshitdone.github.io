<?php

namespace GetShitDone\Http\Controllers\Objective;

use GetShitDone\Http\Controllers\Controller;
use GetShitDone\Objective;

class UnsetPriorityController extends Controller
{
    /**
     * Update the priority of a given objective.
     *
     * @param Objective $objective
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Objective $objective)
    {
        $this->authorize('update', $objective);

        $objective->update([
            'priority' => null,
            'is_complete' => false,
        ]);

        return response([], 204);
    }
}
