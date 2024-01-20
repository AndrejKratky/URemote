<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteReview extends Model
{
    protected $table = 'website_reviews';
    public $timestamps = false;
    protected $fillable = ['user_id', 'review_text', 'rating'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
