<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Review;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
          // Create 100 Users for Reviews
          User::factory(100)->create();

          
          // Create 500 Books and 200 Authors
          $books = Book::factory(500)->create();
          $authors = Author::factory(200)->create();


          // Attach Authors to Books (Many-to-Many)
          foreach ($books as $book) {
              $randomAuthors = $authors->random(rand(1, 3)); // Each book gets 1-3 authors
              $book->authors()->attach($randomAuthors);
          }

          // Create Reviews for Books
          $books->each(function ($book) {
              Review::factory(rand(5, 20))->create([
                  'book_id' => $book->id,
                  'user_id' => User::inRandomOrder()->first()->id,
              ]);
          });
    }
}
