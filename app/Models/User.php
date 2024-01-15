<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticate;
use Illuminate\Notifications\Notifiable;

class User extends Authenticate
{
    use Notifiable;

    protected $fillable = [
        'meno',
        'heslo',
        'email',
        'stav_uctu',
        'obrazok_profil'
    ];

    public $timestamps = false;

    public function findForPassport($username) {
        return $this->where('meno', $username)->first();
    }

    public function getMeno() {
        return $this->meno;
    }

    public function getAuthPassword()
    {
        return $this->heslo;
    }

    public function userBooks()
    {
        return $this->belongsToMany(Book::class, 'user_books', 'pouzivatel_id', 'kniha_id');
    }
}
