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
            'vraag' => 'Welke van de volgende dieren zijn zoogdieren',
            'puntenTeVerdienen' => 50,
            'userID' => 2,
        ]);
        Meerkeuzevragen::create([
            'vraag' => 'Welke van de volgende kleuren zijn primaire kleuren?',
            'puntenTeVerdienen' => 5,
            'userID' => 2,
        ]);
        Meerkeuzevragen::create([
            'vraag' => 'Welke van de volgende landen grenzen aan Duitsland',
            'puntenTeVerdienen' => 80,
            'userID' => 2,
        ]);
    }
}
