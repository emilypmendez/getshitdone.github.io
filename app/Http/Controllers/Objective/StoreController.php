<?php

namespace GetShitDone\Http\Controllers\Objective;

use Illuminate\Http\Request;
use GetShitDone\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $input = $request->validate([
            'body' => 'required|max:255',
        ]);

        auth()->user()->objectives()->create($input);

        return response([], 204);
    }
}
