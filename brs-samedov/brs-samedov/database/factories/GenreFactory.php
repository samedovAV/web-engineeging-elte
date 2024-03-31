<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    protected $model = Genre::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
            'style' => $this->faker->randomElement(['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark']),
        ];
    }
}
