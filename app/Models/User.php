<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $guarded = ['id'];
    /**
     * Get all of the Loans for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Loans(): HasMany
    {
        return $this->hasMany(Loans::class);
    }
    /**
     * Get all of the Personal_collection for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Personal_collection(): HasMany
    {
        return $this->hasMany(personsalCollections::class);
    }

    /**
     * Get all of the BookReview for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function BookReview(): HasMany
    {
        return $this->hasMany(BookReviews::class);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
