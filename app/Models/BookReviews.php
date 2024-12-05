<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookReviews extends Model
{
    /** @use HasFactory<\Database\Factories\BookReviewsFactory> */
    
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['user', 'book'];

    protected $fillable = ['review', 'like', 'dislike'];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Books::class, 'book_id');
    }
}
