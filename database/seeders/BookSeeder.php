<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Carbon\Carbon;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();
            Book::insert([
                ['title' => 'The Catcher in the Rye', 'description' => 'A story about teenage angst and alienation.', 'year' => 1951,   'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp],
                ['title' => 'To Kill a Mockingbird',  'description' => 'A classic novel of racial injustice in the American South.', 'year' => 1960,   'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp],
                ['title' => '1984', 'description' => 'A dystopian novel about totalitarianism and surveillance.', 'year' => 1949,   'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp],
                ['title' => 'The Great Gatsby', 'description' => 'A novel about the American dream and social decadence.', 'year' => 1925, 'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp],
                ['title' => 'Moby Dick', 'description' => 'A thrilling sea adventure and a tale of revenge.', 'year' => 1851],   'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp]
            );
    }

}
