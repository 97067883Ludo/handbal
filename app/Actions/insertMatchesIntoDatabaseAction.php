<?php

namespace App\Actions;

use App\Models\Wedstrijd;
use Illuminate\Support\Collection;

class insertMatchesIntoDatabaseAction
{

    public function __invoke(Collection $mappedMatches): void
    {
        Wedstrijd::truncate();

        $mappedMatches->map(function ($value) {
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
