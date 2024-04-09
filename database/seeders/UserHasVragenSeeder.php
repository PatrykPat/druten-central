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
        UserHasVragen::create([
            'User_idUser' => 3,
            'vragen_idVragen' => "1",
            'antwoord' => 'heel slecht en saai',
            'rating' => 2,
        ]);
        UserHasVragen::create([
            'User_idUser' => 3,
            'vragen_idVragen' => 2,
            'antwoord' => 'helemaal nisk het is echt een top winkel',
            'rating' => 10,
        ]);
        UserHasVragen::create([
            'User_idUser' => 3,
            'vragen_idVragen' => "3",
            'antwoord' => 'omdat het nou eenmaal zo mooi bij elkaar gaat',
            'rating' => 8,
        ]);
    }
}
