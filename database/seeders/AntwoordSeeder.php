<?php

namespace Database\Seeders;

use App\Models\Antwoord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AntwoordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Antwoord::create([
            'vraagID' => 1,
            'AntwoordTekst' => 'Boven-leeuwen',
            'IsCorrect' => 1,
        ]);
        Antwoord::create([
            'vraagID' => 1,
            'AntwoordTekst' => 'Amsterdam',
            'IsCorrect' => 0,
        ]);
        Antwoord::create([
            'vraagID' => 1,
            'AntwoordTekst' => 'Afferden',
            'IsCorrect' => 1,
        ]);
        Antwoord::create([
            'vraagID' => 1,
            'AntwoordTekst' => 'Puiflijk',
            'IsCorrect' => 0,
        ]);


        Antwoord::create([
            'vraagID' => 2,
            'AntwoordTekst' => "~19.500",
            'IsCorrect' => 1,
        ]);
        Antwoord::create([
            'vraagID' => 2,
            'AntwoordTekst' => "~190.500",
            'IsCorrect' => 0,
        ]);
        Antwoord::create([
            'vraagID' => 2,
            'AntwoordTekst' => "15.147",
            'IsCorrect' => 0,
        ]);
        Antwoord::create([
            'vraagID' => 2,
            'AntwoordTekst' => "~25.000",
            'IsCorrect' => 0,
        ]);

        Antwoord::create([
            'vraagID' => 3,
            'AntwoordTekst' => "Jumbo",
            'IsCorrect' => 1,
        ]);
        Antwoord::create([
            'vraagID' => 3,
            'AntwoordTekst' => "Albert Heijn",
            'IsCorrect' => 1,
        ]);
        Antwoord::create([
            'vraagID' => 3,
            'AntwoordTekst' => "Blokker",
            'IsCorrect' => 1,
        ]);
        Antwoord::create([
            'vraagID' => 3,
            'AntwoordTekst' => "Shoeby",
            'IsCorrect' => 1,
        ]);
    }
}
