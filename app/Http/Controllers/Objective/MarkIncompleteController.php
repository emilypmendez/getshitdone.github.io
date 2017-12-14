<?php

namespace GetShitDone\Http\Controllers\Objective;

use GetShitDone\Http\Controllers\Controller;
use GetShitDone\Objective;

class MarkIncompleteController extends Controller
{
    /**
     * Mark an objective as incomplete.
     *
     * @param Objective $objective
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Objective $objective)
    {
        $this->authorize('update', $objective);

        $objective->update(['is_complete' => false]);

        return response([], 204);
    }
}
