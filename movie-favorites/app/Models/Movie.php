<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'year',
        'director',
        'genre',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
