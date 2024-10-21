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
}
