<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponHasUser extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'coupons';

    protected $fillable = ['user_iduser', 'coupons_idcoupons'];

    public function user()
    {
        return $this->belongsTo(User::class, 'User_idUser', 'id');
    }
}
