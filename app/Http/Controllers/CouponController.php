<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function show()
    {
        return view('coupons.coupons');
    }
}
