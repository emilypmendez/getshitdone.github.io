<?php

namespace GetShitDone\Http\Controllers\Objective;

use GetShitDone\Http\Controllers\Controller;
use GetShitDone\Objective;

class RemoveController extends Controller
{
    /**
     * Update the priority of a given objective.
     *
     * @param Objective $objective
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Objective $objective)
    {
        $this->authorize('delete', $objective);

        $objective->delete();

        return response([], 204);
    }
}
