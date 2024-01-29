<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antwoord extends Model
{
    protected $table = 'antwoord';
    protected $fillable = ['vraagID', 'AntwoordTekst', 'IsCorrect'];

    public function meerkeuzeVraag()
    {
        return $this->belongsTo(Meerkeuzevragen::class, 'vraagID');
    }
}
