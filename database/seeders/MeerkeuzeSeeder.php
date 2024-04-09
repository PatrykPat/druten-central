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
            'vraag' => 'hoe oud ben ik',
            'puntenTeVerdienen' => 5,
            'userID' => 2,
        ]);
        Meerkeuzevragen::create([
            'vraag' => 'hoe heet ik',
            'puntenTeVerdienen' => 1,
            'userID' => 2,
        ]);
        Meerkeuzevragen::create([
            'vraag' => 'wie is de baas van de jumbo',
            'puntenTeVerdienen' => 8,
            'userID' => 2,
        ]);
    }
}
