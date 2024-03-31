<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Borrow;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrow>
 */
class BorrowFactory extends Factory
{
    protected $model = Borrow::class;

    public function definition()
    {
        return [
            'reader_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'book_id' => function () {
                return \App\Models\Book::factory()->create()->id;
            },
            'status' => $this->faker->randomElement(['PENDING', 'ACCEPTED', 'REJECTED', 'RETURNED']),
            'request_processed_at' => now(),
            'request_managed_by' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'deadline' => Carbon::now()->addWeek(),
            'returned_at' => now()->subDays(rand(1, 7)),
            'return_managed_by' => function () {
                return \App\Models\User::factory()->create()->id;
            },
        ];
    }
}
