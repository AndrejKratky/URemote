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
        'stav_uctu'
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
}
