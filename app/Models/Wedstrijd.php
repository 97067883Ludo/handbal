<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wedstrijd extends Model
{
    use HasFactory;
    protected $fillable = [
        'wedstrijd_nummer',
        'datum',
        'tijd',
        'thuisteam',
        'uitteam',
        'plaats',
        'scheidsrechter_1',
        'scheidsrechter_2',
        'tafeldienst',
        'begeleider_jeugdspelleider',
        'veld',
    ];

}
