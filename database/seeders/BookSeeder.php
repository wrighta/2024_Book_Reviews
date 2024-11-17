<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Author;
use Carbon\Carbon;

class BookSeeder extends Seeder
{
        function run(): void
        {
            $currentTimestamp = Carbon::now();

            // Create a list of books
            $books = [
                [
                    'title' => 'The Catcher in the Rye',
                    'description' => 'A story about teenage angst and alienation.',
                    'year' => 1951,
                    'image' => 'catcher-in-the-rye.jpg',
                ],
                [
                    'title' => 'To Kill a Mockingbird',
                    'description' => 'A classic novel of racial injustice in the American South.',
                    'year' => 1960,
                    'image' => 'to-kill-a-mockingbird.jpg',
                ],
                [
                    'title' => '1984',
                    'description' => 'A dystopian novel about totalitarianism and surveillance.',
                    'year' => 1949,
                    'image' => '1984.jpg',
                ],
                [
                    'title' => 'The Great Gatsby',
                    'description' => 'A novel about the American dream and social decadence.',
                    'year' => 1925,
                    'image' => 'the-great-gatsby.jpg',
                ],
                [
                    'title' => 'Moby Dick',
                    'description' => 'A thrilling sea adventure and a tale of revenge.',
                    'year' => 1851,
                    'image' => 'moby-dick.jpg',
                ],
            ];


            foreach ($books as $bookData)
            {
                // insert the book into the book table
                $book = Book::create(array_merge($bookData, ['created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp]));

                // randomly select two authors !note - authors must exist in the authors table
                // So AuthorSeeder must be executed before BookSeeder
                $authors = Author::inRandomOrder()->take(2)->pluck('id');

                // Attach authors to books
                // Laravels attach() function inserts a row in the pivot table indicating that this book is written by this author
                // You need to have the relationships and pivot table set up correctly for this to work
                $book->authors()->attach($authors);
            }
        }
    }
