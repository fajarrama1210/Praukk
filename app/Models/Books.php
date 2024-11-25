<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    /** @use HasFactory<\Database\Factories\BooksFactory> */
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $with = ['category', 'shelves'];

    public function category()
    {
        return $this->belongsTo(BookCategories::class, 'category_id');
    }

    public function shelves()
    {
        return $this->belongsTo(BookShelf::class, 'shelf_id');
    }
}
