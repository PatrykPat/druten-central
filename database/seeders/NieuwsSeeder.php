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
            'title' => "er is brand",
            'beschrijving' => 'er is een hele grootte brand bij de plaatstelijke albert hijen',
            'datum' => Carbon::createFromDate(2025 - 04 - 03),
            'postcode' => "4003BC",
        ]);
        Nieuws::create([
            'user_iduser' => 2,
            'title' => "de dader van de brand",
            'beschrijving' => 'de dader van de brand bleek een jongen te zijn die werkzaam was voor de jumbo',
            'datum' => Carbon::createFromDate(2025 - 04 - 03),
            'postcode' => "4003BC",
        ]);
        Nieuws::create([
            'user_iduser' => 2,
            'title' => "rechtzaak brand",
            'beschrijving' => 'er is nu een rechtzaak gestart tegen de brandstichter van de alber hijen',
            'datum' => Carbon::createFromDate(2025 - 04 - 03),
            'postcode' => "4003BC",
        ]);
    }
}
