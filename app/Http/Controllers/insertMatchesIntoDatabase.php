<?php

namespace App\Http\Controllers;

use App\Models\Wedstrijd;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class insertMatchesIntoDatabase extends Controller
{
    public function do(Collection $mappedMatches): void
    {
        Wedstrijd::truncate();

        $mappedMatches->map(function ($value, $key) {
//            dd($value);
            Wedstrijd::create([
                'veld' => $value['veld'],
                'wedstrijd_nummer' => $value['wedstrijd_nummer'],
                'datum' => $value['datum'],
                'tijd' => $value['tijd'],
                'thuisteam' => $value['thuisteam'],
                'uitteam' => $value['uitteam'],
                'scheidsrechter_1' => $value['scheidsrechter_1'],
                'scheidsrechter_2' => $value['scheidsrechter_2'],
                'tafeldienst' => $value['tafeldienst'],
                'begeleider_jeugdspelleider' => $value['begeleider_jeugdspelleider'],
            ]);
        });
    }
}
