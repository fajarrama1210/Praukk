<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookShelf extends Model
{
    /** @use HasFactory<\Database\Factories\BookShelfFactory> */
    use HasFactory;
    protected $table = 'book_shelf';
    protected $guarded = ['id'];
}
