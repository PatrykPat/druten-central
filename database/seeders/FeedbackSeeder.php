<?php

namespace Database\Seeders;

use App\Models\Feedbackvragen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        feedbackvragen::create([
            'title' => 'vraag 1',
            'beschrijving' => 'wat vind je van druten',
            'puntenTeVerdienen' => 2,
            'user_userid' => 2,
        ]);
        feedbackvragen::create([
            'title' => 'vraag 2',
            'beschrijving' => 'wat kan er beter aan de jumbo',
            'puntenTeVerdienen' => 5,
            'user_userid' => 2,
        ]);
        feedbackvragen::create([
            'title' => 'vraag 3',
            'beschrijving' => 'waarom is de jumbo zo mooi',
            'puntenTeVerdienen' => 1,
            'user_userid' => 2,
        ]);
    }
}
