<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBooks extends Model
{
    protected $table = 'user_books';
    public $timestamps = false;
    protected $fillable = ['pouzivatel_id', 'kniha_id', 'status', 'pozicane_do'];
}
