<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personsalCollections extends Model
{
    /** @use HasFactory<\Database\Factories\PersonsalCollectionsFactory> */
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['user', 'book'];

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
