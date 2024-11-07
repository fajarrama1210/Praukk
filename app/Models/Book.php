<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    protected $guarded = ['id'];

    /**
     * Get all of the Loans for the Books
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }

    /**
     * Get all of the PersonalCollection for the Books
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function PersonalCollection(): HasMany
    {
        return $this->hasMany(Personal_collection::class);
    }
    /**
     * Get all of the BookReviews for the Books
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function BookReviews(): HasMany
    {
        return $this->hasMany(Book_review::class);
    }
    /**
     * The roles that belong to the Books
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'book_category_relations', 'book_id', 'category_id');
    }
}
