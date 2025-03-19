<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

       //Pick a random local placeholder image
       $imageFiles = Storage::files('public/images/authors');

       $imagePath = count($imageFiles) ? str_replace('public/', '',
       $this->faker->randomElement($imageFiles))
       : '/default_author.jpg';

        return [
            'name' => $this->faker->name(),
            'image' => $imagePath, // Store relative path
            'bio' => $this->faker->paragraph(),
        ];
    }
}
