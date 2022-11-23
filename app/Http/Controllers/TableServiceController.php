<?php

namespace App\Http\Controllers;

use App\Models\SearchWord;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableServiceController extends Controller
{
    public function show()
    {
        return view('tafeldienst');
    }

    public function filter(Request $request)
    {
        if ($request->filter == '') {
            return [];
        }

        SearchWord::create([
            'ip' => $request->ip(),
            'searchTerms' => $request->filter,
        ]);

        $name = collect(explode(' ', $request->filter));

        $matches = DB::table('wedstrijds')
            ->where(function (Builder $builder) use($name) {
                return $name->each(function($name) use ($builder) {
                    return $builder->where('tafeldienst', 'LIKE', '%' .$name . '%');
                    });
            })
                ->where('datum', '>', now())
            ->get();

        return $matches ?? [];
    }
}
