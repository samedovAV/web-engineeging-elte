<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'author' => $this->faker->name,
            'genre_id' => Genre::inRandomOrder()->first()->id,
            'released_at' => $this->faker->date(),
            'pages' => $this->faker->numberBetween(100, 500),
            'language_code' => 'en', // Assuming English language
            'isbn' => $this->faker->unique()->isbn13,
            'in_stock' => $this->faker->numberBetween(5, 20),
            'description' => $this->faker->paragraph
        ];
    }
}
