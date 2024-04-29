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
            'AntwoordTekst' => 'Olifant',
            'IsCorrect' => 1,
        ]);
        Antwoord::create([
            'vraagID' => 1,
            'AntwoordTekst' => 'Krokodil',
            'IsCorrect' => 0,
        ]);
        Antwoord::create([
            'vraagID' => 1,
            'AntwoordTekst' => 'Kat',
            'IsCorrect' => 1,
        ]);
        Antwoord::create([
            'vraagID' => 1,
            'AntwoordTekst' => 'Slang',
            'IsCorrect' => 0,
        ]);


        Antwoord::create([
            'vraagID' => 2,
            'AntwoordTekst' => "Rood",
            'IsCorrect' => 1,
        ]);
        Antwoord::create([
            'vraagID' => 2,
            'AntwoordTekst' => "Geel",
            'IsCorrect' => 1,
        ]);
        Antwoord::create([
            'vraagID' => 2,
            'AntwoordTekst' => "Groen",
            'IsCorrect' => 0,
        ]);
        Antwoord::create([
            'vraagID' => 2,
            'AntwoordTekst' => "Blauw",
            'IsCorrect' => 1,
        ]);

        Antwoord::create([
            'vraagID' => 3,
            'AntwoordTekst' => "Frankrijk",
            'IsCorrect' => 0,
        ]);
        Antwoord::create([
            'vraagID' => 3,
            'AntwoordTekst' => "Polen",
            'IsCorrect' => 1,
        ]);
        Antwoord::create([
            'vraagID' => 3,
            'AntwoordTekst' => "Nederland",
            'IsCorrect' => 1,
        ]);
        Antwoord::create([
            'vraagID' => 3,
            'AntwoordTekst' => "Zwitserland",
            'IsCorrect' => 1,
        ]);
    }
}
