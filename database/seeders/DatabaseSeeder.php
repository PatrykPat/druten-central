<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(FeedbackSeeder::class);
        $this->call(MeerkeuzeSeeder::class);
        $this->call(AntwoordSeeder::class);
        $this->call(CouponsSeeder::class);
        $this->call(CouponHasUserSeeder::class);
        $this->call(NieuwsSeeder::class);
        $this->call(UserHasVragenSeeder::class);
    }
}
