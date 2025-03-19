<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Pick a random local placeholder image
        $imageFiles = Storage::files('public/images/books');

        $imagePath = count($imageFiles) ? str_replace('public/', '',
        $this->faker->randomElement($imageFiles))
        : '/default_book.jpg'; // /default_book.jpg is in my images/books folder

        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'year' => $this->faker->year(),
            'image' => $imagePath,
        ];

    }
}
