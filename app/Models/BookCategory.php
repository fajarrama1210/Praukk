<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get all of the books associated with the category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books(): HasMany
    {
        return $this->hasMany(Books::class); // Menghubungkan ke model Book
    }
}
