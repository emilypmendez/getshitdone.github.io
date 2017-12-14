<?php

namespace GetShitDone\Http\Controllers\Objective;

use GetShitDone\Http\Controllers\Controller;
use GetShitDone\Objective;

class MarkCompleteController extends Controller
{
    /**
     * Mark an objective as complete.
     *
     * @param Objective $objective
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Objective $objective)
    {
        $this->authorize('update', $objective);

        $objective->update(['is_complete' => true]);

        return response([], 204);
    }
}
