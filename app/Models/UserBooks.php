<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBooks extends Model
{
    protected $table = 'user_books';
    public $timestamps = false;
    protected $fillable = ['pouzivatel_id', 'kniha_id', 'stav', 'pozicane_do'];

    public function user()
    {
        return $this->belongsTo(User::class, 'pouzivatel_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'kniha_id');
    }
}
