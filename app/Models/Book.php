<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'meno',
        'heslo',
        'email',
        'stav_uctu',
        'obrazok_profil'
    ];

    public $timestamps = false;
}
