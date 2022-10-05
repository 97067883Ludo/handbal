<?php

namespace App\Http\Controllers;

use App\Models\Mapper;
use Illuminate\Support\Collection;

class MapperController extends Controller
{

    public function map($rows): Collection
    {
        $mappings = Mapper::pluck('dbfield', 'excelfield');

        return collect($rows)
            ->map(function(array $row) use ($mappings) {
                return collect($row)->mapWithKeys(function($value, $key) use ($mappings){
                    return [($mappings->has($key) ? $mappings[$key] : 'unmapped') => $value];
                });
            });
    }
}

