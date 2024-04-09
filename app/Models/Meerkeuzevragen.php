<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Antwoord;

class Meerkeuzevragen extends Model
{
    use HasFactory;
    protected $table = 'meerkeuzevragen';
    protected $fillable = ['vraag', 'puntenTeVerdienen', 'userID'];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
    public function antwoorden()
    {
        return $this->hasMany(Antwoord::class, 'vraagID', 'id'); // Aangepaste relatie met gebruik van de Antwoord klasse
    }
}
