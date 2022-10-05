<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::create([
             'name' => 'ludo',
             'email' => 'test@example.com',
             'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
         ]);

        \App\Models\Mapper::create([
            "dbfield" => "wedstrijd_nummer",
            "excelfield" => "nummer",
        ]);
        \App\Models\Mapper::create([
            "dbfield" => "datum",
            "excelfield" => "datum",
        ]);
        \App\Models\Mapper::create([
            "dbfield" => "tijd",
            "excelfield" => "tijd",
        ]);
        \App\Models\Mapper::create([
            "dbfield" => "thuisteam",
            "excelfield" => "thuisteam",
        ]);
        \App\Models\Mapper::create([
            "dbfield" => "uitteam",
            "excelfield" => "uitteam",
        ]);
        \App\Models\Mapper::create([
            "dbfield" => "plaats",
            "excelfield" => "plaats",
        ]);
        \App\Models\Mapper::create([
            "dbfield" => "scheidsrechter_1",
            "excelfield" => "scheidsrechter-1",
        ]);
        \App\Models\Mapper::create([
            "dbfield" => "scheidsrechter_2",
            "excelfield" => "scheidsrechter-2",
        ]);
        \App\Models\Mapper::create([
            "dbfield" => "begeleider_jeugdspelleider",
            "excelfield" => "begeleider jeugdspelleider",
        ]);
        \App\Models\Mapper::create([
            "dbfield" => "tafeldienst",
            "excelfield" => "zaaldienst",
        ]);
        \App\Models\Mapper::create([
            "dbfield" => "veld",
            "excelfield" => "veld/zaal",
        ]);
    }
}
