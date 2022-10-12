<?php

namespace App\Actions;

use App\Service\MakeMatchTable;

class MakeMatchTableAction extends MakeMatchTable
{
    public function __construct(public $matchesJsonEncoded)
    {
    }


    public function make()
    {
        $matches = $this->JsonDecodeMatches();
        $view = view('match-table', [
            'matches' => $matches
        ])->render();
        dd($view);
    }

    public function JsonDecodeMatches(): \Illuminate\Support\Collection
    {
        return $this->matchesJsonEncoded->map(function ($value) {
            return collect(json_decode($value));
        });
    }
}
