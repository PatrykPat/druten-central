<?php

namespace Database\Seeders;

use App\Models\CouponHasUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponHasUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CouponHasUser::create([
            'user_iduser' => 3,
            'coupons_idcoupons' => 1,
        ]);
        CouponHasUser::create([
            'user_iduser' => 3,
            'coupons_idcoupons' => 2,
        ]);
        CouponHasUser::create([
            'user_iduser' => 3,
            'coupons_idcoupons' => 3,
        ]);

        CouponHasUser::create([
            'user_iduser' => 6,
            'coupons_idcoupons' => 1,
        ]);
        CouponHasUser::create([
            'user_iduser' => 6,
            'coupons_idcoupons' => 2,
        ]);
        CouponHasUser::create([
            'user_iduser' => 6,
            'coupons_idcoupons' => 3,
        ]);

        CouponHasUser::create([
            'user_iduser' => 7,
            'coupons_idcoupons' => 1,
        ]);
        CouponHasUser::create([
            'user_iduser' => 7,
            'coupons_idcoupons' => 2,
        ]);
        CouponHasUser::create([
            'user_iduser' => 7,
            'coupons_idcoupons' => 3,
        ]);
    }
}
