<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackAntwoorden extends Model
{
    use HasFactory;
    protected $table = 'userhasvragen';
    public function gebruiker()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
