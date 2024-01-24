<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meerkeuzevragen extends Model
{
    use HasFactory;
    protected $table = 'meerkeuzevragen';
    protected $fillable = ['vraag'];

    public function Antwoord()
    {
        return $this->hasMany(Antwoord::class, 'vraagID');
    }
}
