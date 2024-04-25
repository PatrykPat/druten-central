<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userhasmeerkeuzevraag extends Model
{
    public $timestamps = false;

    protected $table = 'userhasmeerkeuzevraag';
    protected $fillable = ['User_idUser', 'Vragen_idVragen'];
    use HasFactory;
}
