<?php

namespace App\Http\Controllers;

use App\Actions\MakeMatchTableAction;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function show(Request $request)
    {
        $request->validate([
            'matches' => 'required'
        ]);

        $matchTable = (new MakeMatchTableAction(collect($request->matches)))->make();
        dd($matchTable);
    }
}
