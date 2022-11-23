<?php

namespace App\Http\Controllers;

use App\Models\SearchWord;

class SearchTermsController extends Controller
{
    public function show()
    {
        dd(SearchWord::all());
    }
}
