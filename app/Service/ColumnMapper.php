<?php

namespace App\Service;

use App\Models\Mapper;
use Illuminate\Support\Collection;

class ColumnMapper
{

    public function map($rows): Collection
    {
        $mappings = Mapper::pluck('dbfield', 'excelfield');

        return collect($rows)
            ->map(function(array $row) use ($mappings) {
                return collect($row)->mapWithKeys(function($value, $key) use ($mappings){
                    return([($mappings->has(strtolower($key)) ? $mappings[strtolower($key)] : 'unmapped') => $value]);
                });
            });
    }
}
