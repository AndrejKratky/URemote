<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = false;
    public function userBooks()
    {
        return $this->belongsToMany(User::class, 'user_books', 'kniha_id', 'pouzivatel_id');
    }
}
