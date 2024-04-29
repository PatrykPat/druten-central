<?php

namespace Database\Seeders;

use App\Models\Meerkeuzevragen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeerkeuzeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Meerkeuzevragen::create([
            'vraag' => 'Welke van de volgende plaatsen grenzen aan Druten',
            'puntenTeVerdienen' => 50,
            'userID' => 2,
        ]);
        Meerkeuzevragen::create([
            'vraag' => 'hoeveel inwoners heeft Druten',
            'puntenTeVerdienen' => 5,
            'userID' => 2,
        ]);
        Meerkeuzevragen::create([
            'vraag' => 'Welke van de volgende winkels zijn in Druten',
            'puntenTeVerdienen' => 80,
            'userID' => 2,
        ]);
    }
}
