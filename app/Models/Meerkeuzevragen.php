<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meerkeuzevragen extends Model
{
    use HasFactory;
    protected $table = 'meerkeuzevragen';
    protected $fillable = ['vraag', 'userID'];

    public function antwoord()
    {
        return $this->hasMany(Antwoord::class, 'vraagID', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }

}
