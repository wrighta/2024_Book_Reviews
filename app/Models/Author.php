<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'bio'];

    // Author can have many books
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
