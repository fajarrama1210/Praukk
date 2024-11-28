<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Books extends Model
{
    /** @use HasFactory<\Database\Factories\BooksFactory> */
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $with = ['category', 'shelves'];

    public function category()
    {
        return $this->belongsTo(BookCategory::class);
    }

    public function shelves()
    {
        return $this->belongsTo(BookShelf::class, 'shelf_id');
    }

    /**
     * Get all of the Book for the Books
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Book(): HasMany
    {
        return $this->hasMany(Books::class);
    }

}
