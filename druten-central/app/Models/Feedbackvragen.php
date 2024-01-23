<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedbackvragen extends Model
{
    use HasFactory;
    protected $table = 'Feedbackvragen';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
