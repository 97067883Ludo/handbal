<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mapper>
 */
class MapperFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "dbfield" => "wedstrijd_nr",
            "excelfield" => "nummer",
            "dbfield" => "datum",
            "excelfield" => "datum",
            "dbfield" => "tijd",
            "excelfield" => "tijd",
            "dbfield" => "thuisteam",
            "excelfield" => "thuisteam",
            "dbfield" => "uitteam",
            "excelfield" => "uitteam",
            "dbfield" => "plaats",
            "excelfield" => "plaats",
            "dbfield" => "scheidsrechters",
            "excelfield" => "scheidsrechter-1",
            "dbfield" => "scheidsrechters",
            "excelfield" => "scheidsrechter-2",
            "dbfield" => "begeleider_jeugdspelleider",
            "excelfield" => "begeleider jeugdspelleider",
            "dbfield" => "zaaldienst",
            "excelfield" => "zaaldienst",
        ];
    }
}
