<?php

namespace Database\Seeders;

use App\Models\UserHasVragen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserHasVragenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //stevens antwoorden
        UserHasVragen::create([
            'User_idUser' => 6,
            'vragen_idVragen' => "1",
            'antwoord' => 'heel slecht en saai',
            'rating' => 2,
        ]);
        UserHasVragen::create([
            'User_idUser' => 6,
            'vragen_idVragen' => "2",
            'antwoord' => 'helemaal niks het is echt een top winkel',
            'rating' => 10,
        ]);
        UserHasVragen::create([
            'User_idUser' => 6,
            'vragen_idVragen' => "3",
            'antwoord' => 'geen idee het is gewoon prachtig',
            'rating' => 10,
        ]);
        UserHasVragen::create([
            'User_idUser' => 6,
            'vragen_idVragen' => "4",
            'antwoord' => 'helemaal niks jumbo is te geweldig',
            'rating' => 4,
        ]);
        UserHasVragen::create([
            'User_idUser' => 6,
            'vragen_idVragen' => "5",
            'antwoord' => 'alles het is erg slecht daar',
            'rating' => 1,
        ]);
        //patryks antwoorden
        UserHasVragen::create([
            'User_idUser' => 7,
            'vragen_idVragen' => "1",
            'antwoord' => 'echt een doodde bende daar',
            'rating' => 2,
        ]);
        UserHasVragen::create([
            'User_idUser' => 7,
            'vragen_idVragen' => "2",
            'antwoord' => 'best wel mid',
            'rating' => 5,
        ]);
        UserHasVragen::create([
            'User_idUser' => 7,
            'vragen_idVragen' => "3",
            'antwoord' => 'het assortiment is best wel leeg',
            'rating' => 6,
        ]);
        UserHasVragen::create([
            'User_idUser' => 7,
            'vragen_idVragen' => "4",
            'antwoord' => 'de 7days croissants terugbrengen',
            'rating' => 6,
        ]);
        UserHasVragen::create([
            'User_idUser' => 7,
            'vragen_idVragen' => "5",
            'antwoord' => 'best prima alleen een beetje prijzig',
            'rating' => 6,
        ]);
        //tims antwoorden
        UserHasVragen::create([
            'User_idUser' => 8,
            'vragen_idVragen' => "1",
            'antwoord' => 'het is een prima werkplek',
            'rating' => 7,
        ]);
        UserHasVragen::create([
            'User_idUser' => 8,
            'vragen_idVragen' => "2",
            'antwoord' => 'ja er missen best wel wat producten',
            'rating' => 6,
        ]);
        UserHasVragen::create([
            'User_idUser' => 8,
            'vragen_idVragen' => "3",
            'antwoord' => 'hoebedoel je de jumbo is mooi',
            'rating' => 5,
        ]);
        UserHasVragen::create([
            'User_idUser' => 8,
            'vragen_idVragen' => "4",
            'antwoord' => 'geen idee ik ben nooit in de plus',
            'rating' => 1,
        ]);
        UserHasVragen::create([
            'User_idUser' => 8,
            'vragen_idVragen' => "5",
            'antwoord' => 'geen idee',
            'rating' => 1,
        ]);
    }
}
