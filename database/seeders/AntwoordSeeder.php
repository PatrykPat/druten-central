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
            'AntwoordTekst' => 17,
            'IsCorrect' => 0,
        ]);
        Antwoord::create([
            'vraagID' => 1,
            'AntwoordTekst' => 18,
            'IsCorrect' => 1,
        ]);
        Antwoord::create([
            'vraagID' => 1,
            'AntwoordTekst' => 19,
            'IsCorrect' => 0,
        ]);
        Antwoord::create([
            'vraagID' => 1,
            'AntwoordTekst' => 20,
            'IsCorrect' => 0,
        ]);


        Antwoord::create([
            'vraagID' => 2,
            'AntwoordTekst' => "guus",
            'IsCorrect' => 0,
        ]);
        Antwoord::create([
            'vraagID' => 2,
            'AntwoordTekst' => "steven",
            'IsCorrect' => 1,
        ]);
        Antwoord::create([
            'vraagID' => 2,
            'AntwoordTekst' => "amerika",
            'IsCorrect' => 0,
        ]);
        Antwoord::create([
            'vraagID' => 2,
            'AntwoordTekst' => "sid",
            'IsCorrect' => 0,
        ]);

        Antwoord::create([
            'vraagID' => 3,
            'AntwoordTekst' => "patryk perwenis",
            'IsCorrect' => 0,
        ]);
        Antwoord::create([
            'vraagID' => 3,
            'AntwoordTekst' => "ton van veen",
            'IsCorrect' => 1,
        ]);
        Antwoord::create([
            'vraagID' => 3,
            'AntwoordTekst' => "jonathan joestar",
            'IsCorrect' => 0,
        ]);
        Antwoord::create([
            'vraagID' => 3,
            'AntwoordTekst' => "walter whote",
            'IsCorrect' => 0,
        ]);
    }
}
