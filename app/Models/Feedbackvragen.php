<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedbackvragen extends Model
{
    use HasFactory;
    protected $table = 'Feedbackvragen';
    public function gebruiker()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function gebruikers()
    {
        return $this->hasMany(UserHasVragen::class, 'Vragen_idVragen', 'id');
    }
}
