<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterController extends Controller
{
    public static function filterSelectedMatches(Array $matches, Array $filters):array
    {
        $filteredMatches = [];
        foreach ($matches as $match){
            $match = json_decode($match, true);

            $filteredMatches[] = array_filter($match, function ($data, $key) use ($filters) {

                return in_array($key, $filters);
            },1);
        }
        return $filteredMatches;
    }
}
