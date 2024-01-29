<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasVragen extends Model
{
    use HasFactory;
    protected $table = 'UserHasVragen';
    protected $fillable = ['User_idUser', 'Vragen_idVragen', 'antwoord','rating'];

    public $timestamps = false;

}
