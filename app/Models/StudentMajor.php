<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMajor extends Model
{
    /** @use HasFactory<\Database\Factories\StudentMajorFactory> */
    use HasFactory;
    use HasFactory;

    protected $fillable = [
        'name',
    ];
}
