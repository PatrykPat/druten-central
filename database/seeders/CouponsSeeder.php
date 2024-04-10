<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'Omschrijving' => "korting bij de turk",
            'Waarde' => 10,
            'Eenheid' => "%",
            'Puntenprijs' => 30,
            'einddatum' => Carbon::createFromDate(2025 - 04 - 03),
            'user_iduser' => 2,
        ]);
        Coupon::create([
            'Omschrijving' => "2de halve prijs bij de jumbo",
            'Waarde' => 50,
            'Eenheid' => '%',
            'Puntenprijs' => 100,
            'einddatum' => Carbon::createFromDate(2025 - 04 - 03),
            'user_iduser' => 2,
        ]);
        Coupon::create([
            'Omschrijving' => "extra eten bij macdonalds",
            'Waarde' => 0,
            'Eenheid' => "qr code",
            'Puntenprijs' => 12,
            'einddatum' => Carbon::createFromDate(2025 - 04 - 03),
            'user_iduser' => 2,
        ]);
    }
}
