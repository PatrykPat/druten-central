<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasVragen extends Model
{
    use HasFactory;
    protected $table = 'UserHasVragen';
    protected $fillable = ['User_idUser', 'Vragen_idVragen', 'antwoord'];

    public $timestamps = false;
    public function gebruiker()
    {
        return $this->belongsTo(User::class, 'User_idUser', 'id');
    }
}
