<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Nieuws;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NieuwsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {

        Nieuws::create([
            'user_iduser' => 2,
            'title' => "Er is brand",
            'beschrijving' => 'Er is een hele grootte brand bij de plaatstelijke albert hijen',
            'datum' => Carbon::createFromDate('2024', '05', '13'),
            'postcode' => "4005BF",
        ]);

        Nieuws::create([
            'user_iduser' => 2,
            'title' => "De dader van de brand",
            'beschrijving' => 'De dader van de brand bleek een jongen te zijn die werkzaam was voor de jumbo',
            'datum' => Carbon::createFromDate('2024', '06', '03'),
            'postcode' => "4003KL",
        ]);

        Nieuws::create([
            'user_iduser' => 2,
            'title' => "Rechtzaak brand",
            'beschrijving' => 'Er is nu een rechtzaak gestart tegen de brandstichter van de alber hijen',
            'datum' => Carbon::createFromDate('2024', '05', '16'),
            'postcode' => "4006VF",
        ]);
    }
}
