<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'year',
        'image',
        'created_at',
        'updated_at',
    ];

    // book can have many reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Book can have many authors
    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

     // One Book has many Editions
    public function editions()
    {
        return $this->hasMany(Edition::class);
    }


}
