<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        Author::insert([
            ['name' => 'J.D. Salinger', 'image' => 'salinger.jpg', 'bio' => 'Author of "The Catcher in the Rye".'],
            ['name' => 'Harper Lee', 'image' => 'lee.jpg', 'bio' => 'Author of "To Kill a Mockingbird".'],
            ['name' => 'George Orwell', 'image' => 'orwell.jpg', 'bio' => 'Author of "1984".'],
            ['name' => 'F. Scott Fitzgerald', 'image' => 'fitzgerald.jpg', 'bio' => 'Author of "The Great Gatsby".'],
            ['name' => 'Herman Melville', 'image' => 'melville.jpg', 'bio' => 'Author of "Moby Dick".'],
        ]);
    }
}
