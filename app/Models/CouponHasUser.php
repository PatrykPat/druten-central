<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponHasUser extends Model
{

    protected $table = 'coupons_has_user';

    protected $fillable = ['user_iduser', 'coupons_idcoupons'];

    public function user()
    {
        return $this->belongsTo(User::class, 'User_idUser', 'id');
    }
    // In CouponHasUser model
    public function coupon()
    {
        return $this->belongsTo('App\Models\Coupon', 'coupons_idcoupons', 'id');
    }

}
