<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Nieuws extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'nieuws';

    protected $fillable = ['user_iduser', 'title', 'beschrijving', 'image', 'datum','postcode'];
}
