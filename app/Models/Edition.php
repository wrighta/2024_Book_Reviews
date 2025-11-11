<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    use HasFactory;

     protected $fillable = [
        'book_id',
        'edition_number',
        'publication_year',
        'isbn',
        'publisher',
        'price',
    ];

    // Each Edition belongs to one Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
