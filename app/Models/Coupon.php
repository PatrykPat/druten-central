<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table = 'coupons';

    protected $fillable = ['id', 'Omschrijving', 'Waarde', 'Eenheid', 'Puntenprijs', 'Einddatum', 'user_iduser'];

    public function user()
    {
        return $this->hasMany(CouponHasUser::class, 'id', 'id');
    }

    public function gebruiker()
    {
        return $this->belongsTo(User::class, 'user_iduser');
    }
}
